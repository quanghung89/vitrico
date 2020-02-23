<section id="home-event">
    <div class="wrapper-event">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-12">
                    <h2 class="popular-event">
                        <a href="{{route('all-news')}}">Tin tức mới</a>
                    </h2>
                </div>
                <div class="col-md-6 col-12 text-right">
                    <a href="{{route('all-news')}}" class="view-all">
                        Xem tất cả các bài viết
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-9 col-12 event-item">
                    @if($newRepresentative->count() != 0)
                        <div class="img-scale newest-event">
                            <img src="{{asset('upload/images/new').'/'.$newRepresentative[0]['image']}}" class="feature-image transition" height="550px">
                            <div class="transition sub_title">
                                <h3 class="box_item">
                                    <a href="{{route('tin-tuc',[$newRepresentative[0]['id'], $newRepresentative[0]['slug']])}}"
                                       class="caption-text">{{$newRepresentative[0]['title']}}</a>
                                </h3>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="col-md-3 col-12">
                    <div class="row">
                        @foreach($newRepresentative as $newRep)
                        <div class="col-sm-12 sub-box">
                            <div class="img-scale first-old-event-o">
                                <img src="{{asset('upload/images/new').'/'.$newRep->image}}" class="feature-image transition" >
                                <div class="transition sub_title">
                                    <h3 class="box_item">
                                        <a href="{{route('tin-tuc',[$newRep->id, $newRep->slug])}}"
                                           class="caption-text caption-event">{{$newRep->title}}</a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</section>
