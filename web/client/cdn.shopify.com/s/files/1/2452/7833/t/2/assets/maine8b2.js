(function ($) {
 "use strict";

  jQuery(document).ready(function(){
    
    
/*----------------------------
  Preloader
------------------------------ */   

    $(window).on('load', function() {
      $('#preloader_active').fadeOut('slow');
    });
    
    
    
/*----------------------------
 jQuery MeanMenu
------------------------------ */
    jQuery('nav#dropdown').meanmenu({
    	meanScreenWidth: "991"
    });
    
/*----------------------------
 Magnific Popup
------------------------------ */     
// Video popup
    
    $('.video-popup').magnificPopup({
      type: 'iframe',
      mainClass: 'mfp-fade',
      removalDelay: 160,
      preloader: false,
      zoom: {
        enabled: true,
      }
    });
    
    
	 
// Image Popup  
    
    $('.image-popup').magnificPopup({
      type: 'image',
      mainClass: 'mfp-fade',
      removalDelay: 300,
      cursor: 'mfp-zoom',
      delegate: 'a',
      gallery:{
        enabled:true, 
      },
      zoom: {
        enabled: true,
        duration: 300,
        easing: 'ease-in-out',
        opener: function(openerElement) {
          // openerElement is the element on which popup was initialized, in this case its <a> tag
          // you don't need to add "opener" option if this code matches your needs, it's defailt one.
          return openerElement.is('a') ? openerElement : openerElement.find('a');
        }
      }
    });
    
/*----------------------------
 owl active
------------------------------ */  
	$("#products-carousel").owlCarousel({
		autoPlay: false, 
		slideSpeed:1000,
		pagination:false,
		navigation:true,	  
		items : 4,
		navigationText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
		itemsDesktop : [1199,4],
		itemsDesktopSmall : [980,3],
		itemsTablet: [767,2],
		itemsMobile : [479,1],
	});
	
	$("#upsell-products-carousel").owlCarousel({
		autoPlay: false, 
		slideSpeed:1000,
		pagination:false,
		navigation:true,	  
		items : 4,
		navigationText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
		itemsDesktop : [1199,4],
		itemsDesktopSmall : [980,3],
		itemsTablet: [768,2],
		itemsMobile : [479,1],
	});
	
	$("#testimonial-carousel").owlCarousel({
		autoPlay: false, 
		slideSpeed:1000,
		pagination:true,
		navigation:false,	  
		singleItem:true
	});
	
    
/*----------------------------
 scroll-to-comment
-----------------------------*/   
    $("#show-comment").on('click', function(event) {

      event.preventDefault();

      var hash = this.hash;

      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 1000, function(){

        window.location.hash = hash;
        
      });
    });
    
/*--------------------------
 scrollUp
---------------------------- */	
	$.scrollUp({
        scrollText: '<i class="fa fa-angle-up"></i>',
        easingType: 'linear',
        scrollSpeed: 900,
        animation: 'fade',
		animationSpeed: 500
    }); 	 
    
    $('.shop-grid-area > .row > div').matchHeight();
  
  	$('.mega-menu-li').parent('ul').addClass('mega-menu');
    $('.mega-menu').parent('li').addClass('mega-menu-satatic');
    
    
    
    $('#instafeed > a').matchHeight();
    
 
    
    });
 
})(jQuery); 