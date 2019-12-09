<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorsController extends Controller
{
    public function neh()
    {
       abort(404);
    }
}
