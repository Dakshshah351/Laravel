<?php

namespace App\Http\Controllers\Admin;

use App\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\File as ModelsFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class DownloadsController extends Controller
{
    public function download($uuid) {

        $file = ModelsFile::where([
            ['faculty user', '=', 'faculty user'],
            
            ])->first();

        $media = Media::where('model_id', $file->id)->first();
        $pathToFile = storage_path('app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . $file->id . DIRECTORY_SEPARATOR . $media->file_name );

        return Response::download($pathToFile);
    }
}
