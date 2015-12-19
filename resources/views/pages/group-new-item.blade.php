@extends('templates.group-page')

@section('group-title')
{{ $group_data['name'] }}
@endsection

@section('group-css')
<link rel='stylesheet' type='text/css' href={{URL::asset('css/group-new-item.css')}}>
@endsection

@section('group-content')
<div id='group-new-item-container' class='group-content-container'>
	<div class='title'>
		<h3>Add New Item</h3>
	</div>
	<div class='form-container'>
		<form method='post' action='<?php echo url("/group/" . $group_data['id'] . "/new-item");?>'>
			{!! csrf_field() !!}
			<div class='user_id'>
				<input type='hidden' name='user_id' value='<?php echo auth()->user()->id?>'>
			</div>
			<div class ='name'>
				<label for='name'>Item Name</label>
				<input type='text' name='name' value=''>
			</div>
			<div class ='specifications'>
				<label for='specifications'>Specifications</label><br>
				<textarea name='specifications'></textarea>
			</div>
			<div class ='link'>
				<label for='link'>Link</label>
				<input type='text' name='link' value=''>
			</div>
			<div class ='rank'>
				<label for='rank'>Rank</label>
				<select name='rank'>
					<option value='1'>1 - "I'm cool if this is all I get."</option>
					<option value='2'>2 - "OOO! Yeah I'd like that!"</option>
					<option value='3'>3 - "I'm really hoping for this."</option>
					<option value='4'>4 - "That would be nice."</option>
					<option value='5'>5 - "Yeah don't sweat it."</option>
				</select>
			</div>
			<div class='notice'>
				<div class='text'>
					Due to the nature of this site, Wish-List Items cannot be removed/edited as they may already have been reserved.<br> Are you sure you want to submit this item?
				</div>
			</div>
			<div class ='submit'>
				<input type='submit' name='new-item' value='Submit'>
			</div>
		</form>
	</div>
</div>
@endsection

@section('group-javascript')
@endsection