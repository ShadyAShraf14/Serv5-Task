<!DOCTYPE html>
<html>

<head>
    <title>Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container text-center mt-5">
        <h1>Welcome to the Application</h1>

        <div class="mt-4">
            <a href="{{ route('user.login') }}" class="btn btn-primary">Login as User</a>
            <a href="{{ route('admin.login') }}" class="btn btn-secondary">Login as Admin</a>
        </div>
    </div>
</body>

</html>
