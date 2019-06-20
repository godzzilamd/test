<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;
use App\Http\Requests\Group_storage;
use App\Http\Requests\Group_update;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::all();

        return response()->json($groups);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Group_storage $request)
    {
        $group = Group::create($request->all());

        return response()->json($group, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Group  $groups
     * @return \Illuminate\Http\Response
     */
    public function show(Groups $group)
    {
        $group = Group::where('id', $group->id)->with('user')->first();

        return response()->json($group);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Groups  $groups
     * @return \Illuminate\Http\Response
     */
    public function update(Group_update $request, Groups $group)
    {
        //$group->user()->attach($request->input('users'));

        $group->update($request->all());

        return response()->json($group);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Groups  $groups
     * @return \Illuminate\Http\Response
     */
    public function destroy(Groups $group)
    {
        $group->delete();

        return response()->json(null, 204);
    }
}
