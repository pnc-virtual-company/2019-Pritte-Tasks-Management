<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    // link to individual
    public function individualTask() {
        return view('pages.individual');
    }

}
