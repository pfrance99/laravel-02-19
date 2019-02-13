@extends('layouts.base')

@section('title', 'Accueil')

@section('content')

    <div class="admin-create">
        <form method="POST" action="/admin/update/{{$trip->id}}">
            @csrf
            @method('put')
            <h5>Update a trip</h5>
            <label>Label : <input type="text" name="label" value="{{$trip->label}}"></label>
            <label>Country : <input type="text" name="country" value="{{$trip->country}}"></label>
            <label>City : <input type="text" name="city" value="{{$trip->city}}"></label>
            <label>Picture : <input type="text" name="picture" value="{{$trip->picture}}"></label>
            <p>{{$trip->startDate}}</p>
            <label>Start date : <input type="date" name="startDate"min="2018-01-01" max="2025-12-31" value="{{$trip->startDate}}"></label>
            <label>End date : <input type="date" name="endDate" min="2018-01-01" max="2025-12-31" value="{{$trip->endDate}}"></label>
            <label>Price : <input type="text" name="price" value="{{$trip->price}}"></label>
            <label>Description : <textarea name="description">{{$trip->description}}</textarea></label>
            <label>Availability : <input type="checkbox" name="availability" {{$trip->availability ? 'checked' : ''}}></label>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <input type="submit" value="Update">
        </form>
    </div>
@endsection
