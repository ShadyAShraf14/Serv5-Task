<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request OTP</title>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <style>
        body {
            background: #f7f9fc;
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
            background-color: #007bff;
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
            background-color: #007bff;
            border: none;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .alert {
            margin-top: 20px;
        }

        .forgot-password {
            display: block;
            margin-top: 10px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    Request OTP
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

                    <form action="{{ url('otp/generate') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="email">Email Address</label>
                            <input type="email" id="email" name="email" class="form-control"
                                value="{{ old('email') }}" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Send OTP</button>
                        </div>
                    </form>
                    <a href="{{ url('user/login') }}" class="forgot-password">Back to Login</a>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
