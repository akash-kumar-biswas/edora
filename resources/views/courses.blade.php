@extends('layouts.app')

@section('title', 'Courses')

@section('content')
<div class="container my-5">

    <!-- ✅ Page Header -->
    <div class="text-center mb-5">
        <h1 class="fw-bold">Available Courses</h1>
        <p class="text-muted">Browse through our curated list of high-quality courses and start learning today.</p>
    </div>

    <!-- ✅ Course List -->
    <div class="row g-4">
        @forelse($courses as $course)
            <div class="col-md-4">
                <div class="card h-100 shadow-sm course-card">
                    <!-- Course Thumbnail -->
                    @if($course->thumbnail_image)
                        <img src="{{ asset('storage/' . $course->thumbnail_image) }}" 
                             class="card-img-top" 
                             alt="{{ $course->title }}">
                    @else
                        <img src="{{ asset('images/default-course.jpg') }}" 
                             class="card-img-top" 
                             alt="Default Course">
                    @endif

                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $course->title }}</h5>

                        <p class="card-text text-muted small flex-grow-1">
                            {{ Str::limit($course->description, 100) }}
                        </p>

                        <div class="mb-2">
                            <span class="badge bg-secondary text-capitalize">{{ $course->difficulty ?? 'all levels' }}</span>
                            <span class="badge bg-info">{{ $course->type }}</span>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                @if($course->type === 'paid')
                                    <span class="fw-bold text-dark">${{ number_format($course->price, 2) }}</span>
                                    @if($course->old_price)
                                        <span class="text-muted text-decoration-line-through">
                                            ${{ number_format($course->old_price, 2) }}
                                        </span>
                                    @endif
                                @else
                                    <span class="fw-bold text-success">Free</span>
                                @endif
                            </div>

                            <a href="#" class="btn btn-sm btn-warning">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center py-5">
                <h5 class="text-muted">No courses available at the moment.</h5>
            </div>
        @endforelse
    </div>
</div>
@endsection
