$(function(){
    $('.flexslider').flexslider({
		animation: "fade",
		directionNav: true,
		controlNav: false
    });

    $('#search-select').change(function(){
    	$href = $(this).val();
    	$('#search-select__submit').attr('href',$href);
    });

});