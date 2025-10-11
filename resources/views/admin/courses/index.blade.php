@extends('admin.layout')
@section('title', 'Course List')

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

        .courses-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            animation: float 3s ease-in-out infinite;
        }

        .courses-card-header {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            padding: 1.5rem;
            color: white;
        }

        .courses-card-header h5 {
            margin: 0;
            font-weight: 700;
            font-size: 1.3rem;
        }

        .courses-card-body {
            padding: 1.5rem;
        }

        .course-thumbnail {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #4facfe;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .badge-type-free {
            background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
            color: white;
            padding: 0.4rem 0.8rem;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.75rem;
        }

        .badge-type-paid {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 0.4rem 0.8rem;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.75rem;
        }

        .badge-difficulty-beginner {
            background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
            color: white;
            padding: 0.4rem 0.8rem;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.75rem;
        }

        .badge-difficulty-intermediate {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
            padding: 0.4rem 0.8rem;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.75rem;
        }

        .badge-difficulty-advanced {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 0.4rem 0.8rem;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.75rem;
        }

        .badge-status-active {
            background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
            color: white;
            padding: 0.4rem 0.8rem;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.75rem;
        }

        .badge-status-inactive {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 0.4rem 0.8rem;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.75rem;
        }

        .badge-status-pending {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
            padding: 0.4rem 0.8rem;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.75rem;
        }

        .price-badge {
            background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-weight: 700;
            font-size: 0.9rem;
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
        #courses-table {
            border-collapse: separate;
            border-spacing: 0;
        }

        #courses-table thead th {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            color: white;
            font-weight: 600;
            text-align: center;
            padding: 1rem;
            border: none;
        }

        #courses-table tbody td {
            vertical-align: middle;
            padding: 1rem;
            text-align: center;
        }

        #courses-table tbody tr {
            transition: all 0.3s ease;
        }

        #courses-table tbody tr:hover {
            background-color: rgba(79, 172, 254, 0.05);
            transform: scale(1.01);
        }

        .course-title {
            font-weight: 600;
            color: #333;
            max-width: 200px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            display: inline-block;
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

        .dataTables_wrapper .dataTables_length select,
        .dataTables_wrapper .dataTables_filter input {
            border: 2px solid #4facfe;
            border-radius: 8px;
            padding: 0.4rem 0.8rem;
        }

        .dataTables_wrapper .dataTables_length select:focus,
        .dataTables_wrapper .dataTables_filter input:focus {
            outline: none;
            border-color: #00f2fe;
            box-shadow: 0 0 0 3px rgba(79, 172, 254, 0.1);
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%) !important;
            color: white !important;
            border: none !important;
            border-radius: 8px;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%) !important;
            color: white !important;
            border: none !important;
            border-radius: 8px;
        }
    </style>

    <!-- Page Header -->
    <div class="gradient-header">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1 class="gradient-text">Course Management</h1>
                <p class="welcome-text">
                    <i class="bi bi-book-fill"></i> Manage and monitor all courses
                </p>
            </div>
            <div class="d-flex gap-3">
                <a href="{{ route('admin.courses.create') }}" class="btn-gradient-primary">
                    <i class="bi bi-plus-circle-fill"></i> Add New Course
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

    <!-- Courses Table Card -->
    <div class="courses-card">
        <div class="courses-card-header">
            <h5><i class="bi bi-table"></i> All Courses</h5>
        </div>
        <div class="courses-card-body">
            <table id="courses-table" class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Instructor</th>
                        <th>Type</th>
                        <th>Price</th>
                        <th>Difficulty</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($courses as $course)
                        <tr>
                            <td><strong>{{ $course->id }}</strong></td>
                            <td>
                                @if($course->image)
                                    <img src="{{ asset('uploads/courses/' . $course->image) }}" alt="{{ $course->title }}"
                                        class="course-thumbnail">
                                @else
                                    <div class="course-thumbnail d-flex align-items-center justify-content-center"
                                        style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); color: white; font-weight: bold; font-size: 1.2rem;">
                                        <i class="bi bi-book"></i>
                                    </div>
                                @endif
                            </td>
                            <td>
                                <span class="course-title" title="{{ $course->title }}">
                                    {{ $course->title }}
                                </span>
                            </td>
                            <td>
                                <span class="instructor-badge">
                                    <i class="bi bi-person-fill"></i>
                                    {{ $course->instructor ? $course->instructor->name : 'N/A' }}
                                </span>
                            </td>
                            <td>
                                @if($course->type == 'free')
                                    <span class="badge-type-free">
                                        <i class="bi bi-gift-fill"></i> Free
                                    </span>
                                @else
                                    <span class="badge-type-paid">
                                        <i class="bi bi-cash-coin"></i> Paid
                                    </span>
                                @endif
                            </td>
                            <td>
                                @if($course->type == 'paid')
                                    <span class="price-badge">
                                        <i class="bi bi-currency-dollar"></i>{{ number_format($course->price, 2) }}
                                    </span>
                                @else
                                    <span class="price-badge"
                                        style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                                        <i class="bi bi-gift"></i> Free
                                    </span>
                                @endif
                            </td>
                            <td>
                                @if($course->difficulty == 'beginner')
                                    <span class="badge-difficulty-beginner">
                                        <i class="bi bi-star-fill"></i> Beginner
                                    </span>
                                @elseif($course->difficulty == 'intermediate')
                                    <span class="badge-difficulty-intermediate">
                                        <i class="bi bi-star-half"></i> Intermediate
                                    </span>
                                @elseif($course->difficulty == 'advanced')
                                    <span class="badge-difficulty-advanced">
                                        <i class="bi bi-stars"></i> Advanced
                                    </span>
                                @else
                                    <span class="badge-difficulty-beginner">N/A</span>
                                @endif
                            </td>
                            <td>
                                @if($course->status == 2)
                                    <span class="badge-status-active">
                                        <i class="bi bi-check-circle-fill"></i> Active
                                    </span>
                                @elseif($course->status == 1)
                                    <span class="badge-status-inactive">
                                        <i class="bi bi-pause-circle-fill"></i> Inactive
                                    </span>
                                @else
                                    <span class="badge-status-pending">
                                        <i class="bi bi-clock-fill"></i> Pending
                                    </span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex gap-2 justify-content-center">
                                    <!-- Edit Button -->
                                    <a href="{{ route('admin.courses.edit', $course->id) }}" class="action-btn-edit"
                                        title="Edit Course">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>

                                    <!-- Delete Button -->
                                    <form action="{{ route('admin.courses.destroy', $course->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this course?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="action-btn-delete" title="Delete Course">
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
            $('#courses-table').DataTable({
                "ordering": true
            });
        });
    </script>
@endsection