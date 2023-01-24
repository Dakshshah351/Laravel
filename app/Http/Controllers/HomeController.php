<?php

namespace App\Http\Controllers;

use App\Models\project;
use Illuminate\Http\Request;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = project::all();
        
        // return view('marksheet', compact('data'));
        return view('home', compact('data'));
    }
    public function adminHome()
    {
        return view('adminHome');
    }
  
 
    public function FacultyHome()
    {
        return view('FacultyHome');
    }
}
