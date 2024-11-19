<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Expert;

class CartController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        $experts = Expert::all();
        return view('features.mentorship', compact('courses', 'experts'));
    }

    public function addToCart(Request $request, Course $course)
    {
        $cart = session()->get('cart', []);

        // Add or update the course in the cart
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

    public function addExpertToCart(Request $request, Expert $expert){
        $cart = session()->get('cart', []);

        if (isset($cart['expert_' . $expert->id])) {
            $cart['expert_' . $expert->id]['quantity']++;
        } else {
            $cart['expert_' . $expert->id] = [
                'name' => $expert->name,
                'price' => $expert->rate_price,
                'quantity' => 1,
            ];
    }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', "{$expert->name} added to cart!");
    }


    public function viewCart()
    {
        $cart = session()->get('cart', []);
        return view('features.cart', compact('cart'));
    }

    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Item removed from cart!');
    }
    
}
