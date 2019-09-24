$(document).ready(function() {
    new WOW().init();

    var owl = $("#owl-demo");

    owl.owlCarousel({
        items:1,
        loop:true,
        autoplay:true,
        autoplayTimeout:3000,
        autoplayHoverPause:true,
        animateOut: 'slideOutDown',
        animateIn: 'flipInX',
        //margin:30,
        //stagePadding:30,
        smartSpeed:450
    });
});

