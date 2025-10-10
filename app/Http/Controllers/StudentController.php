<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function index()
    {
        return response()->json(Student::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students',
            'password' => 'required|min:6',
        ]);

        $student = Student::create([
            'name' => $request->name_en,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => $request->status ?? 1,
        ]);

        return response()->json($student, 201);
    }

    public function show($id)
    {
        return response()->json(Student::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $student->update($request->except('password'));

        if ($request->filled('password')) {
            $student->password = Hash::make($request->password);
            $student->save();
        }

        return response()->json($student);
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return response()->json(['message' => 'Student deleted successfully']);
    }
}
