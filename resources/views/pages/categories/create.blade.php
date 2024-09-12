@extends('inc.master')

@section('content')
<div class="container mt-4">
    <h1>Create Category</h1>
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="category-title">Title:</label>
            <input type="text" name="title" id="category-title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="category-details">Details:</label>
            <textarea name="details" id="category-details" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Add Category</button>
    </form>
</div>
@endsection
