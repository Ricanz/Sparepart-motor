<x-guest-layout>


    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{asset('landingPage/img/breadcrumb.jp')}}g">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Konfirmasi Pembayaran</h2>
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
                        <h4>Transfer Sebesar Rp. {{ $transaksi->total_harga }}</h4>
                        <p>dan kirimkan bukti transfer</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="">
                            <img src="{{asset('landingPage/img/bca.png')}}" alt="" width="200">
                        </span>
                        <h4>3456745432</h4>
                        <p>a.n Muhammad Adjie Perdana</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    

    <!-- Contact Form Begin -->
    <div class="contact-form spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact__form__title">
                        <h2>Kirim bukti pembayaran</h2>
                    </div>
                </div>
            </div>
            <form action="{{route('sendBukti',$transaksi->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12 col-md-6">
                        <input type="file" name="bukti" class="form-control-file" id="exampleFormControlFile1">
                    </div>
                    <div class="col-lg-12 text-center">
                        <button type="submit" class="site-btn">KIRIM BUKTI</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>