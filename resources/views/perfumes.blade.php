@extends('layouts.base')

@section('content')
    <section class="perfumes">
        <div class="wrapper">
                <!-- Breadcrumb -->
                <nav class="breadcrumb">
                    <a href="#">Home</a> &gt; <span>Perfumes</span>
                </nav>
        
                <!-- Title and Product Count -->
                <header class="page-header">
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
                </header>
        
                <!-- Products Grid -->
                <div class="products-grid">
                    @foreach($products as $product)
                    <div class="product-card">
                        <div class="product-img">
                            <img src="img/{{ $product['img_file'] }}" alt="{{ $product['name'] }}">
                        </div>
                        <h3>{{ $product['name'] }}</h3>
                        <p>{{ $product['description'] }}</p>
                        <span class="price">€{{ $product['price'] }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
        
    </section>
    <style>
        /* Base Styles */

/* Breadcrumb */
.breadcrumb {
    margin: 20px 0;
    font-size: 14px;
    color: #777;
}

.breadcrumb a {
    color: #333;
    text-decoration: none;
}

.breadcrumb a:hover {
    text-decoration: underline;
}

/* Header */
.page-header {
    display: flex;
    flex-direction: column;
    align-items: baseline;
    justify-content: space-between;
    margin: 0 0 20px;
}

.page-header h1 {
    font-size: 36px;
    color: #333;
    text-transform: uppercase;
}

.product-info {
    width: 100%;
    justify-content: space-between;
    display: flex;
    align-items: center;
    gap: 20px;
}

.product-info span {
    font-size: 16px;
    color: #333;
}

.sort label {
    font-size: 16px;
    color: #333;
}

.sort select {
    padding: 5px;
    font-size: 16px;
}

/* Product Grid */
.products-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(230px, 1fr));
    gap: 40px;
}

.product-card {
    border-radius: 8px;
    position: relative;
    transition: transform 0.3s, box-shadow 0.3s;
}

.product-card img {
    width: 70%;
    height: auto;
    border-radius: 8px;
    margin-bottom: 15px;

}

.product-img{
    width: 100%;
    background-color: #f9f9f9;
    text-align: center
}

.product-card h3 {
    font-size: 18px;
    color: #333;
    text-transform: uppercase;
    margin-bottom: 10px;
}

.product-card p {
    font-size: 14px;
    color: #555;
    margin-bottom: 15px;
}

.product-card .price {
    font-size: 18px;
    color: #333;
    font-weight: bold;
}

/* Best Seller Badge */
.best-seller .badge {
    position: absolute;
    top: 10px;
    left: 10px;
    background-color: #000;
    color: #fff;
    padding: 5px 8px;
    font-size: 12px;
    text-transform: uppercase;
    border-radius: 3px;
}

    </style>
@endsection