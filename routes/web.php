<?php

use Illuminate\Support\Facades\Route;

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

// Route::post('/messages', 'ChatController@store');
Route::resource('message', 'MessageController');
Auth::routes();
Route::resource('/', 'PagesController');
Route::resource('/customer', 'CustomerController')->middleware('auth');
// Route::get('/', function () {
//     return view('page.home');
// });
Route::get('/order', function () {
    return view('page.order');
})->middleware('auth');
Route::get('/bejastiper', function () {
    return view('page.bejastiper');
})->middleware('auth');
Route::get('/myorder', function () {
    return view('page.myorder');
})->middleware('auth');
// Route::get('/profile', function () {
//     return view('page.profile');
// })->middleware('auth');
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::get('/verifikasi', function () {
    return view('page.verifikasi');
});
// Route::get('/register', function () {
//     return view('page.register');
// });
// Route::get('/order', function () {
//     return view('page.order');
// })->middleware(['auth','verified'])->name('order');
// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
