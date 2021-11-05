<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\Cart;
use App\Models\Pembayaran;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Http\Request;

class landingPageController extends Controller
{
    public function produk()
    {
        $produk = Produk::all();
        return view('user.index', compact('produk'));
    }

    public function showproduk($id)
    {
        $produk = Produk::find($id);
        return view('user.detailProduk', compact('produk'));
    }

    public function tambahcart(Request $request)
    {
        Cart::create([
            'produk_id' => $request->produk_id,
            'jumlah' => '1',
            'user_id' => Auth::user()->id,
        ]);
        return redirect()->route('detail-produk',$request->produk_id)
            ->with('success', 'Produk Berhasil Ditambahkan');
        // return view('user.detailProduk',$request->produk_id, compact('produk'));
    }

    public function keranjang()
    {
        $Cart = Cart::where('user_id',Auth::user()->id)->get();
        return view('user.keranjang', compact('Cart'));
    }

    public function checkout(Request $request)
    {
        $cart = $request->input('cart');
        $jumlah = $request->input('jumlah');
        foreach ($cart as $item) {

            $nilai = $jumlah[$item];
            // dd($cart,$jumlah,$nilai);
            Pembayaran::create([
                'cart_id'=> $item,
                'user_id' => Auth::user()->id,
                'jumlah' => $nilai,
            ]);
        }
    
        return redirect()->route('detail-produk',$request->produk_id)
            ->with('success', 'Produk Berhasil Ditambahkan');
    }

}
