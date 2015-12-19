@extends('templates.group-page')

@section('group-title')
{{ $group_data['name'] }}
@endsection

@section('group-css')
<link rel='stylesheet' type='text/css' href={{ URL::asset('css/group-home.css')}}>
@endsection

@section('group-content')
<div id='group-home-container' class='group-content-container'>
	<div class='my-wish-list'>
		<div class='title'>
			<h3>My Wish List</h3>
		</div>
		<div class='my-items'>
			<div class='new-item'>
				<form method='get' action=<?php echo "'" . url('/group/' . $group_data['id']) . '/new-item' . "'";?>>
					<button id='new-item' type='submit'><span>Add New Item</span></button>
				</form>
			</div>
<?php
//echo '<pre>' . print_r($users_items, true) . '</pre>';
	foreach ($users_items as $item){
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
				<div class='reserved'>
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