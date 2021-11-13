<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Artikel;

class ArtikelController extends Controller
{
    public function index() {
        $artikel = Artikel::all();
        return view('admin.artikel.index', compact('artikel')); 
    }

    public function create() {
        return view('admin.artikel.tambah');
    }

    public function store(Request $request) {

        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'foto' => 'required',
        ]);

        $date = date("his");
        $extension = $request->file('foto')->extension();
        $file_name = "Artikel_$date.$extension";
        $path = $request->file('foto')->storeAs('public/Artikel', $file_name);

        Artikel::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'foto' => $file_name,
        ]);

        return redirect()->route('artikel.index')
            ->with('success', 'Artikel Berhasil Ditambahkan');
    }

    public function edit() {
        return view('admin.artikel.edit');
    }

    public function update(Request $request, $id) {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'foto' => 'required',
        ]);

        $artikel = Artikel::findOrFail($id);

        if ($request->has("foto")) {

            Storage::delete("public/Artikel/$artikel->foto");

            $date = date("his");
            $extension = $request->file('foto')->extension();
            $file_name = "Artikel_$date.$extension";
            $path = $request->file('foto')->storeAs('public/Artikel', $file_name);
            
            $artikel->foto = $file_name;
        }

        $artikel->judul = $request->judul;
        $artikel->deskripsi = $request->deskripsi;
        $artikel->foto = $request->foto;
        $artikel->save();

        return redirect()->route('artikel.index')
        ->with('edit', 'Artikel Berhasil Diedit');

    }
    public function destroy($id)
    {
        $artikel = Artikel::findOrFail($id);
        Storage::delete("public/Artikel/$artikel->foto");
        $artikel->delete();
        return redirect()->route('artikel.index')
            ->with('delete', 'Artikel Berhasil Dihapus');
    }



}
