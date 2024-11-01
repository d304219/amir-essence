@extends('layouts.dashboard')

@section('content')
    <div class="wrapper">
        <h1>Dashboard</h1>
        <h2>Products Control</h2>
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
                        <td><a href="{{route('products.show', $product->id)}}">{{$product->name}}</a></td>
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

        <a href="{{route('products.create')}}" class="btn btn-primary">Nieuw evenement aanmaken</a>
    </div>
@endsection