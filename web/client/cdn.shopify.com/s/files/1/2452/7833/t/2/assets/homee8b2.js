(function ($) {
 "use strict";
  
  $(document).ready(function(){
  
		//---------------------------------------------
		//Nivo slider
		//---------------------------------------------
			 $('#ensign-nivoslider').nivoSlider({
				effect: 'random',
				slices: 15,
				boxCols: 8,
				boxRows: 4,
				animSpeed: 500,
				pauseTime: 5000,
				startSlide: 0,
				directionNav: true,
				controlNav: false,
				controlNavThumbs: false,
				pauseOnHover: false,
				manualAdvance: true,
				prevText: '<i class="fa fa-angle-left nivo-prev-icon"></i>',
				nextText: '<i class="fa fa-angle-right nivo-next-icon"></i>'
			 });
			 
			$('#ensign-nivoslider-2').nivoSlider({
				effect: 'random',
				slices: 15,
				boxCols: 8,
				boxRows: 4,
				animSpeed: 500,
				pauseTime: 5000,
				startSlide: 0,
				directionNav: true,
				controlNav: false,
				controlNavThumbs: false,
				pauseOnHover: false,
				manualAdvance: true,
				prevText: '<i class="fa fa-angle-left nivo-prev-icon"></i>',
				nextText: '<i class="fa fa-angle-right nivo-next-icon"></i>'
			 });

    });
    
})(jQuery); 