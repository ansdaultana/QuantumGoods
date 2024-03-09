<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    //

    public function new()
    {
        $categories = Category::all();

        return Inertia::render(
            'Vendor/NewProduct',
            [
                'categories' => $categories,
            ]
        );
    }

    public function create(Request $request)
    {
        dd($request);
    }
}
