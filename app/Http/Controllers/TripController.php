<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trip;
use Validator;

class TripController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except('index', 'show');
    }

    public function index(Request $request)
    {
        $trips;
        if(isset($_GET['search']) && $_GET['search'])
        {
            $trips = Trip::where('label', 'like', "%{$_GET['search']}%")->get();
        }
        else {
            $trips = Trip::all();
        }

        return view('home', ['trips' => $trips]);
    }

    public function show($id)
    {
        $trip =  Trip::find($id);
        return view('detail', ['trip' => $trip]);
    }

    public function create(Request $request)
    {
        self::validateFields($request);

        $trip = new Trip;
        $trip->label = $_POST['label'];
        $trip->country = $_POST['country'];
        $trip->city = $_POST['city'];
        $trip->startDate = $_POST['startDate'];
        $trip->endDate = $_POST['endDate'];
        //Gérer la conversion du prix de string à decimal
        $trip->price = (float)$_POST['price'];
        $trip->picture = $_POST['picture'];
        $trip->description = $_POST['description'];
        $trip->availability = isset($_POST['availability']) ? 1 : 0;
        $trip->save();
        return redirect('/admin/');
    }

    public function update($id, Request $request)
    {
        $this->validateFields($request);

        $trip = Trip::find($id);
        $trip->label = $_POST['label'];
        $trip->country = $_POST['country'];
        $trip->city = $_POST['city'];
        $trip->startDate = $_POST['startDate'];
        $trip->endDate = $_POST['endDate'];
        //Gérer la conversion du prix de string à decimal
        $trip->price = (float)$_POST['price'];
        $trip->picture = $_POST['picture'];
        $trip->description = $_POST['description'];
        $trip->availability = isset($_POST['availability']) ? 1 : 0;
        $trip->save();
        return redirect('/admin/');
    }

    public function delete($id)
    {
        $trip = Trip::find($id);
        $trip->delete();
        return redirect('/admin/');
    }

    private function validateFields(Request $request)
    {
        Validator::make($request->all(), [
            'label' => 'required|max:100',
            'country' => 'required|max:100',
            'city' => 'required|max:100',
            'startDate' => 'required|date',
            'endDate' => 'required|date',
            'price' => 'required|between:0,99.99',
            'picture' => 'required|max:500',
            'description' => 'required'
        ])->validate();
    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
