@extends('layout.main')

@section('content')
	<form action="{{URL::route('account-sign-in-post')}}" method="post">
	<div>
		Email: <input type="text" name="email" style="margin-top:5px;"{{ (Input::old('email')) ? 'value="'.Input::old('email').'"' : '' }}>
		@if($errors->has('email'))
		{{$errors->first('email')}}
		@endif
	</div>
	
	
	<div>
		Password: <input type="password" name="password" style="margin-top:5px;">
		@if($errors->has('password'))
		{{$errors->first('password')}}
		@endif
	</div>
	
    <input type="submit" value="Sign in">
	{{Form::token()}}
	
@stop