<?php

use App\Http\Controllers\CardController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProfileController;
use App\Models\Category;
use App\Models\Item;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
    // return view('welcome');
    // return view('supermarket');

// });


Route::get('/',[CategoryController::class,'index']);

Route::get('cart',[ CartController ::class,'cartItems'])->name('cart');

Route::get('updateCart/{id}',[ CartController ::class,'updateCart'])->name('updateCart');

Route::get('addToCart/{id}',[CartController::class,'addToCart'])->name('addToCart');

Route::get('removeFromCart/{id}',[CartController::class,'removeFromCart'])->name('removeFromCart');

Route::get('clearCart',[CartController::class,'clearCart'])->name('clearCart');
   

Route::get('category_items/{id}',[ItemController::class,'show_items_in_category'])->name('show_items_in_category');


Route::get('showAll_categories',[CategoryController::class,'showAll'])->name('showAll_categories');
Route::get('showAll_items',[ItemController::class,'showAll'])->name('showAll_items');
Route::get('showInvertory/',[ItemController::class,'showInvertory'])->name('showInvertory');
Route::get('updateInvertory/{id}',[ItemController::class,'updateInvertory'])->name('updateInvertory');

Route::resource("admin/category",CategoryController::class)->middleware(['CheckRole']);
Route::resource("admin/item",ItemController::class)->middleware(['CheckRole']);

Route::get('admin/', function () {
    // return view('welcome');
    return view('admin/dashboard');
})->middleware(['auth','CheckRole'])->name('admin.dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
