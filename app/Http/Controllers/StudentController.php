<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // Get All Students
    public function index()
    {
        return Student::all();
    }

    // Create a New Student
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string',
        'email' => 'required|email|unique:students',
        'age' => 'required|integer'
    ]);

    $student = new Student();
    $student->name = $request->name;
    $student->email = $request->email;
    $student->age = $request->age;
    $student->save();

    return response()->json(['message' => 'Student created successfully!']);
}


    // Get Student by ID
    public function show($id)
    {
        return Student::find($id);
    }

    // Update Student by ID
    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        $student->name = $request->name;
        $student->email = $request->email;
        $student->age = $request->age;
        $student->save();

        return response()->json(['message' => 'Student updated successfully!']);
    }

    // Delete Student by ID
    public function destroy($id)
    {
        Student::destroy($id);

        return response()->json(['message' => 'Student deleted successfully!']);
    }
}
