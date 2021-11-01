<?php

namespace App\Http\Controllers;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $Kategori = Kategori::all();
        return view('admin.Kategori.index', compact('Kategori'));
    }

    public function create()
    {
        return view('admin.Kategori.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required',
            'deskripsi' => 'required',
        ]);
        Kategori::create([
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
        ]);
        return redirect()->route('Kategori.index')
            ->with('success', 'Kategori Berhasil Ditambahkan');
    }

    public function show($id)
    {
        $Kategoris = Kategori::where('id', $id)->first();
        return view('Kategoriadmin.Kategori.show', compact('Kategori'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function edit($id)
    {
        $Kategori = Kategori::find($id);
        return view('admin.Kategori.edit',compact('Kategori','kode'));
    }

    public function update(Request $request, $id)
    {
        $Kategori = Kategori::findOrFail($id);
        $Kategori->kategori = $request->kategori;
        $Kategori->deskripsi = $request->deskripsi;
        $Kategori->save();

        return redirect()->route('Kategori.index')
        ->with('edit', 'Kategori Berhasil Diedit');
    }

    public function destroy($id)
    {
        Kategori::where('id', $id)->delete();

        return redirect()->route('Kategori.index')
            ->with('delete', 'Kategori Berhasil Dihapus');
    }
}
