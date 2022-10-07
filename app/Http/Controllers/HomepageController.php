<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function welcome()
    {
        return view("welcome");
    }
}
