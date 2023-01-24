<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Support\Facades\Auth;

class FileUpload extends Controller
{
  public function createForm(){
    return view('file-upload');
  }
  public function fileUpload(Request $req, $project){
        $req->validate([
        'file' => 'required|mimes:csv,txt,xlx,xls,pdf|max:2048'
        ]);
        $fileModel = new File;
        if($req->file()) {
            $fileName =  Auth::user()->name. '_' .$project.'.pdf';
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