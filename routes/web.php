<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\VendorController;
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