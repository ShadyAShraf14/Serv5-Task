<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP</title>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .card {
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #007bff;
            color: white;
            text-align: center;
            border-bottom: none;
            padding: 20px;
            font-size: 1.25rem;
            font-weight: 600;
        }

        .card-body {
            padding: 2rem;
        }

        .form-group label {
            font-weight: 600;
            color: #495057;
        }

        .form-control {
            border-radius: 8px;
            box-shadow: none;
            border: 1px solid #ced4da;
            font-size: 1rem;
        }

        .btn-primary {
            width: 100%;
            padding: 10px;
            font-size: 1.125rem;
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
    </style>
</head>

<body>
    <div class="login-container">
        <div class="col-md-6 col-lg-4">
            <div class="card">
                <div class="card-header">
                    Verify OTP
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

                    <form action="{{ url('otp/verify') }}" method="POST">
                        @csrf
                        <input type="hidden" name="email" value="{{ $email }}">
                        <div class="form-group mb-3">
                            <label for="otp">OTP Code</label>
                            <input type="text" id="otp" name="otp" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Verify OTP</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
