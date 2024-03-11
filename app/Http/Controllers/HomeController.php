<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ProductImage;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Storage;
class HomeController extends Controller
{
    //
    public function index()
    {
        $categories = Category::all();
        $user = Auth::user();
        $isVendor = False;
        if ($user) {
            $isVendor = Vendor::where('user_id', $user->id)->exists();

        }
        // Get the current week's start and end dates
        $startOfWeek = Carbon::now()->startOfWeek()->toDateString();
        $endOfWeek = Carbon::now()->endOfWeek()->toDateString();

        // Query to get the 4 most trending products this week
        $trendingProducts = DB::table('orders')
            ->select('products.*', DB::raw('COUNT(orders.id) as order_count'))
            ->join('products', 'orders.product_id', '=', 'products.id')
            ->whereBetween('orders.created_at', [$startOfWeek, $endOfWeek])
            ->groupBy('products.id')
            ->orderByDesc('order_count')
            ->limit(4)
            ->get();
        foreach ($trendingProducts as $product) {
            $image=ProductImage::where('product_id',$product->id)->first();
            // dd($image);
               $imageData = base64_encode(Storage::get($image->image_path));
               $product->encoded_image = 'data:image/jpeg;base64,' . $imageData;
        }

        return Inertia::render(
            'Home',
            [
                'categories' => $categories,
                'isVendor' => $isVendor,
                'trendingProducts'=>$trendingProducts
            ]
        );
    }
}
