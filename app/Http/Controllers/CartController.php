<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $Cart = Cart::all();
        return view('admin.cart.index', compact('Cart'));
    }

    public function create()
    {
        return view('admin.cart.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'produk' => 'required',
            'jumlah' => 'required',
            'user_id' => 'required',
        ]);
        Cart::create([
            'produk' => $request->produk,
            'jumlah' => $request->jumlah,
            'user_id' => $request->user_id,
        ]);
        return redirect()->route('cart.index')
            ->with('success', 'Cart Berhasil Ditambahkan');
    }

    public function show($id)
    {
        $Carts = Cart::where('id', $id)->first();
        return view('admin.cart.show', compact('Cart'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function edit($id)
    {
        $Cart = Cart::find($id);
        return view('admin.cart.edit',compact('Cart','kode'));
    }


    public function update(Request $request, $id)
    {
        $Cart = Cart::findOrFail($id);
        $Cart->produk = $request->produk;
        $Cart->jumlah = $request->jumlah;
        $Cart->user_id = $request->user_id;
        $Cart->save();

        return redirect()->route('cart.index')
        ->with('edit', 'Cart Berhasil Diedit');
    }

    public function destroy($id)
    {
        Cart::where('id', $id)->delete();

        return redirect()->route('cart.index')
            ->with('delete', 'Cart Berhasil Dihapus');
    }
    
}
