<x-guest-layout>
    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All departments</span>
                        </div>
                        <ul>
                            <li><a href="#">Fresh Meat</a></li>
                            <li><a href="#">Vegetables</a></li>
                            <li><a href="#">Fruit & Nut Gifts</a></li>
                            <li><a href="#">Fresh Berries</a></li>
                            <li><a href="#">Ocean Foods</a></li>
                            <li><a href="#">Butter & Eggs</a></li>
                            <li><a href="#">Fastfood</a></li>
                            <li><a href="#">Fresh Onion</a></li>
                            <li><a href="#">Papayaya & Crisps</a></li>
                            <li><a href="#">Oatmeal</a></li>
                            <li><a href="#">Fresh Bananas</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+65 11.188.888</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                    <div class="hero__item set-bg" data-setbg="{{asset('landingPage/img/hero/banner.jpg')}}">
                        <div class="hero__text">
                            <span>FRUIT FRESH</span>
                            <h2>Vegetable <br />100% Organic</h2>
                            <p>Free Pickup and Delivery Available</p>
                            <a href="#" class="primary-btn">SHOP NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    @foreach ($kategori as $item)
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="{{asset("storage/Kategori/$item->foto")}}">
                            <h5><a href="#">{{$item->kategori}}</a></h5>
                        </div>
                    </div>
                    @endforeach                    
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Featured Product</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            @foreach ($kategori as $item)
                            <li class="" data-filter=".{{$item->kategori}}">{{$item->kategori}}</li>
                            @endforeach
                            
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row featured__filter" id="#produk">
                @foreach ($produk as $item)
                {{-- {{dd($item->kategori_id)}} --}}
                <div class="col-lg-3 col-md-4 col-sm-6 mix {{$item->kategori->kategori}}">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="{{ asset("storage/Produk/$item->foto") }}">
                            <ul class="featured__item__pic__hover">
                                <form method="POST" action="{{route('tambahwishlist',$item->id)}}">
                                    @csrf
                                    <li>
                                        <button type="submit" ><i class="fa fa-heart"></i>
                                    </li>
                                </form>                                
                                <li><a href="{{route('detail-produk',$item->id)}}"><i class="fa fa-retweet"></i></a></li>
                                <form method="POST" action="{{url('tambah-cart',$item->id)}}">
                                    @csrf
                                <li>
                                    <a>
                                    <button type="submit" ><i class="fa fa-shopping-cart"></i></button>
                                    </a>
                                </li>
                                </form>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href={{url("/show/$item->id/produk")}}>{{ $item->nama_produk }}</a></h6>
                            <h5>Rp. {{ $item->harga }}</h5>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Featured Section End -->

    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="{{asset('landingPage/img/banner/banner-1.jpg')}}" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="{{asset('landingPage/img/banner/banner-2.jpg')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

    

    <!-- Blog Section Begin -->
    <section class="from-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2>From The Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($artikel as $item)
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
                            <h5><a href="{{url('detail-berita')}}">{{$item->judul}}</a></h5>
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