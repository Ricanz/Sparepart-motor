<x-guest-layout>

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <h1>Single Product</h1>
    </div>

  </section><!-- End Hero -->
  <!-- ======= Skills Section ======= -->
  <section id="skills" class="skills">
    <div class="container" data-aos="fade-up">
      <form method="post" action="{{url('tambah-cart')}}">
        @csrf
        <div class="row">
          <div class="col-lg-6 d-flex align-items-center" data-aos="fade-right" data-aos-delay="100">
            <img src="{{asset('storage/produk/'.$produk->foto)}}" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left" data-aos-delay="100">
            <h3>{{$produk->nama_produk}}</h3>
            <p class="fst-italic">
              {{$produk->deskripsi}}
            </p>
            <input type="hidden" name="produk_id" value="{{$produk->id}}">
           
            <section id="about" class="about">
              <div class="container" data-aos="fade-up">
                <div class="row content">
                  <div class="col-lg-6 pt-4 pt-lg-0">
                    <button  type="submit" class="btn-learn-more">Tambah Keranjang</button>
                  </div>
                </div>
              </div>
            </section>
          </div>
        </div>
      </form>
    </div>
  </section><!-- End Skills Section -->


</x-guest-layout>