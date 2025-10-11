<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class InstructorController extends Controller
{
    // Show list of instructors
    public function index()
    {
        $instructors = Instructor::all();
        return view('admin.instructors.index', compact('instructors'));
    }

    public function instructorsList()
{
    // Optional: Fetch instructors, or only display logged-in instructor’s name.
    $instructors = Instructor::all();
    $instructorName = session('instructor_name');

    return view('instructor.instructors', compact('instructors', 'instructorName'));
}

public function enrollments()
{
    // Check if instructor is logged in
    if (!session('instructor_logged_in')) {
        return redirect()->route('instructor.login')->with('error', 'Please login first.');
    }

    // Get the logged-in instructor using email from session
    $instructor = \App\Models\Instructor::where('email', session('instructor_email'))->first();

    if (!$instructor) {
        // If somehow instructor is missing in DB
        session()->forget(['instructor_logged_in', 'instructor_name', 'instructor_email']);
        return redirect()->route('instructor.login')->with('error', 'Instructor not found. Please login again.');
    }

    // Get all enrollments for courses this instructor teaches
    $enrollments = \App\Models\Enrollment::whereHas('course', function($q) use ($instructor) {
        $q->where('instructor_id', $instructor->id);
    })->with(['student', 'course'])->get();

    return view('instructor.enrollments.index', [
        'enrollments' => $enrollments,
        'instructorName' => $instructor->name
    ]);
}


    // Show form to create a new instructor
    public function create()
    {
        return view('admin.instructors.create');
    }

    // Store new instructor
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:instructors',
            'password' => 'required|min:6',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        $data = $request->only(['name', 'email', 'bio', 'status']);
        $data['password'] = Hash::make($request->password);

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('uploads/instructors'), $imageName);
            $data['image'] = $imageName;
        }

        Instructor::create($data);

        return redirect()->route('admin.instructors.index')->with('success', 'Instructor created successfully!');
    }

    // Show instructor details
    public function show($id)
    {
        $instructor = Instructor::findOrFail($id);
        return view('admin.instructors.show', compact('instructor'));
    }

    // Show form to edit instructor
    public function edit($id)
    {
        $instructor = Instructor::findOrFail($id);
        return view('admin.instructors.edit', compact('instructor'));
    }

    // Update instructor
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:instructors,email,'.$id,
            'password' => 'nullable|min:6',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        $instructor = Instructor::findOrFail($id);
        $data = $request->only(['name', 'email', 'bio', 'status']);

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('uploads/instructors'), $imageName);
            $data['image'] = $imageName;

            // Delete old image if exists
            if ($instructor->image && file_exists(public_path('uploads/instructors/'.$instructor->image))) {
                unlink(public_path('uploads/instructors/'.$instructor->image));
            }
        }

        $instructor->update($data);

        // Update password if provided
        if ($request->filled('password')) {
            $instructor->password = Hash::make($request->password);
            $instructor->save();
        }

        return redirect()->route('admin.instructors.index')->with('success', 'Instructor updated successfully!');
    }

    // Delete instructor
    public function destroy($id)
    {
        $instructor = Instructor::findOrFail($id);

        // Delete image if exists
        if ($instructor->image && file_exists(public_path('uploads/instructors/'.$instructor->image))) {
            unlink(public_path('uploads/instructors/'.$instructor->image));
        }

        $instructor->delete();

        return redirect()->route('admin.instructors.index')->with('success', 'Instructor deleted successfully!');
    }

    // Instructor dashboard
    public function dashboard()
    {
        // Check if instructor is logged in
        if (!session('instructor_logged_in')) {
            return redirect()->route('instructor.login');
        }

        // Get courses created by this instructor
        $courses = Course::where('instructor_id', session('instructor_id'))->get();

        return view('instructor.dashboard', [
            'instructor_name' => session('instructor_name'),
            'courses' => $courses
        ]);
    }
}
