<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expert;

class ExpertController extends Controller
{
    public function showAllExpert(){
        $experts = Expert::all();
        return view('expertpage')->with('expert', $experts);
    }

    public function showDetailExpert(Request $request){
        $expert = Article::find($request->id);
        return view('detailexpert')->with('expert', $expert);
    }
}
