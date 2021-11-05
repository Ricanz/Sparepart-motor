<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\Cart;
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
        return view('user.show', compact('produk'));
    }

    public function tambahcart(Request $request)
    {
        Cart::create([
            'produk_id' => $request->nama_produk,
            'jumlah' => '1',
            'user_id' => Auth::user()->id,
        ]);
        return redirect()->route('produk.index')
            ->with('success', 'Produk Berhasil Ditambahkan');
    }

}
