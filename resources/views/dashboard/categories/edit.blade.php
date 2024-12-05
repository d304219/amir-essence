@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h1>Dashboard</h1>
        <h2>Category Edit</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row">
            <!-- Form section -->
            <div class="col-md-8">
                <form method="post" action="{{ route('categories.update', $category->id) }}">
                    @csrf
                    @method("PUT")

                    <div class="form-group">
                        <label for="name">Category Name</label>
                        <input type="text" value="{{ $category->name }}" name="name" class="form-control" id="name">
                    </div>

                    <div class="form-group">
                        <label for="font">Font (optional)</label>
                        <input type="text" value="{{ $category->font }}" name="font" class="form-control" id="font">
                    </div>

                    <div class="buttons d-flex flex-md-row mt-4 gap-2">
                        <!-- Update Form -->
                        <input class="btn btn-primary" type="submit" value="Update">
                    
                        <!-- Delete Form -->
                        <form action="{{ route('categories.destroy', $category->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete" class="btn btn-disabled">
                        </form>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
