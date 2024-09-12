<!-- resources/views/products.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center mb-4">Products</h1>

                <!-- Search Form -->
                <form action="{{ route('products.search') }}" method="GET" class="mb-4">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search products..."
                            value="{{ request()->get('search') }}">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </form>

                <!-- Products Table -->
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Brand</th>
                                <th>Price</th>
                                <th>Category</th>
                                <th>Image</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $product->title }}</td>
                                    <td>{{ $product->brand }}</td>
                                    <td>${{ $product->price }}</td>
                                    <td>{{ $product->category->title }}</td>
                                    <td><img src="{{ asset('storage/products/' . $product->image) }}"
                                            alt="{{ $product->name }}" style="width: 100px; height: auto;"></td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">No products found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                <a href="{{ route('products') }}" class="btn btn-primary mb-3">See Products</a>


                <form method="POST" action="{{ route('user.logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
