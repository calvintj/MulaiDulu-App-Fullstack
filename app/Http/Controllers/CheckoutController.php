<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CheckoutController extends Controller
{
    public function process(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in to complete your purchase.');
        }

        $cart = session('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.view')->with('error', 'Your cart is empty!');
        }

        try {
            DB::beginTransaction();

            // Calculate total price
            $total = array_reduce($cart, function ($sum, $item) {
                return $sum + ($item['price'] * $item['quantity']);
            }, 0);

            // Create order
            $order = Order::create([
                'user_id' => Auth::id(),
                'total_price' => $total,
                'status' => 'pending',
            ]);

            foreach ($cart as $id => $item) {
                if (str_starts_with($id, 'expert_')) {
                    $expertId = str_replace('expert_', '', $id);
                    if (isset($item['course_id'])) {
                        Log::error("Invalid order item: both course_id and expert_id present for ID $id.");
                        throw new \Exception('An order item cannot be linked to both a course and an expert.');
                    }
                    if (!is_numeric($expertId)) {
                        Log::error("Invalid expert ID: $id");
                        continue; // Skip invalid entries
                    }
                    Log::info("Processing expert ID: $expertId");
                    OrderItem::create([
                        'order_id' => $order->id,
                        'expert_id' => $expertId,
                        'quantity' => $item['quantity'],
                        'price' => $item['price'],
                    ]);
                } else {
                    if (isset($item['expert_id'])) {
                        Log::error("Invalid order item: both course_id and expert_id present for ID $id.");
                        throw new \Exception('An order item cannot be linked to both a course and an expert.');
                    }
                    Log::info("Processing course ID: $id");
                    OrderItem::create([
                        'order_id' => $order->id,
                        'course_id' => $id,
                        'quantity' => $item['quantity'],
                        'price' => $item['price'],
                    ]);
                }
            }



            // Clear the cart session
            session()->forget('cart');

            DB::commit();

            return redirect()->route('mentorship.index')->with('success', 'Order successfully placed!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Checkout error: ' . $e->getMessage());
            return redirect()->route('cart.view')->with('error', 'Failed to process your order. Please try again.');
        }
    }
}