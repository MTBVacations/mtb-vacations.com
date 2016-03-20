<?php
/**
 * The template for displaying the sidebar.
 *
 * @package WordPress
 * @subpackage Zemplate
 * @since Zemplate 2.0
 */
?>

<ul>
    <li>
        <h3><?php echo 'Archives'; ?></h3>
        <ul>
            <?php wp_get_archives('type=monthly'); ?>
        </ul>
    </li>
</ul>