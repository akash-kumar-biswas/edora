@extends('admin.layout')
@section('title', 'Course List')

@section('content')
    <h2>Course List</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('admin.courses.create') }}" class="btn btn-primary mb-3">+ Add New Course</a>

    <table id="courses-table" class="table table-striped table-bordered">
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
                    <td>{{ $course->id }}</td>
                    <td>
                        @if($course->image)
                            <img src="{{ asset('uploads/courses/' . $course->image) }}" alt="{{ $course->title }}" width="50"
                                height="50" class="rounded">
                        @else
                            N/A
                        @endif
                    </td>
                    <td>{{ $course->title }}</td>
                    <td>{{ $course->instructor ? $course->instructor->name : 'N/A' }}</td>
                    <td>
                        @if($course->type == 'free')
                            <span class="badge bg-success">Free</span>
                        @else
                            <span class="badge bg-primary">Paid</span>
                        @endif
                    </td>
                    <td>
                        @if($course->type == 'paid')
                            ${{ number_format($course->price, 2) }}
                        @else
                            Free
                        @endif
                    </td>
                    <td>
                        @if($course->difficulty == 'beginner')
                            <span class="badge bg-info">Beginner</span>
                        @elseif($course->difficulty == 'intermediate')
                            <span class="badge bg-warning">Intermediate</span>
                        @elseif($course->difficulty == 'advanced')
                            <span class="badge bg-danger">Advanced</span>
                        @else
                            N/A
                        @endif
                    </td>
                    <td>
                        @if($course->status == 2)
                            <span class="badge bg-success">Active</span>
                        @elseif($course->status == 1)
                            <span class="badge bg-secondary">Inactive</span>
                        @else
                            <span class="badge bg-warning">Pending</span>
                        @endif
                    </td>
                    <td>
                        <div class="d-flex gap-2">
                            <!-- Edit Button -->
                            <a href="{{ route('admin.courses.edit', $course->id) }}" class="btn btn-sm btn-primary"
                                title="Edit">
                                <i class="bi bi-pencil"></i>
                            </a>

                            <!-- Delete Button -->
                            <form action="{{ route('admin.courses.destroy', $course->id) }}" method="POST"
                                onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        $(document).ready(function () {
            $('#courses-table').DataTable({
                "ordering": true
            });
        });
    </script>
@endsection