@extends('inc.master')

@section('content')
<div class="container mt-4">
    <h1>Edit Category</h1>
    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="edit-category-title">Title:</label>
            <input type="text" name="title" id="edit-category-title" class="form-control" value="{{ $category->title }}" required>
        </div>
        <div class="form-group">
            <label for="edit-category-details">Details:</label>
            <textarea name="details" id="edit-category-details" class="form-control">{{ $category->details }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Category</button>
    </form>
</div>
@endsection
