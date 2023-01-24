<?php

use App\Http\Controllers\BaseController;
use App\Http\Controllers\AddfacultyController;
use App\Http\Controllers\addprojectController;
use App\Http\Controllers\addstudentbyfac;
use App\Http\Controllers\FileUpload;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\marksheetController;
use App\Http\Controllers\uploadmarkController;
use App\Http\Controllers\viewprojectController;

Route::get('/',[BaseController::class,'index']);

Route::resource('register1',RegisterController::class);
// Route::post('register1',[RegisterController::class, 'store']);
// Route::delete('register1/{id}',[RegisterController::class, 'destroy']);
// Route::get('register1/{id}/edit',[RegisterController::class, 'edit']);
// Route::put('register1/{id}',[RegisterController::class,'update']);
Route::get('addmark/{id}',[addprojectController::class,'addmark']);
Route::resource('addfaculty',AddfacultyController::class);

Route::resource('addproject',addprojectController::class);

Route::resource('addstudentbyfac',addstudentbyfac::class);

Route::controller(ImageController::class)->group(function(){
    Route::get('image-upload', 'index');
    // {id?}
    Route::post('image-upload/{project}', 'store');
});

Auth::routes();

Route::middleware(['auth', 'user-access:user'])->group(function () {
  
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'user-access:admin'])->group(function () {
  
        Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home');
    });
Route::middleware(['auth', 'user-access:Faculty'])->group(function () {
  
    Route::get('/Faculty/home', [App\Http\Controllers\HomeController::class, 'FacultyHome'])->name('Faculty.home');
});
Route::get('showproject', [marksheetController::class, 'showproject']);
Route::get('Submit-Project/{project}', [viewprojectController::class, 'submitProject']);

Route::get('marksheet/{user}', [marksheetController::class, 'generatePDF']);
// Route::get('marksheet', [marksheetcontroller::class, 'marksheet']);
Route::get('submitproject/{id}',[marksheetController::class, 'submitproject']);
Route::get('/upload-file', [marksheetController::class, 'createForm']);
Route::post('/upload-file', [marksheetController::class, 'fileUpload'])->name('fileUpload');
Route::get('send-mail', [MailController::class, 'index']);
Route::get('viewproject/{id}', [viewprojectController::class, 'index']);
Route::post('markupload/{daksh}/{daksh1}', [uploadmarkController::class, 'store']);

Route::get('/upload-file', [FileUpload::class, 'createForm']);
// Route::post('image-upload/{project}', 'store');

Route::post('/fileupload/{project}', [FileUpload::class, 'fileUpload']);

///////////////////////////////////DOWNLOAD FILE /////////////////////////////
Route::get('/{uuid}/download', 'Admin\DownloadsController@download');