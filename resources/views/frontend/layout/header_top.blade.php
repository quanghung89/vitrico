<div id="header">
    <div id="header-top">
        <div class="container">
            <div class="hdt-social-network float-left">
                <a href="https://www.facebook.com/duhocsunny/" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="https://www.youtube.com/channel/UCfJg86e2aefpNf2mNiz8dVw" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                <a href="https://instagram.com/duhochanquoc.sunny" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            </div>
            <div class="top-search-wrapper float-right text-right">
                <div class="top-search">
                    <div class="top-form-wrapper">
                        <form action="#" method="get" class="top-search-bar">
                            <input class="search-input-field" type="search" name="q" value="" placeholder="Tìm kiếm...">
                        </form>
                    </div>
                </div>
                <div class="top-links">
                    <div class="top-links-wrapper">
                        <div class="links-wrapper">
                            <a href="#">Tài khoản</a>
                            <span>|</span>
                            <a href="#">Các khóa học đã đăng ký: <span>0</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-middle">
        <div class="container-fluid">
            <div class="row">
                <!-- start navigation -->
                <div class="col-4 col-md-2 offset-md-1">
                    <img src="{{asset('frontend/images/logobdfd.png')}}" alt="logo" class="img-fluid">
                </div>
                <div class="col-8 col-md-8 offset-md-1">
                    <div class="menu-bar text-right">
                        <i class="fa fa-bars click-menu" aria-hidden="true"></i>
                    </div>
                    <ul class="mainnav">
                        <li class="active hassubs"><a href="{{asset('/')}}">Trang chủ</a></li>
                        <li class="hassubs">
                            <a href="{{route('all-university')}}">Trường Đại Học Hàn</a>
                        </li>
                        @foreach($categories as $cate)
                            <li class="hassubs"><a href="#">{{$cate->name}}</a>
                                <ul class="dropdown">
                                    @foreach($news as $new)
                                        @if($new->cate_id == $cate->id)
                                        <li class="subs"><a href="{{route('tin-tuc', [$new->id, $new->slug])}}">{{$new->name}}</a></li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                        <li class="hassubs">
                            <a href="#">Liên Hệ</a>
                        </li>
                    </ul>
                </div>
                <!-- end navigation -->
            </div>
        </div>
    </div>
</div>
