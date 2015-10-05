<?php namespace Modules\Meeting\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Modules\Meeting\Entities\Meeting;
use Modules\Meeting\Entities\Post;
use Pingpong\Modules\Routing\Controller;
use Illuminate\Support\Facades\View;
use Modules\Meeting\Entities\Occupation;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class MeetingController extends Controller {

	public $userPermission, $user, $userRole, $occupations, $meetings;

	public function __construct()
	{
		$this->user = Auth::user();

		View::share('user', $this->user);

		$this->occupations = Occupation::all();

		$this->meetings = Meeting::all();
	}
	public function index()
	{
		$meetings = Meeting::where('published','=',1)->whereHas('occupations', function($q){
			$q->where('occupation_id','=',Auth::user()->occupation->id);
		})->with('user')->orderBy('id','desc')->paginate(5);
		return view('meeting::meetings.index')
			->with('page_name','Reuniões')
			->with('meetings',$this->meetings);
	}
	
}