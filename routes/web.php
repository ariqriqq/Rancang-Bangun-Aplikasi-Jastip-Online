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

//User
Route::resource('message', 'MessageController');
Auth::routes();
Route::resource('/', 'PagesController');
Route::resource('/customer', 'CustomerController')->middleware('auth');
Route::resource('/jastiper', 'JastiperController')->middleware('auth');
Route::resource('/bukajasa', 'JasaController')->middleware('auth');
Route::resource('/orderan', 'OrderController')->middleware('auth');

Route::get('/order', 'JasaController@index')->middleware('auth');
Route::post('/verifikasi/{id}', 'JastiperController@form')->middleware('auth');

Route::post('/myorder','OrderController@store')->middleware('auth');
Route::get('/myorder','OrderController@index')->middleware('auth');
Route::get('/orderan','OrderController@show')->middleware('auth');
Route::post('/orderan','OrderController@store_order')->middleware('auth');
Route::post('/orderan/pembayaran','OrderController@form_pembayaran')->middleware('auth');


Route::post('/form-order/{id}', 'JasaController@show')->middleware('auth');
// Route::post('/form-pembayaran/{id}', 'OrderController@form_pembayaran')->middleware('auth');

Route::get('/bukajasa', function () {
    return view('page.jastiper.bukajasa');
})->middleware('auth');
// Route::get('/form_pembayaran', function () {
//     return view('page.jastiper.form_pembayaran');
// })->middleware('auth');



// Route::get('/form_order', function () {
//     return view('page.customer.form_order');
// });
// Route::get('/orderan', function () {
//     return view('page.jastiper.orderan');
// });

//Admin
Route::get('/pendaftaran', 'JastiperController@index');
Route::post('/pendaftaran/{id}', 'JastiperController@update');
Route::get('/validasi-pembayaran', 'OrderController@pembayaran_jasa');
Route::post('/validasi-pendaftaran/{id}', 'OrderController@update_pembayaran_jasa');


Route::get('/daftar', function () {
    return view('auth.daftar');
});

Route::get('/bejastiper', function () {
    return view('page.jastiper.bejastiper');
})->middleware('auth');


Route::get('/login', function () {
    return view('auth.login');
})->name('login');


Route::get('/pembayaran', function () {
    return view('page.customer.pembayaran');
});

Route::get('/history', function () {
    return view('page.customer.history');
});

Route::get('/gdashboard', function () {
    return view('page.admin.gdashboard');
});

Route::get('/edashboard', function () {
    return view('page.admin.edashboard');
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
