<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expert;

class ExpertController extends Controller
{
    public function showAllExpert(){
        $experts = Expert::all();
        return view('features.experts')->with('experts', $experts);
    }

    public function showDetailExpert(Request $request){
        $expert = Expert::find($request->id);
        return view('features.expertDetail')->with('expert', $expert);
    }

    public function index()
    {
        $experts = Expert::all();
        return view('Admin.expertsCRUD', compact('experts'));
    }

    public function create()
    {
        return view('Admin.expertsCRUD');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'expertise' => 'required|string|max:255',
            'bio' => 'required',
            'rate_price' => 'required|numeric|min:0',
            'rating' => 'required|numeric|between:0,5',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        Expert::create($data);

        return redirect()->route('Admin.expertsCRUD.index')->with('success', 'Expert created successfully.');
    }

    public function show($id)
    {
        $expert = Expert::findOrFail($id);
        return view('Admin.expertsCRUD', compact('expert'));
    }

    public function edit($id)
    {
        $expert = Expert::findOrFail($id);
        return view('Admin.expertsCRUD', compact('expert'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'expertise' => 'required|string|max:255',
            'bio' => 'required',
            'rate_price' => 'required|numeric|min:0',
            'rating' => 'required|numeric|between:0,5',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $expert = Expert::findOrFail($id);
        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        $expert->update($data);

        return redirect()->route('Admin.expertsCRUD.index')->with('success', 'Expert updated successfully.');
    }

    public function destroy($id)
    {
        $expert = Expert::findOrFail($id);
        if ($expert->image) {
            \Storage::delete('public/' . $expert->image);
        }
        $expert->delete();

        return redirect()->route('Admin.expertsCRUD.index')->with('success', 'Expert deleted successfully.');
    }
}
