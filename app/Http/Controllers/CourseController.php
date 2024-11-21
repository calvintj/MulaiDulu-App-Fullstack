<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('Admin.coursesCRUD', compact('courses'));
    }

    public function create()
    {
        return view('Admin.coursesCRUD');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        Course::create($data);

        return redirect()->route('Admin.coursesCRUD.index')->with('success', 'Course created successfully.');
    }

    public function show($id)
    {
        $course = Course::findOrFail($id);
        return view('Admin.coursesCRUD', compact('course'));
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);
        return view('Admin.coursesCRUD', compact('course'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $course = Course::findOrFail($id);
        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        $course->update($data);

        return redirect()->route('Admin.coursesCRUD.index')->with('success', 'Course updated successfully.');
    }

    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        if ($course->image) {
            \Storage::delete('public/' . $course->image);
        }
        $course->delete();

        return redirect()->route('Admin.coursesCRUD.index')->with('success', 'Course deleted successfully.');
    }
}
