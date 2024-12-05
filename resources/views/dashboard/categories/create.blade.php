@extends('layouts.dashboard')

@section('content')
    <div class="container">

        <h1>Dashboard</h1>
        <h2>Create New Category</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="post" action="{{ route('categories.store') }}">
            @csrf

            <div class="row">
                <!-- Form Fields on the Left -->
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="name">Category Name</label>
                        <input type="text" name="name" class="form-control" id="name">
                    </div>

                    <div class="form-group">
                        <label for="font">Font (optional)</label>
                        <input type="text" name="font" class="form-control" id="font">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <input class="mt-4 btn btn-primary" type="submit" value="Save Category">
            </div>
        </form>
    </div>
@endsection
