<?php

namespace Modules\Meeting\Http\Controllers;

use app\Role;
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

        $this->occupations = Occupation::all();
    }

    public function index()
    {
        return view('meeting::index')
            ->with('page_name', 'Início');
    }

    public function users()
    {
        $users = User::all();
        return view('meeting::users.users')
            ->with('page_name', 'Usuários')
            ->with('users', $users);
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();

        Session::flash('success','Usuário deletado');
        return redirect(route('admin.users'));
    }


    public function add_user()
    {
        $roles = Role::all();
        return view('meeting::users.add')
            ->with('page_name', 'Início')
            ->with('occupations', $this->occupations)
            ->with('roles', $roles);
    }

    public function add_post(Request $request)
    {
        $rules = [
            'name'=>'required',
            'email'=>'required',
            'phone'=>'',
            'image'=>'image',
            'occupation'=>'required',
            'role'=>'required',
            'password'=>'min:8',
            'password_confirmation'=>'min:8',
        ];

        $attributes = [
            'name'=>'nome',
            'phone'=>'telefone',
            'password'=>'senha',
            'occupation'=>'cargo',
            'role'=>'permissão',
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

    public function edit_user($id)
    {
        $user = User::find($id);
        return view('meeting::users.edit')
            ->with('page_name', 'Editar Usuário')
            ->with('edit_user',$user);
    }

    public function edit_post(Request $request, $id)
    {
        $rules = [
            'name'=>'required',
            'email'=>'required',
            'phone'=>'',
            'password'=>'min:8',
            'password_confirmation'=>'min:8',
        ];

        $attributes = [
            'name'=>'nome',
            'phone'=>'telefone',
            'password'=>'senha',
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

        if($request->get('password') != $request->get('password_confirmation')){
            Session::flash('danger', 'As senhas devem ser iguais!');
            return redirect(route('admin.users.edit'));
        }

        //Save on BD
        $user = User::find($id);
        $user->fill($request->all());
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

    public function contact(Request $request)
    {
        $rules = [
            'nome'=>'required|min:1',
            'email'=>'required|email',
            'telefone'=>'required|regex:/^\([1-9]{2}\) [2-9][0-9]{3,4}\-[0-9]{4}$/',
            'mensagem'=>'required|min:10',
            'g-recaptcha-response' => 'required|captcha'
        ];

        $messages = [
            'nome.min'=>'O campo :atribute precisa ser preenchido!',
            'telefone.regex'=>'O campo telefone precisa estar no padrão (xx) xxxxx-xxxx!',
            'g-recaptcha-response.required'=>'Você precisa confirmar que não é um robô!',
            'g-recaptcha-response.captcha'=>'O ReCAPTCHA precisa ser um código CAPTCHA válido!'
        ];

        $validator = Validator::make($request->all(),$rules,$messages);

        if($validator->fails()){
            return redirect()
                ->to(URL::previous().'#section-contact')
                ->withErrors($validator->errors())
                ->withInput();
        }


        //Enviar email

        Mail::send('email.template',
        array(
            'site_domain' => 'digitalserra.com.br',

            'nome' => $request->get('nome'),
            'email' => $request->get('email'),
            'telefone' => $request->get('telefone'),
            'mensagem' => $request->get('mensagem')
        ), function($message)
        {
            $message->from(env('MAIL_USERNAME', null));
            $message->to(env('MAIL_USERNAME', null), 'Site Admin')->subject('Contato do site digitalserra.com.br');
        });

        //Log Users action
        \Log::info('Usuário com ip '.$request->getClientIp(). ' enviou um email pelo site');

        //Redirect back
        $request->session()->flash('success','Obrigado por nos contatar!');
        return redirect()
            ->to(URL::previous().'#section-contact');
    }
}
