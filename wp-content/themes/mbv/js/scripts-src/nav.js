$(function(){
  // activate nav on click
  var navToggle = function(){
    // cache things
        $body = $('body');

        // activate the nav on click of the toggle
        $('#nav-toggle').click(function(){
            $body.toggleClass('nav-active');
        });

        // detract nav if anything outside it is clicked
        $body.on('click', function(){
            $body.removeClass('nav-active');
        });

        // don't detract nav if nav is clicked
        $('#menu-main, #nav-toggle').click(function(e){
            e.stopPropagation();
        });

        $('.head-nav > ul > li > ul > li ').click(function(){
            $(this).toggleClass('hey_sub-nav');
        });

  };
  var navOverlay = function(){
    window.onscroll = function() {
      if(document.body.scrollTop !== 0) {
        $('.main-head__wrap').addClass('main-head__wrap--scroll');
        $('.head-nav').addClass('head-nav--scroll');
      } else if(document.body.scrollTop === 0) {
        $('.main-head__wrap').removeClass('main-head__wrap--scroll');
        $('.head-nav').removeClass('head-nav--scroll');
      }
    }
  };
  navToggle();
  navOverlay();
});