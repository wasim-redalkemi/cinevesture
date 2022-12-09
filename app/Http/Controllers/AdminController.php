<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected $records_limit;

    public function __construct()
    {
        $this->records_limit=10;
    }

    public function getError($error = '')
    {
        $defaultError = $error->getMessage();
        if(((env('APP_ENV') == 'production') && (strpos(get_class($error),'Database') > (-1))) || $error == '')
        {
            $defaultError = 'Something went wrong.';
        }
        return $defaultError;
    }
}
