@extends('frontend.master')
@section('title')
    {{$tintuc->title}}
@endsection
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
                                {{$tintuc->title}}
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
                                        <h1>{{$tintuc->name}}</h1>
                                    </div>
                                </div>
                                <div class="blog-body row">
                                    <div class="col-sm-12 col-md-12">
                                        <div class="ha-item">

                                            <div class="ha-comment-date">
                                                <div class="article-date">
                                                    <i class="fa fa-calendar" aria-hidden="true"></i> {{$tintuc->created_at}}
                                                </div>
                                            </div>
                                            <div class="ha-title">
                                                <a>{{$tintuc->description}}</a>
                                            </div>
                                            @if($tintuc->image != null)
                                                <div class="ha-title">
                                                    <img src="{{asset('upload/images/new/')}}/{{$tintuc->image}}" width="100%">
                                                </div>
                                            @endif
                                            <div class="ha-desc">
                                                {!! $tintuc->content !!}
                                            </div>
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
    <!-- end home-gallery -->
    <div class="clear"></div>
@endsection
