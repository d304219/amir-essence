@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h1>Dashboard</h1>
        <h2>Product Edit</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="post" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
            @csrf
            @method("PUT")

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" value="{{ $product->name }}" name="name" class="form-control" id="name">
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" value="{{ $product->price }}" name="price" class="form-control" id="price" min="0" step="0.01">
            </div>

            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" value="{{ $product->quantity }}" name="quantity" class="form-control" id="quantity" min="0">
            </div>

            <div class="form-group">
                <label for="volume">Volume (ml)</label>
                <input type="number" value="{{ $product->volume }}" name="volume" class="form-control" id="volume" min="0">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" id="description">{{ $product->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="ingredients">Ingredients</label>
                <textarea name="ingredients" class="form-control" id="ingredients">{{ $product->ingredients }}</textarea>
            </div>

            <div class="form-group">
                <label for="category_id">Category</label>
                <select name="category_id" class="form-control" id="category_id">
                    <!-- Populate this with categories dynamically -->
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="img_file">Image</label>
                <input type="file" name="img_file" class="form-control-file" id="img_file">
                @if($product->img_file)
                    <p>Current Image:</p>
                    <img src="{{ asset('img/' . $product->img_file) }}" alt="{{ $product->name }}" class="img-fluid" style="max-width: 200px;">
                @endif
            </div>

            <div class="form-group">
                <input class="mt-4 btn btn-primary" type="submit" value="Update">
            </div>
        </form>
    </div>
@endsection
