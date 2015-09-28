<?php namespace Modules\Meeting\Http\Controllers;

use Pingpong\Modules\Routing\Controller;

class MeetingController extends Controller {
	
	public function index()
	{
		return view('meeting::index');
	}
	
}