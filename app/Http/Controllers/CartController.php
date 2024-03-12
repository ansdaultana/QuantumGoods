<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use Auth;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function AddRemoveToggle(Request $request, $product_id)
    {
        $user_id = Auth::id();
        $product = Product::find($product_id);
        if (!$product) {
            return response()->json(['error' => 'Product not found']);
        }
        $existingCartItem = CartItem::where('user_id', $user_id)
            ->where('product_id', $product_id)
            ->first();

        if ($existingCartItem) {
            $existingCartItem->delete();
        }
        else{
            $cartItem = new CartItem();
            $cartItem->user_id = $user_id;
            $cartItem->product_id = $product_id;
            $cartItem->quantity = 1;
            $cartItem->save();
        }
        return redirect('/');

    }
}
