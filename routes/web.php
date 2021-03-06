<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController as ProductController;
use App\Http\Controllers\ChatController as ChatController;
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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/',[ProductController::class, 'welcome'])->name('welcome');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('products', 'App\Http\Controllers\ProductController');
Route::resource('chatroom', 'App\Http\Controllers\ChatRoomController');
Route::resource('bubbolo', 'App\Http\Controllers\StudentController');

Route::post('/chat', [ChatController::class, 'sendMessage']);

Route::get('/chat','App\Http\Controllers\ChatController@chatPage');

require __DIR__.'/auth.php';
