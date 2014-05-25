<?php
class PostController extends BaseController{

	public function getPostCreate(){

		return View::make('post.create');

	}


//Entering 'create post' data to the post table
public function postPostCreate(){
	 	$validator= Validator::make(Input::all(),
	 		array(
	 			'title'=>'required|min:5',
	 			'body'=>'required|min:5'
	 			
	 			)
	 		);
	 	if($validator->fails()){
	 		return Redirect::route('post-create')
	 		->withErrors($validator)
	 		->withInput(); 
	 	
	 	} else{

	 		$title = Input::get('title');
	 		$body = Input::get('body');
	 		$user_id=Auth::user()->id;
	 		$post = Post::create(array(

	 			'title'=> $title,
	 			'body'=>$body,
	 			'user_id'=>$user_id
	 			));

	 		if($post){

	 			

	 			return Redirect::route('home')
	 				   ->with('global','Your post has been created!');
	 		}
	 	}
	}





//end of create post



//showing the post*/
	

public function ShowPost ($title) {



		$user=User::all();
		$post=Post::all();
		//$post = $post->first();
		$comment=Comment::all();
		
			return View ::make('post.show')
	    		->with('post',$post)->with('comment',$comment)->with('user',$user)->with('title',$title);
	}






public function postComment(){


$validator= Validator::make(Input::all(),
	 		array(
	 			
	 			'comment'=>'required'
	 			
	 			)
	 		);
	 	if($validator->fails()){
	 		return Redirect::back()
	 		->withErrors($validator); 
	 	
	 	} else{

	 		
	 		$commentbody = Input::get('comment');
	 		$user_id=Auth::user()->id;
	 		$post_id=Input::get('post_id');
	 		$comment = Comment::create(array(

	 			'commentbody'=> $commentbody,
	 			'post_id'=>$post_id,
	 			'user_id'=>$user_id
	 			));

	 		if($comment){

	 			

	 			return Redirect::back()
	 				   ->with('global','Your comment has been posted!');
	 		}
	 	}




}








}