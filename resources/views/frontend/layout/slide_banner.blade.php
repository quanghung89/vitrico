@if(!$slides)
<section class="home-main-slider">
    <div id="home-main-slider" class="carousel slide" data-ride="carousel" data-interval="3000">
        <ol class="carousel-indicators">
        @foreach($slides as $key => $slide)
                    <li data-target="#home-main-slider" data-slide-to="{{$key}}" class="{{$key==0 ? 'active' : ''}}"></li>
        @endforeach
        </ol>
        <div class="carousel-inner">
            @foreach($slides as $key => $slide)
            <div class="carousel-item {{$key==0 ? 'active' : ''}}">
                <img class="d-block w-100" src="{{asset('upload/images/slide/')}}/{{$slide->image}}" alt="First slide">
            </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#home-main-slider" role="button" data-slide="prev">
            <span class="fa fa-chevron-left fa-lg" style=color:red></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#home-main-slider" role="button" data-slide="next">
            <span class="fa fa-chevron-right fa-lg" style=color:red></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</section>
    @endif
