<?php
  
namespace App\Http\Controllers;

use App\Models\Mark;
use App\Models\project;
use Illuminate\Http\Request;
use App\Models\User;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Support\Facades\Auth;
use PDF;
// use auth;
  
class marksheetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function marksheet()
    {
        
        return view('marksheet');
    }
    public function generatePDF($user)
    {
        // $users = User::first();
        // user::where('id',$id)->first();
        $mark = Mark::where('name', $user)->get();
        $data = [
            'title' => 'Log Jagruti University',
            'date' => date('m/d/Y'),
            'users' => $mark
        ]; 
       
        // dd('dhruvin');
            
        $pdf = PDF::loadView('users', $data);
     
        return $pdf->download('Marksheet.pdf');
    }
    public function showproject(){
        $data = project::all();
        
        return view('marksheet', compact('data'));
       
    }
    public function submitproject(){
        $data = project::all();
        return view('submitproject', compact('data'));
       
    }
    public function fileUpload(Request $req){
        $req->validate([
        'file' => 'required|mimes:csv,txt,xlx,xls,pdf|max:2048'
        ]);
        $fileModel = new File;
        if($req->file()) {
            $fileName = time().'_'.$req->file->getClientOriginalName();
            $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');
            $fileModel->name = time().'_'.$req->file->getClientOriginalName();
            $fileModel->file_path = '/storage/' . $filePath;
            $fileModel->save();
            return back()
            ->with('success','File has been uploaded.')
            ->with('file', $fileName);
        }
    }
}