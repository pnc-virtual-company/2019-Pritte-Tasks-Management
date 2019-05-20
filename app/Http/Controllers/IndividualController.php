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
        $individuals = IndividualTask::all()->where('type','i');
        $users = User::all();
        $categories = Category::all();
        return view('pages.tasks.tasks')->with('individuals',$individuals)->with('users',$users)->with('categories',$categories);
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

        $individual = new IndividualTask;
        $individual->user_id = $user;
        $individual->category_id = $category;
        $individual->name= $name;
        $individual->due_date= $duedate;
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
        //
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
