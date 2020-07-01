
$(document).ready(function () {
	$('.menu-toggle').click(function(){
		$('.Navbar').toggleClass('active');
	});
  $('.sidebar-toggle').click(function(){
    $('aside ul').toggleClass('active');
  });
	$('ul li').click(function(){
		$(this).siblings().removeClass('active');
		$(this).toggleClass('active');
	});
	$('.categories-slider').slick({
	  autoplay: true,
	  infinite: true,
	  speed: 300,
	  slidesToShow: 6,
	  slidesToScroll: 2,
	  swipeToSlide:true,
    prevArrow:'<i class="fas fa-chevron-left slick-prev slick-arrow"></i>',
    nextArrow:'<i class="fas fa-chevron-right slick-next slick-arrow"></i>',
	  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        swipeToSlide:true,
        infinite: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        swipeToSlide:true
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        swipeToSlide:true
      }
    }
  ]
  });
	$('.offer-slider').slick({
	  autoplay: true,
	  infinite: true,
	  speed: 300,
	  slidesToShow: 3,
	  slidesToScroll: 1,
	  swipeToSlide:true,
    prevArrow:'<i class="fas fa-chevron-left slick-prev slick-arrow"></i>',
    nextArrow:'<i class="fas fa-chevron-right slick-next slick-arrow"></i>',
	  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        swipeToSlide:true,
        infinite: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        swipeToSlide:true
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        swipeToSlide:true
      }
    }
  ]
  });
	$('.products-slider').slick({
	  autoplay: false,
	  infinite: true,
	  speed: 300,
	  slidesToShow: 6,
	  slidesToScroll: 1,
	  swipeToSlide:true,
    prevArrow:'<i class="fas fa-chevron-left slick-prev slick-arrow"></i>',
    nextArrow:'<i class="fas fa-chevron-right slick-next slick-arrow"></i>',
	  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        swipeToSlide:true,
        infinite: true    
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        swipeToSlide:true
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        swipeToSlide:true
      }
    }
  ]
  });
	$('.bestselling-slider').slick({
    autoplay:true,
	  dots: true,
	  infinite: true,
	  speed: 500,
	  fade: true,
	  cssEase: 'linear',
    prevArrow:'<i class="fas fa-chevron-left slick-prev slick-arrow"></i>',
    nextArrow:'<i class="fas fa-chevron-right slick-next slick-arrow"></i>',
	});
	$('.toprated-slider').slick({
	  autoplay: false,
	  infinite: true,
	  speed: 300,
	  swipeToSlide:true,
	  rows:2,
	  slidesPerRow:3,
    prevArrow:'<i class="fas fa-chevron-left slick-prev slick-arrow"></i>',
    nextArrow:'<i class="fas fa-chevron-right slick-next slick-arrow"></i>',
	  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToScroll: 1,
        swipeToSlide:true,
        slidesPerRow:2,
        infinite: true    
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToScroll: 1,
        slidesPerRow:2,
        swipeToSlide:true
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToScroll: 1,
        slidesPerRow:2,
        swipeToSlide:true
      }
    }
  ]
  });

})
