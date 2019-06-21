<?php

namespace App\Http\Controllers;

use App\User;
use App\Group;
use Illuminate\Http\Request;
use App\Http\Requests\User_storage;
use App\Http\Requests\User_update;
use App\Permission;

class UserController extends Controller
{   
    public function test()
    {
        $user = User::find(1);

        //$group = Group::find(2);  

        //$group->permissions()->attach([5, 6, 7]);

        //$user->group()->attach([1,2]);

        //$user = Group::has('user')->with('user')->get();

        // $rights = User::has('group')
        //     ->has('permission')
        //     ->where('user.user_id', 1)
        //     ->with('group')
        //     ->with('permission')
        //     ->get();

        // $group = Permission::whereHas('group', function ($q) use ($group) {
        //     $q->where('user_id', 1);
        // })->with('group')->pluck('name');

        // $group = Group::whereHas('users', function ($q) {
        //     $q->where('user_id', 1); })->get();
        // })->whereHas('permissions', function ($q) {
        //     //$q->where('name', '');
        // })->with('permissions')->get();

        // $group = Group::where('user_id', 1)->get();

        // return $group;

        return $user->groups[0]->permissions->pluck('name');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return response()->json($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(User_storage $request)
    {
        $user = User::create($request->all());

        return response()->json($user, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    { 
        $user = User::where('id', $user->id)->with('groups')->first();

        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(User_update $request, User $user)
    {

        $user->update($request->all());

        return response()->json($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return response()->json(null, 204);
    }
}
