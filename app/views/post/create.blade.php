@extends('layout.main')

@section('content')
	<p>{{Auth::user()->id}}</p>
    <form action="{{URL::route('post-create')}}" method="post">
		<div>
			Title:<br> <input type="text"  name="title" style="margin-top:5px; width:420px;" {{ (Input::old('title')) ? 'value="'.Input::old('title').'"' : '' }}>
			@if($errors->has('title'))
			{{$errors->first('title')}}
			@endif
		</div>

		<div>
			Body:<br><textarea rows="10" cols="50" name="body" style="margin-top:5px;" {{ (Input::old('body')) ? 'value="'.Input::old('body').'"' : '' }}></textarea>
			@if($errors->has('body'))
			{{$errors->first('body')}}
			@endif
		</div><br>
		<input type="submit" value="Submit Post">
	     {{Form::token()}}



	</form>
@stop