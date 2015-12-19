@extends('templates.master')

@section('title')
Groups
@endsection

@section('css')
<link rel='stylesheet' type='text/css' href={{ URL::asset('css/home.css') }}>
@endsection

@section('content')

<div id='home-container' class='content-container'>
	<div class='user-bar'>
		<div class='greeting'>
			Hello, <span id='username-text-dec'>{{ auth()->user()->name }}</span>
		</div>
		<div class='logout'>
			<a href='<?php echo url('/auth/logout');?>'>Logout</a>
		</div>
	</div>
	<div id='groups'>
		<div class='title'>
			<h2>My Groups</h2>
		</div>
		<div class='list'>
<?php
			if (!count($users_group_ids)){
				echo "
				<div class='text'>
					You are not in any Groups!
				</div>
				";}
			else{
				foreach ($users_group_data as $data){
					echo "
						<div class='group'>
							<div class='text'>
								<h3><a href=" . url("/group/$data->id") . ">$data->name</a></h3>
							</div>
						</div>
					";
				}
			}
?>
		</div>
	</div>
	<div id='join-button'>
		<form method='get' action="<?php echo url('/view-groups');?>">
			<button id='join' type='submit'>Join a Group</button>
		</form>
	</div>
	<div id='create-button'>
		<form method='get' action="<?php echo url('/create-group'); ?>">
			<button id='create' type='submit'>Create a Group</button>
		</form>
	</div>
</div>

@endsection

@section('javascript')
@endsection