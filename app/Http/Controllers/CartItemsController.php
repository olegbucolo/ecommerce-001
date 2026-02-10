<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;

class CartItemsController extends Controller
{
    public function show()
    {
        return CartItem::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'product_id' => 'required',
            'quantity' => 'integer|min:1',
        ]);

        // Ensure cart exists
        $cart = Cart::firstOrCreate([
            'user_id' => $request->user_id,
        ]);

        // Add item or increment quantity
        $item = CartItem::firstOrNew([
            'cart_id' => $cart->id,
            'product_id' => $request->product_id,
        ]);

        $item->quantity = ($item->quantity ?? 0) + ($request->quantity ?? 1);
        $item->save();

        // Return cart with updated items
        return response()->json([
            'message' => 'Item added to cart',
            'cart' => $cart->load('items'),
        ], 201);
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'product_id' => 'required',
        ]);

        $cart = Cart::where('user_id', $request->user_id)->first();

        if (! $cart) {
            return response()->json(['message' => 'Cart not found'], 404);
        }

        $item = CartItem::where('cart_id', $cart->id)
            ->where('product_id', $request->product_id)
            ->first();

        if (! $item) {
            return response()->json(['message' => 'Item not found in cart'], 404);
        }

        $item->delete();

        return response()->json([
            'message' => 'Item removed',
            'cart' => $cart->load('items'),
        ]);
    }
}
