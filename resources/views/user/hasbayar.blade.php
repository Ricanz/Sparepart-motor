<x-guest-layout>


    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{asset('landingPage/img/breadcrumb.jp')}}g">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Bukti berhasil dikirim!</h2>
                    </div>
                </div>
            </div>
        </div>
    </section> 
    <!-- Breadcrumb Section End -->

    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <h4>Bukti pembayaran akan segera dicek oleh Admin</h4>
                        <p>Informasi selanjutnya akan dikirimkan melalui email & nomor telepon yang tertera.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <h4>Identitas</h4>
                        <p>Nama: {{ $transaksi->nama }}</p>
                        <p>Nomor Telepon: {{ $transaksi->no_hp }}</p>
                        <p>Alamat: {{ $transaksi->alamat }}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <h4>Detail Pesanan</h4>
                        @foreach ($produk as $item)
                        <p>Produk: {{ $item['produk'] }}</p>
                        <p>Kuantitas: {{ $item['jumlah'] }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->
</x-guest-layout>