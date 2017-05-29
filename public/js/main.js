$(document).ready(function() {
	// fixed menu
	if (window.innerWidth > 768) {
		$(window).scroll(function () {
			if ($(window).scrollTop() >= 100) {
				$('.navbar-top').addClass('navbar-fixed-top');
			} else {
				$('.navbar-top').removeClass('navbar-fixed-top');
			}
		});
	};

	//add specical
	$('.menu-special').append('<p class="special-img">Special</p>');	

	// scroll-lap
	$("#about").on("click",function(){
		$('html, body').animate({ scrollTop: $('.about').offset().top }, 1000);
	});
	$("#igredients").on("click",function(){
		$('html, body').animate({ scrollTop: $('.igredients').offset().top }, 1000);
	});
	$("#menu").on("click",function(){
		$('html, body').animate({ scrollTop: $('.menu').offset().top }, 1000);
	});
	$("#reviews").on("click",function(){
		$('html, body').animate({ scrollTop: $('.reviews').offset().top }, 1000);
	});
	$("#reservations").on("click",function(){
		$('html, body').animate({ scrollTop: $('.reservations').offset().top }, 1000);
	});
	$("#BookATable").on("click",function(){
		$('html, body').animate({ scrollTop: $('.reservations').offset().top }, 1000);
	});
	$("#SeeMenu").on("click",function(){
		$('html, body').animate({ scrollTop: $('.menu').offset().top }, 1000);
	});

	// <!-- script div xếp chồng -->
	var elem = document.querySelector('.grid');
	var msnry = new Masonry( elem, {
	  	// options
	  	itemSelector: '.grid-item',
	  	columnWidth: 200
	  });

		// element argument can be a selector string
		//   for an individual element
		var msnry = new Masonry( '.grid', {
		  // options
		});
	});

