<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Produk;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlist = Wishlist::all();
        return view('admin.wishlist.index', compact('wishlist'));
    }

    public function create()
    {
        return view('admin.wishlist.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'produk_id' => 'required',
            'user_id' => 'required',
        ]);
        Wishlist::create([
            'produk_id' => $request->produk_id,
            'user_id' => $request->user_id,
        ]);
        return redirect()->route('wishlist.index')
            ->with('success', 'wishlist Berhasil Ditambahkan');
    }

    public function show($id)
    {
        $wishlist = Wishlist::where('id', $id)->first();
        return view('admin.wishlist.show', compact('wishlist'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function edit($id)
    {
        $wishlist = Wishlist::find($id);
        return view('admin.wishlist.edit',compact('wishlist','kode'));
    }

    public function update(Request $request, $id)
    {
        $wishlist = Wishlist::findOrFail($id);
        $wishlist->produk_id = $request->produk_id;
        $wishlist->user_id = $request->user_id;
        $wishlist->save();

        return redirect()->route('wishlist.index')
        ->with('edit', 'wishlist Berhasil Diedit');
    }

    public function destroy($id)
    {
        Wishlist::where('id', $id)->delete();

        return redirect()->route('wishlist.index')
            ->with('delete', 'wishlist Berhasil Dihapus');
    }
}
