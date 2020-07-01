
$(document).ready(function () {
	$('.menu-toggle').click(function(){
		$('.Navbar').toggleClass('active');
	});
  $('.sidebar-toggle').click(function(){
    $('aside ul').toggleClass('active');
  });
  $('.filter-toggle').click(function(){
    $('.vertical-filter ul').toggleClass('active');
  });
	$('ul li').click(function(){
		$(this).siblings().removeClass('active');
		$(this).toggleClass('active');
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
        infinite: true,
        arrows:false
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        swipeToSlide:true,
        arrows:false
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        swipeToSlide:true,
        arrows:false
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
        infinite: true,
        arrows:false   
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        swipeToSlide:true,
        arrows:false   
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        swipeToSlide:true,
        arrows:false
      }
    }
  ]
  });


})

$('.single-item').slick({
  autoplay: true,
	infinite: true,
  speed: 300,
  arrows:false
});
