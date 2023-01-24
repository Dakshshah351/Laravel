<?php

namespace App\Http\Controllers;
use App\Models\faculty;
use App\Models\subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;



class AddfacultyController extends Controller
{
    public function index()
    {
        $data = user::where('type',2)->get();
        
        return view('addfaculty', compact('data'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
        ]);

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'type' => 2,
            'password' => Hash::make($request['password']),
        ]);

        return redirect('/addfaculty');
    }
    public function destroy($id)
    {
        user::where('id',$id)->delete();
        return redirect('/addfaculty');
    }
    public function edit($id)
    {
        $user = user::where('id',$id)->first();
        return view('update1',compact('user'));
    }
    public function update(Request $request, $id)
    {
        user::where('id',$id)->update([
            'name' => $request['name'],
            'email' => $request['email'],
        ]);
        // Register::where('id',$id)->update($request->all());
        return redirect('/addfaculty');
    }
   
}


