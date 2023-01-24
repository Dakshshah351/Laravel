<?php

namespace App\Http\Controllers;

use App\Models\project;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


class addproject1Controller extends Controller
{
    public function index(){
        $data = project::all();
        return view('addproject', compact('data'));
       
    }
    public function addmark($id){
        $data = project::all();
        $student = User::where('type',0)->get();
        return view('addmark', compact('data','student'));
       
    }
    public function store(Request $request)
    {
        $request->validate([
            'sem' => 'required',
           'div' => 'required',
            'subject' =>'required',
            'project' =>'required',
        ]);
        
        project::create([
            'sem' => $request['sem'],
            'div' => $request['div'],
            'subject' =>$request['subject'],
            'project' => $request['project'],
        ]);

        return redirect('addproject');
    }
    public function edit($id)
    {
        $user = Project::where('id',$id)->first();
        return view('updateofproject',compact('user'));
    }
    public function update(Request $request, $id)
    {
        project::where('id',$id)->update([
            'sem' => $request['sem'],
            'div' => $request['div'],
            'subject' => $request['subject'],
            'project' => $request['project'],
        ]);
        // Register::where('id',$id)->update($request->all());
        return redirect('/addproject');
    }
    public function destroy($id)
    {
        project::where('id',$id)->delete();
        return redirect('/addproject');
    }

}

