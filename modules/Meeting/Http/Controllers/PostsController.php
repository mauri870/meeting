<?php namespace Modules\Meeting\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Modules\Meeting\Entities\Post;
use Pingpong\Modules\Routing\Controller;
use Illuminate\Support\Facades\View;
use Modules\Meeting\Entities\Occupation;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class PostsController extends Controller {

	public $userPermission, $user, $userRole, $occupations, $posts;

	/**
	 *
     */
	public function __construct()
	{
		$this->user = Auth::user();

		View::share('user', $this->user);

		$this->occupations = Occupation::all();

		$this->posts = Post::all();


	}

	/**
	 * List all posts
	 *
	 * @return $this
     */
	public function index()
	{
		$posts = Post::where('published','=',1)->orderBy('updated_at','desc')->get();
		return view('meeting::posts.index')
			->with('page_name','Posts')
			->with('posts',$posts);
	}

	/**
	 * List specific post
	 *
	 */
	public function show($id)
	{
		$post = Post::find($id);
		return view('meeting::posts.show')
			->with('page_name',$post->name)
			->with('post',$post);
	}

	/**
	 * List posts for logged user
	 *
	 */
	public function your()
	{
		$posts = User::find(Auth::user()->id);
		return view('meeting::posts.your')
			->with('page_name','Seus Posts')
			->with('posts',$posts->posts);
	}

	/**
	 * List posts for logged user
	 *
	 */
	public function add()
	{
		return view('meeting::posts.add')
			->with('page_name','Adicionar post');
	}

	/**
	 * Receive the post requisition for add
	 *
	 */
	public function add_post(Request $request)
	{
		$rules = [
			'title'=>'required',
			'image_url'=>'url',
			'content'=>'required|min:5',
			'published'=>'required',
		];

		$attributes = [
			'title'=>'título',
			'image_url'=>'imagem do post',
			'content'=>'conteúdo',
			'published'=>'publicar?',
		];
		$validator = Validator::make($request->all(),$rules);

		$validator->setAttributeNames($attributes);

		if($validator->fails()){
			return redirect()
				->back()
				->withErrors($validator->errors())
				->withInput();
		}

		//Assign id from the current user to inputs request array
		$input['user_id'] = Auth::user()->id;
		$request->merge($input);

		//Save to db
		$new = Post::create($request->all());

		Session::flash('success','Usuário deletado');
		return redirect(route('home.posts.your'));
	}

    /**
     * Populate the posts form by id
     *
     * @param $id
     * @return View
     */
    public function edit($id)
	{
        if(Auth::user()->id == Post::find($id)->user->id){
            $page_name = "Editar post";
            $post = Post::find($id);
            return view('meeting::posts.edit',compact('post','page_name'));
        }else{
            return Response::view('errors.401',[],401);
        }
	}

    /**
     * Populate the posts form by id
     *
     * @param $id
     * @return View
     */
    public function edit_post(Request $request,$id)
	{
        if(Auth::user()->id == Post::find($id)->user->id){
            $page_name = "Editar post";
            $post = Post::find($id);
            $post->fill($request->all());
            Session::flash('success','Post atualizado');
            return redirect(route('home.posts.your'));
        }else{
            return Response::view('errors.401',[],401);
        }
	}

    /**
     * Populate the posts form by id
     *
     * @param $id
     * @return View
     */
    public function delete($id)
	{
        $post = Post::find($id);
        if(Auth::user()->id == $post->user->id){
            $post->delete();
            Session::flash('success','Usuário deletado');
            return redirect(route('home.posts.your'));
        }else{
            return Response::view('errors.401',[],401);
        }
	}
}