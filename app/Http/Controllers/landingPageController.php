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

    public function instantcart(Request $request, $id)
    {
        Cart::create([
            'produk_id' => $id,
            'jumlah' => '1',
            'user_id' => Auth::user()->id,
        ]);
        return redirect()->route('landingpage')
            ->with('success', 'Produk Berhasil Ditambahkan');
        // return view('user.detailProduk',$request->produk_id, compact('produk'));
    }

    public function tambahcart(Request $request)
    {
        Cart::create([
            'produk_id' => $request->produk_id,
            'jumlah' => $request->jumlah,
            'user_id' => Auth::user()->id,
        ]);
        return redirect()->route('landingpage')
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
        // dd($cart,$jumlah);
        foreach ($cart as $item) {
            // dd($item);
            $nilai = $jumlah[$item];
            $produkid = Cart::find($item);

            // dd($produkid,$nilai,$produkid->produk_id);
            Pembayaran::create([
                'produk_id'=> $produkid->produk_id,
                'user_id' => Auth::user()->id,
                'jumlah' => $nilai,
            ]);
            Cart::findOrFail($item)->delete();

        }
    
        return redirect()->route('bayar')
            ->with('success', 'Produk Berhasil Ditambahkan');
    }

    public function pembayaran()
    {
        $Pembayaran = Pembayaran::where('user_id',Auth::user()->id)->get();
        return view('user.checkout', compact('Pembayaran'));
    }

}
