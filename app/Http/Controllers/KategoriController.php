<?php

namespace App\Http\Controllers;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        return view('admin.kategori.index', compact('kategori'));
    }

    public function create()
    {
        return view('admin.kategori.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required',
            'deskripsi' => 'required',
            'foto' => 'required',
        ]);

        $date = date("his");
        $extension = $request->file('foto')->extension();
        $file_name = "Kategori_$date.$extension";
        $path = $request->file('foto')->storeAs('public/Kategori', $file_name);

        Kategori::create([
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'foto' => $file_name,
        ]);
        return redirect()->route('kategori.index')
            ->with('success', 'Kategori Berhasil Ditambahkan');
    }

    public function show($id)
    {
        $kategoris = Kategori::where('id', $id)->first();
        return view('Kategoriadmin.Kategori.show', compact('kategori'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function edit($id)
    {
        $kategori = Kategori::find($id);
        return view('admin.kategori.edit',compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->kategori = $request->kategori;
        $kategori->deskripsi = $request->deskripsi;
        if ($request->has("foto")) {

            Storage::delete("public/Kategori/$kategori->foto");

            $date = date("his");
            $extension = $request->file('foto')->extension();
            $file_name = "Kategori_$date.$extension";
            $path = $request->file('foto')->storeAs('public/Kategori', $file_name);
            
            $kategori->foto = $file_name;
        }

        $kategori->save();

        return redirect()->route('kategori.index')
        ->with('edit', 'Kategori Berhasil Diedit');
    }

    public function destroy($id)
    {
        $Kategori = Kategori::findOrFail($id);
        Storage::delete("public/Kategori/$Kategori->foto");
        $Kategori->delete();
        return redirect()->route('kategori.index')
            ->with('delete', 'Kategori Berhasil Dihapus');
    }
}
