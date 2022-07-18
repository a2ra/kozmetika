<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CosmeticController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ShopController;
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

/*Route::get('/', function () {
    return view('welcome');
});
*/

Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
    return view('dashboard');
})->name('dashboard');

/*Route::middleware(['auth:sanctum', 'verified'])->get('/cosmetics', function () {
    return view('cosmetics.index');
})->name('cosmetics');
*/

Route::middleware(['auth:sanctum', 'verified'])->get('cosmetics', [CosmeticController::class, 'index'])->name('cosmetics');
Route::middleware(['auth:sanctum', 'verified'])->get('add_cosmetic', [CosmeticController::class, 'create'])->name('add_cosmetic');
Route::middleware(['auth:sanctum', 'verified'])->post('store_cosmetic', [CosmeticController::class, 'store'])->name('store_cosmetic');
Route::middleware(['auth:sanctum', 'verified'])->post('delete_cosmetic', [CosmeticController::class, 'delete'])->name('delete_cosmetic');
Route::middleware(['auth:sanctum', 'verified'])->post('edit_cosmetic', [CosmeticController::class, 'edit'])->name('edit_cosmetic');
Route::middleware(['auth:sanctum', 'verified'])->post('update_cosmetic', [CosmeticController::class, 'update'])->name('update_cosmetic');

Route::middleware(['auth:sanctum', 'verified'])->get('customers', [CustomerController::class, 'index'])->name('customers');
Route::middleware(['auth:sanctum', 'verified'])->get('add_customer', [CustomerController::class, 'create'])->name('add_customer');
Route::middleware(['auth:sanctum', 'verified'])->post('store_customer', [CustomerController::class, 'store'])->name('store_customer');
Route::middleware(['auth:sanctum', 'verified'])->post('edit_customer', [CustomerController::class, 'edit'])->name('edit_customer');
Route::middleware(['auth:sanctum', 'verified'])->post('delete_customer', [CustomerController::class, 'delete'])->name('delete_customer');
Route::middleware(['auth:sanctum', 'verified'])->post('update_customer', [CustomerController::class, 'update'])->name('update_customer');


Route::middleware(['auth:sanctum', 'verified'])->get('brands', [BrandController::class, 'index'])->name('brands');
Route::middleware(['auth:sanctum', 'verified'])->get('add_brand', [BrandController::class, 'create'])->name('add_brand');
Route::middleware(['auth:sanctum', 'verified'])->post('delete_brand', [BrandController::class, 'delete'])->name('delete_brand');
Route::middleware(['auth:sanctum', 'verified'])->post('edit_brand', [BrandController::class, 'edit'])->name('edit_brand');
Route::middleware(['auth:sanctum', 'verified'])->post('store_brand', [BrandController::class, 'store'])->name('store_brand');
Route::middleware(['auth:sanctum', 'verified'])->post('update_brand', [BrandController::class, 'update'])->name('update_brand');
Route::middleware(['auth:sanctum', 'verified'])->get('shop', [ShopController::class, 'index'])->name('shops');


/*Route::middleware(['auth:sanctum', 'verified'])->get('categories', [BrandController::class, 'index'])->name('categories');*/





