<?php

namespace App\Http\Controllers;

use App\Models\BuktiPembayaran;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function tambahtransaksi(Request $request)
    {
        $request->validate([
            // 'produk' => 'required',
            // 'jumlah' => 'required',
            // 'total_harga' => 'required',
            // 'layanan' => 'required',
            // 'user_id' => 'required',
        ]);

// dd($produks)
        $produks = $request->produk;
        // dd($produks);
        foreach($produks as $key=>$items){
            $data[$key]['produk'] = explode(",",$items)[0];
            $data[$key]['jumlah'] = explode(",",$items)[1];
        }

        $code = random_int(100000, 999999);

        $transaksi = Transaksi::create([
            'produk' => $data,
            'total_harga' => $request->total_harga, //sudah
            'alamat' => $request->alamat,  //sudah
            'status' => 'Belum Dibayar',  //sudah
            'ekspedisi' => $request->kurir, //sudah
            'ongkir' => $request->layanan, //sudah
            'user_id' => 1,
            'code' => $code
            // 'user_id' => Auth::user()->id,
        ]);
        return redirect()->route('konfirmasi',$transaksi->id)
            ->with('success', 'Rating Berhasil Ditambahkan');
    }

    public function konfirmasi($id)
    {
        $transaksi = Transaksi::find($id);
        return view ('user.konfirmasi', compact('transaksi'));
    }

    public function sendBukti(Request $request, $id)
    {
        $request->validate([
            'bukti' => 'required',
        ]);
        $transaksi = Transaksi::find($id);

        $date = date("his");
        if (isset($request->bukti)) {
            $extention = $request->bukti->extension();
            $file_name = time() . '.' . $extention;
            $txt = "storage/buktiPembayaran/". $file_name;
            $request->bukti->storeAs('public/buktiPembayaran', $file_name);
        } else {
            $file_name = null;
        }

        BuktiPembayaran::create([
            'transaksi_id' => $id,
            'status' => 'Progress',
            'bukti' => $txt,
        ]);
        return redirect()->route('hasPay', $transaksi->code)
        ->with('success', 'Bukti Pembayaran Berhasil Dikirim');
    }

    public function hasPay($code){
        $transaksi = Transaksi::where('code', $code)->first();
        $produk = $transaksi->produk;
        // dd($produk[0]);
        return view('user.hasbayar', compact('transaksi', 'produk'));
    }
}
