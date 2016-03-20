/*------------------------------------*\
    ::Tabs
\*------------------------------------*/
var windowWidth     = $(window).width();


var blockTabs = {
    init: function() {
        this.bindUIfunctions();
        this.pageLoadCorrectTab();
    },
    bindUIfunctions: function() {
        // Delegation
        $(document)
            .on("click", ".transformer-tabs--block a[href^='#']:not('.active')", function(event) {
                blockTabs.changeTab(this.hash);
                event.preventDefault();
            })
            .on("click", ".transformer-tabs--block li.active > a", function(event) {
                event.preventDefault();
            });
    },
    changeTab: function(hash) {
        var anchor = $("[href=" + hash + "]");
        var div = $(hash);
        // activate correct anchor (visually)
        anchor.parent().addClass("active");
        anchor.parent().siblings().removeClass("active");
        // activate correct div (visually)
        div.addClass("active").siblings().removeClass("active");

        if(windowWidth > 1024){
            var tabHeight = div.height() + 100;
        } else {
            var tabHeight = div.height() + 380;
        }
        $('.content__inside').css('height',tabHeight);

    },
    // If the page has a hash on load, go to that tab
    pageLoadCorrectTab: function() {
        this.changeTab(document.location.hash);
    }
};

$(function(){
    blockTabs.init();
});

/*------------------------------------*\
    :: Hides all but the active tab
    visibly so links can be clicked.
\*------------------------------------*/
var tabContent      = $('.content__inside');
var blockNav        = $('.transformer-tabs--block ul li');
var activeTab       = $('.tab-content.active');

setTimeout(function(){
    // Set initial visibility and height
    if(windowWidth > 1024){
        var activeHeight    = activeTab.height() + 100;
    } else {
        var activeHeight    = activeTab.height() + 380;
    }
    tabContent.animate({'height': activeHeight},100);
}, 1000);

setTimeout(function(){
    $('.tab-content__inside').removeClass('loading-opacity');
},1200);

activeTab.css('visibility', 'visible');

// On click of navigation, swap visibility
blockNav.click(function(){
    tabContent.one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend',
    function(e) {
        $('.tab-content.active').css('visibility', 'visible');
        $('.tab-content:not(.active)').css('visibility','hidden');
        $("html, body").animate({ scrollTop: $('.transformer-tabs--block').offset().top }, 600);
    });
});

/*------------------------------------*\
    :: clicks first tab so that gap is not 
    at bottom of tab
\*------------------------------------*/

if($('.single-destination').length <= 0) {
    $(window).load(function(){
        $('.active').trigger("click");
        $('html, body').stop();
    });
}

