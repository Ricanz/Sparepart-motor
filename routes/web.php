<?php

use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\landingPageController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\CekOngkirController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\PembayaranController;

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
Route::get('/test', function () {
    return view('user.transaksi');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('produk', ProdukController::class);
    Route::resource('kategori', KategoriController::class);
    Route::resource('cart', CartController::class);
    Route::resource('rating', RatingController::class);
    Route::resource('transaksi', TransaksiController::class);
    Route::resource('artikel', ArtikelController::class);
    Route::resource('pembayaran', PembayaranController::class);
    Route::get('province', 'CheckoutController@get_province')->name('province');
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });
});




require __DIR__ . '/auth.php';

// Route::get('/konfirmasi', function () {
//     return view('user.konfirmasi');
// });
Route::get('/kontak', function () {
    return view('user.kontak');
});
Route::get('/Artikel', function () {
    return view('user.Artikel');
});
// Route::get('/detail-Artikel', function () {
//     return view('user.detailArtikel');
// });
Route::get('/detail-Artikel/{id}', [landingPageController::class, 'detailArtikel']);
Route::get('/detail-kategori/{id}', [landingPageController::class, 'detailKategori']);
Route::get('/detail-produk/{id}', [landingPageController::class, 'detailProduk']);
// Route::get('/suku-cadang', function () {
//     return view('user.produk');
// });

// Route::get('/home', landingPageController::class, 'produk');
Route::get('/', [landingPageController::class, 'produk'])->name('landingpage');
Route::get('/suku-cadang', [landingPageController::class, 'sukuCadang'])->name('produk');
// Route::get('home', 'landingPageController@produk');







Route::middleware(['auth'])->group(function () {
    Route::get('/hapus/{id}/cart', [landingPageController::class, 'hapuscart'])->name('hapuscart');
    Route::post('/tambah-cart/{id}', [landingPageController::class, 'instantcart']);
    Route::post('/tambah-cart', [landingPageController::class, 'tambahcart'])->name('tambahcart');
    Route::post('/tambah-wishlist/{id}', [landingPageController::class, 'tambahwishlist'])->name('tambahwishlist');
    Route::get('/show/{id}/produk', [landingPageController::class, 'showproduk'])->name('detail-produk');
    Route::get('/keranjang', [landingPageController::class, 'keranjang'])->name('keranjang');
    Route::POST('/checkout', [landingPageController::class, 'checkout'])->name('checkout');
    Route::get('/bayar', [CekOngkirController::class, 'pembayaran'])->name('bayar');
    Route::get('/wishlist', [landingPageController::class, 'datawishlist'])->name('wishlist');
    Route::post('/tambah-transaksi', [TransaksiController::class, 'tambahtransaksi'])->name('tambahtransaksi');

    Route::get('/bukti-pembayaran/{id}', [TransaksiController::class, 'konfirmasi'])->name('konfirmasi');
    Route::get('/user-has-paid/{code}', [TransaksiController::class, 'hasPay'])->name('hasPay');
    Route::post('/send-bukti/{id}', [TransaksiController::class, 'sendBukti'])->name('sendBukti');
});

Route::get('province', [CekOngkirController::class, 'get_province'])->name('get_province');
Route::get('city/{id}', [CekOngkirController::class, 'get_city'])->name('get_city');
Route::get('/origin={city_origin}&destination={city_destination}&weight={weight}&courier={courier}', [CekOngkirController::class, 'get_ongkir']);
