@extends('templates.master')

@section('title')
@yield('group-title')
@endsection

@section('css')
<link rel='stylesheet' type='text/css' href={{ URL::asset('css/group-page.css')}}>
@yield('group-css')
@endsection

@section('content')
<div id='group-page-container' class='content-container'>
	<div class='top-bar'>
		<div class='back-to-groups'>
				<a href='<?php echo url('/');?>'>&#60;-Back to MyGroups</a>
		</div>
		<div class='user-bar'>
			<div class='greeting'>
				Hello, {{ auth()->user()->name }}
			</div>
			<div class='logout'>
				<a href='<?php echo url('/auth/logout');?>'>Logout</a>
			</div>
		</div>
	</div>
	<div class='group-title-bar'>
		<div class='text'>
			<h2>Group: {{ $group_data['name'] }}</h2>
		</div>
	</div>
	<div class='left-bar'>
		<div class='title'>
			<h4>Group Members</h4>
		</div>
		<div class='members'>
<?php
	foreach ($groupUserData as $data){
		echo "
			<div class='user'>" . 
				"<a href='" . url('group/' . $group_data['id'] . '/member-list/' . $data['id']) . "'>" . $data{'name'} . "</a>" . "
			</div>
		";
	}
?>
		</div>
	</div>
	<div class='group-content'>
		@yield('group-content')
	</div>
	<div class='clearing-div'>
	</div>
</div>
@endsection

@section('javascript')
@yield('group-javascript')
@endsection