<x-guest-layout>
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h1>Checkout</h1>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="{{asset('landingPage/assets/img/hero-img.png')}}" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->
  <!-- ======= Why Us Section ======= -->
  <section id="why-us" class="why-us section-bg">
    <div class="container-fluid" data-aos="fade-up">

      <div class="row">

        <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

          <div class="content">
            <section id="team" class="team section-bg">
              <div class="container" data-aos="fade-up">
                <div class="row">                 
                  <div class="col-lg-12">
                    @foreach ($Pembayaran as $item)
                    <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100">
                      <div class="member-info">
                        <h4>{{$item->produk->nama_produk}}</h4>
                        <span>{{$item->jumlah}}</span>
                      </div>
                    </div>
                    @endforeach    
                  </div>                     
                </div>  
              </div>
            </section>
          </div>
        </div>
        <div class="col-lg-5 align-items-stretch order-1 order-lg-2 img" style='background-image: url("{{asset('landingPage/assets/img/why-us.png')}}");' data-aos="zoom-in" data-aos-delay="150">&nbsp;</div>
      </div>

    </div>
  </section><!-- End Why Us Section -->
</x-guest-layout>