<x-guest-layout>

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <h1>Keranjang Belanja</h1>
    </div>

  </section><!-- End Hero -->

  <section id="team" class="team section-bg">

       
    <form action="{{url('/checkout')}}" method="POST">
      @csrf

      <div class="container" data-aos="fade-up">
        @foreach ($Cart as $item)
        <div class="row">
          <div class="col-lg-12">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100">
              <div class="member-info">
                <div class="form-check">
                  <input class="form-check-input" name="cart[]" type="checkbox" value="{{$item->id}}" id="flexCheckDefault">
                 
                  <label class="form-check-label" for="flexCheckDefault">
                  </label>
                </div>
                <h4>Jumlah</h4>
                <input class="form-input" name="jumlah[{{$item->id}}]" type="text" value="" id="flexCheckDefault">
                {{-- <p>Explicabo voluptatem mollitia et repellat qui dolorum quasi</p> --}}
              </div>
            </div>
          </div>
        </div>
        @endforeach
        <section id="about" class="about">
          <div class="container" data-aos="fade-up">
            <div class="row content">
              <div class="" style="text-align: center">
                <button type="submit" class="btn-learn-more">Checkout</button>
              </div>
            </div>
          </div>
        </section>

      </div>
    </form>
  </section>


</x-guest-layout>