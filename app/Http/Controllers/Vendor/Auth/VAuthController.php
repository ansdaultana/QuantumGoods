<?php

namespace App\Http\Controllers\Vendor\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\VendorRegistrationRequest;
use App\Models\Bank;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Vendor;
use Auth;

class VAuthController extends Controller
{
    //
    public function registerPage()
    {

        $banks = Bank::all();
        return Inertia::render('Vendor/Auth/Register', ['banks' => $banks]);
    }

    public function register(Request $request)
    {
        // dd($request);
        

        $validatedData = $request->validate([
            'company_name' => 'unique:vendors|required|string|max:255',
            'phone_number' => 'unique:vendors|required|string|max:20',
            'address' => 'required|string|max:255',
            'bank_name' => 'required|string|max:255',
            'bank_account_number' => 'required|string|max:255',
            'facebook_store_url' => 'nullable|url',
            'instagram_store_url' => 'nullable|url',
            'details' => 'required|string',
            'image' => 'image|mimes:jpeg,png|max:2048',

        ]);
        // dd($validatedData);
        // dd($request->file('image'));
        
        $vendor = new Vendor();
        
        $vendor->user_id = Auth::id();
        $vendor->fill($validatedData);
        
        $vendor->save();
        $user=Auth::user();
        $user->role='vendor';
        $user->save();
        if ($request->hasFile('image')) {
                $path = $request->file('image')->store('public/Store/Images');

                $vendor->image()->create(['image_path' => $path]);
        }
        return redirect()->route('home');
    }
}
