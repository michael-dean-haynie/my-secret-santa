@extends('templates.master')

@section('title')
Create Group
@endsection

@section('css')
<link rel='stylesheet' type='text/css' href={{ URL::asset('css/create-group.css') }}>
@endsection

@section('content')
<div id='create-group-container' class='content-container'>
	<div class='title'>
		<h2>Create Group</h2>
	</div>
	<div class='form-container'>
		<form method='post' action="<?php echo url('/create-group'); ?>">
			{!! csrf_field() !!}
			<div class='name'>
				<label for='name'>Group Name</label>
				<input type='text' name='name' required>
			</div>
			<div class='description'>
				<label for='description'>Group Description</label>
				<input type='text' name='description' required>
			</div>
			<div class='password'>
				<label for='password'>Group Password</label>
				<input type='text' name='password' required>
			</div>
			<div class='submit'>
				<input type='submit' name='create-group' value='Create Group'>
			</div>
		</form>
	</div>
</div>
@endsection

@section('javascript')
@endsection