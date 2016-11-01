<?php
/*
 * @package WordPress
 * @subpackage Zemplate
 * @since Zemplate 1.0
 */

/*
 * Require any custom functions you'd like to add to this theme.
 *
 * This is where you should add any custom functions specific
 * to the current theme.
 */
require_once('functions/enqueue.php');


/*
 * Require any custom functions you'd like to add to this theme.
 *
 * This is where you should add any custom functions specific
 * to the current theme.
 */
require_once('functions/custom-functions.php');




/*
 * Require Zemplate's standard collection of miscellaneous functions
 *
 * These are helpful functions included with all Zemplate themes.
 */

require_once('functions/zemplate-functions.php');


//* ACF Google Maps Field API Key
add_filter('acf/settings/google_api_key', function () {
    return 'AIzaSyAkexjpqjbFbW8lrZm7SPH4m8DsPTQk6Mo';
});