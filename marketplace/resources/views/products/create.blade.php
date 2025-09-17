@extends('layouts.app')

@section('content')
<h2>Add Product</h2>

<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label>Name</label>
    <input type="text" name="name" required>
    
    <label>Description</label>
    <textarea name="description" required></textarea>

    <label>Price</label>
    <input type="number" name="price" required>

    <label>Stock</label>
    <input type="number" name="stock" required>

    <label>Images</label>
    <input type="file" name="images[]" multiple required>

    <button type="submit">Add Product</button>
</form>
@endsection
