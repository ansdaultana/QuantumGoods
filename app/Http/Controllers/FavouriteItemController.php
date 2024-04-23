<?php

namespace App\Http\Controllers;

use App\Models\FavouriteItem;
use App\Models\Product;
use Auth;
use Illuminate\Http\Request;

class FavouriteItemController extends Controller
{
    //

    public function AddRemoveToggle(Request $request, $product_id)
    {
        $user_id = Auth::id();
        $product = Product::find($product_id);
        if (!$product) {
            return response()->json(['error' => 'Product not found']);
        }
        $existingFavouriteItem = FavouriteItem::where('user_id', $user_id)
            ->where('product_id', $product_id)
            ->first();

        if ($existingFavouriteItem) {
            $existingFavouriteItem->delete();
        }
        else{
            $FavouriteItem = new FavouriteItem();
            $FavouriteItem->user_id = $user_id;
            $FavouriteItem->product_id = $product_id;
            $FavouriteItem->save();
        }
        return response()->json(['message' => 'Product removed from favorites'], 200);
    }
}
