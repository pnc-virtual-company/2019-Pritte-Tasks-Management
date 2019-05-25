<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\IndividualTask;
use App\User;
use App\Category;
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
        $assignTo = $user->IndividualTasks;
        $individuals = $assignTo->where('type','i')->where('status','Open');
        $allIndividuals = $assignTo->where('type','i');

        $creator = $user->individual;
        $creators = $creator->where('type','i')->where('status','Open');
        $allCreators = $creator->where('type','i');
        $users = User::all();
        $categories = Category::all();
        return view('pages.tasks.tasks')->with('individuals',$individuals)->with('users',$users)->with('categories',$categories)->with('allIndividuals',$allIndividuals)
        ->with('creators',$creators)->with('allCreators',$allCreators);
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
        $category = $request->category;
        $duedate = $request->due_date;
        $assign = $request->assign;
        $type = $request->type;
        // $workloads = $request->workloads;

        $individual = new IndividualTask;
        $individual->user_id = $user;
        $individual->category_id = $category;
        $individual->name= $name;
        // $individual->due_date = $duedate;
        $invividual->workload = $workloads;
        $individual->type = $type;
        $individual->save();
        if($type == 'i'){
            $individual->users()->attach($assign);
            return redirect('task');
        }else{
            return redirect('private');
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
        return redirect('task');
    }
}
