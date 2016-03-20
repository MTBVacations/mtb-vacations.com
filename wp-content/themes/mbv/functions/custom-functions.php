<?php
/*
 * @package WordPress
 * @subpackage Zemplate
 * @since Zemplate 1.0
 *
 * Theme-specific functions and definitions
 *
 * Use this file to set up any theme-specific functions you'd like to use
 * in the current theme.
 */

/*------------------------------------*\
    ::Button Shortcode
\*------------------------------------*/
//Usage: [button link='http://example.com' name='My Button' target='New Tab']
function btn_shortcode($attr) {
    extract(shortcode_atts(array(
        'link' => '#',
        'name' => 'Learn More',
        'same_window' => '',
        'classes' => ''
    ), $attr));
    if($same_window == 'false'){
        $same_window = ' target="_blank"';
    } else {
        $same_window = '';
    }
    return '<a href="'.$link.'" class="btn '.$classes.'"'.$same_window.'>'.$name.'</a>';
}
add_shortcode('button', 'btn_shortcode');

/*------------------------------------*\
    :: Rename Posts to Tips & Gear
\*------------------------------------*/
function revcon_change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Tips & Gear';
    $submenu['edit.php'][5][0] = 'Tips & Gear';
    $submenu['edit.php'][10][0] = 'Add Tips & Gear';
    $submenu['edit.php'][16][0] = 'Tips & Gear Tags';
    echo '';
}
function revcon_change_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Tips & Gear';
    $labels->singular_name = 'Tips & Gear';
    $labels->add_new = 'Add Tips & Gear';
    $labels->add_new_item = 'Add Tips & Gear';
    $labels->edit_item = 'Edit Tips & Gear';
    $labels->new_item = 'Tips & Gear';
    $labels->view_item = 'View Tips & Gear';
    $labels->search_items = 'Search Tips & Gear';
    $labels->not_found = 'No Tips & Gear found';
    $labels->not_found_in_trash = 'No Tips & Gear found in Trash';
    $labels->all_items = 'All Tips & Gear';
    $labels->menu_name = 'Tips & Gear';
    $labels->name_admin_bar = 'Tips & Gear';
}
 
add_action( 'admin_menu', 'revcon_change_post_label' );
add_action( 'init', 'revcon_change_post_object' );

/*-----------------------------------------------*\
    :: Custom Post type for destination
\*-----------------------------------------------*/
function destination_register() {
    $labels = array(
        'name' => _x('Destinations', 'post type general name'),
        'singular_name' => _x('Destination', 'post type singular name'),
        'add_new' => _x('Add New', 'Destination'),
        'add_new_item' => __('Add New Destination'),
        'edit_item' => __('Edit Destination'),
        'new_item' => __('New Destination'),
        'view_item' => __('View Destination'),
        'search_items' => __('Search Destination'),
        'not_found' =>  __('Nothing found'),
        'not_found_in_trash' => __('Nothing found in Trash')
    );
 
    $args = array(
        'labels' => $labels,
        'rewrite' => array( 'slug' => 'destinations', 'with_front' => true ),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'has_archive' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title','editor','thumbnail','comments'),
        'menu_icon'=> 'dashicons-admin-site',
        'show_in_nav_menus' => true,
      ); 
    register_post_type( 'destination' , $args );
    flush_rewrite_rules('false');
}
add_action( 'init', 'destination_register' );


/*-----------------------------------------------*\
    :: Add SVG File type for upload
\*-----------------------------------------------*/
add_filter('upload_mimes', 'custom_upload_mimes');

function custom_upload_mimes ( $existing_mimes=array() ) {

    // add the file extension to the array

    $existing_mimes['svg'] = 'mime/type';

        // call the modified list of extensions

    return $existing_mimes;

}


/*------------------------------------*\
    ::Show Sub Page Nav for All the Things

    Basic usage:         [pagelist id="9"]
    Fixed usage:         [pagelist id="9" fixed="x-y"]

    Fixed examples:
    right top:     [pagelist id="9" fixed="right-top"]
    bottom left:   [pagelist id="9" fixed="left-bottom"]
    note: x comes before y always
//
\*------------------------------------*/
function page_list_shortcode($attr) {
    extract(shortcode_atts(array(
        'id' => '9',
        'fixed' => ''
    ), $attr));
  $children = wp_list_pages('title_li=&child_of='.$id.'&echo=0&depth=1');
  if($children) {
    $r = rand();
    if($fixed != ''){
        $fixed_arr = explode('-', $fixed);
        $fixed = '#things-list-'.$r.' {
                        position: fixed;
                        '.$fixed_arr[0].': 0;
                        '.$fixed_arr[1].': 0;
                        opacity: .4;
                        transition: opacity 300ms;
                    }
                    #things-list-'.$r.':hover ul:before {
                        content: "";
                        position: absolute;
                        background-color: black;
                        top: -50px;
                        bottom: -50px;
                        right: -50px;
                        left: -50px;
                        '.$fixed_arr[0].': 0;
                        '.$fixed_arr[1].': 0;
                        z-index: -1;
                        opacity: 0;
                    }
                    #things-list-'.$r.':hover {
                        opacity: 1;
                    }
                    #things-list-'.$r.' li:hover ul {
                        '.$fixed_arr[1].': 20px;
                    }';
    }
    $str =  '<ul id="things-list-'.$r.'">
                <style scoped>
                    #things-list-'.$r.' {
                        position: relative;
                        z-index: 9999;
                        font-size: 12px;
                    }
                    #things-list-'.$r.', #things-list-'.$r.' ul {
                        margin: 0;
                        padding: 0;
                        list-style: none;
                        width: 150px;
                        background: teal;
                        box-shadow: 0 0 2px white, 0 0 2px black;
                    }
                    #things-list-'.$r.' a {
                        display: block;
                        min-height: 20px;
                        width: 100%;
                        padding: 5px;
                        color: mediumaquamarine;
                        text-decoration: none;
                        transition: color 300ms;
                    }
                    #things-list-'.$r.' a:hover {
                        color: white;
                    }
                    #things-list-'.$r.' li ul {
                        display: none;
                        position: absolute;
                    }
                    #things-list-'.$r.' li:hover ul {
                        display: block;
                    }
                    '.$fixed.'
                </style>
                <li>
                    <a href="'.get_permalink($id).'">All the Things</a>
                    <ul>'.$children.'</ul>
                </li>
            </ul>';
        return $str;
    }
}
add_shortcode('pagelist', 'page_list_shortcode');