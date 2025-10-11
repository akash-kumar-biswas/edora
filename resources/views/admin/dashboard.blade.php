@extends('admin.layout')

@section('content')
    <div class="container-fluid">
        <!-- Header Section -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h1 class="fw-bold mb-1"
                            style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                            Dashboard Overview
                        </h1>
                        <p class="text-muted mb-0">
                            <i class="bi bi-hand-thumbs-up-fill me-2"></i>Welcome back, <strong>{{ $admin_name }}</strong>!
                            <span class="ms-2 text-muted">|</span>
                            <i class="bi bi-calendar3 ms-2 me-1"></i>{{ date('l, F d, Y') }}
                        </p>
                    </div>
                    <div>
                        <a href="{{ route('admin.export') }}" class="btn btn-outline-primary btn-sm">
                            <i class="bi bi-download me-1"></i>Export Report
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Cards Row -->
        <div class="row g-4 mb-4">
            <!-- Total Students Card -->
            <div class="col-xl-3 col-md-6">
                <div class="card border-0 shadow-sm h-100 stats-card"
                    style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                    <div class="card-body text-white position-relative overflow-hidden">
                        <div class="position-absolute top-0 end-0 p-3 opacity-25">
                            <i class="bi bi-people-fill text-white" style="font-size: 5rem;"></i>
                        </div>
                        <div class="position-relative">
                            <div class="d-flex align-items-center mb-3">
                                <div class="icon-box rounded-circle bg-white bg-opacity-25 p-3 me-3">
                                    <i class="bi bi-people-fill text-white fs-4"></i>
                                </div>
                                <div>
                                    <p class="mb-0 text-white small" style="opacity: 0.9;">Total Students</p>
                                    <h2 class="fw-bold mb-0 text-white">{{ $totalStudents }}</h2>
                                </div>
                            </div>
                            <div
                                class="d-flex justify-content-between align-items-center mt-3 pt-3 border-top border-white border-opacity-25">
                                <span class="small text-white">
                                    <i class="bi bi-check-circle-fill me-1 text-white"></i>{{ $activeStudents }} Active
                                </span>
                                <span class="small text-white" style="opacity: 0.85;">
                                    {{ $totalStudents - $activeStudents }} Inactive
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Instructors Card -->
            <div class="col-xl-3 col-md-6">
                <div class="card border-0 shadow-sm h-100 stats-card"
                    style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                    <div class="card-body text-white position-relative overflow-hidden">
                        <div class="position-absolute top-0 end-0 p-3 opacity-25">
                            <i class="bi bi-person-badge-fill text-white" style="font-size: 5rem;"></i>
                        </div>
                        <div class="position-relative">
                            <div class="d-flex align-items-center mb-3">
                                <div class="icon-box rounded-circle bg-white bg-opacity-25 p-3 me-3">
                                    <i class="bi bi-person-badge-fill text-white fs-4"></i>
                                </div>
                                <div>
                                    <p class="mb-0 text-white small" style="opacity: 0.9;">Total Instructors</p>
                                    <h2 class="fw-bold mb-0 text-white">{{ $totalInstructors }}</h2>
                                </div>
                            </div>
                            <div
                                class="d-flex justify-content-between align-items-center mt-3 pt-3 border-top border-white border-opacity-25">
                                <span class="small text-white">
                                    <i class="bi bi-check-circle-fill me-1 text-white"></i>{{ $activeInstructors }} Active
                                </span>
                                <span class="small text-white" style="opacity: 0.85;">
                                    {{ $totalInstructors - $activeInstructors }} Inactive
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Courses Card -->
            <div class="col-xl-3 col-md-6">
                <div class="card border-0 shadow-sm h-100 stats-card"
                    style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                    <div class="card-body text-white position-relative overflow-hidden">
                        <div class="position-absolute top-0 end-0 p-3 opacity-25">
                            <i class="bi bi-book-fill text-white" style="font-size: 5rem;"></i>
                        </div>
                        <div class="position-relative">
                            <div class="d-flex align-items-center mb-3">
                                <div class="icon-box rounded-circle bg-white bg-opacity-25 p-3 me-3">
                                    <i class="bi bi-book-fill text-white fs-4"></i>
                                </div>
                                <div>
                                    <p class="mb-0 text-white small" style="opacity: 0.9;">Total Courses</p>
                                    <h2 class="fw-bold mb-0 text-white">{{ $totalCourses }}</h2>
                                </div>
                            </div>
                            <div
                                class="d-flex justify-content-between align-items-center mt-3 pt-3 border-top border-white border-opacity-25">
                                <span class="small text-white">
                                    <i class="bi bi-check-circle-fill me-1 text-white"></i>{{ $activeCourses }} Active
                                </span>
                                <span class="small text-white" style="opacity: 0.85;">
                                    {{ $pendingCourses }} Pending
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Enrollments Card -->
            <div class="col-xl-3 col-md-6">
                <div class="card border-0 shadow-sm h-100 stats-card"
                    style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);">
                    <div class="card-body text-white position-relative overflow-hidden">
                        <div class="position-absolute top-0 end-0 p-3 opacity-25">
                            <i class="bi bi-clipboard-check-fill text-white" style="font-size: 5rem;"></i>
                        </div>
                        <div class="position-relative">
                            <div class="d-flex align-items-center mb-3">
                                <div class="icon-box rounded-circle bg-white bg-opacity-25 p-3 me-3">
                                    <i class="bi bi-clipboard-check-fill text-white fs-4"></i>
                                </div>
                                <div>
                                    <p class="mb-0 text-white small" style="opacity: 0.9;">Total Enrollments</p>
                                    <h2 class="fw-bold mb-0 text-white">{{ $totalEnrollments }}</h2>
                                </div>
                            </div>
                            <div
                                class="d-flex justify-content-between align-items-center mt-3 pt-3 border-top border-white border-opacity-25">
                                <span class="small text-white">
                                    <i class="bi bi-calendar-check me-1 text-white"></i>All Time
                                </span>
                                <span class="small text-white" style="opacity: 0.85;">
                                    <i class="bi bi-graph-up me-1 text-white"></i>Growing
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Revenue Cards Row -->
        <div class="row g-4 mb-4">
            <!-- Total Revenue Card -->
            <div class="col-xl-6">
                <div class="card border-0 shadow-sm h-100 revenue-card"
                    style="background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);">
                    <div class="card-body text-white position-relative overflow-hidden">
                        <div class="position-absolute" style="top: -20px; right: -20px; font-size: 10rem; opacity: 0.1;">
                            <i class="bi bi-cash-stack"></i>
                        </div>
                        <div class="position-relative">
                            <div class="d-flex align-items-start justify-content-between">
                                <div>
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="icon-box rounded-circle bg-white bg-opacity-25 p-3 me-3">
                                            <i class="bi bi-cash-stack fs-3"></i>
                                        </div>
                                        <div>
                                            <p class="mb-1 opacity-75">Total Revenue</p>
                                            <h1 class="fw-bold mb-0 display-5">${{ number_format($totalRevenue, 2) }}</h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="badge bg-white bg-opacity-25 px-3 py-2">
                                    <i class="bi bi-arrow-up-right me-1"></i>All Time
                                </div>
                            </div>
                            <div class="row mt-4 pt-3 border-top border-white border-opacity-25">
                                <div class="col-6">
                                    <p class="mb-1 small opacity-75">Total Payments</p>
                                    <h5 class="mb-0 fw-bold">{{ App\Models\Payment::count() }}</h5>
                                </div>
                                <div class="col-6">
                                    <p class="mb-1 small opacity-75">Avg. Transaction</p>
                                    <h5 class="mb-0 fw-bold">
                                        ${{ App\Models\Payment::count() > 0 ? number_format($totalRevenue / App\Models\Payment::count(), 2) : '0.00' }}
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- This Month Revenue Card -->
            <div class="col-xl-6">
                <div class="card border-0 shadow-sm h-100 revenue-card"
                    style="background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);">
                    <div class="card-body text-dark position-relative overflow-hidden">
                        <div class="position-absolute" style="top: -20px; right: -20px; font-size: 10rem; opacity: 0.1;">
                            <i class="bi bi-graph-up-arrow"></i>
                        </div>
                        <div class="position-relative">
                            <div class="d-flex align-items-start justify-content-between">
                                <div>
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="icon-box rounded-circle bg-white bg-opacity-50 p-3 me-3">
                                            <i class="bi bi-graph-up-arrow fs-3 text-primary"></i>
                                        </div>
                                        <div>
                                            <p class="mb-1 text-muted">This Month Revenue</p>
                                            <h1 class="fw-bold mb-0 display-5 text-dark">
                                                ${{ number_format($thisMonthRevenue, 2) }}</h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="badge bg-primary px-3 py-2">
                                    <i class="bi bi-calendar-month me-1"></i>{{ date('F Y') }}
                                </div>
                            </div>
                            <div class="row mt-4 pt-3 border-top border-dark border-opacity-10">
                                <div class="col-6">
                                    <p class="mb-1 small text-muted">This Month Payments</p>
                                    <h5 class="mb-0 fw-bold text-dark">
                                        {{ App\Models\Payment::whereYear('created_at', date('Y'))->whereMonth('created_at', date('m'))->count() }}
                                    </h5>
                                </div>
                                <div class="col-6">
                                    <p class="mb-1 small text-muted">Growth</p>
                                    <h5 class="mb-0 fw-bold text-success">
                                        <i class="bi bi-arrow-up"></i>12.5%
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4 mb-4">
            <div class="col-xl-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white border-0 py-3">
                        <h5 class="mb-0 fw-bold">Enrollment Trends</h5>
                        <small class="text-muted">Last 6 months (monthly) + {{ date('F Y') }} (daily)</small>
                    </div>
                    <div class="card-body">
                        <canvas id="enrollmentChart" height="80"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <!-- Recent Enrollments -->
            <div class="col-xl-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-gradient text-white py-3 d-flex justify-content-between align-items-center"
                        style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                        <div>
                            <h5 class="mb-0 fw-bold">
                                <i class="bi bi-clock-history me-2"></i>Recent Enrollments
                            </h5>
                            <small class="opacity-75">Latest student enrollments</small>
                        </div>
                        <a href="{{ route('admin.enrollments.index') }}" class="btn btn-sm btn-light">
                            <i class="bi bi-arrow-right"></i> View All
                        </a>
                    </div>
                    <div class="card-body p-0">
                        <div class="list-group list-group-flush">
                            @forelse($recentEnrollments as $enrollment)
                                <div class="list-group-item border-0 py-3">
                                    <div class="d-flex align-items-start">
                                        <!-- Student Avatar -->
                                        <div class="flex-shrink-0">
                                            @if($enrollment->student && $enrollment->student->image)
                                                <img src="{{ asset('uploads/students/' . $enrollment->student->image) }}"
                                                    alt="{{ $enrollment->student->name }}" class="rounded-circle"
                                                    style="width: 50px; height: 50px; object-fit: cover; border: 3px solid #f0f0f0;">
                                            @else
                                                <div class="rounded-circle d-flex align-items-center justify-content-center"
                                                    style="width: 50px; height: 50px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border: 3px solid #f0f0f0;">
                                                    <span class="text-white fw-bold">
                                                        {{ $enrollment->student ? strtoupper(substr($enrollment->student->name, 0, 2)) : '?' }}
                                                    </span>
                                                </div>
                                            @endif
                                        </div>

                                        <!-- Enrollment Details -->
                                        <div class="flex-grow-1 ms-3">
                                            <div class="d-flex justify-content-between align-items-start">
                                                <div>
                                                    <h6 class="mb-1 fw-bold">{{ $enrollment->student->name ?? 'N/A' }}</h6>
                                                    <p class="mb-1 text-muted small">
                                                        <i class="bi bi-book-fill text-primary me-1"></i>
                                                        {{ $enrollment->course->title ?? 'N/A' }}
                                                    </p>
                                                </div>
                                                <span class="badge bg-light text-dark border">
                                                    <i class="bi bi-calendar3 me-1"></i>
                                                    {{ $enrollment->created_at->format('M d') }}
                                                </span>
                                            </div>
                                            <div class="mt-2">
                                                <small class="text-muted">
                                                    <i class="bi bi-clock me-1"></i>
                                                    {{ $enrollment->created_at->diffForHumans() }}
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center py-5">
                                    <i class="bi bi-inbox text-muted" style="font-size: 3rem;"></i>
                                    <p class="text-muted mt-3 mb-0">No enrollments found</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                    @if($recentEnrollments->count() > 0)
                        <div class="card-footer bg-light border-0 text-center py-3">
                            <a href="{{ route('admin.enrollments.index') }}" class="text-decoration-none fw-semibold">
                                View All Enrollments <i class="bi bi-arrow-right ms-1"></i>
                            </a>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Popular Courses -->
            <div class="col-xl-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-gradient text-white py-3 d-flex justify-content-between align-items-center"
                        style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                        <div>
                            <h5 class="mb-0 fw-bold">
                                <i class="bi bi-trophy-fill me-2"></i>Popular Courses
                            </h5>
                            <small class="opacity-75">Top courses by enrollment</small>
                        </div>
                        <a href="{{ route('admin.courses.index') }}" class="btn btn-sm btn-light">
                            <i class="bi bi-arrow-right"></i> View All
                        </a>
                    </div>
                    <div class="card-body">
                        @forelse($popularCourses as $index => $course)
                            <div class="mb-4 {{ $loop->last ? 'mb-0' : '' }}">
                                <div class="d-flex align-items-center mb-2">
                                    <!-- Rank Badge -->
                                    <div class="flex-shrink-0 me-3">
                                        @if($index === 0)
                                            <div class="badge rounded-circle p-2"
                                                style="width: 40px; height: 40px; background: linear-gradient(135deg, #FFD700 0%, #FFA500 100%); font-size: 1.1rem;">
                                                <i class="bi bi-trophy-fill"></i>
                                            </div>
                                        @elseif($index === 1)
                                            <div class="badge rounded-circle p-2"
                                                style="width: 40px; height: 40px; background: linear-gradient(135deg, #C0C0C0 0%, #A9A9A9 100%); font-size: 1.1rem;">
                                                #2
                                            </div>
                                        @elseif($index === 2)
                                            <div class="badge rounded-circle p-2"
                                                style="width: 40px; height: 40px; background: linear-gradient(135deg, #CD7F32 0%, #B8860B 100%); font-size: 1.1rem;">
                                                #3
                                            </div>
                                        @else
                                            <div class="badge rounded-circle bg-light text-dark p-2"
                                                style="width: 40px; height: 40px; font-size: 1.1rem;">
                                                #{{ $index + 1 }}
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Course Info -->
                                    <div class="flex-grow-1">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <div class="flex-grow-1 me-2">
                                                <h6 class="mb-1 fw-bold">{{ $course->title }}</h6>
                                                <div class="d-flex align-items-center gap-2">
                                                    <span class="badge bg-primary">
                                                        <i class="bi bi-people-fill me-1"></i>
                                                        {{ $course->students_count }}
                                                        {{ Str::plural('student', $course->students_count) }}
                                                    </span>
                                                    @if($course->type == 'free')
                                                        <span class="badge bg-success">
                                                            <i class="bi bi-gift-fill me-1"></i>Free
                                                        </span>
                                                    @else
                                                        <span class="badge bg-warning text-dark">
                                                            <i class="bi bi-cash me-1"></i>${{ number_format($course->price, 2) }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Progress Bar -->
                                        <div class="mt-2">
                                            @php
                                                $maxEnrollments = $popularCourses->max('students_count');
                                                $percentage = $maxEnrollments > 0 ? ($course->students_count / $maxEnrollments) * 100 : 0;
                                                $colors = [
                                                    ['from' => '#667eea', 'to' => '#764ba2'],
                                                    ['from' => '#f093fb', 'to' => '#f5576c'],
                                                    ['from' => '#4facfe', 'to' => '#00f2fe'],
                                                    ['from' => '#43e97b', 'to' => '#38f9d7'],
                                                    ['from' => '#fa709a', 'to' => '#fee140']
                                                ];
                                                $color = $colors[$index % count($colors)];
                                            @endphp
                                            <div class="progress" style="height: 8px; background-color: #f0f0f0;">
                                                <div class="progress-bar" role="progressbar"
                                                    style="width: {{ $percentage }}%; background: linear-gradient(90deg, {{ $color['from'] }} 0%, {{ $color['to'] }} 100%);"
                                                    aria-valuenow="{{ $percentage }}" aria-valuemin="0" aria-valuemax="100">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-5">
                                <i class="bi bi-book text-muted" style="font-size: 3rem;"></i>
                                <p class="text-muted mt-3 mb-0">No courses found</p>
                            </div>
                        @endforelse
                    </div>
                    @if($popularCourses->count() > 0)
                        <div class="card-footer bg-light border-0 text-center py-3">
                            <a href="{{ route('admin.courses.index') }}" class="text-decoration-none fw-semibold">
                                View All Courses <i class="bi bi-arrow-right ms-1"></i>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('enrollmentChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! json_encode($monthLabels) !!},
                datasets: [{
                    label: 'Enrollments',
                    data: {!! json_encode($monthCounts) !!},
                    borderColor: 'rgb(13, 110, 253)',
                    backgroundColor: 'rgba(13, 110, 253, 0.1)',
                    tension: 0.3,
                    fill: true,
                    pointRadius: 3,
                    pointHoverRadius: 6,
                    pointBackgroundColor: 'rgb(13, 110, 253)',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                    segment: {
                        borderDash: ctx => {
                            // Add visual separation between monthly and daily data
                            const labels = {!! json_encode($monthLabels) !!};
                            const currentIndex = ctx.p0DataIndex;
                            // If transitioning from month format to day format, use dashed line
                            if (currentIndex > 0 && labels[currentIndex - 1].includes(' 2') && labels[currentIndex].includes(' ')) {
                                const prevHasYear = /\d{4}/.test(labels[currentIndex - 1]);
                                const currIsDay = /\d{1,2}$/.test(labels[currentIndex]);
                                if (prevHasYear && currIsDay) {
                                    return [5, 5];
                                }
                            }
                            return undefined;
                        }
                    }
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                interaction: {
                    mode: 'index',
                    intersect: false,
                },
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function (context) {
                                return 'Enrollments: ' + context.parsed.y;
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1,
                            precision: 0
                        },
                        title: {
                            display: true,
                            text: 'Number of Enrollments'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Previous Months (Monthly) → Current Month (Daily)'
                        },
                        ticks: {
                            maxRotation: 45,
                            minRotation: 45,
                            autoSkip: true,
                            maxTicksLimit: 20
                        }
                    }
                }
            }
        });
    </script>

    <style>
        /* Global Card Animations */
        .card {
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15) !important;
        }

        /* Stats Cards Special Effects */
        .stats-card {
            position: relative;
            overflow: hidden;
        }

        .stats-card::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.17), transparent);
            transform: rotate(45deg);
            transition: all 0.5s ease;
        }

        .stats-card:hover::before {
            animation: shimmer 2s infinite;
        }

        @keyframes shimmer {
            0% {
                transform: translateX(-100%) rotate(45deg);
            }

            100% {
                transform: translateX(100%) rotate(45deg);
            }
        }

        /* Icon Box Animation */
        .icon-box {
            transition: all 0.3s ease;
        }

        .stats-card:hover .icon-box {
            transform: scale(1.1) rotate(5deg);
        }

        /* Revenue Cards Pulse Effect */
        .revenue-card {
            position: relative;
            overflow: hidden;
        }

        .revenue-card::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.06);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .revenue-card:hover::after {
            width: 300px;
            height: 300px;
        }

        /* Header Gradient Text */
        .gradient-text {
            background: linear-gradient(135deg, #2245e0ff 0%, #9a7ab9ff 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* List Group Items Hover */
        .list-group-item {
            transition: all 0.2s ease;
        }

        .list-group-item:hover {
            background-color: #5c86b1ff;
            transform: translateX(5px);
        }

        /* Gradient Headers */
        .bg-gradient {
            position: relative;
            overflow: hidden;
        }

        .bg-gradient::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            bottom: -50%;
            left: -50%;
            background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            transform: rotate(45deg);
            animation: shimmer 3s infinite;
        }

        /* Progress Bar Animation */
        .progress-bar {
            transition: width 1s ease-in-out;
            animation: progressAnimation 1.5s ease-in-out;
        }

        @keyframes progressAnimation {
            0% {
                width: 0;
            }
        }

        /* Badge Animations */
        .badge {
            transition: all 0.2s ease;
        }

        .badge:hover {
            transform: scale(1.05);
        }

        /* Rank Badge Glow Effect */
        .badge.rounded-circle {
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Empty State Icons */
        .bi-inbox,
        .bi-book {
            opacity: 0.3;
        }

        /* Card Footer Links */
        .card-footer a {
            transition: all 0.2s ease;
        }

        .card-footer a:hover {
            color: #0d6efd !important;
            transform: translateX(5px);
            display: inline-block;
        }

        /* Student Avatar Border Animation */
        .rounded-circle {
            transition: all 0.3s ease;
        }

        .list-group-item:hover .rounded-circle {
            transform: scale(1.1);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        /* Number Counter Animation */
        @keyframes countUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .stats-card h2,
        .revenue-card h1 {
            animation: countUp 0.6s ease-out;
        }

        /* Button Hover Effects */
        .btn {
            transition: all 0.3s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        /* Floating Animation for Icons */
        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        .stats-card:hover i {
            animation: float 2s ease-in-out infinite;
        }

        /* Border Gradient Animation */
        .border-top {
            animation: borderGlow 2s ease-in-out infinite;
        }

        @keyframes borderGlow {

            0%,
            100% {
                opacity: 0.25;
            }

            50% {
                opacity: 0.5;
            }
        }
    </style>
@endsection