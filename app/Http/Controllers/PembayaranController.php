<?php

namespace App\Http\Controllers;
use App\Models\Pembayaran;

use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {
        $pembayaran = Pembayaran::all();
        return view ('admin.pembayaran.index', compact('pembayaran'));
    }
}
