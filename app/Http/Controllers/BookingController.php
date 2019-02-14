<?php

namespace App\Http\Controllers;
use Auth;
use App\User;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $userId = Auth::user()->id;
        if(isset($_POST['tripId'])) {
            $user = User::find($userId);
            $user->trips()->attach($_POST['tripId']);
        }
        return redirect('/');
    }

    public function deleteOne($tripId)
    {
        $userId = Auth::user()->id;
        if(is_numeric($tripId)) {
            $user = User::find($userId);
            $user->trips()->detach($tripId);
        }
        return redirect('/account');
    }

    public function deleteAll()
    {
        $userId = Auth::user()->id;
        $user = User::find($userId);
        $user->trips()->detach();
        return redirect('/account');
    }

}
