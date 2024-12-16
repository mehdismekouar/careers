<?php

namespace App\Http\Controllers;

use Str;

class FileController extends Controller
{
    public function getFile($filename)
    {
        logger($filename);

        $path = storage_path(Str::of('app/public/logos/'.$filename)->replace('/', DIRECTORY_SEPARATOR));

        return response()->download($path, disposition: null);
    }
}
