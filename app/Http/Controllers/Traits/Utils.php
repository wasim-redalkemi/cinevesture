<?php

namespace App\Http\Controllers\Traits;


trait Utils
{
    public function jsonResponse($status,$message,$data)
    {
        return response()->json(["status"=>$status,"message"=>$message,"data"=>$data]);
    }
}
