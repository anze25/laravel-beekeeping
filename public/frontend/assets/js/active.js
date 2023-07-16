(function ($) {
	"use strict";
	
	  /*Home page main slider*/
      jQuery(document).ready(function($){
        $(".homepage-slides").owlCarousel({
            items: 1,
            nav: true,
            dots: false,
            autoplay: true,
            loop: true,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            mouseDrag: false,
            touchDrag: true,
			animateOut: 'fadeOut',
        });
        
        $(".homepage-slides").on("translate.owl.carousel", function(){
            $(".single-slide-item h3, .single-slide-item p, .slider-caption p").removeClass("animated fadeInUp").css("opacity", "0");
            $(".single-slide-item .slide-btn, .single-slide-item h2,.slider-caption a").removeClass("animated fadeInDown").css("opacity", "0");
			$(".slider-caption").removeClass("animated fadeInUp caption-bg");
        });
        
        $(".homepage-slides").on("translated.owl.carousel", function(){
            $(".single-slide-item h3, .single-slide-item p, .slider-caption p").addClass("animated fadeInUp").css("opacity", "1");
            $(".single-slide-item .slide-btn, .single-slide-item h2,.slider-caption a").addClass("animated fadeInDown").css("opacity", "1");
			$(".slider-caption").addClass("animated fadeInDown caption-bg");
        });
		
		/*For mobile menu*/
		$("ul#navigation").slicknav({
            prependTo: ".mobile-menu-wrapper"
        });
		$(".top-menu > ul").slicknav({
            prependTo: ".top-menu-holder",
			label : "Top Menu"
        });
		
		/*Home page Testimonial*/
		$(".testimonial").owlCarousel({
            items: 1,
            nav: false,
            dots: true,
            autoplay: true,
            loop: true,
            mouseDrag: true,
            touchDrag: true,
        });
		
		/*----feature product carousel----*/
		$(".feature-product-4").owlCarousel({
			items: 4,
			loop: true,
			dots: false,
			nav: true,
			navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
			autoplay: true,
			smartSpeed: 1200,
			autoplayHoverPause: true,
			responsiveClass: true,
			touchDrag: true,
			responsive: {
				0: {
					items: 1,
				},
				 680: {
					items: 2,
				},
				992: {
					items: 4,
				}
			  }
		});
		
		$(".feature-product-3").owlCarousel({
			items: 3,
			loop: true,
			dots: false,
			nav: true,
			navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
			autoplay: true,
			smartSpeed: 1200,
			autoplayHoverPause: true,
			responsiveClass: true,
			touchDrag: true,
			responsive: {
				0: {
					items: 1,
				},
				 580: {
					items: 2,
				},
				768: {
					items: 3,
				}
			  }
		});
		
		/*----Cart----*/
		$("#cart").on("click", function() {
			$(".shopping-cart").fadeToggle( "fast");
		  });

        /*Wow animation*/
         new WOW().init();
		 
		/*magnificPopup For image*/
		$('.image-gallery-lightbox').magnificPopup({
		delegate: 'a',
		type: 'image',
		closeOnContentClick: false,
		closeBtnInside: false,
		mainClass: 'mfp-with-zoom mfp-img-mobile',
		image: {
			verticalFit: true,
			titleSrc: function(item) {
				return item.el.attr('title');
			}
		},
		gallery: {
			enabled: true
		},
		zoom: {
			enabled: true,
			duration: 300, // don't foget to change the duration also in CSS
			opener: function(element) {
				return element.find('img');
			}
		}
		
		});
		
		/*Product Details zoom*/
		$('a.gallery_link').on('click', function(event) {
			event.preventDefault();
			
			//var gallery = '#p-details-gallery'; //$(this).attr('id');
			var gallery = $(this).attr('title');
		
			$(gallery).magnificPopup({
		      delegate: 'a',
				type:'image',
				gallery: {
					enabled: true
				},
				zoom: {
					enabled: true,
					duration: 300, // don't foget to change the duration also in CSS
					opener: function(element) {
						return element.find('img');
					}
				}
			}).magnificPopup('open');
		});
		
		$("#p-details-thumb-slide").owlCarousel({
			items: 5,
			loop: true,
			dots: false,
			nav: true,
			navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
			autoplay: false,
			smartSpeed: 1200,
			responsiveClass: true,
			touchDrag: true,
			responsive: {
				0: {
					items: 4,
					nav: false
				},
				 640: {
					items: 5,
					nav: false
				}
			  }
		});
		$("#p-details-thumb-slide li").on("click", function() {
		  $("#p-details-thumb-slide li").removeClass( "highlight" );
		  $( this ).toggleClass( "highlight" );
		});
		
		/*magnificPopup Video*/
		
		$('.product-video').magnificPopup({
			type: 'iframe',
			mainClass: 'mfp-fade',
			removalDelay: 160,
			preloader: false,
			fixedContentPos: false,
		});

		  
		/*Zoom*/
		
		var $easyzoom = $('.easyzoom').easyZoom();

		// Setup thumbnails example
		var api1 = $easyzoom.filter('.easyzoom--with-thumbnails').data('easyZoom');

		$('.thumbnails').on('click', 'a', function(e) {
			var $this = $(this);

			e.preventDefault();

			// Use EasyZoom's `swap` method
			api1.swap($this.data('standard'), $this.attr('href'));
		});
		
		/*Tooltip*/
		$(function () {
		  $('[data-toggle="tooltip"]').tooltip();
		  //$('[data-toggle="popover"]').popover();
		});
		
		/*scrollTop*/
		$('.scrollup').on('click',function(){
			$("html, body").animate({ scrollTop: 0 }, 600);
			return false;
		});

		/*On scroll*/
		$(window).on('scroll',function() {
		  if ($(this).scrollTop() > 40){  
			  $('.for-sticky').addClass("sticky");
		     } else {
			  $('.for-sticky').removeClass("sticky");
		   }
		   
		   if ($(this).scrollTop() > 300) {
				$('.scrollup').fadeIn();
			} else {
				$('.scrollup').fadeOut();
			}
		   
		});
		
		/*Left Right Disable*/
		
		
		$('body').bind('cut copy paste', function (e) {
			e.preventDefault();
		});
		
		$('body').on('contextmenu',function(){
            return false;
  		  });
		  
		  $('body').on('keydown' , function(e) {
            if (e.ctrlKey && (e.keyCode === 67 || e.keyCode === 86 || e.keyCode === 85 || e.keyCode === 117)) {//Alt+c, Alt+v will also be disabled sadly.
                return false;
            }
            
	     }); 

    });


    jQuery(window).load(function(){
        jQuery(".bee-site-preloader-wrapper").fadeOut(300);
		
		/*Gallery Filter*/
		
		 $(".simplefilter li").on("click", function() {
			$(".simplefilter li").removeClass("active");
			$(this).addClass("active");
		});
		var options = {
			animationDuration: 0.6,
			filter: "all",
			callbacks: {
				onFilteringStart: function() {},
				onFilteringEnd: function() {}
			},
			delay: 0,
			delayMode: "alternate",
			easing: "ease-out",
			layout: "sameSize",
			selector: ".filtr-container",
			setupControls: true
		};
		var filterizd = $(".filtr-container").filterizr(options);
		filterizd.filterizr("setOptions", options);

    });

}(jQuery));	