<<<<<<< HEAD
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

//* hot fix to turn off opacify filter on hero images, added directly to functions file on production
add_action('wp_head','mtbv_style_hotfix');
function mtbv_style_hotfix() {
?>
<style>
.hero.hero__destination { opacity: 1 !important; }
</style>
<?php
}
