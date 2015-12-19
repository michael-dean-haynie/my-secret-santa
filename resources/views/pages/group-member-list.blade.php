@extends('templates.group-page')

@section('group-title')
{{ $group_data['name'] }}
@endsection

@section('group-css')
<link rel='stylesheet' type='text/css' href={{URL::asset('css/group-member-list.css')}}>
@endsection

@section('group-content')
<div id='group-home-container' class='group-content-container'>
	<div class='my-wish-list'>
		<div class='title'>
			<h3>{{$member->name}}'s Wish List</h3>
		</div>
		<div class='my-items'>
<?php
//echo '<pre>' . print_r($users_items, true) . '</pre>';
	foreach ($members_items as $item){
		echo "
			<div class='my-item'>
				<div class='info'>
					<div class='rank'>" .
						
						"<p>Rank</p><p class='rank-int'>" . $item->rank . "</p>
					</div>
					<div class='details'>
						<div class='name'>" . 
							$item->name . "
						</div>
						<div class='specifications'>" . 
							$item->specifications . "
						</div>
						<div class='link'>" . 
							"<a href='" . $item->link . "'>" . $item->link . "</a>
						</div>
					</div>
					<div class='cleared-div'>
					</div>
				</div>
				<div class='reserved'>";
		if ($item->reserved_by == 'none'){
			echo "
				<form method='post' action='" . url('group/' . $group_data['id'] . '/reserve/') . "'>"; 
			echo csrf_field() . "
					<input type='hidden' name='item_id' value='" . $item->id . "'>
					<input type='hidden' name='member_id' value='" . $member->id . "'>
					<button type='submit' name='reserve'><span class='reserve-item-text'>Reserve Item</span></button>
				</form>
			";
		}else{
			echo "<span class='item-reserved-text'>Item Reserved</span>";
		}
		echo "
					</div>
				<div class='cleared-div'>
				</div>
			</div>
		";
	}
?>
			
		</div>
	</div>
</div>
@endsection

@section('group-javascript')
@endsection