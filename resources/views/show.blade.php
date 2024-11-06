@extends('layouts.base')

@section('content')
<div class="wrapper">
    <nav class="breadcrumb" style="margin-bottom: 40px">
        <a href="{{ url('/') }}">Home</a> &gt;
        <a href="{{ url('/arabic-fragrances') }}">Arabic Fragrances</a> &gt;
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

            <form action="{{ route('cart.add') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <div class="quantity-control">
                    <button class="quantity-btn" type="button" onclick="decreaseQuantity()">-</button>
                    <input type="number" name="quantity" value="1" min="1" id="quantity-input">
                    <button class="quantity-btn" type="button" onclick="increaseQuantity()">+</button>
                </div>
                <button type="submit" class="btn">Add to Cart</button>
            </form>

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

<script>
    function decreaseQuantity() {
        let quantityInput = document.getElementById('quantity-input');
        if (quantityInput.value > 1) {
            quantityInput.value--;
        }
    }

    function increaseQuantity() {
        let quantityInput = document.getElementById('quantity-input');
        quantityInput.value++;
    }
</script>

@endsection
