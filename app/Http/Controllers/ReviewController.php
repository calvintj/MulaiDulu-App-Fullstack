<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function showAllReview(){
        $reviews = Review::all();
        return view('features.ourWorks')->with('reviews', $reviews);
    }
}
