<?php

use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\landingPageController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\TransaksiController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/detail-new', function () {
//     return view('user.detailProduk');
// });
// Route::get('/show', function () {
//     return view('user.show');
// });
// Route::get('/keranjangBelanja', function () {
//     return view('user.keranjang');
// });
// Route::get('/checkout', function () {
//     return view('user.checkout');
// });

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('produk', ProdukController::class);
    Route::resource('kategori', KategoriController::class);   
    Route::resource('cart', CartController::class);
    Route::resource('rating', RatingController::class);
    Route::resource('transaksi', TransaksiController::class);
    Route::get('/dashboard', function () {
        return view('dashboard');
    });
});


require __DIR__.'/auth.php';


// Route::get('/des', function () {
//     return view('user.index');
// });

// Route::get('/home', landingPageController::class, 'produk');
Route::get('/', [landingPageController::class, 'produk'])->name('landingpage');
// Route::get('home', 'landingPageController@produk');






Route::POST('/checkout', [landingPageController::class, 'checkout'])->name('checkout');
Route::get('/bayar', [landingPageController::class, 'pembayaran'])->name('bayar');

Route::middleware(['auth'])->group(function () {
    Route::get('/hapus/{id}/cart', [landingPageController::class, 'hapuscart'])->name('hapuscart');
    Route::post('/tambah-cart/{id}', [landingPageController::class, 'instantcart']);
    Route::post('/tambah-cart', [landingPageController::class, 'tambahcart'])->name('tambahcart');
    Route::get('/show/{id}/produk', [landingPageController::class, 'showproduk'])->name('detail-produk');
    Route::get('/keranjang', [landingPageController::class, 'keranjang'])->name('keranjang');
});