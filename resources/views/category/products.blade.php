@extends('layouts.base')

@section('content')
    <section class="perfumes">
        <div class="wrapper">
                <!-- Breadcrumb -->
                <nav class="breadcrumb">
                    <a href="/">Home</a> &gt; <a href="/categories">Categories</a> &gt; <a href="/category/{{ $category->id}}">{{ $category->name}}</a>
                </nav>
        
                <!-- Title and Product Count -->
                <div class="page-header">
                    <h1 style="font-family: {{$category->font}}">{{ $category->name}}</h1>
                    <div class="product-info">
                        <span>{{ $products->count() }} PRODUCTS</span>
                        <div class="sort">
                            <label for="sort-options">Sort by:</label>
                            <select id="sort-options" onchange="applySort()">
                                <option value="default" {{ request('sort') === 'default' ? 'selected' : '' }}>Default</option>
                                <option value="price_low_high" {{ request('sort') === 'price_low_high' ? 'selected' : '' }}>Price: Low to High</option>
                                <option value="price_high_low" {{ request('sort') === 'price_high_low' ? 'selected' : '' }}>Price: High to Low</option>
                                <option value="alphabet_az" {{ request('sort') === 'alphabet_az' ? 'selected' : '' }}>Alphabet: A-Z</option>
                                <option value="alphabet_za" {{ request('sort') === 'alphabet_za' ? 'selected' : '' }}>Alphabet: Z-A</option>
                            </select>
                        </div>
                        
                        <script>
                            function applySort() {
                                const selectedSort = document.getElementById('sort-options').value;
                                const urlParams = new URLSearchParams(window.location.search);
                                urlParams.set('sort', selectedSort);
                                window.location.search = urlParams.toString();
                            }
                        </script>
                        
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
                            <img src="/{{ $product->img_file}}" alt="{{ $product->name}}">
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