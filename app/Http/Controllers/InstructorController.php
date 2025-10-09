<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class InstructorController extends Controller
{
    public function index()
    {
        return response()->json(Instructor::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:instructors',
            'password' => 'required|min:6',
            'role_id' => 'required|exists:roles,id',
        ]);

        $instructor = Instructor::create([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role_id,
            'bio' => $request->bio,
            'status' => $request->status ?? 1,
            'password' => Hash::make($request->password),
        ]);

        return response()->json($instructor, 201);
    }

    public function show($id)
    {
        return response()->json(Instructor::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $instructor = Instructor::findOrFail($id);
        $instructor->update($request->except('password'));

        if ($request->filled('password')) {
            $instructor->password = Hash::make($request->password);
            $instructor->save();
        }

        return response()->json($instructor);
    }

    public function destroy($id)
    {
        $instructor = Instructor::findOrFail($id);
        $instructor->delete();

        return response()->json(['message' => 'Instructor deleted successfully']);
    }
}
