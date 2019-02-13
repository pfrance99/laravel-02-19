@extends('layouts.base')

@section('title', 'Accueil')

@section('content')

    <div class="admin-home">
        <div>
            <a href="/admin/create"><button class="btn btn-success">Add a trip</button></a>
        </div>
        <table class="table table-light">
          <thead>
            <tr>
              <th scope="col">Picture</th>
              <th scope="col">Label</th>
              <th scope="col">City</th>
              <th scope="col">Country</th>
              <th scope="col">Start date</th>
              <th scope="col">End date</th>
              <th scope="col">Price</th>
              <th scope="col">Description</th>
              <th scope="col">Available</th>
              <th scope="col">Update</th>
              <th scope="col">Delete</th>
            </tr>
          </thead>
          <tbody>
              @foreach($trips as $trip)
                <tr>
                  <td><img class="img-list-admin" src="{{$trip->picture}}"></td>
                  <td>{{$trip->label}}</td>
                  <td>{{$trip->city}}</td>
                  <td>{{$trip->country}}</td>
                  <td>{{$trip->startDate}}</td>
                  <td>{{$trip->endDate}}</td>
                  <td>{{$trip->price}}€</td>
                  <td>{{$trip->description}}</td>
                  <td>
                      @if($trip->availability)
                          <p class="text-success">Yes</p>
                      @else
                          <p class="text-danger">No</p>
                      @endif
                  </td>
                  <td><a href="/admin/update/{{$trip->id}}"><button class="btn btn-sm btn-primary">U</button></a></td>
                  <td>
                      <form method="post" action="/admin/delete/{{$trip->id}}">
                          @csrf
                          @method('delete')
                          <input type="submit" class="btn btn-sm btn-danger" value="X">
                      </form>
                  </td>
                  </tr>
              @endforeach
          </tbody>
        </table>
    </div>
@endsection
