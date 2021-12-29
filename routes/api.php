<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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
Route::get('/product', function () {
    return Product::all();
});

Route::get('/product/{id}', function ($id) {
    return Product::find($id);
});

Route::post('/product', function (Request $req) {
    

    $res = Product::create([
       'category'=>$req->category,
       'name'=>$req->name,
       'price'=>$req->price,
       'description'=>$req->description,
       'gallery'=>$req->gallery,
       'quantity'=> $req->quantity,
     ]);

     return $res; 
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



