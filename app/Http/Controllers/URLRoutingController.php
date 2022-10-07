<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class URLRoutingController extends Controller
{
    public function UrlRouting($name, $age)
    {
        return view('view-test', [
            'name' => $name,
            'age' => $age
        ]);
    }
}
