(function($) {
    // global array of maps
    var allMaps = [];
    /*------------------------------------------------*\
        ::  Render Map
        ::  This function will render a Google Map 
        ::  onto the selected jQuery element
    \*------------------------------------------------*/
    function render_map( $el ) {
        // var
        var $markers = $el.find('.marker');
        // vars
        var args = {
            zoom        : 9,
            scrollwheel: false,
            mapTypeControl: true,
            mapTypeControlOptions: {
                position: google.maps.ControlPosition.RIGHT_BOTTOM
            },
            zoomControl: true,
            zoomControlOptions: {
                style: google.maps.ZoomControlStyle.DEFAULT,
                position: google.maps.ControlPosition.LEFT_CENTER
            },
            panControl: true,
            panControlOptions: {
                position: google.maps.ControlPosition.LEFT_BOTTOM
            },
            center      : new google.maps.LatLng(0, 0),
            mapTypeId   : google.maps.MapTypeId.ROADMAP
        };
        // create map               
        var map = new google.maps.Map( $el[0], args);
        // add a markers reference
        map.markers = [];
        // add markers
        $markers.each(function(){
            add_marker( $(this), map );
        });
        // center map
        centerMap(map);
        // collect this in an array
        allMaps.push(map);
    }
    /*----------------------------------------*\
        ::  Add Marker
        ::  This function will add a marker 
        ::  to the selected Google Map
    \*----------------------------------------*/
    function add_marker( $marker, map ) {
        // var
        var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );
        // create marker
        var marker = new google.maps.Marker({
            position    : latlng,
            draggable   : true, // set marker to draggable to hide duplicates
            crossOnDrag : false, // hide cross icon on drag event
            map         : map,
            icon        : urls.image + $marker.attr('data-icon')
        });

        // Set marker back to original position on drag event
        var origPos = marker.getPosition();
        marker.addListener("drag",function(e){
            marker.setPosition(origPos);
        });
        // add to array
        map.markers.push( marker );
        // if marker contains HTML, add it to an infoWindow
        if( $marker.html() )
        {
            // create info window
            var infowindow = new google.maps.InfoWindow({
                content     : $marker.html()
            });
            // show info window when marker is clicked
            google.maps.event.addListener(marker, 'click', function() {
                infowindow.open( map, marker );
            });
        }
    }
    /*-------------------------------------------------*\
        ::  Center Map
        ::  This function will center the map, 
        ::  showing all markers attached to this map
    \*-------------------------------------------------*/
    function centerMap( map ) {
        // vars
        var bounds = new google.maps.LatLngBounds();
        // loop through all markers and create bounds
           $.each( map.markers, function( i, marker ){
               var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );
               bounds.extend( latlng );
           });
        
        // only 1 marker?
        if( map.markers.length == 1 )
        {
            // set center of map
            map.setCenter( bounds.getCenter() );
            map.setZoom( 15 );
        }
        else
        {
            // fit to bounds
            map.fitBounds( bounds );
        }
    }
    // recenter the map on window resize
    $(window).resize(function(){
        for (var i = 0; i < allMaps.length; i++) {
            centerMap(allMaps[i]);
        }
    });


    function initialize() {
        var myLatlng = new google.maps.LatLng(0,0);
        var mapOptions = {
            zoom: 0,
            center: myLatlng
        };
        var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
            draggable: true, // set marker to draggable to hide duplicates
            crossOnDrag : false, // hide cross icon on drag event
            title: 'Hello World!'
        });
        // Set marker back to original position on drag event
        //var origPos = marker.getPosition();
        marker.addListener("drag",function(e){
            marker.setPosition(origPos);});
        }

    google.maps.event.addDomListener(window, 'load', initialize);
    
    /*-----------------------------------------------*\
        ::  Document Ready
        ::  This function will render each map when 
        ::  the document is ready (page has loaded)
    \*-----------------------------------------------*/
    $(window).load(function(){
        $('.destination__map').each(function(){
            render_map( $(this) );
        });
    });
})(jQuery);