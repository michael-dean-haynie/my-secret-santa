@extends('templates.master')

@section('View Groups')
@endsection

@section('css')
<link rel='stylesheet' type='text/css' href={{ URL::asset('css/view-groups.css') }}>
@endsection

@section('content')
<div id='view-groups-container' class='content-container'>
	<div class='top-bar'>
		<div class='back-to-my-groups'>
			<a href='<?php echo url('/');?>'>&#60;-Back to MyGroups</a>
		</div>
		<div class='user-bar'>
			<div class='greeting'>
				Hello, <span id='username-text-dec'>{{ auth()->user()->name }}</span>
			</div>
			<div class='logout'>
				<a href='<?php echo url('/auth/logout');?>'>Logout</a>
			</div>
		</div>
	</div>
	<div class='title'>
		<h2>All Groups</h2>
	</div>
	<div class='list'>
<?php
			if (!count($groups)){
				echo "
				<div class='text'>
					There aren't any Groups!
				</div>
				<div id='create-button'>
					<form method='get' action=" . url('/create-group') . ">
						<button id='create' type='submit'>Create a Group</button>
					</form>
				</div>
				";}
			else{
				foreach ($groups as $group){
					echo "
						<div class='group'>
							<div class='text'>
								<h3><a href='" . url("join-group/$group->id") . "'>$group->name</a></h3>
							</div>
						</div>
					";
				}
			}
?>
	</div>
</div>
@endsection

@section('javascript')
@endsection