@extends('templates.master')

@section('Join Group')
@endsection

@section('css')
@endsection

@section('content')
<div id='join-group-container' class='content-container'>
	<div class='title'>
		<h2><?php echo 'Join "' . $group->name . '"?';?></h2>
	</div>
	<div class='form-container'>
		<form method='post' action="<?php echo url("/join-group/" . $group->id)?>">
			{!! csrf_field() !!}
			<div class='password'>
				<label for='password'>Enter Password</label>
				<input type='password' name='password' required>
			</div>
			<div class='submit'>
				<input type='submit' name='submit' value='Join Group'>
			</div>
		</form>
	</div>
</div>
@endsection

@section('javascript')
@endsection