<?php

class HomeController extends BaseController {

	public function home () {



		$user=User::all();
		$post=Post::paginate(5);
		$comment=Comment::all();
		
			return View ::make('home')
	    		->with('post',$post)->with('comment',$comment)->with('user',$user);
	}
}
