<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <style>
        body {
            background: #f4f6f9;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .card {
            border: none;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #343a40;
            color: white;
            text-align: center;
            border-bottom: none;
            padding: 20px;
            font-size: 1.5rem;
            font-weight: bold;
        }
        .card-body {
            padding: 2rem;
        }
        .form-group label {
            font-weight: 600;
            color: #333;
        }
        .form-control {
            border-radius: 8px;
            box-shadow: none;
            border: 1px solid #ced4da;
        }
        .btn-primary {
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            border-radius: 8px;
            background-color: #343a40;
            border: none;
            color: white;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #23272b;
        }
        .alert {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    Admin Login
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ url('admin/login') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="email">Email Address</label>
                            <input type="email" value="admin@example.com" id="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required>
                        </div>
                        <div class="form-group mb-4">
                            <label for="password">Password</label>
                            <input type="password" value="12345678" id="password" name="password" class="form-control" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
