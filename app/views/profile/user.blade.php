@extends('layout.main')

@section('content')

<h2>All Posts by {{$user->username}}:</h2>   
@foreach($post as $posts)
@if($posts->user_id==$user->id)
	<h2><a href="{{URL::route('show-post',$posts->title)}}">{{$posts->title}}</a></h2>
	<p><small>by :<a href="{{URL::route('profile-user',$posts->user->username)}}">{{$posts->user->username}}</a> Posted on:{{$posts->created_at->format('m-d-y H:i')}}</small></p>
	<p>{{$posts->body}}</p>
	
	


@endif
@endforeach


 {{$post->links()}}
	<style type="text/css">
		
		li{
			
			display: inline;
			margin-left: 10px;
		    
		}
	</style>



 
@stop
