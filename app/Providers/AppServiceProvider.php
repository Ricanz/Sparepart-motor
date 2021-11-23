<?php

namespace App\Providers;
use App\Models\Cart;
use App\Models\Wishlist;
use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Artikel;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::share('Cart', Cart::all());
        View::share('Wishlist', Wishlist::all());
        View::share('Kategori', Kategori::all());
        View::share('Produk', Produk::all());
        View::share('Artikel', Artikel::all());
    }
}
