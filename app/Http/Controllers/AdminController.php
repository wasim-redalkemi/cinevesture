<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected $records_limit;

    public function __construct()
    {
        $this->records_limit=5;
    }

    
}
