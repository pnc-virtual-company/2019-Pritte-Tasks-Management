<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use App\Group;
use App\User;
use Auth;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $groups = Group::all();
        $users = User::all();
        return view('pages.groups.group',compact('groups','users','manager','viewer','member'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->name;
        $manager = $request->manager;
        $viewer = $request->viewer;
        $member = $request->member;
        $groups = new Group;
        $groups->name= $name;
        $groups->save();
        $groups->users()->attach($manager,['tag'=>'0']);
        $groups->users()->attach($viewer,['tag'=>'1']);
        $groups->users()->attach($member,['tag'=>'2']);
        return redirect('group');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $group = array(
            'name'  => 'required',
            'manager' => 'required',
            'viewer' => 'required',
            'member' => 'required'
        );
        $validator = Validator::make(Input::all(), $group);
        // process the validation of fields
        if ($validator->fails()) {
            return Redirect::to('group/' . $id .  '/edit')
                ->withErrors($validator);
        } else {
            $groupName = Group::find($id);
            $groupName->name = Input::get('name');
            $groupName->gender = Input::get('manager');
            $groupName->email = Input::get('viewer');
            $groupName->position = Input::get('member');
            $groupName->save();
            // redirect
            return Redirect::to('group');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $groups = Group::findOrFail($id);
        $groups->delete();
        $groups->users()->wherePivot('tag', 0)->detach();
        $groups->users()->wherePivot('tag', 1)->detach();
        $groups->users()->wherePivot('tag', 2)->detach();
        return redirect('group');
    }
}
