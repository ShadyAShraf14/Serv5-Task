@extends('inc.master')

@section('content')
    <h1>Enter OTP</h1>
    <form action="{{ route('otp.verify') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="otp">OTP</label>
            <input type="text" name="otp" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Verify OTP</button>
    </form>
@endsection
