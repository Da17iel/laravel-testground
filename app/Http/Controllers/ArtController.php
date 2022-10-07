<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArtController extends Controller
{
    public function face()
    {
        return view('facebook');
    }

    public function laravel()
    {
        return view('laravel');
    }
}
