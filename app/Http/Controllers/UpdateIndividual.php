<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\IndividualTask;

class UpdateIndividual extends Controller
{
    public function index($id, Request $request) {
        $individualT = IndividualTask::find($id);
        $individualT->status = $request->get('statuss');
        $individualT->save();

        return redirect('task');
    }
}
