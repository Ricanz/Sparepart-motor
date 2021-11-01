<?php

namespace App\Http\Controllers;
use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function index()
    {
        $Rating = Rating::all();
        return view('admin.Rating.index', compact('Rating'));
    }

    public function create()
    {
        return view('admin.Rating.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nilai' => 'required',
            'produk_id' => 'required',
            'user_id' => 'required',
        ]);
        Rating::create([
            'nilai' => $request->nilai,
            'produk_id' => $request->produk_id,
            'user_id' => $request->user_id,
        ]);
        return redirect()->route('Rating.index')
            ->with('success', 'Rating Berhasil Ditambahkan');
    }

    public function show($id)
    {
        $Rating = Rating::where('id', $id)->first();
        return view('admin.Rating.show', compact('Rating'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function edit($id)
    {
        $Rating = Rating::find($id);
        return view('admin.Rating.edit',compact('Rating','kode'));
    }

    public function update(Request $request, $id)
    {
        $Rating = Rating::findOrFail($id);
        $Rating->nilai = $request->nilai;
        $Rating->produk_id = $request->produk_id;
        $Rating->user_id = $request->user_id;
        $Rating->save();

        return redirect()->route('Rating.index')
        ->with('edit', 'Rating Berhasil Diedit');
    }

    public function destroy($id)
    {
        Rating::where('id', $id)->delete();

        return redirect()->route('Rating.index')
            ->with('delete', 'Rating Berhasil Dihapus');
    }
}
