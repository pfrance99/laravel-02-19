@extends('layouts.base')

@section('title', 'Accueil')

@section('content')

    <div class="admin-create">
        <form method="POST" action="/admin/create">
            @csrf

            <h5>Add a trip</h5>
            <label>Label : <input type="text" name="label"></label>
            <label>Country : <input type="text" name="country"></label>
            <label>City : <input type="text" name="city"></label>
            <label>Picture : <input type="text" name="picture"></label>
            <label>Start date : <input type="date" name="startDate" value="2018-07-22" min="2018-01-01" max="2025-12-31"></label>
            <label>End date : <input type="date" name="endDate" value="2018-07-22" min="2018-01-01" max="2025-12-31"></label>
            <label>Price : <input type="text" name="price"></label>
            <label>Description : <textarea name="description"></textarea></label>
            <label>Availability : <input type="checkbox" name="availability"></textarea></label>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <input type="submit" value="Add">
        </form>
    </div>
@endsection
