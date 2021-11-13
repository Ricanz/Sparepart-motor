<x-guest-layout>
    <!-- Blog Section Begin -->
    <section class="from-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2>Artikel</h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-7 order-md-1 order-1">
                <div class="blog__details__text">
                    <img src="img/blog/details/details-pic.jpg" alt="">
                    <h3>{{$artikel->judul}}</h3>
                    <p>{{$artikel->deskripsi}}</p>
                </div>
        </div>
    </section>
    <!-- Blog Section End -->
</x-guest-layout>