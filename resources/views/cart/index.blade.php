@extends('layouts.base')

@section('content')
@php
    // You can remove this section as we're passing the cart data directly from the controller
@endphp

<div class="wrapper">

    <div class="page-header">
        <h1>Shopping Cart</h1>
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
                                        <i class="fa fa-trash" aria-hidden="true"></i>
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

<style>
    .remove-btn {
        background: none;
        border: none;
        cursor: pointer;
        padding: 5px;
        text-align: center;
    }

    .remove-btn i {
        font-size: 20px;
        color: #555;
        transition: transform 0.2s ease, color 0.2s ease;
    }

    .remove-btn:hover i {
        color: #ff0000; 
        transform: scale(1.2); 
    }
</style>
@endsection
