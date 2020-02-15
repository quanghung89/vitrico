@extends('frontend.master')
@section('title', 'Trang Chủ')
@section('content')
    <!-- home main slider -->
    @include('frontend.layout.slide_banner')
    <!-- end home main slider -->
    <!-- home event -->
    @include('frontend.layout.home_event')
    <!-- end home event -->
    <!-- home article -->
{{--    @include('frontend.layout.home_article')--}}
    <!-- end home article -->
    <!-- home courses -->
    @include('frontend.layout.home_university')
    <!-- end home courses -->
    <!-- home-testimonials -->
    @include('frontend.layout.home_testimonials')
    <!-- end home-testimonials -->
    <!-- home-gallery -->
{{--    @include('frontend.layout.home_gallery')--}}
    <!-- end home-gallery -->
    <div class="clear"></div>
@endsection
