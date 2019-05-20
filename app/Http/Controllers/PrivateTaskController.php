<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\User;
use App\IndividualTask;
use Auth;

class PrivateTaskController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $privates = IndividualTask::all()->where('type','p')->where('status','Open');
        $allPrivates = IndividualTask::all()->where('type','p');
        $users = User::all();
        $categories = Category::all();
        return view('pages.privates.private')->with('privates',$privates)->with('users',$users)->with('categories',$categories)->with('allPrivates',$allPrivates);
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
        $due = $request->due;
        $private = new IndividualTask;
        $private->user_id = $user;
        $private->category_id = $category;
        $private->name= $name;
        $private->due_date= $due;
        $private->save();
        return redirect('private');
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
        $private = IndividualTask::find($id);
        $private->name = $request->get('name');
        $private->category_id = $request->get('category');
        $private->due_date = $request->get('due');
        $private->status = $request->get('status');
        $private->save();
        return redirect('private');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $private = IndividualTask::findOrFail($id);
        $private->delete();
        return redirect('private');
    }
}
