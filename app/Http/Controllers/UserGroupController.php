<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Groups;
use Illuminate\Support\Facades\DB;

class UserGroupController extends Controller
{
    public function user_group_list() {

        $auth_user = DB::table('users')
            ->join('groups', 'users.group_id', '=', 'groups.group_id')
            ->select('users.id', 'users.name', 'groups.rights')
            ->where('users.name', auth()->user()->name)
            ->first();

        $groups = Groups::all();

        return view('pages.user_group_list')->with(compact('auth_user', 'groups'));
    }

    public function create_user_group() {

        $auth_user = DB::table('users')
            ->join('groups', 'users.group_id', '=', 'groups.group_id')
            ->select('users.id', 'users.name', 'groups.rights')
            ->where('users.name', auth()->user()->name)
            ->first();

        $groups = Groups::all();

        return view('pages.create_user_group')->with(compact('auth_user', 'groups'));
    }

    public function create_user_group_end(Request $request) {

        $auth_user = DB::table('users')
            ->join('groups', 'users.group_id', '=', 'groups.group_id')
            ->select('users.id', 'users.name', 'groups.rights')
            ->where('users.name', auth()->user()->name)
            ->first();

        $this->validate($request, [
            'name' => 'required|unique:groups|max:100',
            'rights' => 'required|numeric|between:1,' . ($auth_user->rights - 1),
        ]);

        $group = new Groups();
        
        $group->name = $request->input('name');
        $group->rights = $request->input('rights');
        $group->save();

        return redirect('/user_group_list')->with('success', 'Grupul a fost creat');
    } 

    public function update_user_group($id) {

        $auth_user = DB::table('users')
            ->join('groups', 'users.group_id', '=', 'groups.group_id')
            ->select('users.id', 'users.name', 'groups.rights')
            ->where('users.name', auth()->user()->name)
            ->first();

        $group = Groups::findOrFail($id);

        return view('pages.update_user_group')->with(compact('auth_user', 'group'));
    }

    public function update_user_group_end(Request $request, $group_id) {

        $auth_user = DB::table('users')
            ->join('groups', 'users.group_id', '=', 'groups.group_id')
            ->select('users.id', 'users.name', 'groups.rights')
            ->where('users.name', auth()->user()->name)
            ->first();

        $this->validate($request, [
            'name' => 'nullable|unique:groups|max:100',
            'rights' => 'nullable|numeric|between:1,' . ($auth_user->rights - 1),
        ]);
        
        $group = Groups::findOrFail($group_id);
        
        if ($request->input('name') != '') $group->name = $request->input('name');
        if ($request->input('rights') != '') $group->rights = $request->input('rights');
        $group->save();

        return redirect('/user_group_list')->with('success', 'Grupul a fost modificat');
    } 

    public function delete_user_group() {
        $auth_user = DB::table('users')
            ->join('groups', 'users.group_id', '=', 'groups.group_id')
            ->select('users.id', 'users.name', 'groups.rights')
            ->where('users.name', auth()->user()->name)
            ->first();

        $groups = DB::table('groups')
            ->select('*')
            ->where('rights', '<', $auth_user->rights)
            ->get();

        return view('pages.delete_user_group')->with('groups', $groups);
    }
    
    public function delete_user_group_end($group_id) {

        $is_posible = User::select('name')->where('group_id', $group_id)->get();

        if (count($is_posible) > 0) 
            return redirect('/delete_user_group')->with('error', 'Grupul contine utilizatori');

        $group = Groups::findOrFail($group_id);
        $group->delete();

        return redirect('/user_group_list')->with('success', 'Grupul a fost sters');
    } 
}
