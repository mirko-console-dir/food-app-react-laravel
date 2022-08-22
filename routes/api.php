<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/* aggiungendo qui la path del model User e ritornando con ::all() (in php per accedere ai metodi statici si usa ::)*/
use App\Models\Product;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
/* con questa rotta controllando su postman localhost:8000/api/user*/
Route::get('products', function (){
    return Product::all();
   /*  return User::where('email','mirko@gmail.it')->get(); */

});
