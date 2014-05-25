<?php
class ProfileController extends BaseController {
	public function user($username){
		$user=User::where('username', '=',$username);
		$user = $user->first();
		$post=Post::paginate(5);
		$comment=Comment::all();

		//$post=Post::all();
		//$post=$post->first();
		return View::make('profile.user')
				->with('post',$post)->with('comment',$comment)->with('user',$user);
		
}


}