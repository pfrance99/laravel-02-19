@extends('layouts.base')

@section('title', 'Accueil')

@section('content')

    <div class="home">
    @foreach ($trips as $trip)
        <div class="card custom-card">
          <img class="card-img-top" src="{{$trip->picture}}" alt="Description image">
          <div class="card-body">
            <h5 class="card-title">{{$trip->label}}</h5>
            <p class="card-text">From {{$trip->startDate}}</p>
            <p class="card-text">To {{$trip->endDate}}</p>
            <a href="/trips/{{$trip->id}}" class="btn btn-primary">Details</a>
          </div>
        </div>
    @endforeach
    </div>
@endsection
