<x-guest-layout>
    {{-- @include('user.partials.kategori') --}}

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{asset('landingPage/img/breadcrumb.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Produk</h2>
                        {{-- <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Shop</span>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                {{-- <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4>Kategori</h4>
                            <ul>
                                @foreach ($Kategori as $item)
                                <li><a href="#">{{ $item->kategori }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div> --}}
                <div class="col-lg-10 col-md-7 mx-auto">
                    <div class="product__discount">
                        <div class="section-title product__discount__title">
                            <h2>Sale Off</h2>
                        </div>
                        <div class="row">
                            <div class="product__discount__slider owl-carousel">
                                @foreach ($sukuCadang as $item)
                                <div class="col-lg-4">
                                    <div class="product__discount__item">
                                        <div class="product__discount__item__pic set-bg"
                                            data-setbg="{{asset("storage/Produk/$item->foto")}}">
                                            <div class="product__discount__percent">Baru</div>
                                            <ul class="product__item__pic__hover rounded_button rounded_button_hover button_putar button_warna">
                                                <li><form method="POST" action="{{route('tambahwishlist',$item->id)}}">
                                                    @csrf
                                                    <button type="submit" ><i class="fa fa-heart"></i></button>  
                                                 </form></li>                              
                                                    <li><a href="{{url('detail-produk', $item->id)}}"><i class="fa fa-retweet"></i></a></li>
                                                <li><form method="POST" action="{{url('tambah-cart',$item->id)}}">
                                                @csrf
                                                <button type="submit" ><i class="fa fa-shopping-cart"></i></button>
                                            </form></li>
                                        </ul>
                                        </div>
                                        <div class="product__discount__item__text">
                                            {{-- <span>Vegetables</span> --}}
                                            <h5><a href="{{url('detail-produk', $item->id)}}">{{ $item->nama_produk }}</a></h5>
                                            <div class="product__item__price">{{ $item->harga }}</div>
                                        </div>
                                    </div>
                                </div>  
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="filter__item">
                        <div class="row">
                            {{-- <div class="col-lg-4 col-md-5">
                                <div class="filter__sort">
                                    <span>Sort By</span>
                                    <select>
                                        <option value="0">Default</option>
                                        <option value="0">Default</option>
                                    </select>
                                </div>
                            </div> --}}
                            <div class="col-lg-4 col-md-4 mx-auto">
                                <div class="filter__found">
                                    <h6><span>{{$Produk->count()}}</span> Products found</h6>
                                </div>
                            </div>
                            {{-- <div class="col-lg-4 col-md-3">
                                <div class="filter__option">
                                    <span class="icon_grid-2x2"></span>
                                    <span class="icon_ul"></span>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($produk as $item)
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="{{asset("storage/Produk/$item->foto")}}">
                                    <ul class="product__item__pic__hover rounded_button rounded_button_hover button_putar button_warna">
                                        <li><form method="POST" action="{{route('tambahwishlist',$item->id)}}">
                                            @csrf
                                            <button type="submit" ><i class="fa fa-heart"></i></button>  
                                         </form></li>                              
                                            <li><a href="{{url('detail-produk', $item->id)}}"><i class="fa fa-retweet"></i></a></li>
                                        <li><form method="POST" action="{{url('tambah-cart',$item->id)}}">
                                        @csrf
                                        <button type="submit" ><i class="fa fa-shopping-cart"></i></button>
                                    </form></li>
                                </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="{{url('detail-produk', $item->id)}}">{{ $item->nama_produk }}</a></h6>
                                    <h5>{{ $item->harga }}</h5>
                                </div>
                            </div>
                        </div> 
                        @endforeach
                    </div>
                    <div class="product__pagination">
                        <a href="#">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->

    


    
</x-guest-layout>