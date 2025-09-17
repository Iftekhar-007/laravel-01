@extends('layouts.app')

@section('content')
<h2>My Products</h2>

<div class="products-grid">
    @foreach($products as $product)
        <div class="product-card">
            <img src="{{ asset('storage/' . ($product->images[0] ?? 'placeholder.png')) }}" alt="{{ $product->name }}" style="width:150px;height:150px;">
            <h3>{{ $product->name }}</h3>
            <p>{{ $product->description }}</p>
            <p>${{ number_format($product->price, 2) }}</p>
            <p>Stock: {{ $product->stock }}</p>
        </div>
    @endforeach
</div>

<div class="pagination-wrapper">
    {{ $products->links() }}
</div>
@endsection
