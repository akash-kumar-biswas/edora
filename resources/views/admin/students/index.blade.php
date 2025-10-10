@extends('admin.layout')
@section('title', 'Student List')

@section('content')
    <h2>Student List</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('admin.students.create') }}" class="btn btn-primary mb-3">+ Add New Student</a>

    <table id="students-table" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Country</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>
                        @if($student->image)
                            <img src="{{ asset('uploads/students/' . $student->image) }}" alt="{{ $student->name }}" width="50"
                                height="50" class="rounded-circle">
                        @else
                            N/A
                        @endif
                    </td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ ucfirst($student->gender ?? 'N/A') }}</td>
                    <td>{{ $student->country ?? 'N/A' }}</td>
                    <td>
                        @if($student->status)
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-danger">Inactive</span>
                        @endif
                    </td>
                    <td>
                        <div class="d-flex gap-2">
                            <!-- Edit Button -->
                            <a href="{{ route('admin.students.edit', $student->id) }}" class="btn btn-sm btn-primary"
                                title="Edit">
                                <i class="bi bi-pencil"></i>
                            </a>

                            <!-- Delete Button -->
                            <form action="{{ route('admin.students.destroy', $student->id) }}" method="POST"
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
            $('#students-table').DataTable({
                "ordering": true
            });
        });
    </script>
@endsection