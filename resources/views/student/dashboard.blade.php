@extends('layouts.app')

@section('title', 'Student Dashboard')

@section('content')
<section class="py-5">
    <div class="container">
        <h2 class="mb-4">Welcome to your Dashboard</h2>

        @php
            $student = Auth::guard('student')->user();
        @endphp

        <div class="card p-4">
            <h4>Hello, {{ $student->name }}!</h4>
            <p><strong>Email:</strong> {{ $student->email }}</p>
            <p><strong>City:</strong> {{ $student->city ?? 'Not set' }}</p>
            <p><strong>Country:</strong> {{ $student->country ?? 'Not set' }}</p>
            <p><strong>Member since:</strong> {{ $student->created_at->format('F d, Y') }}</p>

            <form method="POST" action="{{ route('student.logout') }}">
                @csrf
                <button type="submit" class="btn btn-danger mt-3">Logout</button>
            </form>
        </div>
    </div>
</section>
@endsection
