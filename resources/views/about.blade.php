@extends('layouts.app')

@section('title', 'About Us')

@section('content')
<section class="py-5">
    <div class="container">
        <h1 class="mb-4 fw-bold text-center">About Us</h1>
        <div class="row align-items-center">
            <div class="col-md-6 mb-4 mb-md-0">
                <img src="{{ asset('frontend/dist/images/Contact/image.jpg') }}" class="img-fluid rounded shadow-sm" alt="About">
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
                <h3 class="fw-semibold mt-4 mb-3">Contact Us</h3>
                <p class="text-muted">
                    <strong>Address:</strong> 123 Main Street, Dhaka-1000<br>
                    <strong>Email:</strong> edora@learningplatform.com<br>
                    <strong>Phone:</strong> +880 1234 567 890
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Contact Form Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h2 class="fw-bold text-center mb-4">Get In Touch</h2>
                <form action="#">
                    <div class="row g-3">
                        <div class="col-lg-6">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" placeholder="Type here..." id="name" />
                        </div>
                        <div class="col-lg-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" placeholder="Type here..." id="email" />
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-12">
                            <label for="subject" class="form-label">Subject</label>
                            <input type="text" id="subject" class="form-control" placeholder="Type here..." />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="message" class="form-label">Message</label>
                            <textarea id="message" placeholder="Type here..." class="form-control" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-center">
                            <button type="submit" class="button button-lg button--primary fw-normal">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection