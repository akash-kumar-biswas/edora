@extends('layouts.app')

@section('title', $course->title)

@section('content')
<div class="container my-5">
    {{-- ✅ Success message --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card shadow-sm">
                {{-- ✅ Course Image --}}
                @if($course->image)
                    <img src="{{ asset('storage/' . $course->image) }}" class="card-img-top" alt="{{ $course->title }}">
                @else
                    <img src="{{ asset('images/default-course.jpg') }}" class="card-img-top" alt="Default Image">
                @endif

                <div class="card-body">
                    {{-- ✅ Title --}}
                    <h2 class="card-title fw-bold mb-3">{{ $course->title }}</h2>

                    {{-- ✅ Instructor --}}
                    <p class="text-muted mb-3">
                        @if($course->instructor)
                            Instructor: <strong>{{ $course->instructor->name }}</strong>
                        @else
                            <em>No instructor assigned</em>
                        @endif
                    </p>

                    {{-- ✅ Description --}}
                    <p class="mb-4">{{ $course->description }}</p>

                    {{-- ✅ Course Info --}}
                    <div class="mb-3">
                        <span class="badge bg-secondary">{{ ucfirst($course->difficulty ?? 'All Levels') }}</span>
                        <span class="badge bg-info text-capitalize">{{ $course->type }}</span>
                        <span class="badge bg-light text-dark">Duration: {{ $course->duration ?? 'N/A' }} hrs</span>
                    </div>

                    {{-- ✅ Price --}}
                    <h4 class="fw-bold mb-4">
                        @if($course->type === 'paid')
                            ${{ number_format($course->price, 2) }}
                        @else
                            <span class="text-success">Free</span>
                        @endif
                    </h4>

                    {{-- ✅ Add to Cart Button --}}
                    <form action="{{ route('cart.add', $course->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-warning btn-lg w-100">
                            🛒 Add to Cart
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
