<?php namespace Modules\Meeting\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Modules\Meeting\Entities\Post;
use Pingpong\Modules\Routing\Controller;
use Illuminate\Support\Facades\View;
use Modules\Meeting\Entities\Occupation;

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
		return view('meeting::posts.index')
			->with('page_name','Posts')
			->with('posts',$this->posts);
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
			->with('posts',$post);
	}
	
}