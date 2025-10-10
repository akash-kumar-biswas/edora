<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { display: flex; min-height: 100vh; }
        .sidebar { width: 220px; background: #343a40; color: #fff; }
        .sidebar a { color: #fff; display: block; padding: 12px 20px; text-decoration: none; }
        .sidebar a:hover { background: #495057; }
        .content { flex: 1; padding: 30px; background: #f8f9fa; }
    </style>
</head>
<body>
    <div class="sidebar">
        <h4 class="text-center py-3 border-bottom">Admin Panel</h4>
        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        <a href="{{ route('admin.instructors') }}">Instructor List</a>
        <a href="{{ route('admin.students') }}">Student List</a>
        <a href="{{ route('admin.courses') }}">Course List</a>
        <a href="{{ route('admin.enrollments') }}">Enrollments</a>
        <a href="{{ route('admin.logout') }}">Logout</a>
    </div>
    <div class="content">
        @yield('content')
    </div>
</body>
</html>
