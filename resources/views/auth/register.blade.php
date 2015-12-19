@extends('templates.master')

@section('title')
Register
@endsection

@section('css')
<link rel='stylesheet' type='text/css' href={{ URL::asset('css/register.css') }}>
@endsection

@section('content')
<div id='register-container' class='content-container'>
	<div class='title-container'>
			<h2>Register</h2>
	</div>
	<div class='form-container'>
		<form method='post' action=<?php echo url('/auth/register') ?>>
		{!! csrf_field() !!}
			<div class='first-name'>
				<label for='first-name'>First Name</label>
				<input type='text' name='first-name' required>
			</div>
			<div class='last-name'>
				<label for='last-name'>Last Name</label>
				<input type='text' name='last-name' required>
			</div>
			<div class='email'>
				<label for='email'>Email</label>
				<input type='email' name='email' required>
			</div>
			<div class='password'>
				<label for='password'>Password</label>
				<input type='password' name='password' required>
			</div>
			<div class='password_confirmation'>
				<label for='password_confirmation'>Confirm Password</label>
				<input type='password' name='password_confirmation' required>
			</div>
			<div class='submit'>
				<input type='submit' name='register' value='Register'>
			</div>
		</form>
	</div>
</div>
@endsection

@section('javascript')
@endsection