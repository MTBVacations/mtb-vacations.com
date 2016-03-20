/*------------------------------------*\
    ::Ajax In Images
    ----------------------------------*
    https://snippetlib.com/jquery/replace_all_svg_images_with_inline_svg
\*------------------------------------*/
jQuery(function($){
    // find all img tags in need of changing to svg
    $('.js-ajax-replace').each(function(){
        // cache this image
        var $img = $(this);
        // capture it's classes
        var classes = $img.attr('class');
        // grab the svg via ajax
        $.get($img.attr('src'), function(data) {
            // find just the svg from what's retrieved
            var svg = $(data).find('svg');
            svg
                // reapply the classes
                .attr('class', classes)
                // remove fill on this and all children
                .attr('fill','')
                    .find('*')
                    .attr('fill','');
            // replace the img with the svg
            $img.replaceWith(svg);
        });
    });
});