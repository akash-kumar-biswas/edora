@extends('admin.layout')
@section('title', 'Instructor List')

@section('content')
<h2>Instructor List</h2>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<a href="{{ route('admin.instructors.create') }}" class="btn btn-primary mb-3">+ Add New Instructor</a>

<table id="instructors-table" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Image</th>
            <th>Name</th>
            <th>Email</th>
            <th>Bio</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($instructors as $instructor)
            <tr>
                <td>{{ $instructor->id }}</td>
                <td>
    @if($instructor->image)
        <img src="{{ asset('uploads/instructors/' . $instructor->image) }}" alt="{{ $instructor->name }}" width="50" height="50" class="rounded-circle">
    @else
        N/A
    @endif
</td>
                <td>{{ $instructor->name }}</td>
                <td>{{ $instructor->email }}</td>
                <td>{{ $instructor->bio }}</td>
                <td>
                    @if($instructor->status)
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-danger">Inactive</span>
                    @endif
                </td>
                <td>
    <div class="d-flex gap-2">
        <!-- Edit Button -->
        <a href="{{ route('admin.instructors.edit', $instructor->id) }}" class="btn btn-sm btn-primary" title="Edit">
            <i class="bi bi-pencil"></i>
        </a>

        <!-- Delete Button -->
        <form action="{{ route('admin.instructors.destroy', $instructor->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
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
@endsection
