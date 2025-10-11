<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Sidebar Gradient Background */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 260px;
            height: 100vh;
            background: linear-gradient(180deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            box-shadow: 4px 0 20px rgba(0, 0, 0, 0.1);
            padding: 0;
            overflow-y: auto;
            z-index: 1000;
        }

        /* Custom Scrollbar */
        .sidebar::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.05);
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 10px;
        }

        .sidebar::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        /* Logo Section */
        .sidebar-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 1.5rem 1rem;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar-header h4 {
            color: white;
            margin: 0;
            font-size: 1.5rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .sidebar-header p {
            color: rgba(255, 255, 255, 0.8);
            margin: 0.3rem 0 0 0;
            font-size: 0.75rem;
        }

        /* Navigation Menu */
        .sidebar-nav {
            padding: 1.5rem 0;
        }

        .nav-item {
            margin-bottom: 0.3rem;
            padding: 0 1rem;
        }

        .sidebar .nav-link {
            color: rgba(255, 255, 255, 0.8);
            padding: 0.9rem 1.2rem;
            display: flex;
            align-items: center;
            border-radius: 10px;
            transition: all 0.3s ease;
            font-weight: 500;
            font-size: 0.95rem;
            position: relative;
            overflow: hidden;
        }

        .sidebar .nav-link i {
            font-size: 1.3rem;
            margin-right: 1rem;
            width: 25px;
            text-align: center;
            transition: all 0.3s ease;
        }

        .sidebar .nav-link::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 4px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            transform: scaleY(0);
            transition: transform 0.3s ease;
        }

        .sidebar .nav-link:hover {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            transform: translateX(5px);
        }

        .sidebar .nav-link:hover::before {
            transform: scaleY(1);
        }

        .sidebar .nav-link:hover i {
            transform: scale(1.2);
            color: #667eea;
        }

        .sidebar .nav-link.active {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }

        .sidebar .nav-link.active i {
            color: white;
        }

        .sidebar .nav-link.active::before {
            transform: scaleY(1);
        }

        /* Menu Section Divider */
        .menu-divider {
            height: 1px;
            background: rgba(255, 255, 255, 0.1);
            margin: 1rem 1.5rem;
        }

        .menu-label {
            color: rgba(255, 255, 255, 0.5);
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 0.5rem 1.5rem;
            margin-top: 1rem;
        }

        /* Logout Button */
        .logout-section {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 1rem;
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .logout-section .nav-link {
            color: white;
            background: rgba(0, 0, 0, 0.2);
            justify-content: center;
            font-weight: 600;
        }

        .logout-section .nav-link:hover {
            background: rgba(0, 0, 0, 0.3);
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }

        .logout-section .nav-link:hover::before {
            display: none;
        }

        /* Main content shifts right */
        .content-wrapper {
            margin-left: 260px;
            padding: 30px;
            min-height: 100vh;
            background: #f8f9fa;
        }

        /* Badge for active count */
        .nav-badge {
            margin-left: auto;
            background: rgba(255, 255, 255, 0.2);
            padding: 0.2rem 0.6rem;
            border-radius: 15px;
            font-size: 0.7rem;
            font-weight: 600;
        }

        /* Hover Animation */
        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }
        }

        .sidebar .nav-link.active {
            animation: pulse 2s infinite;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Logo/Header Section -->
        <div class="sidebar-header">
            <h4><i class="bi bi-mortarboard-fill"></i> EDORA</h4>
            <p>Admin Dashboard</p>
        </div>

        <!-- Navigation Menu -->
        <ul class="nav flex-column sidebar-nav">
            <!-- Main Menu Label -->
            <div class="menu-label">Main Menu</div>

            <!-- Dashboard -->
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}"
                    href="{{ url('/admin/dashboard') }}">
                    <i class="bi bi-speedometer2"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Menu Divider -->
            <div class="menu-divider"></div>

            <!-- Management Section Label -->
            <div class="menu-label">Management</div>

            <!-- Instructors -->
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/instructors*') ? 'active' : '' }}"
                    href="{{ route('admin.instructors.index') }}">
                    <i class="bi bi-person-badge"></i>
                    <span>Instructors</span>
                </a>
            </li>

            <!-- Students -->
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/students*') ? 'active' : '' }}"
                    href="{{ route('admin.students.index') }}">
                    <i class="bi bi-people"></i>
                    <span>Students</span>
                </a>
            </li>

            <!-- Courses -->
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/courses*') ? 'active' : '' }}"
                    href="{{ route('admin.courses.index') }}">
                    <i class="bi bi-book"></i>
                    <span>Courses</span>
                </a>
            </li>

            <!-- Enrollments -->
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/enrollments*') ? 'active' : '' }}"
                    href="{{ route('admin.enrollments.index') }}">
                    <i class="bi bi-journal-check"></i>
                    <span>Enrollments</span>
                </a>
            </li>

            <!-- Extra bottom padding for logout button -->
            <div style="height: 80px;"></div>
        </ul>

        <!-- Logout Section -->
        <div class="logout-section">
            <a class="nav-link d-flex align-items-center" href="{{ route('admin.logout') }}">
                <i class="bi bi-box-arrow-right me-2"></i>
                <span>Logout</span>
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="content-wrapper">
        @yield('content')
    </div>

    <script>
        $(document).ready(function () {
            $('#instructors-table').DataTable({
                "ordering": true
            });
        });
    </script>
</body>

</html>