@extends('layouts.instructor')

@section('title', 'Enrollments List')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4">
        Enrollments for Instructor: <strong>{{ $instructorName }}</strong>
    </h3>

    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <i class="bi bi-journal-check"></i> All Enrollments
        </div>
        <div class="card-body p-0">
            <table id="enrollments-table" class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Student Name</th>
                        <th>Email</th>
                        <th>Course</th>
                        <th>Enrollment Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($enrollments as $enrollment)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $enrollment->student->name }}</td>
                            <td>{{ $enrollment->student->email }}</td>
                            <td>{{ $enrollment->course->title }}</td>
                            <td>{{ $enrollment->created_at->format('Y-m-d') }}</td>
                            <td>
                                @if($enrollment->status)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- DataTables CSS & JS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#enrollments-table').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "order": [[0, "asc"]],
            "language": {
                search: "_INPUT_",
                searchPlaceholder: "Search enrollments..."
            }
        });
    });
</script>
@endsection
