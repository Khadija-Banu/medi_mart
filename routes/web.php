<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\FrontendHomeController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\SliderController;
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

Route::get('/master', function () {
    return view('backend.master');
});
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//backend route

//category route

Route::prefix('category')->group(function () {
    Route::get('/index',[CategoryController::class,'index'])->name('category_index');
    Route::get('/create',[CategoryController::class,'create'])->name('category_create');
    Route::post('/store',[CategoryController::class,'store'])->name('category_store');
    Route::get('/edit/{id}',[CategoryController::class,'edit'])->name('category_edit');
    Route::post('/update/{id}',[CategoryController::class,'update'])->name('category_update');
    Route::get('/delete/{id}',[CategoryController::class,'delete'])->name('category_delete');
});

//medicine route

Route::prefix('medicine')->group(function () {
    Route::get('/index',[MedicineController::class,'index'])->name('medicine_index');
    Route::get('/create',[MedicineController::class,'create'])->name('medicine_create');
    Route::post('/store',[MedicineController::class,'store'])->name('medicine_store');
    Route::get('/edit/{id}',[MedicineController::class,'edit'])->name('medicine_edit');
    Route::post('/update/{id}',[MedicineController::class,'update'])->name('medicine_update');
    Route::get('/delete/{id}',[MedicineController::class,'delete'])->name('medicine_delete');
});

//vendor route

Route::prefix('vendor')->group(function () {
    Route::get('/index',[VendorController::class,'index'])->name('vendor_index');
    Route::get('/create',[VendorController::class,'create'])->name('vendor_create');
    Route::post('/store',[VendorController::class,'store'])->name('vendor_store');
    Route::get('/edit/{id}',[VendorController::class,'edit'])->name('vendor_edit');
    Route::post('/update/{id}',[VendorController::class,'update'])->name('vendor_update');
    Route::get('/delete/{id}',[VendorController::class,'delete'])->name('vendor_delete');
});

//order route

Route::prefix('order')->group(function () {
    Route::get('/index',[OrderController::class,'index'])->name('order_index');
    Route::get('/create',[OrderController::class,'create'])->name('order_create');
    Route::post('/store',[OrderController::class,'store'])->name('order_store');
    Route::get('/edit/{id}',[OrderController::class,'edit'])->name('order_edit');
    Route::post('/update/{id}',[OrderController::class,'update'])->name('order_update');
    Route::get('/delete/{id}',[OrderController::class,'delete'])->name('order_delete');
});


//cart route

Route::prefix('cart')->group(function () {
    Route::get('/index',[CartController::class,'index'])->name('cart_index');
    Route::get('/create',[CartController::class,'create'])->name('cart_create');
    Route::post('/store',[CartController::class,'store'])->name('cart_store');
    Route::get('/edit/{id}',[CartController::class,'edit'])->name('cart_edit');
    Route::post('/update/{id}',[CartController::class,'update'])->name('cart_update');
    Route::get('/delete/{id}',[CartController::class,'delete'])->name('cart_delete');
    Route::get('/cart_item_list', [CartController::class, 'cartItems'])->name('cart_items');
});

//company route

Route::prefix('company')->group(function () {
    Route::get('/index',[CompanyController::class,'index'])->name('company_index');
    Route::get('/create',[CompanyController::class,'create'])->name('company_create');
    Route::post('/store',[CompanyController::class,'store'])->name('company_store');
    Route::get('/edit/{id}',[CompanyController::class,'edit'])->name('company_edit');
    Route::post('/update/{id}',[CompanyController::class,'update'])->name('company_update');
    Route::get('/delete/{id}',[CompanyController::class,'delete'])->name('company_delete');
});


//slider route

Route::prefix('slider')->group(function () {
    Route::get('/index',[SliderController::class,'index'])->name('slider_index');
    Route::get('/create',[SliderController::class,'create'])->name('slider_create');
    Route::post('/store',[SliderController::class,'store'])->name('slider_store');
    Route::get('/edit/{id}',[SliderController::class,'edit'])->name('slider_edit');
    Route::post('/update/{id}',[SliderController::class,'update'])->name('slider_update');
    Route::get('/delete/{id}',[SliderController::class,'delete'])->name('slider_delete');
});


//user list route
Route::get('/user_list',[ProfileController::class,'userList'])->name('user_list');


Route::get('/search',[SearchController::class,'medicine_search'])->name('search');
// Route::get('/f_search',[SearchController::class,'f_medicine_search'])->name('f_search');


//Frontend Route
Route::get('/f_master', function () {
    return view('frontend.master');
});

Route::get('/home',[FrontendHomeController::class,'home'])->name('frontend_home');
Route::get('/f_shop/{id}',[FrontendHomeController::class,'shop'])->name('frontend_shop');
Route::get('/product_details/{id}',[FrontendHomeController::class,'product'])->name('frontend_product');
