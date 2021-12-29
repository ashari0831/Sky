<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PayOrderController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\AdminstuffController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\ChatroomController;
use Illuminate\Support\Facades\Auth;
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

Route::group(['middleware' => ['auth']], function(){
   Route::put('/profile', [UserController::class, 'profileUpdate']);
   Route::get('/profile/{id}', [UserController::class, 'profile']);
   Route::get('/order', [ProductController::class, 'order']);
   Route::post('/orderPlace', [ProductController::class, 'orderPlace']);
   Route::post('/add_to_cart', [ProductController::class, 'addToCart']);
   Route::get('/cartlist', [ProductController::class, 'cartList']);
   Route::post('/cartlist/{product_id}', [ProductController::class, 'RemoveFromCartList']);
   Route::post('/detail/{product_id}/comment/post', [ProductController::class, 'comment']);
   Route::view('/detail/{product_id}/comment', 'comment');
   Route::post('/newsletter', [NewsletterController::class ,'store']);
   Route::get('/chatroom', function () {
      return view('widgets/recent_chat', ['chat_room_id' => Auth::user()->chatroom->id]);
   });
   Route::post('/sendMessage', [ChatroomController::class, 'storeMessage']);
});

Route::group(['middleware' => ['auth','admin']], function(){
   Route::post('/admin/products', [AdminstuffController::class, 'productAdd']);
   Route::get('/admin', [AdminstuffController::class, 'allChats']);
   Route::get('/admin/products', [AdminstuffController::class, 'allProducts']);
   Route::get('/admin/products/{id}/edit', [AdminstuffController::class, 'detail']);
   Route::patch('/admin/products/{id}', [AdminstuffController::class, 'productUpdate']);
   Route::delete('/admin/products/{id}', [AdminstuffController::class, 'productDelete']);
   Route::view('/admin/products/create', 'admin.productAdd');
   Route::get('/admin/comments', [AdminstuffController::class, 'pendingComments']);
   Route::patch('/admin/comments/confirm', [AdminstuffController::class, 'commentConfirm']);
   Route::patch('/admin/comments/deny', [AdminstuffController::class, 'commentDeny']);
   Route::get('/admin/sendnewsletter', function () {
      Artisan::call('schedule:run'); 
      return redirect('/admin');  
   });
   Route::post('/sendMessageFromAdmin', [AdminstuffController::class, 'storeMessage']);
  // Route::get('/admin/chatroom/{chat_room_id}', [AdminstuffController::class, 'chatroom']);
   Route::get('/admin/chatroom/{chat_room_id}', function ($chat_room_id) {
      //return view('admin.chatroom2');
       return view('widgets.recent_admin_chat', ['chat_room_id' => $chat_room_id]);
   });
});


Route::get('/logout', function(){
   Auth::logout();
   return redirect('/login');
});

//Route::post('/login', [UserController::class, 'login']);

Route::get('/', [ProductController::class, 'index']);

Route::get('/detail/{id}', [ProductController::class, 'detail']);

Route::get('/search', [ProductController::class, 'search']);
Route::get('/search', [ProductController::class, 'search']);





Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::view('/send', 'admin.chatroom2');