<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Storage;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function uploadFile($targetDir, $file, $fileName = null)
    {

        try {
            Storage::makeDirectory($targetDir); //this function creates a full path directory according to filesystem driver
            if ($fileName == null) {
                $path = $file->store($targetDir); //this will upload the file in given direcory with auto unique generate name
            } else {
                $path = $file->storeAs($targetDir, $fileName); //this is same with store, but accept a file name
                echo "Function name".$fileName;
            }
            return $path;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
