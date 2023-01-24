<?php

namespace App\Http\Controllers;

use App\Models\Mark;
use App\Models\project;
use App\Models\User;
use Illuminate\Http\Request;

class uploadmarkController extends Controller
{
    public function store(Request $request , $daksh,$daksh1)
    {
        $request->validate([
            'mark' => 'required'
        ]);
        // :where('model_id', $file->id)->first();
       $data= project::where('project',$daksh1)->first();
       $user= User::where('name',$daksh)->first();
        Mark::create([
            'name'=> $user->name,
            'sem' => $data->sem,
            'div' => $data->div,
            'subject' => $data->subject,
            'project' => $data->project,
            'mark'=> request('mark')
        ]);

        return redirect('/addstudentbyfac');
    }
}
