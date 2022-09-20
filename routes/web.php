<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\VariantController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/admindashboard', function () {
    return view('admin/admindashboard');
})->middleware(['auth','admin'])->name('admindashboard');

Route::prefix('admindashboard')->group(function () {
   /* Laravel auto map: 'products' metodo index, 'product/1' edit */
    Route::resource('products', ProductController::class)->middleware(['auth','admin']);
    Route::post('/purchase', [PurchaseController::class, 'store'])->name('purchase');


     // variants
     Route::resource('variants', VariantController::class)->middleware('auth','admin');
});



//Route::resource('/variants', 'VariantController')->middleware('auth:admin');

require __DIR__.'/auth.php';
