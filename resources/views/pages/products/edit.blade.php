@extends('inc.master')

@section('content')
<div class="container mt-4">
    <h1>Edit Product</h1>
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Title Field -->
        <div class="form-group">
            <label for="edit-product-title">Title:</label>
            <input type="text" name="title" id="edit-product-title" class="form-control" value="{{ old('title', $product->title) }}" required>
        </div>

        <!-- Brand Field -->
        <div class="form-group">
            <label for="edit-product-brand">Brand:</label>
            <input type="text" name="brand" id="edit-product-brand" class="form-control" value="{{ old('brand', $product->brand) }}" required>
        </div>

        <!-- Price Field -->
        <div class="form-group">
            <label for="edit-product-price">Price:</label>
            <input type="number" name="price" id="edit-product-price" class="form-control" value="{{ old('price', $product->price) }}" required>
        </div>

        <!-- Category Field -->
        <div class="form-group">
            <label for="edit-product-category">Category:</label>
            <select name="category_id" id="edit-product-category" class="form-control" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == old('category_id', $product->category_id) ? 'selected' : '' }}>
                        {{ $category->title }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Image Field -->
        <div class="form-group">
            <label for="edit-product-image">Image:</label>
            <input type="file" name="image" id="edit-product-image" class="form-control-file">
            @if($product->image)
                <img src="{{ asset('storage/products/' . $product->image) }}" width="100" alt="Product Image">
            @endif
        </div>

        <!-- Details Field -->
        <div class="form-group">
            <label for="edit-product-details">Details:</label>
            <textarea name="details" id="edit-product-details" class="form-control">{{ old('details', $product->details) }}</textarea>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Update Product</button>
    </form>
</div>
@endsection
