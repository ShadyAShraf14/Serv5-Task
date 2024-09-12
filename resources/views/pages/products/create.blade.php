@extends('inc.master')

@section('content')
    <div class="container mt-4">
        <h1>Create Product</h1>
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="product-title">Title:</label>
                <input type="text" name="title" id="product-title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="product-brand">Brand:</label>
                <input type="text" name="brand" id="product-brand" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="product-price">Price:</label>
                <input type="number" name="price" id="product-price" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="product-image">Image:</label>
                <input type="file" name="image" id="product-image" class="form-control-file">
            </div>
            <div>
                <label>Category:</label>
                <select name="category_id" required>
                    <option value="">Select a category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="product-details">Details:</label>
                <textarea name="details" id="product-details" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add Product</button>
        </form>
    </div>
@endsection
