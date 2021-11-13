<x-guest-layout>
        <!-- Hero Section Begin -->
        <section class="hero">
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
        </section>
        <!-- Hero Section End -->
    <!-- Blog Section Begin -->
    <section class="from-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2>{{$kategori->kategori}}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($produk as $item)
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="{{asset('landingPage/img/blog/blog-2.jpg')}}" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> {{$item->created_at}}</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="{{url('detail-produk', $item->id)}}">{{$item->nama_produk}}</a></h5>
                            <p>{{$item->deskripsi}} </p>
                        </div>
                    </div>
                </div>
                @endforeach             
            </div>
        </div>
    </section>
    <!-- Blog Section End -->
</x-guest-layout>