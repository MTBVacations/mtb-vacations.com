<?php
/*
 * The template for displaying comments.
 *
 * @package WordPress
 * @subpackage Zemplate
 * @since Zemplate 3.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (post_password_required())
    return;
?>

<div class="comments__list">

    <?php if (have_comments()) : ?>
        <h2>
            <?php
                printf(
                    _n(
                        'One Comment',
                        '%1$s Comments',
                        get_comments_number(),
                        'twentyten'
                    ),
                    number_format_i18n(get_comments_number()),
                    '' . get_the_title()
                );
            ?>
        </h2>

        <ol>
            <?php wp_list_comments('type=comment&callback=zemplate_comment&reverse_top_level=true'); ?>
        </ol>

        <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : // are there comments to navigate through ?>
            <nav class="navigation" role="navigation">
                <h1 class="assistive-text section-heading"><?php echo 'Comment navigation'; ?></h1>
                <div class="nav-previous"><?php previous_comments_link('&larr; Older Comments'); ?></div>
                <div class="nav-next"><?php next_comments_link('Newer Comments &rarr;'); ?></div>
            </nav>
        <?php endif; // check for comment navigation ?>

        <?php
        /* If there are no comments and comments are closed, let's leave a note.
         * But we only want the note on posts and pages that had comments in the first place.
         */
        if (! comments_open() && get_comments_number()) : ?>
            <p><?php echo 'Comments are closed.'; ?></p>
        <?php endif; ?>

    <?php endif; // have_comments() ?>

    <?php 
        $fields = array(
            'author' =>
                '<p class="comment-form-author">' .
                '<input id="author" name="author" type="text" placeholder="Name (required)" value="' . esc_attr( $commenter['comment_author'] ) .
                '" size="30"' . $aria_req . ' /></p>',

              'email' =>
                '<p class="comment-form-email">' .
                '<input id="email" name="email" type="text" placeholder="Email (required)" value="' . esc_attr(  $commenter['comment_author_email'] ) .
                '" size="30"' . $aria_req . ' /></p>'

        );

        $args = array(
            comment_notes_before => '<p class="comment-notes">' . __( 'Your email address will not be published.' ) . ( $req ? $required_text : '' ) . '</p>',
            comment_notes_after => '',
            fields => $fields,
            comment_field => '<textarea placeholder="Comment" cols="45" rows="8" name="comment" aria-required="true"></textarea>'
       );
        comment_form($args);
    ?>

</div><!-- comments__list -->