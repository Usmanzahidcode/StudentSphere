<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function download(File $file){
        return Storage::disk($file->fileType->disk)->download($file->path . $file->filename, $file->name);
    }
}
