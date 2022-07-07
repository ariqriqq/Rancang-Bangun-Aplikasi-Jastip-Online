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
Route::resource('/jastiper', 'JastiperController')->middleware('auth');
Route::resource('/bukajasa', 'JasaController')->middleware('auth');
Route::get('/pendaftaran', 'JastiperController@index');


Route::get('/order', function () {
    return view('page.customer.order');
})->middleware('auth');

Route::get('/daftar', function () {
    return view('auth.daftar');
});

Route::get('/bejastiper', function () {
    return view('page.jastiper.bejastiper');
})->middleware('auth');

Route::get('/myorder', function () {
    return view('page.customer.myorder');
})->middleware('auth');

Route::get('/bukajasa', function(){
    return view('page.jastiper.bukajasa');
})->middleware('auth');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/verifikasi', function () {
    return view('page.jastiper.verifikasi');
});

Route::get('/pembayaran', function () {
    return view('page.customer.pembayaran');
});

Route::get('/history', function () {
    return view('page.customer.history');
});

Route::get('/gdashboard', function(){
    return view('page.admin.gdashboard');
});

Route::get('/edashboard', function(){
    return view('page.admin.edashboard');
});


// Route::get('/', function () {
//     return view('page.home');
// });

// Route::get('/profile', function () {
//     return view('page.profile');
// })->middleware('auth');
// Route::get('/register', function () {
//     return view('page.register');
// });
// Route::get('/order', function () {
//     return view('page.order');
// })->middleware(['auth','verified'])->name('order');
// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
