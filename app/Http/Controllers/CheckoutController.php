<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log; // Add this import for logging

class CheckoutController extends Controller
{
    public function process(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')
                ->with('error', 'Please log in to complete your purchase.');
        }

        $cart = session('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.view')
                ->with('error', 'Cart is empty!');
        }

        try {
            DB::beginTransaction();

            $total = array_reduce($cart, function ($sum, $item) {
                return $sum + ($item['price'] * $item['quantity']);
            }, 0);

            $order = Order::create([
                'user_id' => Auth::id(),
                'total_price' => $total,
            ]);

            foreach ($cart as $id => $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $id,
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                ]);
            }

            session()->forget('cart');
            DB::commit();

            return redirect()->route('courses.index')
                ->with('success', 'Order successfully placed!');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Order creation failed: ' . $e->getMessage());

            return redirect()->route('cart.view')
                ->with('error', 'Failed to process your order. Please try again.');
        }
    }
}