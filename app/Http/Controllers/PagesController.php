<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Groups;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('pages.index');
    } 

    public function user_list() {

        $users = DB::table('users')
            ->join('groups', 'users.group_id', '=', 'groups.group_id')
            ->select('users.id', 'users.name', 'groups.rights')
            ->get();

        $auth_user = DB::table('users')
            ->join('groups', 'users.group_id', '=', 'groups.group_id')
            ->select('users.id', 'users.name', 'groups.rights')
            ->where('users.name', auth()->user()->name)
            ->first();

        return view('pages.user_list')->with(compact(['users', 'auth_user']));
    } 

    public function create_user() {
        return view('pages.create_user');
    } 

    public function create_user_end(Request $request) {

        //make a individual auth user array using join
        $auth_user = DB::table('users')
        ->join('groups', 'users.group_id', '=', 'groups.group_id')
        ->select('users.id', 'users.name', 'groups.rights')
        ->where('users.name', auth()->user()->name)
        ->first();

        //creating a string variable that contain groups name that user can use
        $valid_groups = Groups::select('name')->where('rights', '<', $auth_user->rights)->get();

        $valid_groups_name = '';

        foreach ($valid_groups as $valid_group)
        $valid_groups_name .= $valid_group->name . ',';

        //form validation
        $this->validate($request, [
            'name' => 'required|unique:users,name',
            'group' => 'in:' . $valid_groups_name,
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'confirm_password' => 'same:password'
        ]);
        
        //get group data using group name
        $group = Groups::where('name', $request->input('group'))->first();


        //creating a new user
        $user = new User;
        $user->name  =  $request->input('name');
        $user->group_id  =  $group->group_id;
        $user->email  =  $request->input('email');
        $user->password  =  bcrypt($request->input('password'));
        $user->save();

        return redirect('/user_list')->with('success', 'Utilizatorul a fost creat');
    } 

    public function update_user($id) {

        $user = User::findOrFail($id);
        $group = Groups::findOrFail($user->group_id);

        return view('pages.update_user', compact(['user', 'group']));
    } 

    public function update_user_end(Request $request, $id) {

        //make a individual auth user array using join
        $auth_user = DB::table('users')
        ->join('groups', 'users.group_id', '=', 'groups.group_id')
        ->select('users.id', 'users.name', 'groups.rights')
        ->where('users.name', auth()->user()->name)
        ->first();

        //creating a string variable that contain groups name that user can use
        $valid_groups = Groups::select('name')->where('rights', '<', $auth_user->rights)->get();

        $valid_groups_name = '';

        foreach ($valid_groups as $valid_group)
        $valid_groups_name .= $valid_group->name . ',';

        $this->validate($request, [
            'name' => 'nullable|unique:users|max:100',
            'group' => 'nullable|in:' . $valid_groups_name,
            'email' => 'nullable|email',
            'password' => 'nullable',
            'blocked' => ''
        ]);
        
        $user = User::findOrFail($id);
        $group = Groups::where('name', $request->input('group'))->first();
        
        if ($request->input('name') != '') $user->name = $request->input('name');
        if ($request->input('group') != '') $user->group_id = $group->group_id;    
        if ($request->input('email') != '') $user->email = $request->input('email');
        if ($request->input('password') != '') $user->password = bcrypt($request->input('password'));
        if ($request->input('blocked') == 'on') $user->blocat = '1';   
            else $user->blocat = '0';
        $user->save();

        return redirect('/user_list')->with('success', 'Utilizatorul a fost modificat');
    } 

    public function delete_user() {

        $auth_user = DB::table('users')
            ->join('groups', 'users.group_id', '=', 'groups.group_id')
            ->select('users.id', 'users.name', 'groups.rights')
            ->where('users.name', auth()->user()->name)
            ->first();

        $users = DB::table('users')
            ->join('groups', 'users.group_id', '=', 'groups.group_id')
            ->select('users.*')
            ->where('groups.rights', '<', $auth_user->rights)
            ->get();

        return view('pages.delete_user')->with('users', $users);
    } 

    public function delete_user_end($id) {

        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/user_list')->with('success', 'Utilizatorul a fost sters');
    }
}
