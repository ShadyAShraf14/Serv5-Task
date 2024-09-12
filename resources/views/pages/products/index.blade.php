@extends('inc.master')

@section('content')
    <div class="container mt-4">
        <h1>Products</h1>
        <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Add Product</a>



        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Brand</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->brand }}</td>
                        <td>${{ number_format($product->price, 2) }}</td>
                        <td>{{ $product->category ? $product->category->title : 'N/A' }}</td>
                        <td>
                            @if ($product->image)
                                <img src="{{ asset('storage/products/' . $product->image) }}" width="50"
                                    alt="Product Image">
                            @else
                                No Image
                            @endif
                        </td>

                        <td>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
