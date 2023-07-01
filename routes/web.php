<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductImageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\tempImageController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\CategoryLivewire;
use App\Http\Livewire\ProductLivewire;
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

Route::get('/',[UserController::class,'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware('auth','role:admin|staff')->group(function (){
    Route::get('/admin-panel',[AdminController::class,'index'])->name('admin.index');
    Route::get('/category',[CategoryLivewire::class,'index'])->name('admin.category');
    Route::get('/add-product',[ProductController::class,'addProductForm'])->name('admin.product');
    Route::post('/add-product',[ProductController::class,'addProduct'])->name('add.product');
    Route::get('/show-product',[ProductController::class,'showProduct'])->name('show.product');
    Route::get('/delete-product/{id}',[ProductController::class,'deleteProduct'])->name('delete.product');
    Route::get('/edit-product/{id}',[ProductController::class,'editProduct'])->name('edit.product');
    Route::post('/update-product/{id}',[ProductController::class,'updateProduct'])->name('update.product');
    Route::post('/temp-images',[tempImageController::class,'store'])->name('temp-images.create');
    Route::post('/product-images',[ProductImageController::class,'store'])->name('product-image.store');
    Route::delete('/product-images/delete/{image_id}',[ProductImageController::class,'deleteImage'])->name('product-image.delete');
    Route::delete('/delete-temp-images/{image_id}',[tempImageController::class,'deleteTempImage'])->name("delete-temp-images");
    // Route::post('/product-images',[ProductImageController::class,'store'])->name('product-images.store');
});
Route::get('/redirect',[AdminController::class,'redirect'])->middleware('auth');
Route::get('/product-details/{id}',[UserController::class,'product_details'])->name('product_details');
Route::get('/product-add-carts/{id}',[UserController::class,'cart'])->middleware('auth')->name('product.cart');



require __DIR__.'/auth.php';
