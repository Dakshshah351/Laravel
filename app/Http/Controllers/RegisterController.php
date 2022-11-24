<?php

namespace App\Http\Controllers;

use App\Models\Register;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        $data = Register::all();
        return view('register', compact('data'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
        ]);

        Register::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => $request['password'],
        ]);

        return $this->index();
    }
    public function destroy($id)
    {
        Register::where('id',$id)->delete();
        return $this->index();
    }
    public function edit($id)
    {
        $user = Register::where('id',$id)->first();
        return view('update',compact('user'));
    }
    public function update(Request $request, $id)
    {
        Register::where('id',$id)->update([
            'name' => $request['name'],
            'email' => $request['email'],
        ]);
        // Register::where('id',$id)->update($request->all());
        return $this->index();
    }
}
