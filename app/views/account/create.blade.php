@extends('layout.main')

@section('content')
	<form action="{{URL::route('account-create-post')}}" method="post">
	<div>
		Email: <input type="text" name="email" style="margin-top:5px;"{{ (Input::old('email')) ? 'value="'.Input::old('email').'"' : '' }}>
		@if($errors->has('email'))
		{{$errors->first('email')}}
		@endif
	</div>
	
	<div>
		Username: <input type="text" name="username" style="margin-top:5px;"{{ (Input::old('username')) ? 'value="'.Input::old('username').'"' : '' }}>
		@if($errors->has('username'))
		{{$errors->first('username')}}
		@endif	
	</div>
	
	<div>
		Password: <input type="password" name="password" style="margin-top:5px;">
		@if($errors->has('password'))
		{{$errors->first('password')}}
		@endif
	</div>
	
	<div>
		Password Again: <input type="password" name="password_again" style="margin-top:5px;">
		@if($errors->has('password_again'))
		{{$errors->first('password_again')}}
		@endif
	</div>
    
    <input type="submit" value="Create Account">
	{{Form::token()}}
		
	</form>
@stop
