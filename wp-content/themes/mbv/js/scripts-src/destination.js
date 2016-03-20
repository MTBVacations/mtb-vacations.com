/*------------------------------------*\
    ::Destination Slider
\*------------------------------------*/
$(function(){

	// store the slider in a local variable
	  var $window = $(window),
	      flexslider;

	      // console.log(flexslider);
	 
	  // tiny helper function to add breakpoints
	  function getGridSize() {
	    return (window.innerWidth < 650) ? 1 :
	           (window.innerWidth < 900) ? 2 : 3;
	  }
	 
	$('.flexslider-location').flexslider({
		animation: "slide",
		animationLoop: false,
		slideshow: false,
		controlNav: false,
		itemWidth: 450,
		itemMargin: 5,
		useCSS: false,
		minItems: getGridSize(), // use function to pull in initial value
		maxItems: getGridSize() // use function to pull in initial value
	});

	// Set tab content size for flexslider width
	var tabContentSize = $('.tab-content__inside').width();
	$('.flexslider-location').css('width',tabContentSize);

	var $locationImage = $('.js-background');
	if(window.innerWidth > 650){
		$locationImage.each(function(){
			var $this = $(this);
			var image = $this.data('image');
			$this.attr('style',image);
		});
	} else {
		$locationImage.each(function(){
			$('.js-image-height').css({'height':'0', 'min-height': '0', 'background':'purple'});
		});
	}
	  
	$(".open-lightbox").fancybox({
		beforeShow: function(){
	        $("body").css({'overflow-y':'hidden'});
	    },
	    afterClose: function(){
	        $("body").css({'overflow-y':'visible'});
	    },
		helpers: {
			overlay: {
				locked: false
			}
		}
	});
});