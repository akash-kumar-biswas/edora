@extends('layouts.instructor')

@section('title', 'Instructor Dashboard')

@section('content')
<div class="container my-5">
    <h2>Welcome, {{ $instructor_name }}</h2>

    <h4 class="mt-4">Your Courses</h4>
    @if($courses->isEmpty())
        <p>You have not created any courses yet.</p>
    @else
        <ul class="list-group">
            @foreach($courses as $course)
                <li class="list-group-item">
                    {{ $course->title }} ({{ ucfirst($course->type) }})
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
