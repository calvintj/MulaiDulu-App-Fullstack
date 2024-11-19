<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CartController extends Controller
{
    public function index(){
        $courses = Course::all();
        return view('features.courses', compact('courses'));
    }

    public function addToCart(Request $request, Course $course){
        $cart = session()->get('cart', []);

        if (isset($cart[$course->id])) {
            $cart[$course->id]['quantity']++;
        } else {
            $cart[$course->id] = [
                'name' => $course->name,
                'price' => $course->price,
                'quantity' => 1,
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', "{$course->name} added to cart!");
    }

    public function viewCart()
    {
        $cart = session()->get('cart', []);
        return view('features.cart', compact('cart'));
    }

    
}
