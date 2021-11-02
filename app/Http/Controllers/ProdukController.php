<?php

namespace App\Http\Controllers;
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
        return view('admin.Produk.addProduk');
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

        $Produk = Produk::create([
            'nama_produk' => $request->nama_produk,
            'deskripsi' => $request->deskripsi,
            'foto' => $file_name,
            'harga' => $request->harga,
            'kategori_id' => $request->kategori_id,
            'stok' => $request->stok,
        ]);
        return redirect()->route('Produk.index')
            ->with('success', 'Produk Berhasil Ditambahkan');
    }
    public function show($id)
    {
        $Produks = Produk::where('id', $id)->first();
        return view('Produkadmin.Produk.show', compact('Produk'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function edit($id)
    {
        $Produk = Produk::find($id);
        return view('admin.Produk.edit',compact('Produk','kode'));
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

            Storage::delete("public/Produk/$Produk->struktur_organisasi");

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

        return redirect()->route('Produk.index')
        ->with('edit', 'Produk Berhasil Diedit');
    }

    public function destroy($id)
    {
        Produk::findOrFail($id)->delete();

        return redirect()->route('Produk.index')
            ->with('delete', 'Produk Berhasil Dihapus');
    }
}
