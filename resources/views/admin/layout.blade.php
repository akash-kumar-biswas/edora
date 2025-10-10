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
        }

        /* Sidebar fixed position */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 220px;
            height: 100vh;
            background-color: #212529;
            color: white;
            padding: 1rem;
        }

        .sidebar h4 {
            text-align: center;
            margin-bottom: 1rem;
            border-bottom: 1px solid rgba(255,255,255,0.2);
            padding-bottom: 10px;
        }

        .sidebar .nav-link {
            color: #fff;
            padding: 10px 15px;
            display: block;
            border-radius: 5px;
        }

        .sidebar .nav-link:hover {
            background-color: #495057;
        }

        /* Main content shifts right */
        .content-wrapper {
            margin-left: 220px;
            padding: 30px;
            min-height: 100vh;
            background: #f8f9fa;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h4>Admin Panel</h4>
        <ul class="nav flex-column mt-3">
            <li class="nav-item"><a class="nav-link" href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.instructors.index') }}">Instructor List</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Student List</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Course List</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Enrollment List</a></li>

            <!-- Logout Button at bottom -->
            <li class="nav-item mt-auto" style="position: absolute; bottom: 20px; width: 180px;">
                <a class="nav-link text-danger d-flex align-items-center" 
                   href="{{ route('admin.logout') }}">
                    <i class="bi bi-box-arrow-right me-2"></i> Logout
                </a>
                
            </li>
        </ul>
    </div>

    <div class="content-wrapper">
        @yield('content')
    </div>

    <script>
        $(document).ready(function() {
            $('#instructors-table').DataTable({
                "ordering": true
            });
        });
    </script>
</body>
</html>
