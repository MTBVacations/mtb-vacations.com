<?php

/*------------------------------------*\
    //Enques
		//CSS
		//Javascript
\*------------------------------------*/

/*------------------------------------*\
    //CSS
\*------------------------------------*/
	function theme_styles(){
		wp_register_style( 'style', get_template_directory_uri() . '/style.css', array(), '1.0','screen, projection' );
		wp_register_style( 'slider', get_template_directory_uri() . '/plugins/flexslider/flexslider.css', array(), '1.3.2','screen, projection' );
		wp_register_style( 'dropdown', get_template_directory_uri() . '/plugins/dropdown/dropdown.min.css', array(), '1.3.2','screen, projection' );
		wp_register_style( 'fancybox', get_template_directory_uri() . '/plugins/fancybox/jquery.fancybox.css', array(), '1.3.2','screen, projection' );

		// enqueing:
		wp_enqueue_style( 'slider' );
		wp_enqueue_style( 'dropdown' );
		wp_enqueue_style( 'fancybox' );
		wp_enqueue_style( 'style' );
	}
	add_action('wp_enqueue_scripts', 'theme_styles');
	if($is_IE) {
		function ie_styles(){
			wp_register_style( 'ie', get_template_directory_uri() . '/ie.css', array(), '1.0','screen, projection' );

			// enqueing:
			wp_enqueue_style( 'ie' );
		}
		add_action('wp_enqueue_scripts', 'ie_styles');
	}
/*------------------------------------*\
    //Javascript
\*------------------------------------*/
// Register some javascript files, because we love javascript files. Enqueue a couple as well
// Reference: wp_register_script( $handle, $src, $deps, $ver, $in_footer );
function load_js_files() {
	if(!is_admin()){
		wp_deregister_script('jquery');
		wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js', false, '1.10.1', true);
		wp_register_script('slider', get_template_directory_uri() . '/plugins/flexslider/jquery.flexslider-min.js', 'jquery', '1.0', true);
		wp_register_script('fancybox', get_template_directory_uri() . '/plugins/fancybox/jquery.fancybox.pack.js', false, '1.0', true);
		wp_register_script('scripts', get_template_directory_uri() . '/js/scripts.min.js', 'jquery', '1.0', true);

		//Get in line!
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'slider' );
		wp_enqueue_script( 'fancybox' );
		wp_enqueue_script( 'scripts' );
		//If necessary, page specific enqueues
		// if ( is_page() ) {

		// }

		// Enable ajax support for comments
		if(is_singular() && comments_open() && get_option('thread_comments')){
		    wp_enqueue_script('comment-reply');
		}
	}
}
add_action( 'wp_enqueue_scripts', 'load_js_files' );
