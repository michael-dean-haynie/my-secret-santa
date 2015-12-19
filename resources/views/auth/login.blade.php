@extends('templates.master')

@section('title')
Login
@endsection

@section('css')
<link rel='stylesheet' type='text/css' href={{ URL::asset('css/login.css') }}>
@endsection

@section('content')
<div id='login-container' class='content-container'>
	<div class='form-container'>
		<div class='title'>
			<h2>Login</h2>
		</div>
		<form method='post' action=<?php echo url('/auth/login') ?>>
		{!! csrf_field() !!}
			<div class='email'>
				<label for='email'>Email</label>
				<input type='email' name='email' required>
			</div>
			<div class='password'>
				<label for='password'>Password</label>
				<input type='password' name='password' required>
			</div>
			<div class='submit'>
				<input type='submit' name='login' value='Login'>
			</div>
		</form>
		<div class='button-link'>
			<form method='get' action='<?php echo url('/auth/register');?>'>
				<button type='submit'>Register</button>
			</form>
		</div>
	</div>
</div>
@endsection

@section('javascript')
@endsection