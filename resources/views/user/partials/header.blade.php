<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Humberger Begin -->
<div class="humberger__menu__overlay"></div>
<div class="humberger__menu__wrapper">
    <div class="humberger__menu__logo">
        <a href="#"><img src="{{asset('landingPage/img/nobglogo.png')}}"  alt=""></a>
    </div>
    <div class="humberger__menu__cart">
        <ul>
            <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
            <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
        </ul>
        <div class="header__cart__price">item: <span>$150.00</span></div>
    </div>
    <div class="humberger__menu__widget">
        <div class="header__top__right__language">
            <img src="{{asset('landingPage/img/language.png')}}" alt="">
            <div>English</div>
            <span class="arrow_carrot-down"></span>
            <ul>
                <li><a href="#">Spanis</a></li>
                <li><a href="#">English</a></li>
            </ul>
        </div>
        <div class="header__top__right__auth">
            <a href="{{url('login')}}"><i class="fa fa-user"></i> Login</a>
        </div>
    </div>
    <nav class="humberger__menu__nav mobile-menu">
        <ul>
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#">Shop</a></li>
            <li><a href="#">Pages</a>
                <ul class="header__menu__dropdown">
                    <li><a href="#">Shop Details</a></li>
                    <li><a href="#">Shoping Cart</a></li>
                    <li><a href="#">Check Out</a></li>
                    <li><a href="#">Blog Details</a></li>
                </ul>
            </li>
            <li><a href="#">Blog</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </nav>
    <div id="mobile-menu-wrap"></div>
    <div class="header__top__right__social">
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-linkedin"></i></a>
        <a href="#"><i class="fa fa-pinterest-p"></i></a>
    </div>
    <div class="humberger__menu__contact">
        <ul>
            <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
            <li>Free Shipping for all Order of $99</li>
        </ul>
    </div>
</div>
<!-- Humberger End -->
{{-- Header Start --}}
<header class="header"">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__left">
                        <ul>
                            <li><i class="fa fa-envelope"></i> sukucadang@gmail.com</li>
                            <li>Menyediakan suku cadang terbaik se-Jabodetabek</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__right">
                        <div class="header__top__right__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            {{-- <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-pinterest-p"></i></a> --}}
                        </div>
                        {{-- <div class="header__top__right__language">
                            <img src="{{asset('landingPage/img/language.png')}}" alt="">
                            <div>English</div>
                            <span class="arrow_carrot-down"></span>
                            <ul>
                                <li><a href="#">Spanis</a></li>
                                <li><a href="#">English</a></li>
                            </ul>
                        </div> --}}
                        <div class="header__top__right__auth">
                            @if (Route::has('login'))
                            @auth
                            <a href="{{route('login')}}"><i class="fa fa-user"></i> {{Auth::user()->name}}</a>
                            @else
                            <a href="{{route('login')}}"><i class="fa fa-user"></i> Login</a>
                            @endif
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row ">
            <div class="col-lg-3  mx-auto align-center text-center" >
                <div class="header__logo mx-auto align-center text-center">
                    <a href="#"><img src="{{asset('landingPage/img/logo.png')}}" height="60" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="header__menu">
                    <ul>
                        <li  class="{{ request()->is('/*') ? 'active' : ''}}"><a href="{{url('/')}}">Home</a></li>
                        <li class="{{ request()->is('suku-cadang*') ? 'active' : ''}}"><a href="{{url('suku-cadang')}}">Produk</a></li>
                        <li><a href="#">Kategori</a>
                            <ul class="header__menu__dropdown">
                                @foreach ($Kategori as $item)
                                    <li><a href="{{url('detail-kategori',$item->id)}}">{{$item->kategori}}</a></li>
                                @endforeach               
                            </ul>
                        </li>
                        <li  class="{{ request()->is('Artikel*') ? 'active' : ''}}"><a href="{{url('Artikel')}}">Artikel</a></li>
                        <li class="{{ request()->is('kontak*') ? 'active' : ''}}"><a href="{{url('kontak')}}">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__cart">
                    <ul>
                        <li >
                            <a href="{{url('wishlist')}}"><i class="fa fa-heart"></i>
                            @auth
                                <span>{{$Wishlist->where('user_id',Auth::user()->id)->count()}}</span>
                            @endauth
                            </a>
                        </li>
                        <li>
                            <a href="{{url('keranjang')}}"><i class="fa fa-shopping-bag"></i>
                            @auth
                                <span>{{$Cart->where('user_id',Auth::user()->id)->count()}}</span>
                            @endauth
                            </a>
                        </li>
                    </ul>
                    {{-- <div class="header__cart__price">barang: <span>$150.00</span></div> --}}
                </div>
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
{{-- Header End --}}