@extends('layouts.base')

@section('content')
    <section class="categories">
        <div class="wrapper">
                <!-- Breadcrumb -->
                <nav class="breadcrumb">
                    <a href="/">Home</a> &gt; <a href="categories">Categories</a>
                </nav>
        
                <!-- Title and Product Count -->
                <div class="page-header">
                    <h1>Categories</h1>
                </div>

                <div class="category-grid">
                    @foreach ($categories as $category)
                    <div class="category-card" style="font-family: {{ $category->font }};" onclick="window.location='{{ url('/category/' . $category->id)}}'">
                        <h3>{{ $category->name }}</h3>
                    </div>
                    
                    @endforeach
        
                <!-- Products Grid -->

            </div>
        <style>
.category-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
    gap: 20px;
}

.category-card {
    background-color: white;
    overflow: hidden;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border: 1px solid black;
    text-align: center;
    transition: transform 0.2s ease-in-out;
    cursor: pointer;
}

.category-card img {
    width: 100%;
    height: 150px;
    object-fit: cover;
}

.category-card h3 {
    padding: 10px;
    font-size: 1.5em;
    color: #333;
}

.category-card:hover {
    transform: translateY(-5px);
}
        </style>
    </section>
@endsection