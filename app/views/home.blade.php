@extends('layout.main')

@section('content')
@if(Auth::check())
<p>Welcome, {{Auth::user()->username}}.</p>
@else
<p>You are not signed in.</p>
@endif
	@foreach($post as $posts)

    <h2><a href="{{URL::route('show-post',$posts->title)}}">{{$posts->title}}</a></h2>
	<p><small>by :<a href="{{URL::route('profile-user',$posts->user->username)}}">{{$posts->user->username}}</a> Posted on:{{$posts->created_at->format('m-d-y H:i')}}</small></p>
	<p>{{$posts->body}}</p>
    
@endforeach

{{$post->links()}}
	<style type="text/css">
		
		li{
			
			display: inline;
			margin-left: 10px;
		    
		}
	</style>

@stop