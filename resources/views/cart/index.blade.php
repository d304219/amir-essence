@extends('layouts.base')

@section('content')
<div class="wrapper">
    @guest
        <!-- Show login prompt if the user is not logged in -->
        <div class="cart-login-prompt">
            <h1>Please log in to view your cart</h1>
            <a href="{{ route('login') }}" class="btn">Log in</a>
        </div>
    @endguest

    @auth
        <div class="page-header">
            <h1>Shopping Cart</h1>
        </div>

        <div class="cart-content">
            <!-- Check if there are items in the cart -->
            @if(session()->has('cart') && count(session('cart')) > 0)
                <!-- Cart Items Section -->
                <div class="cart-items">
                    @foreach($cart as $product)
                    <div class="cart-item">
                        <div class="cart-item-details">
                            <h2>{{ $product['name'] }}</h2>
                            <p class="item-price">{{ number_format($product['price'], 2) }}€</p>
                            <div class="quantity-control">
                                <button class="quantity-btn">-</button>
                                <span style="display: flex; align-items: center;" class="quantity">{{ $product['quantity'] }}</span>
                                <button class="quantity-btn">+</button>
                            </div>
                        </div>
                
                        {{-- Display product image --}}
                        <img src="{{ asset($product['img_file']) }}" alt="Product Image" class="cart-item-image">
                    </div>
                @endforeach
                
                </div>

                <!-- Order Summary Section -->
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
                
                </div>
            @else
                <!-- Show empty cart message if there are no items -->
                <div class="empty-cart">
                    <p>Your shopping cart is empty.</p>
                </div>
            @endif
        </div>
    @endauth
</div>

@endsection
