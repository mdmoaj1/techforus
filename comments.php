<?php
/**
 * The template for displaying comments
 *
 * @package TechForum_Theme
 */

if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area">

    <?php if (have_comments()) : ?>
        <h3 class="comments-title">
            <?php
            $comments_number = get_comments_number();
            if ('1' === $comments_number) {
                printf(_x('One comment on &ldquo;%s&rdquo;', 'comments title', 'techforum-theme'), get_the_title());
            } else {
                printf(
                    _nx(
                        '%1$s comment on &ldquo;%2$s&rdquo;',
                        '%1$s comments on &ldquo;%2$s&rdquo;',
                        $comments_number,
                        'comments title',
                        'techforum-theme'
                    ),
                    number_format_i18n($comments_number),
                    get_the_title()
                );
            }
            ?>
        </h3>

        <ol class="comment-list">
            <?php
            wp_list_comments(array(
                'style'       => 'ol',
                'short_ping'  => true,
                'avatar_size' => 50,
                'callback'    => 'techforum_comment',
            ));
            ?>
        </ol>

        <?php
        the_comments_pagination(array(
            'prev_text' => __('Previous', 'techforum-theme'),
            'next_text' => __('Next', 'techforum-theme'),
        ));
        ?>

    <?php endif; ?>

    <?php if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) : ?>
        <p class="no-comments"><?php _e('Comments are closed.', 'techforum-theme'); ?></p>
    <?php endif; ?>

    <?php
    comment_form(array(
        'title_reply_before' => '<h3 id="reply-title" class="comment-reply-title">',
        'title_reply_after'  => '</h3>',
        'class_form'         => 'comment-form',
        'class_submit'       => 'btn btn-primary',
        'submit_button'      => '<input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" />',
        'comment_field'      => '<p class="comment-form-comment"><label for="comment">' . _x('Comment', 'noun', 'techforum-theme') . ' <span class="required">*</span></label><textarea id="comment" name="comment" cols="45" rows="8" maxlength="65525" required="required"></textarea></p>',
        'fields'             => array(
            'author' => '<p class="comment-form-author">' .
                        '<label for="author">' . __('Name', 'techforum-theme') . ' <span class="required">*</span></label> ' .
                        '<input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30" maxlength="245" required="required" /></p>',
            'email'  => '<p class="comment-form-email">' .
                        '<label for="email">' . __('Email', 'techforum-theme') . ' <span class="required">*</span></label> ' .
                        '<input id="email" name="email" type="email" value="' . esc_attr($commenter['comment_author_email']) . '" size="30" maxlength="100" aria-describedby="email-notes" required="required" /></p>',
            'url'    => '<p class="comment-form-url">' .
                        '<label for="url">' . __('Website', 'techforum-theme') . '</label> ' .
                        '<input id="url" name="url" type="url" value="' . esc_attr($commenter['comment_author_url']) . '" size="30" maxlength="200" /></p>',
        ),
    ));
    ?>

</div>
