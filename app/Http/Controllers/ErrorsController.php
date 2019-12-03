<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorsController extends Controller
{
    public function neh()
    {
        return view('errors.neh');
    }
}
