<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Vendor\Auth\VAuthController;
use App\Http\Controllers\VendorController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

});

// Vendor
Route::middleware(['auth:sanctum'])->prefix('/vendor')->group(function (){
    Route::get('/registerPage',[VAuthController::class,'registerPage']);
    Route::post('/register',[VAuthController::class,'register'])->name('vendor.register');
});

Route::middleware(['role:vendor','auth'])->prefix('/vendor')->group(function () {
    Route::get('/dashboard',[VendorController::class,'index'])->name('vendor.dashboad');
    Route::get('/dashboard/newproduct',[ProductController::class,'new']);
    Route::post('/dashboard/newproduct/create',[ProductController::class,'create'])->name('product.new');
});

Route::get('/',[HomeController::class,'index'])->name('home');
