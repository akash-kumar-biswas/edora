@extends('admin.layout')

@section('content')
    <h3>Dashboard for Admin: {{ $admin_name }}</h3>
    <div class="mt-4">
        <p><strong>Total Instructors:</strong> {{ $instructors }}</p>
        <p><strong>Total Students:</strong> {{ $students }}</p>
        <p><strong>Total Courses:</strong> {{ $courses }}</p>
    </div>
@endsection
