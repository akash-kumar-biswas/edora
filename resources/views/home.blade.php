@extends('layouts.app')
@section('title', 'Home')

@section('content')

    <!-- 🌟 Hero Banner -->
    <section class="main-banner text-light d-flex align-items-center"
        style="background-image: url('{{ asset('frontend/dist/images/banner/banner.jpg') }}');">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-7 mb-5 mb-lg-0">
                    <h1 class="fw-bold display-5 mb-3">Unlock Knowledge Anywhere, Anytime with Experts.</h1>
                    <p class="lead mb-4">Our commitment is to guide you to the finest online courses, offering expert
                        insights whenever and wherever you are.</p>
                    <form class="d-flex flex-column flex-md-row align-items-stretch banner-search">
                        <input type="text" class="form-control me-md-2 mb-3 mb-md-0 rounded-pill"
                            placeholder="What do you want to learn today...">
                        <button class="btn btn-warning text-dark rounded-pill px-4 fw-semibold">Search</button>
                    </form>
                </div>
                <!-- <div class="col-lg-5 text-center">
                    <img src="{{ asset('frontend/dist/images/banner/banner.jpg') }}" alt="Learning Image"
                        class="img-fluid hero-image rounded">
                </div> -->
            </div>
        </div>
    </section>

    <!-- 💡 Why You'll Learn With Edora -->
    <section class="py-5 bg-light text-center">
        <div class="container">
            <h2 class="fw-bold mb-5">Why You'll Learn with Edora</h2>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="cardFeature shadow-sm p-4 h-100">
                        <div class="feature-icon bg-success text-white mb-3">
                            <i class="bi bi-journal-text fs-3"></i>
                        </div>
                        <h5 class="fw-semibold">250k+ Online Courses</h5>
                        <p class="text-muted">Learn at your own pace with thousands of expert-created online courses
                            designed for real growth.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="cardFeature shadow-sm p-4 h-100">
                        <div class="feature-icon bg-primary text-white mb-3">
                            <i class="bi bi-person-badge fs-3"></i>
                        </div>
                        <h5 class="fw-semibold">Expert Instructors</h5>
                        <p class="text-muted">Our instructors are industry leaders who bring hands-on experience and modern
                            learning methods.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mx-auto">
                    <div class="cardFeature shadow-sm p-4 h-100">
                        <div class="feature-icon bg-danger text-white mb-3">
                            <i class="bi bi-clock-history fs-3"></i>
                        </div>
                        <h5 class="fw-semibold">Lifetime Access</h5>
                        <p class="text-muted">Access your purchased courses anytime, forever — review lessons whenever you
                            need to refresh your skills.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 📘 Learning Steps -->
    <section class="py-5 learning-section position-relative" style="background-color: #212529;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 order-2 order-lg-1 mt-4 mt-lg-0">
                    <h2 class="fw-bold mb-4">Edora Simple <br class="d-none d-md-block" /> Learning Steps</h2>
                    <div class="learning-step mb-4">
                        <div class="step-number">01</div>
                        <div>
                            <h6 class="fw-semibold mb-1">Make Your Own Place</h6>
                            <p class="text-muted mb-0">Create a personalized learning space that suits your study style and
                                pace.</p>
                        </div>
                    </div>
                    <div class="learning-step mb-4">
                        <div class="step-number">02</div>
                        <div>
                            <h6 class="fw-semibold mb-1">Find the Best Course</h6>
                            <p class="text-muted mb-0">Use our smart filters to discover the perfect course that fits your
                                goals.</p>
                        </div>
                    </div>
                    <div class="learning-step mb-4">
                        <div class="step-number">03</div>
                        <div>
                            <h6 class="fw-semibold mb-1">Become a Master</h6>
                            <p class="text-muted mb-0">Advance your career and become an expert by mastering the subjects
                                you love.</p>
                        </div>
                    </div>
                    <a href="#" class="btn btn-primary rounded-pill px-4 mt-3">Start Learning</a>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 text-center">
                    <div class="position-relative">
                        <img src="{{ asset('frontend/dist/images/steps.jpg') }}" alt="Learning Steps"
                            class="img-fluid rounded shadow-lg">
                        <!-- <img src="{{ asset('frontend/dist/images/shape/l03.png') }}" alt="Shape"
                            class="decor-shape shape-one">
                        <img src="{{ asset('frontend/dist/images/shape/l04.png') }}" alt="Shape"
                            class="decor-shape shape-two"> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style>
        .learning-section {
            color: whitesmoke;
        }
        .learning-section p {
            color: whitesmoke !important;
        }
    </style>

@endsection