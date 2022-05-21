<x-guest-layout>
    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Kategori Produk</span>
                        </div>
                        <ul>
                            @foreach ($Kategori as $item)
                            <li><a href="#">{{ $item->kategori }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                    Kategori
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">CARI</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+62 813-8268-9415</h5>
                                <span>Dapat dihubungi 24 jam</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{asset('landingPage/img/breadcrumb.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Checkout</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Checkout</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h6><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click here</a> to enter your code
                    </h6>
                </div>
            </div>
            <div class="checkout__form">
                <h4>Detail Pembayaran</h4>
                <form action="{{route('tambahtransaksi')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8 col-md-6">

                            <div class="checkout__input">
                                <input type="hidden" name="kota_asal" value="154" id="kota_asal">  {{--pake--}}
                            </div>
                            <div class="checkout__input">
                                <p>Alamat<span>*</span></p>
                                <textarea name="alamat" class="form-control" rows="5" name="alamat" placeholder="Alamat Lengkap pengiriman"></textarea>
                            </div>
                            <div class="checkout__input">
                                <p>Provinsi Tujuan<span>*</span></p>
                                <select name="provinsi_id" id="provinsi_id" onchange="provinsi()" class="form-control">
                                    <option value="">Pilih Provinsi</option>
                                    @foreach ($provinsi as $item)
                                    <option value="{{$item['province_id']}}">{{$item['province']}}</option>
                                    @endforeach
                                </select>
                                {{-- <input type="text" name="nama_provinsi" placeholder="nama provinsi"> --}}
                            </div>
                            <div class="checkout__input">
                                <p>Kota Tujuan<span>*</span></p>
                                <select name="kota_id" id="kota_id" class="form-control">
                                    <option value="">Pilih Kota Tujuan</option>
                                </select>
                                {{-- <input type="text" name="nama_kota" placeholder="nama kota"> --}}
                            </div>
                            <div class="checkout__input">
                                <p>Pilih Ekspedisi<span>*</span></p>
                                <select name="kurir" id="kurir" class="form-control">
                                    <option value="">Pilih kurir</option>
                                    <option value="jne">JNE</option>
                                    <option value="tiki">TIKI</option>
                                    <option value="pos">POS INDONESIA</option>
                                </select>
                                {{-- <input type="text" name="nama_kota" placeholder="nama kota"> --}}
                            </div>
                            <div class="checkout__input">
                                <p>Pilih Layanan<span>*</span></p>
                                <select name="layanan" id="layanan" class="form-control">
                                    <option value="">Pilih layanan</option>
                                </select>
                                {{-- <input type="text" name="nama_kota" placeholder="nama kota"> --}}
                            </div>
                            {{-- <div class="checkout__input">
                                <p>Berat<span>*</span></p> --}}
                                <input type="hidden" name="berat" value="1" id="berat">
                            {{-- </div> --}}

                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Pesanan Kamu!</h4>
                                <div class="checkout__order__products">Total <span>Produk</span></div>
                                <ul>
                                    @php $total = 0; @endphp
                                    @foreach ($Pembayaran as $item)
                                    <input name="produk[]" type="hidden" value="{{$item->produk->nama_produk}},{{$item->jumlah}}">
                                    <li>{{$item->produk->nama_produk}}<span>{{$item->jumlah*$item->produk->harga}}</span></li>
                                    @php $total = $total + $item->jumlah*$item->produk->harga @endphp
                                    @endforeach

                                </ul>
                                <div class="checkout__order__subtotal">
                                    Subtotal
                                    <span id="subtotal">
                                        {{$total}}
                                    </span>
                                </div>
                                <div class="checkout__order__subtotal">Ongkir <span id="ongkir"></span></div>
                                <div class="checkout__order__total">Total <span id="totalbayar"></span></div>
                                <input type="hidden" name="total_harga" id="inputtotal">
                                <!-- <div class="checkout__input__checkbox">
                                    <label for="acc-or">
                                        Create an account?
                                        <input type="checkbox" id="acc-or">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adip elit, sed do eiusmod tempor incididunt
                                    ut labore et dolore magna aliqua.</p>
                                <div class="checkout__input__checkbox">
                                    <label for="payment">
                                        Check Payment
                                        <input type="checkbox" id="payment">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkout__input__checkbox">
                                    <label for="paypal">
                                        Paypal
                                        <input type="checkbox" id="paypal">
                                        <span class="checkmark"></span>
                                    </label>
                                </div> -->
                                <button type="submit" class="site-btn">PROSES PESANAN</button>
                            </div>
                       
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    @push('scripts')
    {{-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> --}}
    <script>
    $('#layanan').on('change', function() {
        var ongkir = parseFloat($('#layanan').val());
        var subtotal = parseFloat($('#subtotal').text());
        document.getElementById('ongkir').innerHTML = ongkir;
        ongkir += subtotal;
        document.getElementById('totalbayar').innerHTML = ongkir;
        
        document.getElementById('inputtotal').value = ongkir;
        console.log(document.getElementById('inputtotal').value = ongkir);
        // document.getElementById(`total_${i}`).innerHTML = total;

        console.log(ongkir);
    });
        function provinsi() {
            let provinceid = document.getElementById("provinsi_id").value;
            if (provinceid) {
                // jika di temukan id nya kita buat eksekusi ajax GET
                jQuery.ajax({
                    // url yg di root yang kita buat tadi
                    url: "/city/" + provinceid,
                    // aksion GET, karena kita mau mengambil data
                    type: 'GET',
                    // type data json
                    dataType: 'json',
                    // jika data berhasil di dapat maka kita mau apain nih
                    // success: function(data) {
                    //     console.log(data);
                    // }
                    success: function(data) {
                        // jika tidak ada select dr provinsi maka select kota kososng / empty
                        $('select[name="kota_id"]').empty();
                        $('select[name="kota_id"]').append('<option value=""> Pilih Kota Tujuan </option>');
                        // jika ada kita looping dengan each
                        $.each(data, function(key, value) {
                            // perhtikan dimana kita akan menampilkan data select nya, di sini saya memberi name select kota adalah kota_id
                            $('select[name="kota_id"]').append('<option value="' + value.city_id + '" namakota="' + value.type + ' ' + value.city_name + '">' + value.type + ' ' + value.city_name + '</option>');
                        });
                    }
                });
            }
        }


        $('select[name="kurir"]').on('change', function() {
            // kita buat variable untuk menampung data data dari  inputan
            // name city_origin di dapat dari input text name city_origin
            let origin = $("input[name=kota_asal]").val();
            // name kota_id di dapat dari select text name kota_id
            let destination = $("select[name=kota_id]").val();
            // name kurir di dapat dari select text name kurir
            let courier = $("select[name=kurir]").val();
            // name weight di dapat dari select text name weight
            let weight = $("input[name=berat]").val();
            // alert(courier);
            if (courier) {
                jQuery.ajax({
                    url: "/origin=" + origin + "&destination=" + destination + "&weight=" + weight + "&courier=" + courier,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('select[name="layanan"]').empty();
                        $('select[name="layanan"]').append('<option value=""> Pilih Layanan </option>');
                        // ini untuk looping data result nya
                        $.each(data, function(key, value) {

                            // ini looping data layanan misal jne reg, jne oke, jne yes
                            $.each(value.costs, function(key1, value1) {
                                // ini untuk looping cost nya masing masing
                                // silahkan pelajari cara menampilkan data json agar lebi paham
                                // $('select[name="layanan"]').append('<option value="''">' + 'PILIH SAYA' + '</option>');
                                $.each(value1.cost, function(key2, value2) {
                                    
                                    $('select[name="layanan"]').append('<option value="' + value2.value + '">' + value1.service + '-' + value1.description + '-' + value2.value + '</option>');
                                    // $('select[name="layanan"]').append('<option value="' + key + '">' + value1.service + '-' + value1.description + '-' + value2.value + '</option>');
                                });
                            });
                        });
                    }
                });
            } else {
                $('select[name="layanan"]').empty();
            }
        });
    </script>
    @endpush
</x-guest-layout>