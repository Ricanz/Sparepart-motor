<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $Cart = Cart::all();
        return view('admin.Cart.index', compact('Cart'));
    }

    public function create()
    {
        return view('admin.Cart.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'produk' => 'required',
            // 'jumlah' => 'required',
            'user_id' => 'required',
        ]);
        Cart::create([
            'produk' => $request->produk,
            'jumlah' => '1',
            'user_id' => Auth::user()->id,
        ]);
        return redirect()->route('Cart.index')
            ->with('success', 'Cart Berhasil Ditambahkan');
    }

    public function show($id)
    {
        $Carts = Cart::where('id', $id)->first();
        return view('admin.Cart.show', compact('Cart'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function edit($id)
    {
        $Cart = Cart::find($id);
        return view('admin.Cart.edit',compact('Cart','kode'));
    }


    public function update(Request $request, $id)
    {
        $Cart = Cart::findOrFail($id);
        $Cart->produk = $request->produk;
        $Cart->jumlah = $request->jumlah;
        $Cart->user_id = $request->user_id;
        $Cart->save();

        return redirect()->route('Cart.index')
        ->with('edit', 'Cart Berhasil Diedit');
    }

    public function destroy($id)
    {
        Cart::where('id', $id)->delete();

        return redirect()->route('Cart.index')
            ->with('delete', 'Cart Berhasil Dihapus');
    }
}
