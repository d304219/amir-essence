@extends('layouts.dashboard')

@section('content')
    <div class="wrapper">
        <h1>Dashboard</h1>
        <h2>Products Control</h2>

        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        @if(session('info'))
            <div class="alert alert-info">
                {{ session('info') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>quantity</th>
                    <th>volume</th>
                    <th>ingredients</th>
                    <th>description</th>
                    <th>img_file</th>
                    <th>category_id</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td><a href="{{ route('products.edit', $product->id) }}">{{$product->name}}</a></td>
                        <td>€ {{$product->price}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>{{$product->volume}}</td>
                        <td>{{$product->ingredients}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->img_file}}</td>
                        <td>{{$product->category_id}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{route('products.create')}}" class="btn btn-primary">Make new Product</a>
    </div>

    <script>
        // Auto-dismiss alert after 3 seconds
        setTimeout(() => {
            const alert = document.querySelector('.alert');
            if (alert) {
                alert.style.transition = 'opacity 0.8s ease';
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 1000);
            }
        }, 3000);
    </script>
    
@endsection