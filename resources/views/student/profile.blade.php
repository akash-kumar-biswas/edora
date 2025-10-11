@extends('layouts.app')

@section('title', 'Student Profile')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3>Your Profile</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Name:</strong> {{ $student->name }}</p>
                            <p><strong>Email:</strong> {{ $student->email }}</p>
                            <p><strong>City:</strong> {{ $student->city ?? 'Not set' }}</p>
                            <p><strong>Country:</strong> {{ $student->country ?? 'Not set' }}</p>
                            <p><strong>Member Since:</strong> {{ $student->created_at->format('M d, Y') }}</p>
                        </div>
                        <div class="col-md-6 text-end">
                            <img src="{{ asset('frontend/dist/images/Contact/image.jpg') }}" alt="Profile" class="img-fluid rounded-circle" style="width: 100px; height: 100px;">
                        </div>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('student.profile.edit') }}" class="btn btn-primary">Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection