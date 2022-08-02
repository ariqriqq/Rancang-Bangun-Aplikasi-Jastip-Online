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
Route::put('/customer-ewallet', 'CustomerController@update_ewallet')->middleware('auth');
Route::resource('/jastiper', 'JastiperController')->middleware('auth');
Route::resource('/bukajasa', 'JasaController')->middleware('auth');
Route::resource('/orderan', 'OrderController')->middleware('auth');

Route::get('/riwayat-transaksi', 'PaymentController@index')->middleware('auth');
Route::get('/payment/{id}', 'PaymentController@payment');
Route::post('/payment/{id}', 'PaymentController@payment_post');


Route::post('/order/cari', 'JasaController@search')->middleware('auth');
Route::post('/orderan/cari-status', 'OrderController@search')->middleware('auth');
Route::post('/orderan/cari-idpesanan', 'OrderController@search_id')->middleware('auth');
Route::post('/history-orderan/cari-idpesanan', 'PaymentController@search')->middleware('auth');
Route::get('/order', 'JasaController@order')->middleware('auth');
Route::post('/verifikasi/{id}', 'JastiperController@form')->middleware('auth');

Route::post('/myorder','OrderController@store')->middleware('auth');
Route::get('/myorder','OrderController@index')->middleware('auth');
Route::get('/orderan','OrderController@show')->middleware('auth');
Route::get('/tagihan','OrderController@show_tagihan')->middleware('auth');
Route::post('/orderan','OrderController@store_order')->middleware('auth');
Route::post('/orderan_update','OrderController@orderan_update')->middleware('auth');
Route::post('/tolak_jasa/{id}', 'OrderController@tolak_jasa')->middleware('auth');
Route::post('/ewallet_update/{id}','CustomerController@update_ewallet')->middleware('auth');

Route::post('/orderan','OrderController@update_status')->middleware('auth');
Route::get('/history-orderan','PaymentController@history_jastiper')->middleware('auth');

Route::post('/form-order/{id}', 'JasaController@show')->middleware('auth');
Route::get('/form_pembayaran/{id}', 'OrderController@form_pembayaran')->middleware('auth');
Route::get('/resi_paket/{id}', 'PaymentController@resi_paket')->middleware('auth');
Route::post('/update_resi_paket/{id}', 'PaymentController@update_resi_paket')->middleware('auth');
Route::post('/update_pembayaran/{id}', 'OrderController@orderan_update')->middleware('auth');
Route::get('/refund', 'OrderController@refund');


//Admin
Route::get('/data-jastiper', 'AdminController@index');
Route::get('/data-customer', 'AdminController@customer');
Route::get('/validasi-payment', 'AdminController@payment');
Route::get('/payment_data', 'AdminController@show_payment_data');
Route::get('/payment_data/{id}', 'AdminController@payment_data');
Route::post('/payment-update/{id}', 'AdminController@payment_update');
Route::post('/payment-confirm/{id}', 'AdminController@payment_confirm');
Route::get('/pendaftaran', 'JastiperController@index');
Route::get('/refund_data', 'AdminController@show_pembayaran_jasa');
Route::post('/refund/{id}', 'AdminController@update_refund');
Route::post('/pendaftaran/{id}', 'JastiperController@update');
Route::get('/validasi-pembayaran', 'AdminController@pembayaran_jasa');
Route::post('/validasi-pembayaran/{id}', 'OrderController@update_pembayaran_jasa');
Route::get('/gdashboard', 'CountController@index');

Route::get('/daftar', function () {
    return view('auth.daftar');
});

Route::get('/bejastiper', function () {
    return view('page.jastiper.bejastiper');
})->middleware('auth');


Route::get('/login', function () {
    return view('auth.login');
})->name('login');


// Route::get('/pembayaran', function () {
//     return view('page.customer.pembayaran');
// });

Route::get('/history', function () {
    return view('page.customer.history');
});



Route::get('/edashboard', function () {
    return view('page.admin.edashboard');
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
