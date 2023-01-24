<?php

namespace App\Http\Controllers;

use App\Models\project;
use App\Models\User;
use Illuminate\Http\Request;

class viewprojectController extends Controller
{
    public function index($id)
    {
       $data = User::where('id',$id)->first();
       $project= project::all();
        return view('viewproject', compact('data','project'));
    }
    public function submitProject($project)
    {
       
        $project = project::where('project',$project)->first(); 
        return view('marksheet',compact('project'));
    }
}
