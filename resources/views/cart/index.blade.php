@extends('layouts.base')

@section('content')
@php
    // You can remove this section as we're passing the cart data directly from the controller
@endphp

<div class="wrapper">

    <div class="page-header">
        <nav class="breadcrumb">
            <a href="{{ url('/') }}">Home</a> &gt;
            <a href="{{ url('/cart') }}">Shopping cart</a>
            <h1>Shopping Cart</h1>
        </nav>
    </div>


    <div class="cart-content">

        @if(count($cart) > 0)
            <div class="cart-items">
                @foreach($cart as $productId => $product)
                    <div class="cart-item">
                        <div class="cart-item-details">
                            <h2>{{ $product['name'] }}</h2>
                            <p>Volume: {{ $product['volume'] }} ml / {{ round($product['volume'] / 29.574, 1) }} oz</p>
                            <p class="item-price">{{ number_format($product['price'], 2) }}€</p>

                            <div class="quantity-control">
                                <form action="{{ route('cart.update') }}" method="POST" style="display: inline;">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $productId }}">
                                    <input type="hidden" name="quantity" value="{{ $product['quantity'] - 1 }}">
                                    <button type="submit" class="quantity-btn">-</button>
                                </form>

                                <span class="quantity">{{ $product['quantity'] }}</span>

                                <form action="{{ route('cart.update') }}" method="POST" style="display: inline;">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $productId }}">
                                    <input type="hidden" name="quantity" value="{{ $product['quantity'] + 1 }}">
                                    <button type="submit" class="quantity-btn">+</button>
                                </form>

                                <form action="{{ route('cart.remove', ['productId' => $productId]) }}" method="POST" style="display: flex; justify-content: center;">
                                    @csrf
                                    <button type="submit" class="remove-btn">
                                        <img class="icon" src="{{asset('img/icons/trash.svg')}}">
                                    </button>
                                </form>
                            </div>
                        </div>

                        <img src="{{ asset($product['image']) }}" alt="Product Image" class="cart-item-image">

                    </div>
                @endforeach
            </div>

            <div class="order-summary">
                <h3>Order Summary</h3>
                <div class="summary-details">
                    <div class="summary-row">
                        <span>Subtotal</span>
                        <span>{{ number_format($subtotal, 2) }}€</span>
                    </div>
                    <div class="summary-row">
                        <span>Shipping</span>
                        <span>{{ number_format($shipping, 2) }}€</span>
                    </div>
                    <div class="summary-row total">
                        <span>Total</span>
                        <span>{{ number_format($total, 2) }}€</span>
                    </div>
                    <button class="btn">Check Out</button>
                </div>
            </div>
            
        @else
            <div class="empty-cart">
                <h1>Your Cart</h1>
                <p>Your shopping cart is empty.</p>
                <a href="/perfumes" class="btn">Shop Now</a>
            </div>
        @endif
    </div>
</div>

@endsection
