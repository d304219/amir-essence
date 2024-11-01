@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h1>Dashboard</h1>
        <h2>Events Create</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="post" action="{{route('events.store')}}">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="name" class="form-control" id="">
            </div>

            <div class="form-group">
                <label for="">Address</label>
                <input type="text" name="address" class="form-control" id="">
            </div>

            <div class="form-group">
                <label for="">Post Code</label>
                <input type="text" name="postal_code" class="form-control" id="">
            </div>

            <div class="form-group">
                <label for="">Ticket Price</label>
                <input type="number" min="0" step="any" name="price" class="form-control" id="">
            </div>
            
            <div class="form-group">
                <label for="">Available Tickets:</label>
                <input type="number" name="available_tickets" class="form-control" id="">
            </div>

            <div class="form-group">
                <label for="">Startdate</label>
                <input type="date" name="date" class="form-control" id="">
            </div>

            <div class="form-group">
                <input class="mt-4 btn btn-primary" type="submit" value="Opslaan">
            </div>
        </form>

    </div>
@endsection