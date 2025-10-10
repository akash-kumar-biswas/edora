@extends('admin.layout')

@section('content')
    <div class="container-fluid">
        <!-- Header Section -->
        <div class="row mb-4">
            <div class="col-12">
                <h2 class="fw-bold">Dashboard</h2>
                <p class="text-muted">Welcome back, {{ $admin_name }}!</p>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="row g-4 mb-4">
            <!-- Total Students Card -->
            <div class="col-xl-3 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-muted mb-2">Total Students</h6>
                                <h2 class="fw-bold mb-0">{{ $students }}</h2>
                                <small class="text-success"><i class="bi bi-arrow-up"></i> 12% from last month</small>
                            </div>
                            <div class="bg-primary bg-opacity-10 rounded-circle p-3">
                                <i class="bi bi-people-fill text-primary fs-2"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Instructors Card -->
            <div class="col-xl-3 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-muted mb-2">Total Instructors</h6>
                                <h2 class="fw-bold mb-0">{{ $instructors }}</h2>
                                <small class="text-success"><i class="bi bi-arrow-up"></i> 5% from last month</small>
                            </div>
                            <div class="bg-success bg-opacity-10 rounded-circle p-3">
                                <i class="bi bi-person-badge-fill text-success fs-2"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Courses Card -->
            <div class="col-xl-3 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-muted mb-2">Total Courses</h6>
                                <h2 class="fw-bold mb-0">{{ $courses }}</h2>
                                <small class="text-success"><i class="bi bi-arrow-up"></i> 8% from last month</small>
                            </div>
                            <div class="bg-warning bg-opacity-10 rounded-circle p-3">
                                <i class="bi bi-book-fill text-warning fs-2"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Revenue Card -->
            <div class="col-xl-3 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-muted mb-2">Total Revenue</h6>
                                <h2 class="fw-bold mb-0">$45,230</h2>
                                <small class="text-danger"><i class="bi bi-arrow-down"></i> 3% from last month</small>
                            </div>
                            <div class="bg-info bg-opacity-10 rounded-circle p-3">
                                <i class="bi bi-cash-stack text-info fs-2"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts and Activity Section -->
        <div class="row g-4 mb-4">
            <!-- Enrollment Chart -->
            <div class="col-xl-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white border-0 py-3">
                        <h5 class="mb-0 fw-bold">Enrollment Overview</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="enrollmentChart" height="80"></canvas>
                    </div>
                </div>
            </div>

            <!-- Quick Stats -->
            <div class="col-xl-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white border-0 py-3">
                        <h5 class="mb-0 fw-bold">Quick Stats</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3 pb-3 border-bottom">
                            <div>
                                <p class="mb-1 text-muted">Active Courses</p>
                                <h4 class="mb-0 fw-bold">{{ $courses }}</h4>
                            </div>
                            <i class="bi bi-book text-primary fs-3"></i>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-3 pb-3 border-bottom">
                            <div>
                                <p class="mb-1 text-muted">Pending Approvals</p>
                                <h4 class="mb-0 fw-bold">8</h4>
                            </div>
                            <i class="bi bi-clock-history text-warning fs-3"></i>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-3 pb-3 border-bottom">
                            <div>
                                <p class="mb-1 text-muted">This Month Earnings</p>
                                <h4 class="mb-0 fw-bold">$12,450</h4>
                            </div>
                            <i class="bi bi-currency-dollar text-success fs-3"></i>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="mb-1 text-muted">New Enrollments</p>
                                <h4 class="mb-0 fw-bold">124</h4>
                            </div>
                            <i class="bi bi-person-plus text-info fs-3"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Activity and Popular Courses -->
        <div class="row g-4">
            <!-- Recent Enrollments -->
            <div class="col-xl-6">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white border-0 py-3">
                        <h5 class="mb-0 fw-bold">Recent Enrollments</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="bg-light">
                                    <tr>
                                        <th class="border-0">Student</th>
                                        <th class="border-0">Course</th>
                                        <th class="border-0">Date</th>
                                        <th class="border-0">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div
                                                    class="avatar-sm bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-2">
                                                    <span class="text-primary fw-bold">JD</span>
                                                </div>
                                                <span>John Doe</span>
                                            </div>
                                        </td>
                                        <td>Web Development</td>
                                        <td>Oct 10, 2025</td>
                                        <td><span class="badge bg-success">Active</span></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div
                                                    class="avatar-sm bg-success bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-2">
                                                    <span class="text-success fw-bold">SM</span>
                                                </div>
                                                <span>Sarah Miller</span>
                                            </div>
                                        </td>
                                        <td>Data Science</td>
                                        <td>Oct 09, 2025</td>
                                        <td><span class="badge bg-success">Active</span></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div
                                                    class="avatar-sm bg-warning bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-2">
                                                    <span class="text-warning fw-bold">MJ</span>
                                                </div>
                                                <span>Mike Johnson</span>
                                            </div>
                                        </td>
                                        <td>UI/UX Design</td>
                                        <td>Oct 09, 2025</td>
                                        <td><span class="badge bg-warning">Pending</span></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div
                                                    class="avatar-sm bg-info bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-2">
                                                    <span class="text-info fw-bold">EW</span>
                                                </div>
                                                <span>Emily Wilson</span>
                                            </div>
                                        </td>
                                        <td>Mobile App Dev</td>
                                        <td>Oct 08, 2025</td>
                                        <td><span class="badge bg-success">Active</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Popular Courses -->
            <div class="col-xl-6">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white border-0 py-3">
                        <h5 class="mb-0 fw-bold">Popular Courses</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="fw-medium">Web Development Bootcamp</span>
                                <span class="text-muted">450 students</span>
                            </div>
                            <div class="progress" style="height: 8px;">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 90%"
                                    aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="fw-medium">Data Science & ML</span>
                                <span class="text-muted">380 students</span>
                            </div>
                            <div class="progress" style="height: 8px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 76%"
                                    aria-valuenow="76" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="fw-medium">UI/UX Design Masterclass</span>
                                <span class="text-muted">290 students</span>
                            </div>
                            <div class="progress" style="height: 8px;">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 58%"
                                    aria-valuenow="58" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="fw-medium">Mobile App Development</span>
                                <span class="text-muted">245 students</span>
                            </div>
                            <div class="progress" style="height: 8px;">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 49%" aria-valuenow="49"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="mb-0">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="fw-medium">Digital Marketing</span>
                                <span class="text-muted">198 students</span>
                            </div>
                            <div class="progress" style="height: 8px;">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 40%" aria-valuenow="40"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart.js Script -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Enrollment Chart
        const ctx = document.getElementById('enrollmentChart').getContext('2d');
        const enrollmentChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
                datasets: [{
                    label: 'Enrollments',
                    data: [30, 45, 60, 50, 75, 90, 85, 100, 95, 124],
                    borderColor: 'rgb(13, 110, 253)',
                    backgroundColor: 'rgba(13, 110, 253, 0.1)',
                    tension: 0.4,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            display: true,
                            drawBorder: false
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });
    </script>

    <style>
        .avatar-sm {
            width: 35px;
            height: 35px;
            font-size: 0.875rem;
        }

        .card {
            transition: transform 0.2s;
        }

        .card:hover {
            transform: translateY(-5px);
        }
    </style>
@endsection