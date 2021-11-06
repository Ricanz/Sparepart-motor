<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\Cart;
use App\Models\Kategori;
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
        $Cart = Cart::all();
        $kategori = Kategori::all();
        return view('user.index', compact('produk','kategori','Cart'));
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
        $Cart1 = Cart::where('user_id',Auth::user()->id);
        $produk = Produk::all()->SUM('harga');
        $jumlahtotal = $Cart->SUM('jumlah');
        // dd($produk->harga);
        // $hargatotal = Produk::where('user_id',Auth::user()->id)->get();
        // $produk = Produk::find($Cart1->produk_id)->get();
        // dd($produk);
        // $totaljumlah = $Cart->produk->harga*$Cart->jumlah;
        return view('user.keranjang', compact('Cart','jumlahtotal','produk','Cart1'));
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

    public function hapuscart($id)
    {
        Cart::where('id', $id)->delete();

        return redirect()->route('keranjang')
            ->with('delete', 'Cart Berhasil Dihapus');
    }

}
