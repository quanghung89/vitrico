@extends('frontend.master')
@section('title', 'Danh Sách Trường Đại Học')
@section('content')
    <div class="clear"></div>
    <!-- breadcrumb -->
    <section id="breadcrumb-wrapper" class="breadcrumb-w-img ">
        <div class="breadcrumb-overlay"></div>
        <div class="breadcrumb-content">
            <div class="container">
                <div class="row text-center">
                    <div class="col-sm-12">
                        <div class="breadcrumb-big">
                            <h2>
                                Danh Sách Các Trường Đại Học Hàn Quốc
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="blog-wrapper">
        <div class="wrapper-articles">
            <div class="container">
                <div class="row sub-plan">
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="blog-content">
                            <div class="blog-content-wrapper">
                                <div class="blog-head">
                                    <div class="blog-title">
                                        <h1>Danh Sách Các Trường Đại Học Hàn Quốc</h1>
                                    </div>
                                </div>
                                <div class="blog-body row">
                                    @foreach($allUniversities as $allUniversity)
                                        <div class="col-sm-12 col-md-4">
                                        <div class="ha-item">
                                            <div class="ha-title">
                                                <a href="{{route('detail-university',[$allUniversity->id, $allUniversity->slug])}}">
                                                    {{$allUniversity->title}}</a>
                                            </div>
                                            @if($allUniversity->image)
                                                <div class="ha-img">
                                                    <a href="">
                                                        <img class="transition" src="{{asset('upload/images/university')}}/{{$allUniversity->image}}">
                                                    </a>
                                                </div>
                                            @endif

                                            <div class="ha-comment-date">
                                                <div class="article-date">
                                                    <i class="fa fa-calendar" aria-hidden="true"></i> {{$allUniversity->created_at}}
                                                </div>

                                            </div>
                                            <div class="ha-desc">
                                                {!! $allUniversity->description !!}
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="row">
                                    <div class="col-12 paginate">
                                        <div class="pagination">
                                            <a href="#">&laquo;</a>
                                            <a href="#">1</a>
                                            <a class="active" href="#">2</a>
                                            <a href="#">3</a>
                                            <a href="#">4</a>
                                            <a href="#">5</a>
                                            <a href="#">6</a>
                                            <a href="#">&raquo;</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
