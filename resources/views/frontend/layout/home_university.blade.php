<section id="home-courses">
    <div class="wrapper-articles">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="section-title">
                        Trường Đại Học Hàn Quốc
                    </h2>
                </div>
                <div class="col-sm-12">
                    <div class="section-title-underline"></div>
                </div>
            </div>
            <div class="row">
                @foreach($universities as $university)
                <div class="col-lg-4 col-md-6 col-sm-6 col-12 one_course">
                    <div class="product-item">
                        <div class="product-img">
                            <a href="">
                                <img class="transition" src="{{asset('/upload/images/university/').'/'.$university->image}}">
                            </a>
                        </div>
                        <div class="product-info">
                            <div class="product-title">
                                <a href="{{route('detail-university', [$university->id, $university->slug])}}">
                                    {{$university->title}}
                                </a>
                            </div>
                            <div class="product-course">
                                <span class="desc">Địa chỉ:</span>
                                <span class="title">{{$university->address}}</span>
                            </div>
                            <div class="product-time">
                                <span class="desc">Năm thành lập:</span>
                                <span class="title">{{$university->constitutive}}</span>
                            </div>
                            <div class="product-languages">
                                <span class="desc">Thời gian nhập học:</span>
                                <span class="title">{{$university->admission}}</span>
                            </div>
                            <div class="product-price">
                                <span class="desc">Học phí:</span>
                                <span class="title">{{number_format($university->tuition)}} (vnd)</span>
                            </div>
                            <div class="product-viewmore">
                                <a href="{{route('detail-university', [$university->id, $university->slug])}}">
                                    Tìm hiểu thêm <i class="fa fa-angle-right" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row">
                <div class="home-courses-viewall text-center">
                    <a href="{{route('all-university')}}">Xem thông tin tất cả các trường</a>
                </div>
            </div>
        </div>
    </div>
</section>
