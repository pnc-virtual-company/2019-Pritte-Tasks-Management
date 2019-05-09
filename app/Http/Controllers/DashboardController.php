<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        //Only authenticated users may access to the pages of this controller
        $this->middleware('auth');
    }

    public function index() {
        return view('pages.dashboard');
    }
}
