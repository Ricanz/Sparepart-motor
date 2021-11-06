<x-guest-layout>

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{asset('landingPage/img/breadcrumb.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shopping Cart</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <form method="POST" action="{{route('checkout')}}">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="shoping__cart__table">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="shoping__product">Products</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Cart as $item)
                                    <tr>
                                        <td class="shoping__cart__item">
                                            <img src="img/cart/cart-1.jpg" alt="">
                                            <h5>{{$item->produk->nama_produk}}</h5>
                                            <input class="form-check-input" name="cart[]" type="hidden" value="{{$item->id}}">
                                        </td>
                                        <td class="shoping__cart__price">
                                            {{$item->produk->harga}}
                                            <input value="{{$item->produk->harga}}" type="hidden" name="harga" id="harga_{{$loop->iteration}}">
                                        </td>
                                        <td class="shoping__cart__quantity">
                                            <div class="quantity">
                                                <div class="">
                                                    <input type="number" name="jumlah[{{$item->id}}]" value="{{$item->jumlah}}" onchange="hasil('{{$loop->iteration}}')" id="jumlah_{{$loop->iteration}}">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="shoping__cart__total">

                                            <span id="total_{{$loop->iteration}}">{{$item->produk->harga*$item->jumlah}}</span>
                                            {{-- {{$item->produk->harga}} --}}
                                        </td>
                                        <td class="shoping__cart__item__close">
                                            {{-- <form action="{{route('hapuscart',$item->id)}}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="icon_close"></button>
                                            </form> --}}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        {{-- <div class="shoping__cart__btns">
                        <a href="#" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                        <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                            Upadate Cart</a>
                    </div> --}}
                    </div>
                    <div class="col-lg-6">
                        {{-- <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Discount Codes</h5>
                            <form action="#">
                                <input type="text" placeholder="Enter your coupon code">
                                <button type="submit" class="site-btn">APPLY COUPON</button>
                            </form>
                        </div>
                    </div> --}}
                    </div>
                    <div class="col-lg-6 text-end">
                        <div class="shoping__checkout">
                            <h5>Cart Total</h5>
                            <ul>
                                {{-- {{dd($produk->where('id'))}} --}}
                                <li>Total <span id="">{{$jumlahtotal}}</span></li>
                            </ul>
                            <button class="primary-btn">PROCEED TO CHECKOUT</button>
                        </div>
                    </div>
            </form>
        </div>
        <div class="row">

        </div>
        </div>
    </section>

    @push('scripts')
    <script>
        function hasil(i) {
            let jumlah = document.getElementById(`jumlah_${i}`).value;
            let harga = document.getElementById(`harga_${i}`).value;
            // alert(jumlah,harga)
            // let ;
            // $("#hasil").html(total);
            document.getElementById(`total_${i}`).innerHTML = jumlah * harga;
            // document.getElementById(`totall`).innerHTML = jumlah * harga;
        }
        // $("#hasil").html(total);


        //.toFixed() method will roundoff the final sum to 2 decimal places
        // $("#hasil").html(total);
    </script>


    @endpush
</x-guest-layout>