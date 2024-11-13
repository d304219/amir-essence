@extends('layouts.base')

@section('content')
    <section class="perfumes">
        <div class="wrapper">
                <!-- Breadcrumb -->
                <nav class="breadcrumb">
                    <a href="/">Home</a> &gt; <a href="/perfumes">Perfumes</a>
                </nav>
        
                <!-- Title and Product Count -->
                <div class="page-header">
                    <h1>Perfumes</h1>
                    <div class="product-info">
                        <span>{{ $products->count() }} PRODUCTS</span>
                        <div class="sort">
                            <label for="sort-options">Sort by:</label>
                            <select id="sort-options">
                                <option value="default">Sorting</option>
                                <option value="price">Price</option>
                                <option value="popularity">Popularity</option>
                            </select>
                        </div>
                    </div>
                </div>
        
                <!-- Products Grid -->
                <div class="products-grid">
                    @foreach($products as $product)
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
            </div>
        
    </section>
    <style>
        /* Base Styles */


    </style>
@endsection