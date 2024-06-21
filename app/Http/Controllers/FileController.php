<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Str;

class FileController extends Controller
{
    public function getFile($filename)
    {
        $path = storage_path(Str::of('app/public/logos/' . $filename)->replace('/', DIRECTORY_SEPARATOR));

        return response()->download($path, disposition:null);

        if (!\File::exists($path)) {
            abort(404);
        }

        $file = \File::get($path);
        $type = \File::mimeType($path);

        $response = response($file, 200);
        $response->header("Content-Type", $type);

        return $response;
    }
}
