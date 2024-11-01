@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h1>Dashboard</h1>
    <h2>Product Details</h2>
        <p><strong>Name:</strong> {{ $product->name }}</p>
        <p><strong>Price:</strong> ${{ $product->price }}</p>
        <p><strong>Quantity:</strong> {{ $product->quantity }}</p>
        <p><strong>Volume:</strong> {{ $product->volume }} ml</p>
        <p><strong>Description:</strong> {{ $product->description }}</p>
        <p><strong>Ingredients:</strong> {{ $product->ingredients }}</p>
        <p><strong>Category ID:</strong> {{ $product->category_id }}</p>

        <!-- Displaying the Image -->
        @if($product->img_file)
            <p><strong>Image:</strong></p>
            <img src="{{ asset('img/' . $product->img_file) }}" alt="{{ $product->name }}" class="img-fluid" style="max-width: 200px;">
        @else
            <p><strong>Image:</strong> No image available</p>
        @endif
        
        <div class="buttons d-flex flex-md-row gap-2">
            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-info">Edit</a>
            <form action="{{ route('products.destroy', $product->id) }}" method="post">
                @csrf
                @method('DELETE')
                <input type="submit" value="Delete" class="btn btn-danger">
            </form>
        </div>
</div>
@endsection
