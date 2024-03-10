<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Validator;

class ProductController extends Controller
{
    //

    public function index()
    {
        $user_id = Auth::id();
        $products = Product::where('vendor_id', $user_id)->with('images')->get();
        foreach ($products as $product) {
            $images = [];
            foreach ($product->images as $image) {
                // Encode each image to base64 and store them in an array
                $imageData = base64_encode(Storage::get($image->image_path));
                $images[] = 'data:image/jpeg;base64,' . $imageData;
            }
            // Assign the array of base64 encoded images to a new attribute, e.g., 'encoded_images'
            $product['encoded_images'] = $images;
        }
        return Inertia::render(
            'Vendor/Products',
            [
                'products' => $products
            ]
        );
    }
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

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|numeric|min:1',
            'category' => 'required|integer|min:1',
            'description' => 'required|string',
            'images' => 'required|array|max:4',
            'images.*' => 'image|mimes:jpeg,png|max:2048',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $product = new Product();
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->vendor_id = Auth::id();
        $product->category_id = $request->category;


        $product->save();

        // Store and associate the images with the product
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('public/Store/Images');

                // Associate the image path with the product
                $product->images()->create(['image_path' => $path]);
            }
        }
        return response()->redirectTo(route('vendor.products'));
    }

    public function editPage(Request $request, $id)
    {
        $product = Product::with('images')->find($id);

        $categories = Category::all();
        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }
        $images = [];
        foreach ($product->images as $image) {
            // Encode each image to base64 and store them in an array
            $imageData = base64_encode(Storage::get($image->image_path));
            $images[] = 'data:image/jpeg;base64,' . $imageData;
        }
        // Assign the array of base64 encoded images to a new attribute, e.g., 'encoded_images'
        $product['encoded_images'] = $images;
        return Inertia::render(
            'Vendor/EditProduct',
            [
                'product' => $product,
                'categories' => $categories,
            ]
        );
    }
    public function edit(Request $request, $id)
    {
        $product = Product::with('images')->find($id);
        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|numeric|min:1',
            'category' => 'required|integer|min:1',
            'description' => 'required|string',
            'images' => 'required|array|max:4',
            // 'images.*' => 'image|mimes:jpeg,png|base64image|max:2048',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->vendor_id = Auth::id();
        $product->category_id = $request->category;


        $product->save();

        // Store and associate the images with the product
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('public/Store/Images');
                $product->images()->create(['image_path' => $path]);
            }
        }
        return response()->redirectTo(route('vendor.products'));

    }

    public function delete(Request $request, $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }
        $product->delete();
        return response()->redirectTo(route('vendor.products'));
    }
}
