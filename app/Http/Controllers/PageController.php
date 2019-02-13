<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trip;

class PageController extends Controller
{

    public function about()
    {
        return view('site.about');
    }
}
