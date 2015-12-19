<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'mss_groups';
		
		static function getGroupUserData($group_id){
			$group_data = \App\Group::find($group_id);
			$user_ids = $group_data['user_ids'];
			
			$groupUserData = [];
			while (strlen($user_ids)){
				$start = strpos($user_ids, '[');
				$end = strpos($user_ids, ']');
				$current_id = substr($user_ids, $start, ($end + 1));
				array_push($groupUserData, (\App\User::find($current_id[1])));
				
				$user_ids = substr($user_ids, ($end + 1), (strlen($user_ids)));
			}
			return $groupUserData;
		}
}
