<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
  protected $table = 'mss_items';
	
	static function addItem($request){
		$item = new Item();
		$item->user_id = $request->input('user_id');
		$item->name = $request->input('name');
		$item->specifications = $request->input('specifications');
		$item->link = $request->input('link');
		$item->rank = $request->input('rank');
		
		$item->save();
	}
	
	static function getUsersItems($user_id){
		$users_items = \App\Item::where('user_id', $user_id)->get();
		return $users_items;
	}
	
	static function reserveItem($item_id){
		$item = \App\Item::find($item_id);
		$item->reserved_by = auth()->user()->id;
		$item->save();
	}
}
