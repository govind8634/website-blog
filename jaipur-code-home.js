$('.owl-carousel').owlCarousel({
    loop: false,
    margin: 10,
    nav: true,
    autoplay:true,
    autoPlayTimeout:50,
    dots: false,
    responsive: {
      0: {
        items: 1
      },
      576: {
        items: 2
      },
      768: {
        items: 3
      },
      1200: {
        items: 4
      }
    }
  })