<?php

namespace Modules\Meeting\Http\Controllers;

use App\Role;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Logging\Log;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;
use Modules\Meeting\Entities\Occupation;
use Prologue\Alerts\Facades\Alert;

class PagesController extends Controller
{
    public $userPermission, $user, $userRole, $occupations;

    public function __construct()
    {
        $this->user = Auth::user();

        View::share('user', $this->user);
    }

    /**
     * Returns the index page
     *
     * @return mixed
     */
    public function index()
    {
        return view('meeting::index')
            ->with('page_name', 'Início');
    }

    /**
     * Return the users page
     * @return mixed
     */
    public function users()
    {
        $users = User::with('roles')->get();
        return view('meeting::users.users')
            ->with('page_name', 'Usuários')
            ->with('users', $users);
    }

    /**
     * Process the delete user request
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();

        Session::flash('success','Usuário deletado');
        return redirect(route('admin.users'));
    }


    /**
     * Add new user
     *
     * @return mixed
     */
    public function add_user()
    {
        $roles = Role::with('users')->get();
        $occupations = Occupation::all()->lists('name','id')->toArray();
        return view('meeting::users.add')
            ->with('page_name', 'Início')
            ->with('occupations', $occupations)
            ->with('roles', $roles);
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function add_post(Request $request)
    {
        $rules = [
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'min:8',
            'image'=>'image',
            'occupation'=>'required',
            'password'=>'required|min:8',
            'password_confirmation'=>'required|min:8',
        ];

        $attributes = [
            'name'=>'nome',
            'phone'=>'telefone',
            'password'=>'senha',
            'occupation'=>'cargo',
            'password_confirmation'=>'confirmação de senha',
            'image'=>'image',
        ];

        $validator = Validator::make($request->all(),$rules);

        $validator->setAttributeNames($attributes);

        if($validator->fails()){
            return redirect()
                ->back()
                ->withErrors($validator->errors())
                ->withInput();
        }

        //Save on BD
        $new_user = User::create($request->all());

        $user = User::find($new_user->id);
        $user->image = $request->file('image')->getClientOriginalExtension();
        $user->save();

        //Save User image
        $imageName = $new_user->id . '.' .
            $request->file('image')->getClientOriginalExtension();
        $request->file('image')->move(
            base_path() . '/public/images/projects/', $imageName
        );

        $request->session()->flash('success','Usuário Cadastrado!');
        return redirect()->back();
    }

    /**
     * Edit specific user
     *
     * @param $id
     * @return mixed
     */
    public function edit_user($id)
    {
        $user = User::find($id);
        $occupations = Occupation::all()->lists('name','id')->toArray();
        /*$roles = Role::with('users')->get();*/
        return view('meeting::users.edit')
            ->with('page_name', 'Editar Usuário')
            ->with('occupations', $occupations)
            ->with('edit_user',$user);
    }

    /**
     * Process the post request from the edit_user
     *
     * @param Request $request
     * @param $id
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function edit_post(Request $request, $id)
    {
        $rules = [
            'name'=>'required',
            'email'=>'required',
            'phone'=>'',
            'password'=>'min:8',
            'password_confirmation'=>'min:8',
            'occupation'=>'required',
            'role'=>'required',
        ];

        $attributes = [
            'name'=>'nome',
            'phone'=>'telefone',
            'password'=>'senha',
            'password_confirmation'=>'confirmação de senha',
            'image'=>'image',
            'role'=>'permissão',
            'occupation'=>'cargo',
        ];

        $validator = Validator::make($request->all(),$rules);

        $validator->setAttributeNames($attributes);

        if($validator->fails()){
            return redirect()
                ->back()
                ->withErrors($validator->errors())
                ->withInput();
        }

        if($request->get('password') != $request->get('password_confirmation')){
            Session::flash('danger', 'As senhas devem ser iguais!');
            return redirect(route('admin.users.edit'));
        }

        //Save on BD
        $user = User::find($id);
        $user->fill([
            'name'=> $request->get('name'),
            'email'=> $request->get('email'),
            'phone'=> $request->get('phone'),
            'password'=> bcrypt($request->get('password')),
        ]);

        dd($role = Role::find($request->get('role'))->users()->save($user));

        if(!empty($request->file('image'))){
            File::delete(base_path().'/public/images/users/'.$id.'.'.$user->image_ext);

            $user->image = $request->file('image')->getClientOriginalExtension();

            //Save User image
            $imageName = $user->id . '.' .
                $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(
                base_path() . '/public/images/users/', $imageName
            );
        }
        $user->save();

        $request->session()->flash('success','Usuário atualizado!');
        return redirect()->back();
    }
}
