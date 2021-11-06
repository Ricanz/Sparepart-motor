<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::all();
        return view('admin.produk.index', compact('produk'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $kategori = Kategori::all();
        return view('admin.produk.tambah', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'foto' => 'required',
            'kategori_id' => 'required',
            'stok' => 'required', 
        ]);

        $date = date("his");
        $extension = $request->file('foto')->extension();
        $file_name = "Produk_$date.$extension";
        $path = $request->file('foto')->storeAs('public/Produk', $file_name);

        Produk::create([
            'nama_produk' => $request->nama_produk,
            'deskripsi' => $request->deskripsi,
            'foto' => $file_name,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'kategori_id' => $request->kategori_id,
        ]);
        return redirect()->route('produk.index')
            ->with('success', 'Produk Berhasil Ditambahkan');
    }
    public function show($id)
    {
        $Produks = Produk::where('id', $id)->first();
        return view('user.show', compact('Produk'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function edit($id)
    {
        $produk = Produk::find($id);
        $kategori = Kategori::all();
        return view('admin.produk.edit',compact('produk','kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_produk' => 'required',
            'deskripsi' => 'required',
            'foto' => 'file|mimes:jpg,png,jpeg,gif,svg,jfif|max:2048',
            'harga' => 'required',
            'kategori_id' => 'required',
            'stok' => 'required',
        ]);

        $Produk = Produk::findOrFail($id);

        if ($request->has("foto")) {

            Storage::delete("public/Produk/$Produk->foto");

            $date = date("his");
            $extension = $request->file('foto')->extension();
            $file_name = "Produk_$date.$extension";
            $path = $request->file('foto')->storeAs('public/Produk', $file_name);
            
            $Produk->foto = $file_name;
        }

        $Produk->nama_produk = $request->nama_produk;
        $Produk->deskripsi = $request->deskripsi;
        $Produk->harga = $request->harga;
        $Produk->kategori_id = $request->kategori_id;
        $Produk->stok = $request->stok;
        $Produk->save();

        return redirect()->route('produk.index')
        ->with('edit', 'Produk Berhasil Diedit');
    }

    public function destroy($id)
    {
        $Produk = Produk::findOrFail($id);
        Storage::delete("public/Produk/$Produk->foto");
        $Produk->delete();
        return redirect()->route('produk.index')
            ->with('delete', 'Produk Berhasil Dihapus');
    }
}
