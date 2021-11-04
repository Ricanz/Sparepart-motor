<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Produk;


use Illuminate\Http\Request;

class landingPageController extends Controller
{
    public function produk()
    {
        $produk = Produk::all();
        return view('user.index', compact('produk'));
    }

}
