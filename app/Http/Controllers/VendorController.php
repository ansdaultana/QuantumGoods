<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Auth;
use Illuminate\Http\Request;
use Inertia\Inertia;

class VendorController extends Controller
{
    //

    public function index()
    {
        //  dd('here');
        $user_id = Auth::id();
        $products = Product::where('vendor_id', $user_id)->with('images')->get();
        return Inertia::render(
            'Vendor/VendorDashboard',
            [
                'products' => $products
            ]
        );
    }
}
