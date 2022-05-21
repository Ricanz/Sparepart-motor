<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\BuktiPembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {
        $pembayaran = BuktiPembayaran::all();
        // dd($pembayaran);
        return view('admin.pembayaran.index', compact('pembayaran'));
    }

    public function update(Request $request, $id)
    {

        $BuktiPembayaran = BuktiPembayaran::findOrFail($id);

        $BuktiPembayaran->status = $request->status;


        $BuktiPembayaran->save();

        return redirect()->route('pembayaran.index')
            ->with('edit', 'BuktiPembayaran Berhasil Diedit');
    }
}
