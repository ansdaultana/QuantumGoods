<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class HomeController extends Controller
{
    //
    public function index()
    {
        $categories = Category::all();
        $user = Auth::user();
        $isVendor =False;
        if($user)
        {
            $isVendor = Vendor::where('user_id', $user->id)->exists();

        }
            return Inertia::render(
                'Home',
                [
                    'categories' => $categories,
                    'isVendor'=>$isVendor
                ]
            );
    }
}
