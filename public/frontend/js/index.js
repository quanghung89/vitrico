// alert('dfsd');
$(document).ready(function(){
    $("#NavDrawer .drawer__header .drawer__close button").click(function(){
        $("#NavDrawer").removeClass("open");
        $(".cart-overlay").removeClass("open");
    });
    $(".click-menu").click(function(){
        $("#NavDrawer").addClass("open");
        $(".cart-overlay").addClass("open");
    });
    $(".icon-plus").click(function(){
        $(this).parent().parent().addClass("open");
        $(this).parent().find('.icon-minus').css({"display": "inline"});
        $(this).css({"display": "none"});
    });
    $(".icon-minus").click(function(){
        $(this).parent().parent().removeClass("open");
        $(this).css({"display": "none"});
        $(this).parent().find('.icon-plus').css({"display": "inline"});
    });
    $(".owl-carousel").owlCarousel({
        margin: 10,
        nav: true,
        lazyLoad: true,
        dots: false,
        navText: ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
                nav:true
            },
            480:{
                items:1,
                nav:true
            },
            769:{
                items: 3,
                nav: true
            },
            1000:{
                items:3,
                nav:true,
            }
        },
    })
});