<?php
/**
 * Template for displaying search forms
 *
 * @package TechForum_Theme
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <label>
        <span class="screen-reader-text"><?php echo _x('Search for:', 'label', 'techforum-theme'); ?></span>
        <input type="search" class="search-field" placeholder="<?php echo esc_attr_x('Search forums, tutorials, devices...', 'placeholder', 'techforum-theme'); ?>" value="<?php echo get_search_query(); ?>" name="s" />
    </label>
    <button type="submit" class="search-submit">
        <i class="fas fa-search"></i>
        <span class="screen-reader-text"><?php echo _x('Search', 'submit button', 'techforum-theme'); ?></span>
    </button>
</form>
