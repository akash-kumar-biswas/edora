@extends('layouts.app')

@section('title', 'About Us')

@section('content')
<section class="py-5">
    <div class="container">
        <h1 class="mb-4 fw-bold text-center">About Us</h1>
        <div class="row align-items-center">
            <div class="col-md-6 mb-4 mb-md-0">
                <img src="https://via.placeholder.com/550x350" class="img-fluid rounded shadow-sm" alt="About">
            </div>
            <div class="col-md-6">
                <h3 class="fw-semibold mb-3">Who We Are</h3>
                <p class="text-muted">
                    We are an online learning platform dedicated to providing high-quality courses that help students and professionals upskill and grow in their careers.
                </p>
                <h3 class="fw-semibold mt-4 mb-3">Our Mission</h3>
                <p class="text-muted">
                    To make quality education accessible and affordable to everyone, empowering learners to achieve their goals and unlock new opportunities.
                </p>
            </div>
        </div>
    </div>
</section>
@endsection
