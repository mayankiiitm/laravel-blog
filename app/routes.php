<?php
Route::get('/', array(
	'as'=>'home',
	'uses'=>'HomeController@home'
));













Route::get('/user/{username}', array(
	'as' =>'profile-user',
	'uses'=>'ProfileController@user'
));














Route::group(array('before'=>'auth'), function (){

	Route::group(array('before'=>'csrf'),function(){
		Route::post('/post/create',array(

			'as' =>'post-create',
			'uses' =>'PostController@postPostCreate'
			));

		Route::post('/postcomment',array(
       	'as'=>'post-comment-post',
       	'uses'=>'PostController@postComment'
       
       	));

	});


	Route::get('/post/create',array(
			'as'=>'post-create',
			'uses'=>'PostController@getPostCreate'

		));

	Route::get('/account/sign-out', array(
		'as' => 'account-sign-out',
		'uses' => 'AccountController@getSignOut'

		));
});














Route::group(array('before' => 'guest'),function() {

	  Route::group(array('before' => 'csrf'), function() {
		 Route::post('/account/create',array(

		  'as' => 'account-create-post',
		  'uses'=>'AccountController@postCreate'       	
       	));
		 Route::post('/account/sign-in',array(
       	'as'=>'account-sign-in-post',
       	'uses'=>'AccountController@postSignIn'
       
       	));

	});

       Route::get('/account/sign-in',array(
       	'as'=>'account-sign-in',
       	'uses'=>'AccountController@getSignIn'
       
       	));

       



       Route::get('/account/create',array(

		  'as' => 'account-create',
		  'uses'=>'AccountController@getCreate'       	
       	));
       Route::get('/account/activate/{code}',array(
       		'as'=>'account-activate',
       		'uses'=>'AccountController@getActivate'
       	));

});


Route::get('/post/{title}',array(

		'as'=>'show-post',
		'uses'=>'PostController@ShowPost'


));

