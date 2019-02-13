@extends('layouts.base')

@section('title', 'Accueil')

@section('content')

    <div class="detail container">
        @if(isset($trip))
          <div class="row col-md-8">
              <div class="row col-md-12 custom-duo-detail">
             <div class="col-md-6">
                <img class="col-md-12" src="{{$trip->picture}}" alt="Description image">
             </div>
             <div class="col-md-6">
                <h5>{{$trip->label}}</h5>
                <p>Country : {{$trip->country}}</p>
                <p>City : {{$trip->city}}</p>
                <p>From : {{$trip->startDate}}</p>
                <p>To : {{$trip->endDate}}</p>
                <p>Price : {{$trip->price }}€</p>
                @if ($trip->availability === 1)
                    <p class="text-success">Available</p>
                @else
                    <p class="text-danger">Unvailable</p>
                @endif
                </div>
                <p>{{$trip->description}}</p>
                <form>
                    <input type="submit" class="btn btn-sm btn-success" value="Book this trip">
                </form>
            </div>
        </div>
        @else
            <h5>No trips correspond to this identifier</h5>
        @endif
    </div>
@endsection
