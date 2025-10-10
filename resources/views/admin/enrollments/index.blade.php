@extends('admin.layout')
@section('title', 'Enrollment List')

@section('content')
    <h2>Enrollment List</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <a href="{{ route('admin.enrollments.create') }}" class="btn btn-primary mb-3">+ Add New Enrollment</a>

    <table id="enrollments-table" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Student Name</th>
                <th>Student Image</th>
                <th>Student Email</th>
                <th>Course Title</th>
                <th>Course Image</th>
                <th>Instructor</th>
                <th>Enrolled Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($enrollments as $enrollment)
                <tr>
                    <td>{{ $enrollment->id }}</td>
                    <td>{{ $enrollment->student ? $enrollment->student->name : 'N/A' }}</td>
                    <td>
                        @if($enrollment->student && $enrollment->student->image)
                            <img src="{{ asset('uploads/students/' . $enrollment->student->image) }}" alt="{{ $enrollment->student->name }}" width="50" height="50" class="rounded-circle">
                        @else
                            N/A
                        @endif
                    </td>
                    <td>{{ $enrollment->student ? $enrollment->student->email : 'N/A' }}</td>
                    <td>{{ $enrollment->course ? $enrollment->course->title : 'N/A' }}</td>
                    <td>
                        @if($enrollment->course && $enrollment->course->image)
                            <img src="{{ asset('uploads/courses/' . $enrollment->course->image) }}" alt="{{ $enrollment->course->title }}" width="50" height="50" class="rounded">
                        @else
                            N/A
                        @endif
                    </td>
                    <td>{{ $enrollment->course && $enrollment->course->instructor ? $enrollment->course->instructor->name : 'N/A' }}
                    </td>
                    <td>{{ $enrollment->created_at->format('M d, Y') }}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <!-- Edit Button -->
                            <a href="{{ route('admin.enrollments.edit', $enrollment->id) }}" class="btn btn-sm btn-primary"
                                title="Edit">
                                <i class="bi bi-pencil"></i>
                            </a>

                            <!-- Delete Button -->
                            <form action="{{ route('admin.enrollments.destroy', $enrollment->id) }}" method="POST"
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
            $('#enrollments-table').DataTable({
                "ordering": true
            });
        });
    </script>
@endsection