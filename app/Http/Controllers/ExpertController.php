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
}
