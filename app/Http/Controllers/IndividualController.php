<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\IndividualTask;
use App\User;
use App\Category;
use App\Group;
use Auth;

class IndividualController extends Controller
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
        $assignTo = $user->IndividualTasks;
        $individuals = $assignTo->where('status','Open');
        $allIndividuals = $assignTo;

        $creator = $user->individual;
        $creators = $creator->where('status','Open');
        $allCreators = $creator;
        
        $users = User::all();
        $categories = Category::all();
        return view('pages.tasks.tasks')->with('individuals',$individuals)->with('users',$users)->with('categories',$categories)->with('allIndividuals',$allIndividuals)
        ->with('creators',$creators)->with('allCreators',$allCreators)->with('groups',$groups);
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
        $user = Auth::user()->id;
        $name = $request->name;
        $md = $request->manday;
        $category = $request->category;
        $duedate = $request->due_date;
        $assign = $request->assign;
        $Collective = $request->collectives;
        $group_id = $request->collective;
        
        $group = Group::find($request->collective);
        $individual = new IndividualTask;
        $individual->user_id = $user;
        $individual->category_id = $category;
        $individual->name= $name;
        $individual->md = $md;
        $individual->due_date = $duedate;
        if($Collective == "Yes"){
            $individual->type = 'c';
            $member = $group->users()->wherePivot('tag',2)->get()->pluck('id');
            $individual->save();
            $individual->users()->attach($member);
            $individual->groups()->attach($group_id);
            return redirect('task');
        }else if ($Collective == "No"){
            $individual->type = 'i';
            $individual->save();
            $individual->users()->attach($assign);
            return redirect('task');
        }else{
            $individual->type = 'p';
            $individual->save();
            $individual->users()->attach($user);
            return redirect('task');
        }
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
        $type = $request->get('type'); 
        $assign = $request->get('assigned');
        $individualT = IndividualTask::find($id);
        $individualT->name = $request->get('name');
        $individualT->category_id = $request->get('category');
        $individualT->due_date = $request->get('due');
        $individualT->status = $request->get('status');
        $individualT->type = $type;
        $individualT->save();
        $individualT->users()->detach();
        if($type == 'i'){
            $individualT->users()->attach($assign);
            return redirect('task');
        }else{
            return redirect('private');
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
        $individual = IndividualTask::findOrFail($id);
        $individual->delete();
        $individual->users()->detach();
        $individual->groups()->detach();
        return redirect('task');
    }
}
