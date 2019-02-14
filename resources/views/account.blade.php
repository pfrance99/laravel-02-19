@extends('layouts.base')

@section('title', 'Accueil')

@section('content')

    <div class="account container">
        <div class="row col-md-12">
            <h5 class="col-md-1">Name:</h5> <p class="col-md-3">{{$user->name}}</p>
        </div>
        <div class="row col-md-12">
            <h5 class="col-md-1">E-mail:</h5> <p class="col-md-3">{{$user->email}}</p>
        </div>
        <div class="row col-md-12">
            <h5 class="col-md-12">My bookings:</h5>
            <form method="post" action="/booking/deleteAll" class="col-md-12">
                @csrf
                @method('delete')
                <input type="submit" class="btn btn-sm btn-danger" value="Delete all bookings">
            </form>
        </div>
        <div class="card-container col-md-12">
            @foreach ($bookings as $booking)
            <div class="card custom-card">
                <img class="card-img-top" src="{{$booking->picture}}" alt="Description image">
                <div class="card-body">
                <h5 class="card-title">{{$booking->label}}</h5>
                <p class="card-text">From {{$booking->startDate}}</p>
                <p class="card-text">To {{$booking->endDate}}</p>
                <form method="post" action="/booking/delete/{{$booking->id}}">
                    @csrf
                    @method('delete')
                    <input type="submit" class="btn btn-sm btn-danger" value="Delete">
                </form>
              </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
