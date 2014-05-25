@extends('layout.main')

@section('content')
<?php $post_id='0';?>
@if(Auth::check())
<p>Welcome, {{Auth::user()->username}}.</p>
@else
<p>You are not signed in.</p>

@endif
	@foreach($post as $posts)
		@if($title==$posts->title)
		<?php $post_id=$posts->post_id;?>
	    <h2>{{$posts->title}}</h2>
	    <p><small>Posted by :<a href="{{URL::route('profile-user',$posts->user->username)}}">{{$posts->user->username}}</a>Posted on:{{$posts->created_at->format('m-d-y H:i')}}</small></p>
		<p>{{$posts->body}}</p><br>
		<p><i>Comments</i></p>
	     	@foreach($comment as $comments)
				@if($comments->post_id==$posts->post_id)
				
				
				<p><a href="{{URL::route('profile-user',$comments->user->username)}}">{{$comments->user->username}}</a>Said on:{{$comments->created_at->format('m-d-y H:i')}}</p>
				<p>{{$comments->commentbody}}</p>

				
				
				
				@endif
			@endforeach

    	@endif
	@endforeach

@if(Auth::check())
<form action="{{URL::route('post-comment-post')}}" method="post">
		
		<div>
			Comment:<br><textarea rows="5" cols="50" name="comment" style="margin-top:5px;" ></textarea>
			@if($errors->has('comment'))
			{{$errors->first('comment')}}
			@endif
			<input type="hidden" name="post_id" value="{{$post_id}}">
		</div><br>
		<input type="submit" value="Submit Comment">
	     {{Form::token()}}






@else
<p><i>Please Sign in to comment</i></p>
@endif

<style type="text/css">
		
		li{
			
			display: inline;
			margin-left: 10px;
		    
		}
	</style>

@stop


