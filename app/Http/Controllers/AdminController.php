<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trip;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function create()
    {
        return view('admin.create');
    }

    public function read()
    {
        $trips = Trip::all();
        return view('admin.home', ['trips' => $trips]);
    }

    public function update($id)
    {
        $trip = Trip::find($id);
        return view('admin.update', ['trip' => $trip]);
    }
}
