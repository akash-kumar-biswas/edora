@extends('admin.layout')
@section('title', 'Enrollment List')

@section('content')
    <style>
        /* Gradient Header Animations */
        @keyframes gradient-shift {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        @keyframes shimmer {
            0% {
                opacity: 0.8;
            }

            50% {
                opacity: 1;
            }

            100% {
                opacity: 0.8;
            }
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-5px);
            }
        }

        .gradient-header {
            background: linear-gradient(-45deg, #667eea, #764ba2, #f093fb, #4facfe);
            background-size: 400% 400%;
            animation: gradient-shift 15s ease infinite;
            padding: 2rem;
            border-radius: 15px;
            margin-bottom: 2rem;
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
        }

        .gradient-text {
            background: linear-gradient(135deg, #ffffff, #f0f0f0);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: 700;
            font-size: 2.5rem;
            margin: 0;
            animation: shimmer 2s ease-in-out infinite;
        }

        .welcome-text {
            color: rgba(255, 255, 255, 0.9);
            margin: 0.5rem 0 0 0;
            font-size: 1rem;
        }

        .btn-gradient-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            color: white;
            padding: 0.6rem 1.5rem;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }

        .btn-gradient-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.6);
            color: white;
        }

        .enrollments-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            animation: float 3s ease-in-out infinite;
        }

        .enrollments-card-header {
            background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
            padding: 1.5rem;
            color: white;
        }

        .enrollments-card-header h5 {
            margin: 0;
            font-weight: 700;
            font-size: 1.3rem;
        }

        .enrollments-card-body {
            padding: 1.5rem;
        }

        .student-avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #43e97b;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .course-thumbnail {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #4facfe;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .student-name-badge {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
            padding: 0.4rem 0.8rem;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.85rem;
            display: inline-block;
        }

        .course-title-badge {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            color: white;
            padding: 0.4rem 0.8rem;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.85rem;
            display: inline-block;
            max-width: 200px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .instructor-badge {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 0.3rem 0.7rem;
            border-radius: 15px;
            font-weight: 600;
            font-size: 0.75rem;
            display: inline-block;
        }

        .date-badge {
            background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
            color: white;
            padding: 0.4rem 0.8rem;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.75rem;
        }

        .action-btn-edit {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            border: none;
            color: white;
            padding: 0.4rem 0.8rem;
            border-radius: 8px;
            transition: all 0.3s ease;
            box-shadow: 0 2px 8px rgba(79, 172, 254, 0.3);
        }

        .action-btn-edit:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(79, 172, 254, 0.5);
            color: white;
        }

        .action-btn-delete {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            border: none;
            color: white;
            padding: 0.4rem 0.8rem;
            border-radius: 8px;
            transition: all 0.3s ease;
            box-shadow: 0 2px 8px rgba(240, 147, 251, 0.3);
        }

        .action-btn-delete:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(240, 147, 251, 0.5);
            color: white;
        }

        /* DataTable Customization */
        #enrollments-table {
            border-collapse: separate;
            border-spacing: 0;
        }

        #enrollments-table thead th {
            background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
            color: white;
            font-weight: 600;
            text-align: center;
            padding: 1rem;
            border: none;
        }

        #enrollments-table tbody td {
            vertical-align: middle;
            padding: 1rem;
            text-align: center;
        }

        #enrollments-table tbody tr {
            transition: all 0.3s ease;
        }

        #enrollments-table tbody tr:hover {
            background-color: rgba(67, 233, 123, 0.05);
            transform: scale(1.01);
        }

        .alert-success {
            background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
            border: none;
            color: white;
            border-radius: 10px;
            padding: 1rem 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 4px 15px rgba(67, 233, 123, 0.3);
        }

        .alert-danger {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            border: none;
            color: white;
            border-radius: 10px;
            padding: 1rem 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 4px 15px rgba(240, 147, 251, 0.3);
        }

        .dataTables_wrapper .dataTables_length select,
        .dataTables_wrapper .dataTables_filter input {
            border: 2px solid #43e97b;
            border-radius: 8px;
            padding: 0.4rem 0.8rem;
        }

        .dataTables_wrapper .dataTables_length select:focus,
        .dataTables_wrapper .dataTables_filter input:focus {
            outline: none;
            border-color: #38f9d7;
            box-shadow: 0 0 0 3px rgba(67, 233, 123, 0.1);
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%) !important;
            color: white !important;
            border: none !important;
            border-radius: 8px;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%) !important;
            color: white !important;
            border: none !important;
            border-radius: 8px;
        }

        .email-text {
            color: #666;
            font-size: 0.85rem;
        }
    </style>

    <!-- Page Header -->
    <div class="gradient-header">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1 class="gradient-text">Enrollment Management</h1>
                <p class="welcome-text">
                    <i class="bi bi-journal-check"></i> Manage and monitor all enrollments
                </p>
            </div>
            <div class="d-flex gap-3">
                <a href="{{ route('admin.enrollments.create') }}" class="btn-gradient-primary">
                    <i class="bi bi-plus-circle-fill"></i> Add New Enrollment
                </a>
            </div>
        </div>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success">
            <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
        </div>
    @endif

    <!-- Error Message -->
    @if(session('error'))
        <div class="alert alert-danger">
            <i class="bi bi-exclamation-triangle-fill"></i> {{ session('error') }}
        </div>
    @endif

    <!-- Enrollments Table Card -->
    <div class="enrollments-card">
        <div class="enrollments-card-header">
            <h5><i class="bi bi-table"></i> All Enrollments</h5>
        </div>
        <div class="enrollments-card-body">
            <table id="enrollments-table" class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Student</th>
                        <th>Email</th>
                        <th>Course</th>
                        <th>Course Image</th>
                        <th>Instructor</th>
                        <th>Enrolled Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($enrollments as $enrollment)
                        <tr>
                            <td><strong>{{ $enrollment->id }}</strong></td>
                            <td>
                                <div class="d-flex align-items-center justify-content-center gap-2">
                                    @if($enrollment->student && $enrollment->student->image)
                                        <img src="{{ asset('uploads/students/' . $enrollment->student->image) }}"
                                            alt="{{ $enrollment->student->name }}" class="student-avatar">
                                    @else
                                        <div class="student-avatar d-flex align-items-center justify-content-center"
                                            style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%); color: white; font-weight: bold;">
                                            {{ $enrollment->student ? strtoupper(substr($enrollment->student->name, 0, 1)) : 'N' }}
                                        </div>
                                    @endif
                                    <span class="student-name-badge">
                                        <i class="bi bi-person-fill"></i>
                                        {{ $enrollment->student ? $enrollment->student->name : 'N/A' }}
                                    </span>
                                </div>
                            </td>
                            <td>
                                <span class="email-text">
                                    <i class="bi bi-envelope-fill"></i>
                                    {{ $enrollment->student ? $enrollment->student->email : 'N/A' }}
                                </span>
                            </td>
                            <td>
                                <span class="course-title-badge"
                                    title="{{ $enrollment->course ? $enrollment->course->title : 'N/A' }}">
                                    <i class="bi bi-book-fill"></i>
                                    {{ $enrollment->course ? $enrollment->course->title : 'N/A' }}
                                </span>
                            </td>
                            <td>
                                @if($enrollment->course && $enrollment->course->image)
                                    <img src="{{ asset('uploads/courses/' . $enrollment->course->image) }}"
                                        alt="{{ $enrollment->course->title }}" class="course-thumbnail">
                                @else
                                    <div class="course-thumbnail d-flex align-items-center justify-content-center"
                                        style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); color: white; font-weight: bold; font-size: 1.2rem;">
                                        <i class="bi bi-book"></i>
                                    </div>
                                @endif
                            </td>
                            <td>
                                <span class="instructor-badge">
                                    <i class="bi bi-person-workspace"></i>
                                    {{ $enrollment->course && $enrollment->course->instructor ? $enrollment->course->instructor->name : 'N/A' }}
                                </span>
                            </td>
                            <td>
                                <span class="date-badge">
                                    <i class="bi bi-calendar-check-fill"></i>
                                    {{ $enrollment->created_at->format('M d, Y') }}
                                </span>
                            </td>
                            <td>
                                <div class="d-flex gap-2 justify-content-center">
                                    <!-- Edit Button -->
                                    <a href="{{ route('admin.enrollments.edit', $enrollment->id) }}" class="action-btn-edit"
                                        title="Edit Enrollment">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>

                                    <!-- Delete Button -->
                                    <form action="{{ route('admin.enrollments.destroy', $enrollment->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this enrollment?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="action-btn-delete" title="Delete Enrollment">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('#enrollments-table').DataTable({
                "ordering": true
            });
        });
    </script>
@endsection