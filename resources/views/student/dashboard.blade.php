<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard - EDORA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f0f2f5;
            min-height: 100vh;
        }

        /* Header Section */
        .dashboard-header {
            background: white;
            padding: 30px 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
        }

        .student-profile {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .student-avatar {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #4facfe;
            box-shadow: 0 4px 15px rgba(79, 172, 254, 0.3);
        }

        .student-info h2 {
            font-size: 1.75rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 5px;
        }

        .student-info p {
            color: #7f8c8d;
            font-size: 1rem;
            margin: 0;
        }

        .stats-badges {
            display: flex;
            gap: 30px;
            align-items: center;
        }

        .stat-badge {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }

        .stat-icon.enrolled {
            background: rgba(79, 172, 254, 0.1);
            color: #4facfe;
        }

        .stat-icon.completed {
            background: rgba(67, 233, 123, 0.1);
            color: #43e97b;
        }

        .stat-info h3 {
            font-size: 2rem;
            font-weight: 700;
            color: #2c3e50;
            margin: 0;
        }

        .stat-info p {
            font-size: 0.9rem;
            color: #95a5a6;
            margin: 0;
        }

        /* Navigation Tabs */
        .dashboard-nav {
            background: white;
            border-radius: 10px;
            padding: 0;
            margin-bottom: 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            overflow: hidden;
        }

        .nav-tabs {
            border: none;
            padding: 0 20px;
        }

        .nav-tabs .nav-link {
            border: none;
            color: #7f8c8d;
            font-weight: 600;
            padding: 20px 25px;
            transition: all 0.3s ease;
            position: relative;
        }

        .nav-tabs .nav-link:hover {
            color: #4facfe;
            background: transparent;
        }

        .nav-tabs .nav-link.active {
            color: #4facfe;
            background: transparent;
            border-bottom: 3px solid #4facfe;
        }

        /* Course Cards */
        .courses-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 30px;
            margin-bottom: 40px;
        }

        .course-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .course-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .course-image {
            width: 100%;
            height: 220px;
            object-fit: cover;
            border-bottom: 1px solid #ecf0f1;
        }

        .course-content {
            padding: 25px;
        }

        .course-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 15px;
            line-height: 1.4;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .course-instructor {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 20px;
        }

        .instructor-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #4facfe;
        }

        .instructor-name {
            font-size: 0.95rem;
            color: #34495e;
            font-weight: 500;
        }

        .progress-section {
            margin-bottom: 20px;
        }

        .progress-label {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
        }

        .progress-label span {
            font-size: 0.9rem;
            color: #7f8c8d;
            font-weight: 600;
        }

        .progress-label .progress-percentage {
            color: #4facfe;
            font-weight: 700;
        }

        .progress {
            height: 8px;
            border-radius: 10px;
            background: #ecf0f1;
            overflow: hidden;
        }

        .progress-bar {
            background: linear-gradient(90deg, #4facfe 0%, #00f2fe 100%);
            border-radius: 10px;
            transition: width 0.6s ease;
        }

        .watch-course-btn {
            width: 100%;
            padding: 12px;
            background: transparent;
            border: 2px solid #4facfe;
            color: #4facfe;
            font-weight: 600;
            font-size: 1rem;
            border-radius: 10px;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .watch-course-btn:hover {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            color: white;
            border-color: transparent;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(79, 172, 254, 0.4);
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 80px 20px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
        }

        .empty-state i {
            font-size: 5rem;
            color: #bdc3c7;
            margin-bottom: 20px;
        }

        .empty-state h3 {
            color: #7f8c8d;
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .empty-state p {
            color: #95a5a6;
            font-size: 1rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .courses-grid {
                grid-template-columns: 1fr;
            }

            .stats-badges {
                flex-direction: column;
                gap: 15px;
                align-items: flex-start;
            }

            .student-profile {
                flex-direction: column;
                text-align: center;
            }

            .nav-tabs {
                overflow-x: auto;
                flex-wrap: nowrap;
            }

            .nav-tabs .nav-link {
                white-space: nowrap;
                padding: 15px 20px;
            }
        }
    </style>
</head>

<body>
    <!-- Header Section -->
    <div class="dashboard-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="student-profile">
                        <img src="{{ $student->image ? asset('uploads/students/' . $student->image) : 'https://ui-avatars.com/api/?name=' . urlencode($student->name) . '&size=90&background=4facfe&color=fff' }}"
                            alt="{{ $student->name }}" class="student-avatar">
                        <div class="student-info">
                            <h2>{{ $student->name }}</h2>
                            <p>Web Developer</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="stats-badges justify-content-lg-end mt-4 mt-lg-0">
                        <div class="stat-badge">
                            <div class="stat-icon enrolled">
                                <i class="bi bi-book"></i>
                            </div>
                            <div class="stat-info">
                                <h3>{{ $enrolledCount }}</h3>
                                <p>Enrolled Courses</p>
                            </div>
                        </div>
                        <div class="stat-badge">
                            <div class="stat-icon completed">
                                <i class="bi bi-shield-check"></i>
                            </div>
                            <div class="stat-info">
                                <h3>{{ $completedCount }}</h3>
                                <p>Completed Courses</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation Tabs -->
    <div class="container">
        <div class="dashboard-nav">
            <ul class="nav nav-tabs" id="dashboardTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="dashboard-tab" data-bs-toggle="tab" data-bs-target="#dashboard"
                        type="button" role="tab">Dashboard</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="all-courses-tab" data-bs-toggle="tab"
                        data-bs-target="#all-courses" type="button" role="tab">All Courses</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="active-courses-tab" data-bs-toggle="tab"
                        data-bs-target="#active-courses" type="button" role="tab">Active Courses</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="completed-courses-tab" data-bs-toggle="tab"
                        data-bs-target="#completed-courses" type="button" role="tab">Completed Courses</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="purchase-history-tab" data-bs-toggle="tab"
                        data-bs-target="#purchase-history" type="button" role="tab">Purchase History</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                        type="button" role="tab">Profile</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button"
                        role="tab">Home</button>
                </li>
            </ul>
        </div>

        <!-- Tab Content -->
        <div class="tab-content" id="dashboardTabsContent">
            <!-- All Courses Tab -->
            <div class="tab-pane fade show active" id="all-courses" role="tabpanel">
                @if($allCourses->count() > 0)
                    <div class="courses-grid">
                        @foreach($allCourses as $course)
                            <div class="course-card">
                                <img src="{{ $course->image ? asset('uploads/courses/' . $course->image) : 'https://via.placeholder.com/400x220/4facfe/ffffff?text=Course+Image' }}"
                                    alt="{{ $course->title }}" class="course-image">
                                <div class="course-content">
                                    <h3 class="course-title">{{ $course->title }}</h3>

                                    <div class="course-instructor">
                                        <img src="{{ $course->instructor->image ? asset('uploads/instructors/' . $course->instructor->image) : 'https://ui-avatars.com/api/?name=' . urlencode($course->instructor->name) . '&size=40&background=4facfe&color=fff' }}"
                                            alt="{{ $course->instructor->name }}" class="instructor-avatar">
                                        <span class="instructor-name">{{ $course->instructor->name }}</span>
                                    </div>

                                    <div class="progress-section">
                                        <div class="progress-label">
                                            <span>Progress</span>
                                            <span class="progress-percentage">{{ $course->progress }}% Finish</span>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: {{ $course->progress }}%"
                                                aria-valuenow="{{ $course->progress }}" aria-valuemin="0" aria-valuemax="100">
                                            </div>
                                        </div>
                                    </div>

                                    <form action="{{ route('student.dashboard') }}" method="GET">
                                        <button type="submit" class="watch-course-btn">
                                            Watch Course
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="empty-state">
                        <i class="bi bi-inbox"></i>
                        <h3>No Courses Enrolled</h3>
                        <p>You haven't enrolled in any courses yet. Start learning today!</p>
                    </div>
                @endif
            </div>

            <!-- Other Tabs (Placeholder for now) -->
            <div class="tab-pane fade" id="dashboard" role="tabpanel">
                <div class="empty-state">
                    <i class="bi bi-speedometer2"></i>
                    <h3>Dashboard Overview</h3>
                    <p>Dashboard content coming soon...</p>
                </div>
            </div>

            <div class="tab-pane fade" id="active-courses" role="tabpanel">
                <div class="empty-state">
                    <i class="bi bi-play-circle"></i>
                    <h3>Active Courses</h3>
                    <p>Active courses content coming soon...</p>
                </div>
            </div>

            <div class="tab-pane fade" id="completed-courses" role="tabpanel">
                <div class="empty-state">
                    <i class="bi bi-check-circle"></i>
                    <h3>Completed Courses</h3>
                    <p>Completed courses content coming soon...</p>
                </div>
            </div>

            <div class="tab-pane fade" id="purchase-history" role="tabpanel">
                <div class="empty-state">
                    <i class="bi bi-receipt"></i>
                    <h3>Purchase History</h3>
                    <p>Purchase history content coming soon...</p>
                </div>
            </div>

            <div class="tab-pane fade" id="profile" role="tabpanel">
                <div class="empty-state">
                    <i class="bi bi-person-circle"></i>
                    <h3>Profile Settings</h3>
                    <p>Profile settings content coming soon...</p>
                </div>
            </div>

            <div class="tab-pane fade" id="home" role="tabpanel">
                <div class="empty-state">
                    <i class="bi bi-house-door"></i>
                    <h3>Home</h3>
                    <p>Home content coming soon...</p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>