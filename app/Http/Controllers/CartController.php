<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $Cart = Cart::all();
        return view('admin.cart.index', compact('Cart'));
    }

    public function create()
    {
        return view('admin.cart.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'produk' => 'required',
            // 'jumlah' => 'required',
            'user_id' => 'required',
        ]);
        Cart::create([
            'produk' => $request->produk,
            'jumlah' => '1',
            'user_id' => Auth::user()->id,
        ]);
        return redirect()->route('cart.index')
            ->with('success', 'Cart Berhasil Ditambahkan');
    }

    public function show($id)
    {
        $Carts = Cart::where('id', $id)->first();
        return view('admin.cart.show', compact('Cart'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function edit($id)
    {
        $Cart = Cart::find($id);
        return view('admin.cart.edit',compact('Cart','kode'));
    }


    public function update(Request $request, $id)
    {
        $Cart = Cart::findOrFail($id);
        $Cart->produk = $request->produk;
        $Cart->jumlah = $request->jumlah;
        $Cart->user_id = $request->user_id;
        $Cart->save();

        return redirect()->route('cart.index')
        ->with('edit', 'Cart Berhasil Diedit');
    }

    public function destroy($id)
    {
        Cart::where('id', $id)->delete();

        return redirect()->route('cart.index')
            ->with('delete', 'Cart Berhasil Dihapus');
    }

    public function get_province() {

        $curl = curl_init();
        
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "key: your-api-key"
          ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
            $response=json_decode($response,true);
            $data_pengirim = $response['rajaongkir']['results'];
            return $data_pengirim;
        }
    }

    public function get_city() {


    }

    public function checkout() {
        $provinsi = $this->get_province();
        
    }
    
}
