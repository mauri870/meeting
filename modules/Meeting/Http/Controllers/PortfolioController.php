<?php namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Pingpong\Modules\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Admin\Entities\Portfolio;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Prologue\Alerts\Facades\Alert;
use Illuminate\Support\Facades\File;

/**
 * Class PortfolioController
 * @package Modules\Admin\Http\Controllers
 */
class PortfolioController extends Controller {

    /**
     * @return $this
     */
    public function index()
	{
		$page_name = "Portfolio";

		$projects = Portfolio::all();
		return view('admin::portfolio.index')
			->with('user',Auth::user()->name)
			->with('projects',$projects)
			->with('page_name',$page_name);
	}

    /**
     * @return $this
     */
    public function add()
	{
		$page_name = "Novo Projeto";
		return view('admin::portfolio.new')
			->with('user',Auth::user()->name)
			->with('page_name',$page_name);
	}

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function add_post(Request $request)
	{
		$rules = [
			'name'=>'required|unique:portfolio|min:3',
			'client'=>'required',
			'url'=>'url',
            'body'=>'required',
            'date'=>'required|date_format:d/m/Y',
			'image'=>'required|image',
		];

        $attributes = [
            'name'=>'nome',
            'client'=>'cliente',
            'url'=>'url',
            'date'=>'data',
            'body'=>'descrição',
            'image'=>'imagem',
        ];

		$validator = Validator::make($request->all(),$rules);

        $validator->setAttributeNames($attributes);

		if($validator->fails()){
			return redirect()
				->route('portfolio.new')
				->withErrors($validator->errors())
				->withInput();
		}

		//Save on BD
		$new_project = Portfolio::create($request->all());

		$project = Portfolio::find($new_project->id);
		$project->image = $request->file('image')->getClientOriginalExtension();
		$project->save();

		//Save Offer image
		$imageName = $new_project->id . '.' .
			$request->file('image')->getClientOriginalExtension();
		$request->file('image')->move(
			base_path() . '/public/images/projects/', $imageName
		);

		$request->session()->flash('success','Projeto cadastrado!');
		return redirect(route('portfolio.new'));
	}

    public function edit($id)
    {
        $project = new Portfolio();
        $page_name = "Editar Projeto";
        return view('admin::portfolio.edit')
            ->with('page_name',$page_name)
            ->with('user',Auth::user()->name)
            ->with('project',$project->find($id));
    }


    public function post_edit(Request $request, $id)
    {
        $rules = [
            'name'=>'required',
            'client'=>'required',
            'url'=>'url',
            'body'=>'required',
            'date'=>'required|date_format:d/m/Y',
            'image'=>'image',
        ];

        $attributes = [
            'name'=>'nome',
            'client'=>'cliente',
            'url'=>'url',
            'date'=>'data',
            'body'=>'descrição',
            'image'=>'imagem',
        ];

        $validator = Validator::make($request->all(),$rules);

        $validator->setAttributeNames($attributes);

        if($validator->fails()){
            return redirect()
                ->route('portfolio.edit')
                ->withErrors($validator->errors())
                ->withInput();
        }

        //Save on BD
        $project = Portfolio::find($id);
        $project->fill($request->all());
        if(!empty($request->file('image'))){
            File::delete(base_path().'/public/images/projects/'.$id.'.'.$project->image);

            $project->image = $request->file('image')->getClientOriginalExtension();
            //Save Offer image
            $imageName = $project->id . '.' .
                $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(
                base_path() . '/public/images/projects/', $imageName
            );
        }
        $project->save();

        $request->session()->flash('success','Projeto atualizado!');
        return redirect(route('portfolio.show'));
    }



    /**
	 * @param $id
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function delete($id)
	{
		$project = Portfolio::find($id);
		File::delete(base_path().'/public/images/projects/'.$project->id.'.'.$project->image);
		$project->delete();

		Session::flash('success','Projeto deletado!');
		return redirect(route('portfolio.show'));
	}
	
}