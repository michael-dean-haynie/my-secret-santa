<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

class PagesController extends Controller
{
    public function home(Request $request)
		{
			$user_id = auth()->user()->id;
			/////Determine User's Groups
			$allGroups = \App\Group::all();
			$req_string = "[" . $user_id . "]";
			$usersGroupIds = [];
			$usersGroupData = [];
			foreach ($allGroups as $group)
			{
				if (strpos($group->user_ids, $req_string) !== false)
				{
					array_push($usersGroupIds, $group->id);
					array_push($usersGroupData, $group);
				}
			}
			///// Collect Data
			$data = ['user_id' => auth()->user()->id, 'users_group_ids' => $usersGroupIds, 'users_group_data' => $usersGroupData];

			/////////////////////////////////////////////////
			return view('pages/home', $data);
		}

		public function viewCreateGroup(){
			return view('pages.create-group');
		}
		
		public function createGroup(Request $request) {
			$name = $request->input('name');
			$description = $request->input('description');
			$password = $request->input('password');
			//------------------------
			$group = new \App\Group();
			$group->name = $name;
			$group->description = $description;
			$group->password = $password;
			$group->user_ids = "[" . auth()->user()->id . "]";
			$group->save();
			
			//redirect to the user's home page.........
			return redirect(url('/home'));
		}
		
		public function viewGroups(){
			$data = ['groups' => \App\Group::all()];
			return view('pages.view-groups', $data);
		}
		
		public function viewJoinGroup($group_id){
			$group = \App\Group::where('id', '=', $group_id)->get()[0];
			// return "<pre>" . print_r($group->name, true) . "</pre>";
			$data = ['group' => $group];
			return view('pages.join-group', $data);		
			
		}
		
		public function joinGroup($group_id, Request $request){
			$i_password = $request->input('password');
			$group = \App\Group::where('id', '=', $group_id)->get()[0];
			//---------------------
			if ($i_password !== $group->password){
				return redirect(url('/join-group/' . $group_id));
			}else{
				$p_user_ids = $group->user_ids;
				$model = \App\Group::find($group_id);
				$model->user_ids = $p_user_ids . "[" . auth()->user()->id . "]";
				$model->save();
				
				// redirect to user's home page .................
				return redirect(('/home'));
			}
		}
		private function prepareGroupPageData($group_id){
			$group_data = \App\Group::find($group_id);
			$groupUserData = \App\Group::getGroupUserData($group_id);
			$user_data = auth()->user();
			
			$data = ['group_data' => $group_data, 'groupUserData' => $groupUserData, 'user_data' => $user_data];
			return $data;
		}
		
		public function viewGroupHome(Request $request, $group_id){
			$data = $this->prepareGroupPageData($group_id);
			$data['users_items'] = \App\Item::getUsersItems(auth()->user()->id);
			return view('pages.group-home', $data);
		}
		
		public function viewGroupNewItem($group_id){
			$data = $this->prepareGroupPageData($group_id);
			return view('pages.group-new-item', $data);
		}
		
		public function addNewItem($group_id, Request $request){
			\App\Item::addItem($request);
			return redirect(url('/group/'. $group_id));
		}
		
		public function viewMemberList($group_id, $member_id){
			$data = $this->prepareGroupPageData($group_id);
			$data['members_items'] = \App\Item::getUsersItems($member_id);
			$data['member'] = \App\User::find($member_id);
			return view('pages.group-member-list', $data);
		}
		
		public function reserveItem($group_id, Request $request){
			\App\Item::reserveItem($request->input('item_id'));
			return redirect(url('/group/' . $group_id . '/member-list/' . $request->input('member_id')));
		}
}











