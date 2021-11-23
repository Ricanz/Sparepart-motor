<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\Cart;
use App\Models\Kategori;
use App\Models\Pembayaran;
use App\Models\Transaksi;
use App\Models\Wishlist;
use App\Models\Artikel;
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
        $artikel = Kategori::paginate(6);
        $wishlist = Wishlist::all();
        return view('user.index', compact('produk','kategori','Cart','wishlist','artikel'));
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

    public function datawishlist()
    {
        $wishlist = Wishlist::where('user_id', Auth::user()->id)->get();

        return view('user.wishlist', compact('wishlist'));
    }

    public function tambahwishlist(Request $request, $id)
    {
        Wishlist::create([
            'produk_id' => $id,
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
        $jumlahtotal = 0;
        
        foreach ($Cart as $item)
        {
            $jumlahtotal += $item->produk->harga * $item->jumlah;
        }
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

    

    public function hapuscart($id)
    {
        Cart::where('id', $id)->delete();

        return redirect()->route('keranjang')
            ->with('delete', 'Cart Berhasil Dihapus');
    }

    public function sukuCadang()
    {
        $produk = Produk::simplePaginate(9);
        $sukuCadang = Produk::simplePaginate(4);
        return view('user.produk', compact('sukuCadang','produk'));

    }

    public function detailArtikel($id)
    {
        $artikel = Artikel::where('id', $id)->first();
        return view ('user.detailArtikel', compact('artikel'));
    }

    public function detailKategori($id)
    {
        $kategori = Kategori::find($id);
        $produk = Produk::where('kategori_id',$id)->get();
        return view ('user.kategori', compact('kategori', 'produk'));
    }

    public function detailProduk($id)
    {
        $produk = Produk::where('id', $id)->first();
        return view ('user.detailProduk', compact('produk'));
    }


}
