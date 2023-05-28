// owl carousel-1//
$('.owl-carousel-1').owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 2
      },
      1000: {
        items: 5
      }
    }
  })
// owl carousel-2//  
$('.custmer-1').owlCarousel({
    loop:true,
    center:true,
    items:3,
    margin:0, 
    autoplay:true,
    autoplayTimeout:8500,
    smartSpeed:450,
    nav:false,
    dots:true ,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:3
        }
    }
})