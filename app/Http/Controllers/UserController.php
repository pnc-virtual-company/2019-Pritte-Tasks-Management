<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use App\User;
use App\Role;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a the profile page. Accessible to any authenticated user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //  Controll on Profile User
    public function profile(Request $request)
    {
        $user = Auth::user();
        return view('users.profile', ['user' => $user]);
    }

    public function editSetting() {
        $user = Auth::user();
        $roles = Role::all();
        return view('users.update', ['user' => $user, 'roles' => $roles]);
    }

    public function updateSetting(Request $request) {
        $user = Auth::user();
        $fileName = $request->file('avatar')->getClientOriginalName();
        $request->file('avatar')->storeAs('public/storage/profiles',$fileName);
        
        $user->name = Input::get('name');
        $user->gender = Input::get('gender');
        $user->email = Input::get('email');
        $user->position = Input::get('position');
        $user->province = Input::get('province');
        $user->role_id = Input::get('roles');
        $user->avatar = $fileName;
        $user->save();
        // redirect
        return Redirect::to('users/profile');
    }

    /**
     * Display a listing of the users.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::with('roles')->get();
        return view('users.index', ['users' => $users]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $roles = Role::all();
        return view('users.create', ['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'name'  => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'roles' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the validation of fields
        if ($validator->fails()) {
            return Redirect::to('user/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store the new user and attach roles to it
            $user = new User;
            $user->name = Input::get('name');
            $user->gender = Input::get('gender');
            $user->email = Input::get('email');
            $user->position = Input::get('position');
            $user->province = Input::get('province');
            $user->password = bcrypt(Input::get('password'));
            $user->role_id = Input::get('roles');
            $user->save();
            
            // redirect
            return Redirect::to('user');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view('users.show', ['user' => $user, 'roles' => $roles]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view('users.edit', ['user' => $user, 'roles' => $roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validate
        $rules = array(
            'name'  => 'required',
            'email' => 'required|email',
            'roles' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);
        // process the validation of fields
        if ($validator->fails()) {
            return Redirect::to('user/' . $id .  '/edit')
                ->withErrors($validator);
        } else {
            $user = User::find($id);
            $user->name = Input::get('name');
            $user->gender = Input::get('gender');
            $user->email = Input::get('email');
            $user->position = Input::get('position');
            $user->province = Input::get('province');
            $user->role_id = Input::get('roles');
            $user->save();
            // redirect
            return Redirect::to('user');
        }
    }

    /**
     * Remove the specified resource from storage.
     * This method is called by Ajax
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $user = User::find($id);
        $user->delete();
        return Redirect::to('user');
    }

    /**
     * Export the list of users into Excel
     *
     * @return \Illuminate\Http\Response
     */
    public function export() 
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}
