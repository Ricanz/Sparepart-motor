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
            <div class="row">
                @foreach ($Artikel as $item)
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
                            <h5><a href="{{url('detail-Artikel', $item->id)}}">{{$item->judul}}</a></h5>
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