@extends('layouts.app')

@section('title', 'Instructor Register')

@section('content')
<div class="container mt-5" style="max-width: 400px;">
    <h3 class="text-center mb-4">Instructor Signup</h3>

    <form action="{{ route('instructor.register.submit') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success w-100">Register</button>
        <p class="mt-3 text-center">
            Already have an account? <a href="{{ route('instructor.login') }}">Login here</a>
        </p>
    </form>
</div>
@endsection
