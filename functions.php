<?php
/**
 * TechForum Theme Functions
 *
 * @package TechForum_Theme
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Theme setup
 */
function techforum_setup() {
    // Add theme support for various features
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));
    add_theme_support('post-formats', array(
        'aside',
        'image',
        'video',
        'quote',
        'link',
        'gallery',
        'status',
        'audio',
        'chat'
    ));
    
    // Add support for responsive embeds
    add_theme_support('responsive-embeds');
    
    // Add support for editor styles
    add_theme_support('editor-styles');
    add_editor_style('assets/css/editor-style.css');
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'techforum-theme'),
        'footer' => __('Footer Menu', 'techforum-theme'),
        'footer-resources' => __('Footer Resources Menu', 'techforum-theme'),
        'footer-support' => __('Footer Support Menu', 'techforum-theme'),
    ));
    
    // Set content width
    if (!isset($content_width)) {
        $content_width = 1200;
    }
}
add_action('after_setup_theme', 'techforum_setup');

/**
 * Enqueue scripts and styles
 */
function techforum_scripts() {
    // Enqueue Font Awesome
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0');
    wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css', array(), '5.3.0');
    wp_enqueue_style('bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css', array(), '1.10.5');
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap', array(), '1.0');
    wp_enqueue_style('custom-style', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0');
    // wp_enqueue_style('custom-style', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0');
    // Enqueue theme stylesheet with cache busting
    wp_enqueue_style('techforum-style', get_stylesheet_uri(), array(), '1.1-' . time());
    
    // Enqueue theme JavaScript
    wp_enqueue_script('techforum-script', get_template_directory_uri() . '/assets/js/theme.js', array('jquery'), wp_get_theme()->get('Version'), true);
    
    // Enqueue comment reply script
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
    
    // Localize script for AJAX
    wp_localize_script('techforum-script', 'techforum_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('techforum_nonce')
    ));
}
add_action('wp_enqueue_scripts', 'techforum_scripts');

/**
 * Register widget areas
 */
function techforum_widgets_init() {
    register_sidebar(array(
        'name'          => __('Primary Sidebar', 'techforum-theme'),
        'id'            => 'sidebar-1',
        'description'   => __('Add widgets here to appear in your sidebar.', 'techforum-theme'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer Widget Area 1', 'techforum-theme'),
        'id'            => 'footer-1',
        'description'   => __('Add widgets here to appear in the first footer column.', 'techforum-theme'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer Widget Area 2', 'techforum-theme'),
        'id'            => 'footer-2',
        'description'   => __('Add widgets here to appear in the second footer column.', 'techforum-theme'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer Widget Area 3', 'techforum-theme'),
        'id'            => 'footer-3',
        'description'   => __('Add widgets here to appear in the third footer column.', 'techforum-theme'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'techforum_widgets_init');

/**
 * Custom Walker for Navigation Menu
 */
class TechForum_Walker_Nav_Menu extends Walker_Nav_Menu {
    
    function start_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"sub-menu\">\n";
    }
    
    function end_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }
    
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';
        
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;
        
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';
        
        $id = apply_filters('nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';
        
        $indent = ($depth) ? str_repeat("\t", $depth) : '';
        
        $output .= $indent . '<li' . $id . $class_names .'>';
        
        $attributes = ! empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) .'"' : '';
        $attributes .= ! empty($item->target)     ? ' target="' . esc_attr($item->target     ) .'"' : '';
        $attributes .= ! empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn        ) .'"' : '';
        $attributes .= ! empty($item->url)        ? ' href="'   . esc_attr($item->url        ) .'"' : '';
        
        // Add button class for specific menu items
        $button_class = '';
        if (in_array('btn', $classes)) {
            $button_class = ' class="btn"';
        }
        
        $item_output = isset($args->before) ? $args->before : '';
        $item_output .= '<a' . $attributes . $button_class . '>';
        $item_output .= (isset($args->link_before) ? $args->link_before : '') . apply_filters('the_title', $item->title, $item->ID) . (isset($args->link_after) ? $args->link_after : '');
        $item_output .= '</a>';
        $item_output .= isset($args->after) ? $args->after : '';
        
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
    
    function end_el(&$output, $item, $depth = 0, $args = null) {
        $output .= "</li>\n";
    }
}

/**
 * Fallback menu for primary navigation
 */
function techforum_fallback_menu() {
    echo '<ul class="nav-links">';
    echo '<li><a href="' . esc_url(home_url('/')) . '">' . __('Home', 'techforum-theme') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/blog/')) . '">' . __('Blog', 'techforum-theme') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/about/')) . '">' . __('About', 'techforum-theme') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/contact/')) . '">' . __('Contact', 'techforum-theme') . '</a></li>';
    echo '<li><a href="' . esc_url(wp_login_url()) . '" class="btn">' . __('Sign In', 'techforum-theme') . '</a></li>';
    echo '</ul>';
}

/**
 * Custom excerpt length
 */
function techforum_excerpt_length($length) {
    return 30;
}
add_filter('excerpt_length', 'techforum_excerpt_length');

/**
 * Custom excerpt more
 */
function techforum_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'techforum_excerpt_more');

/**
 * Add custom image sizes
 */
function techforum_image_sizes() {
    add_image_size('techforum-featured', 800, 400, true);
    add_image_size('techforum-thumbnail', 300, 200, true);
    add_image_size('techforum-large', 1200, 600, true);
}
add_action('after_setup_theme', 'techforum_image_sizes');

/**
 * Customizer additions
 */
function techforum_customize_register($wp_customize) {
    // Social Media Section
    $wp_customize->add_section('techforum_social', array(
        'title'    => __('Social Media Links', 'techforum-theme'),
        'priority' => 120,
    ));
    
    // Twitter URL
    $wp_customize->add_setting('twitter_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('twitter_url', array(
        'label'   => __('Twitter URL', 'techforum-theme'),
        'section' => 'techforum_social',
        'type'    => 'url',
    ));
    
    // Facebook URL
    $wp_customize->add_setting('facebook_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('facebook_url', array(
        'label'   => __('Facebook URL', 'techforum-theme'),
        'section' => 'techforum_social',
        'type'    => 'url',
    ));
    
    // GitHub URL
    $wp_customize->add_setting('github_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('github_url', array(
        'label'   => __('GitHub URL', 'techforum-theme'),
        'section' => 'techforum_social',
        'type'    => 'url',
    ));
    
    // Discord URL
    $wp_customize->add_setting('discord_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('discord_url', array(
        'label'   => __('Discord URL', 'techforum-theme'),
        'section' => 'techforum_social',
        'type'    => 'url',
    ));
    
    // Hero Section
    $wp_customize->add_section('techforum_hero', array(
        'title'    => __('Hero Section', 'techforum-theme'),
        'priority' => 130,
    ));
    
    // Hero Title
    $wp_customize->add_setting('hero_title', array(
        'default'           => 'The Ultimate Tech Community',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_title', array(
        'label'   => __('Hero Title', 'techforum-theme'),
        'section' => 'techforum_hero',
        'type'    => 'text',
    ));
    
    // Hero Description
    $wp_customize->add_setting('hero_description', array(
        'default'           => 'Join thousands of developers, modders, and tech enthusiasts discussing Android, Linux, Windows, custom ROMs, and everything in between.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('hero_description', array(
        'label'   => __('Hero Description', 'techforum-theme'),
        'section' => 'techforum_hero',
        'type'    => 'textarea',
    ));
    
    // Footer Section
    $wp_customize->add_section('techforum_footer', array(
        'title'    => __('Footer Settings', 'techforum-theme'),
        'priority' => 140,
    ));
    
    // Footer Description
    $wp_customize->add_setting('footer_description', array(
        'default'           => 'The ultimate community for Android, Linux, Windows, and all things tech.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('footer_description', array(
        'label'   => __('Footer Description', 'techforum-theme'),
        'section' => 'techforum_footer',
        'type'    => 'textarea',
    ));
    
    // Footer Column 1 Title
    $wp_customize->add_setting('footer_title_1', array(
        'default'           => 'TechForum',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('footer_title_1', array(
        'label'   => __('Footer Column 1 Title', 'techforum-theme'),
        'section' => 'techforum_footer',
        'type'    => 'text',
    ));
    
    // Footer Column 2 Title
    $wp_customize->add_setting('footer_title_2', array(
        'default'           => 'Navigation',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('footer_title_2', array(
        'label'   => __('Footer Column 2 Title', 'techforum-theme'),
        'section' => 'techforum_footer',
        'type'    => 'text',
    ));
    
    // Footer Column 3 Title
    $wp_customize->add_setting('footer_title_3', array(
        'default'           => 'Resources',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('footer_title_3', array(
        'label'   => __('Footer Column 3 Title', 'techforum-theme'),
        'section' => 'techforum_footer',
        'type'    => 'text',
    ));
    
    // Footer Column 4 Title
    $wp_customize->add_setting('footer_title_4', array(
        'default'           => 'Support',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('footer_title_4', array(
        'label'   => __('Footer Column 4 Title', 'techforum-theme'),
        'section' => 'techforum_footer',
        'type'    => 'text',
    ));
    
    // Footer Copyright
    $wp_customize->add_setting('footer_copyright', array(
        'default'           => 'TechForum. All rights reserved.',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('footer_copyright', array(
        'label'   => __('Footer Copyright Text', 'techforum-theme'),
        'section' => 'techforum_footer',
        'type'    => 'text',
    ));
}
add_action('customize_register', 'techforum_customize_register');

/**
 * Add body classes
 */
function techforum_body_classes($classes) {
    if (!is_singular()) {
        $classes[] = 'hfeed';
    }
    
    if (is_home() && is_front_page()) {
        $classes[] = 'home-page';
    }
    
    return $classes;
}
add_filter('body_class', 'techforum_body_classes');

/**
 * Pagination function
 */
function techforum_pagination() {
    global $wp_query;
    
    $big = 999999999;
    
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages,
        'prev_text' => __('&laquo; Previous', 'techforum-theme'),
        'next_text' => __('Next &raquo;', 'techforum-theme'),
        'type' => 'list',
        'end_size' => 3,
        'mid_size' => 3
    ));
}

/**
 * Comments callback
 */
function techforum_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);
    
    if ('div' == $args['style']) {
        $tag = 'div';
        $add_below = 'comment';
    } else {
        $tag = 'li';
        $add_below = 'div-comment';
    }
    ?>
    <<?php echo $tag ?> <?php comment_class(empty($args['has_children']) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
    <?php if ('div' != $args['style']) : ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
    <?php endif; ?>
    
    <div class="comment-author vcard">
        <?php if ($args['avatar_size'] != 0) echo get_avatar($comment, $args['avatar_size']); ?>
        <?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
    </div>
    
    <?php if ($comment->comment_approved == '0') : ?>
        <em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
        <br />
    <?php endif; ?>
    
    <div class="comment-meta commentmetadata">
        <a href="<?php echo htmlspecialchars(get_comment_link($comment->comment_ID)) ?>">
            <?php printf(__('%1$s at %2$s'), get_comment_date(), get_comment_time()) ?>
        </a>
        <?php edit_comment_link(__('(Edit)'), '  ', '') ?>
    </div>
    
    <?php comment_text() ?>
    
    <div class="reply">
        <?php comment_reply_link(array_merge($args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    </div>
    
    <?php if ('div' != $args['style']) : ?>
        </div>
    <?php endif; ?>
    <?php
}

/**
 * Security enhancements
 */
// Remove WordPress version from head
remove_action('wp_head', 'wp_generator');

// Remove RSD link
remove_action('wp_head', 'rsd_link');

// Remove Windows Live Writer
remove_action('wp_head', 'wlwmanifest_link');

// Remove index link
remove_action('wp_head', 'index_rel_link');

// Remove previous link
remove_action('wp_head', 'parent_post_rel_link', 10, 0);

// Remove start link
remove_action('wp_head', 'start_post_rel_link', 10, 0);

// Remove links for adjacent posts
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

// Remove WP version from css
add_filter('style_loader_src', 'techforum_remove_wp_ver_css_js', 9999);
// Remove WP version from scripts
add_filter('script_loader_src', 'techforum_remove_wp_ver_css_js', 9999);

function techforum_remove_wp_ver_css_js($src) {
    if (strpos($src, 'ver='))
        $src = remove_query_arg('ver', $src);
    return $src;
}

/**
 * Debug function to help troubleshoot theme issues
 */
function techforum_debug_info() {
    if (current_user_can('administrator') && isset($_GET['debug'])) {
        echo '<div style="background: #fff; padding: 20px; margin: 20px; border: 1px solid #ccc;">';
        echo '<h3>Theme Debug Info</h3>';
        echo '<p><strong>Template:</strong> ' . get_page_template_slug() . '</p>';
        echo '<p><strong>Is Front Page:</strong> ' . (is_front_page() ? 'Yes' : 'No') . '</p>';
        echo '<p><strong>Is Home:</strong> ' . (is_home() ? 'Yes' : 'No') . '</p>';
        echo '<p><strong>Current Template:</strong> ' . basename(get_page_template()) . '</p>';
        echo '<p><strong>Theme Directory:</strong> ' . get_template_directory() . '</p>';
        echo '<p><strong>Posts Count:</strong> ' . wp_count_posts()->publish . '</p>';
        echo '</div>';
    }
}
add_action('wp_footer', 'techforum_debug_info');

/**
 * Ensure proper template hierarchy
 */
function techforum_template_redirect() {
    if (is_front_page() && is_home()) {
        // This is the front page showing latest posts
        include(get_template_directory() . '/front-page.php');
        exit;
    }
}
add_action('template_redirect', 'techforum_template_redirect');
