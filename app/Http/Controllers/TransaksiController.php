<?php

namespace App\Http\Controllers;
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
}
