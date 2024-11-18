@extends('layouts.base')

@section('content')
<div class="wrapper">

<section class="hero">
    <div class="hero-content">
        <h1>Discover Amir Essence</h1>
        <p>Embrace sophistication with our exclusive fragrance for men. Unleash a world of elegance and confidence.</p>
        <a href="/perfumes" class="btn">Shop Now</a>
    </div>
    <div class="hero-image">
        <img src="img/perfume-mockup.png" alt="Amir Essence Fragrance">
    </div>
</section>

<section class="best-sellers">
        <h2>Latest Products</h2>
        <div class="products-grid">
            @foreach($latestProducts as $product)
            <div class="product-card" style="cursor: pointer;" onclick="window.location='{{ url('/perfumes/' . $product->id)}}'">
                <div class="product-img">
                    <div class="volume-tag">
                        {{ $product->volume}} ml
                    </div>
                    <img src="{{ $product->img_file}}" alt="{{ $product->name}}">
                </div>
                <h3>{{ $product->name}}</h3>
                <p>{{ $product->description}}</p>
                <span class="price">€{{ $product->price}}</span>
            </div>
            @endforeach
        </div>
        <a href="/perfumes" class="view-btn">View All</a>

</section>
    </div>

@endsection
