@extends('layouts.base')

@section('content')
<div class="wrapper">
    <div class="hero">
        <div class="hero-content">
            <h1>About Amir Essence</h1>
            <p>
                At Amir Essence, we specialize in crafting exquisite fragrances for men. Our collection is 
                designed to enhance your sophistication and confidence, with each scent telling a unique story.
            </p>
            {{-- <p>
                From royal oud to modern musk, our perfumes are created using the finest ingredients, ensuring 
                a luxurious experience for our customers. Whether you're seeking a signature fragrance or the 
                perfect gift, Amir Essence is here to provide timeless elegance.
            </p> --}}
            <a href="/perfumes" class="hero-button">Explore Our Collection</a>
        </div>
        <div class="hero-image">
            <img style="filter: drop-shadow(2px 2px 10px #2222229a);" src="/img/logoLight-boxAndBottle.png" alt="Contact Amir Essence">
        </div>
    </div>

    <div class="best-sellers">
        <h2>Our Mission</h2>
        <p>
            Our mission is to redefine men's fragrances with a blend of tradition and innovation. We aim to 
            provide products that exude luxury and sophistication while ensuring accessibility for everyone.
        </p>
    </div>

    <div class="best-sellers">
        <h2>Why Choose Us?</h2>
        <ul>
            <li>High-quality, long-lasting fragrances crafted for men.</li>
            <li>A diverse range of scents, from bold to subtle.</li>
            <li>Commitment to elegance, confidence, and individuality.</li>
            <li>Exceptional customer service and fast delivery.</li>
        </ul>
    </div>
</div>
@endsection
