<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\IndividualTask;
use Auth;

class Tasks extends Controller
{
    public function EditPrivate(Request $request, $id)
    {
        $private = IndividualTask::find($id);
        $private->name = $request->get('name');
        $private->category_id = $request->get('category');
        $private->due_date = $request->get('due');
        $private->md = $request->get('manday');
        $private->status = $request->get('status');
        $private->save();
        return redirect('task');
    }

    public function EditIndividualAssign(Request $request, $id) {
        $Collective = $request->get('collectives');
        $assign = $request->get('assign');
        $user = Auth::user()->id;
        $editIndividualAssign = IndividualTask::find($id);
        $editIndividualAssign->name = $request->get('name');
        $editIndividualAssign->category_id = $request->get('category');
        $editIndividualAssign->due_date = $request->get('due');
        $editIndividualAssign->status = $request->get('status');
        $editIndividualAssign->users()->detach();
        $editIndividualAssign->groups()->detach();
        $editIndividualAssign->save();
        if($Collective == "Yes"){
            $editIndividualAssign->type = 'c';
            $member = $group->users()->wherePivot('tag',2)->get()->pluck('id');
            $editIndividualAssign->save();
            $editIndividualAssign->users()->attach($member);
            $editIndividualAssign->groups()->attach($group_id);
            return redirect('task');
        }else if ($Collective == "No"){
            $editIndividualAssign->type = 'i';
            $editIndividualAssign->save();
            $editIndividualAssign->users()->attach($assign);
            return redirect('task');
        }else{
            $editIndividualAssign->type = 'p';
            $editIndividualAssign->save();
            $editIndividualAssign->users()->attach($user);
            return redirect('task');
        }
    }

    public function DeletePrivate($id) {
        $private = IndividualTask::findOrFail($id);
        $private->delete();
        $private->users()->detach();
        return redirect('task');
    }

}
