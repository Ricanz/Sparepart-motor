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
       

        // $i = 0;
        // foreach ($data as $item) {
        //     // dd($item);
        //     $dataa[$i] = ([
        //         'nama_produk' => $item[0],
        //         'jumlah' => $item[1],
        //         // 'nama_produk' => $item,
        //     ]);
        //     $i++;
        // }
        // dd($data);

        $transaksi = Transaksi::create([
            'produk' => $data,
            'total_harga' => $request->total_harga, //sudah
            'alamat' => $request->alamat,  //sudah
            'status' => 'Belum Dibayar',  //sudah
            'ekspedisi' => $request->kurir, //sudah
            'ongkir' => $request->layanan, //sudah
            'user_id' => Auth::user()->id,
        ]);
        // dd($transaksi->id);  
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

        $bukti = BuktiPembayaran::findOrFail($id);

        if ($request->has("bukti")) {

            Storage::delete("public/Bukti/$bukti->bukti");

            $date = date("his");
            $extension = $request->file('bukti')->extension();
            $file_name = "Bukti_$date.$extension";
            $path = $request->file('bukti')->storeAs('public/Bukti', $file_name);
            
            $bukti->bukti = $file_name;
        }

        return redirect()->route('user.konfirmasi')
        ->with('success', 'Bukti Pembayaran Berhasil Dikirim');
    }
}
