@extends('layouts.base')

@section('content')
<div class="wrapper">
    <nav class="breadcrumb" style="margin-bottom: 40px">
        <a href="#">Home</a> &gt;
        <a href="#">Arabic Fragrances</a> &gt;
        <span>{{ $product->name }}</span>
    </nav>

    <div class="product-page">
        <div class="product-img">
            @if($product->img_file)
                <img src="{{ asset($product->img_file) }}" alt="{{ $product->name }}" class="img-fluid">
            @else
                <p><strong>Image:</strong> No image available</p>
            @endif
        </div>
        <div class="product-details">
            <h1>{{ $product->name }}</h1>

            <p class="price">€{{ $product->price }}</p>
            <p><strong>Size:</strong> {{ $product->volume }} ml / {{ round($product->volume / 29.574, 1) }} oz </p>

            <div class="quantity-control">
                <button>-</button>
                <input type="number" value="1">
                <button>+</button>
            </div>

            <button class="add-to-cart">Add to Cart</button>
            <p class="shipping-info">This item ships same day if ordered before 22:00.</p>

            <div class="description">
                <p>{{ $product->description }}</p>
            </div>

            <div class="ingredients">
                <p><strong>Ingredients:</strong> {{ $product->ingredients }}</p>
            </div>
        </div>
    </div>
</div>


@endsection
