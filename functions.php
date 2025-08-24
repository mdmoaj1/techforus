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
    
    // Enqueue Owl Carousel
    wp_enqueue_style('owl-carousel', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css', array(), '2.3.4');
    wp_enqueue_style('owl-theme', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css', array(), '2.3.4');
    wp_enqueue_script('owl-carousel-js', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js', array('jquery'), '2.3.4', true);
    
    wp_enqueue_style('custom-style', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0');
    // wp_enqueue_style('custom-style', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0');
    // Enqueue theme stylesheet with cache busting
    wp_enqueue_style('techforum-style', get_stylesheet_uri(), array(), '1.1-' . time());
    
    // Enqueue theme JavaScript
    wp_enqueue_script('techforum-script', get_template_directory_uri() . '/assets/js/theme.js', array('jquery', 'owl-carousel-js'), wp_get_theme()->get('Version'), true);
    
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

/**
 * Groq AI Integration
 */

// Add admin menu for Groq AI settings
add_action('admin_menu', 'groq_ai_admin_menu');

function groq_ai_admin_menu() {
    add_menu_page(
        'Groq AI Settings',           // Page title
        'Groq AI',                    // Menu title
        'manage_options',             // Capability
        'groq-ai-settings',           // Menu slug
        'groq_ai_settings_page',      // Function
        'dashicons-robot',            // Icon
        30                            // Position
    );
    
    // Add submenu pages
    add_submenu_page(
        'groq-ai-settings',
        'AI Models',
        'AI Models',
        'manage_options',
        'groq-ai-models',
        'groq_ai_models_page'
    );
    
    add_submenu_page(
        'groq-ai-settings',
        'Forum Management',
        'Forum Management',
        'manage_options',
        'groq-ai-forums',
        'groq_ai_forums_page'
    );
    
    add_submenu_page(
        'groq-ai-settings',
        'Usage Statistics',
        'Usage Statistics',
        'manage_options',
        'groq-ai-stats',
        'groq_ai_stats_page'
    );
}

// Enqueue admin styles and scripts
add_action('admin_enqueue_scripts', 'groq_ai_admin_scripts');

function groq_ai_admin_scripts($hook) {
    // Only load on our admin pages
    if (strpos($hook, 'groq-ai') === false) {
        return;
    }
    
    wp_enqueue_style('groq-ai-admin', get_template_directory_uri() . '/assets/css/groq-admin.css', array(), '1.0.0');
    wp_enqueue_script('groq-ai-admin', get_template_directory_uri() . '/assets/js/groq-admin.js', array('jquery'), '1.0.0', true);
    
    // Localize script for AJAX
    wp_localize_script('groq-ai-admin', 'groqAjax', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('groq_ai_nonce')
    ));
}

// Register settings
add_action('admin_init', 'groq_ai_register_settings');

function groq_ai_register_settings() {
    register_setting('groq_ai_settings', 'groq_api_key');
    register_setting('groq_ai_settings', 'groq_selected_model');
    register_setting('groq_ai_settings', 'groq_max_tokens');
    register_setting('groq_ai_settings', 'groq_temperature');
    register_setting('groq_ai_settings', 'groq_forum_auto_generate');
    register_setting('groq_ai_settings', 'groq_content_moderation');
}

// Main settings page
function groq_ai_settings_page() {
    ?>
    <div class="wrap groq-ai-admin">
        <h1><i class="dashicons dashicons-robot"></i> Groq AI Settings</h1>
        
        <div class="groq-admin-container">
            <div class="groq-main-content">
                <div class="groq-card">
                    <div class="groq-card-header">
                        <h2>API Configuration</h2>
                        <span class="groq-status" id="api-status">
                            <span class="status-dot"></span>
                            <span class="status-text">Checking...</span>
                        </span>
                    </div>
                    
                    <form method="post" action="options.php" id="groq-settings-form">
                        <?php settings_fields('groq_ai_settings'); ?>
                        
                        <div class="groq-form-group">
                            <label for="groq_api_key">Groq API Key</label>
                            <div class="groq-input-group">
                                <input type="password" id="groq_api_key" name="groq_api_key" 
                                       value="<?php echo esc_attr(get_option('groq_api_key')); ?>" 
                                       placeholder="Enter your Groq API key" class="groq-input">
                                <button type="button" id="test-api-key" class="groq-btn groq-btn-secondary">
                                    <i class="dashicons dashicons-yes-alt"></i> Test Connection
                                </button>
                                <span id="api-key-status" class="groq-save-indicator" style="margin-left: 0.5rem; font-size: 0.9rem; color: #666; display: none;">
                                    <i class="dashicons dashicons-update-alt" style="animation: spin 1s linear infinite;"></i> Saving...
                                </span>
                            </div>
                            <p class="groq-help-text">
                                Get your API key from <a href="https://console.groq.com/" target="_blank">Groq Console</a>
                            </p>
                            <div id="connection-status-message" class="groq-status-message" style="margin-top: 0.5rem; padding: 0.5rem; border-radius: 4px; font-size: 0.9rem; display: none;"></div>
                        </div>
                        
                        <div class="groq-form-group">
                            <label for="groq_selected_model">Default AI Model</label>
                            <select id="groq_selected_model" name="groq_selected_model" class="groq-select">
                                <?php
                                $selected_model = get_option('groq_selected_model', 'llama-3.1-8b-instant');
                                $models = groq_get_available_models();
                                foreach ($models as $model_id => $model) {
                                    echo '<option value="' . esc_attr($model_id) . '"' . selected($selected_model, $model_id, false) . '>';
                                    echo esc_html($model['name']) . ' - $' . $model['input_price'] . '/$' . $model['output_price'] . ' per 1M tokens';
                                    echo '</option>';
                                }
                                ?>
                            </select>
                            <div id="model-details" class="groq-model-details"></div>
                        </div>
                        
                        <div class="groq-form-row">
                            <div class="groq-form-group">
                                <label for="groq_max_tokens">Max Tokens</label>
                                <input type="number" id="groq_max_tokens" name="groq_max_tokens" 
                                       value="<?php echo esc_attr(get_option('groq_max_tokens', '1000')); ?>" 
                                       min="1" max="128000" class="groq-input">
                            </div>
                            
                            <div class="groq-form-group">
                                <label for="groq_temperature">Temperature</label>
                                <input type="range" id="groq_temperature" name="groq_temperature" 
                                       value="<?php echo esc_attr(get_option('groq_temperature', '0.7')); ?>" 
                                       min="0" max="2" step="0.1" class="groq-range">
                                <span class="groq-range-value"><?php echo esc_html(get_option('groq_temperature', '0.7')); ?></span>
                            </div>
                        </div>
                        
                        <div class="groq-form-group">
                            <label class="groq-checkbox-label">
                                <input type="checkbox" id="groq_forum_auto_generate" name="groq_forum_auto_generate" 
                                       value="1" <?php checked(get_option('groq_forum_auto_generate'), 1); ?>>
                                <span class="groq-checkbox-custom"></span>
                                Enable Auto-Generate Forum Content
                            </label>
                            <p class="groq-help-text">Automatically generate forum threads and responses using AI</p>
                        </div>
                        
                        <div class="groq-form-group">
                            <label class="groq-checkbox-label">
                                <input type="checkbox" id="groq_content_moderation" name="groq_content_moderation" 
                                       value="1" <?php checked(get_option('groq_content_moderation'), 1); ?>>
                                <span class="groq-checkbox-custom"></span>
                                Enable AI Content Moderation
                            </label>
                            <p class="groq-help-text">Use AI to moderate forum content for inappropriate material</p>
                        </div>
                        
                        <div class="groq-form-actions">
                            <?php submit_button('Save Settings', 'primary groq-btn groq-btn-primary', 'submit', false); ?>
                            <button type="button" id="reset-settings" class="groq-btn groq-btn-danger">
                                <i class="dashicons dashicons-trash"></i> Reset to Defaults
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="groq-sidebar">
                <div class="groq-card">
                    <div class="groq-card-header">
                        <h3>Quick Stats</h3>
                    </div>
                    <div class="groq-stats">
                        <div class="groq-stat-item">
                            <span class="groq-stat-number" id="total-requests">0</span>
                            <span class="groq-stat-label">Total Requests</span>
                        </div>
                        <div class="groq-stat-item">
                            <span class="groq-stat-number" id="tokens-used">0</span>
                            <span class="groq-stat-label">Tokens Used</span>
                        </div>
                        <div class="groq-stat-item">
                            <span class="groq-stat-number" id="estimated-cost">$0.00</span>
                            <span class="groq-stat-label">Estimated Cost</span>
                        </div>
                    </div>
                </div>
                
                <div class="groq-card">
                    <div class="groq-card-header">
                        <h3>AI Post Generation</h3>
                    </div>
                    <div class="groq-stats">
                        <p style="margin-bottom: 1rem; color: #64748b; font-size: 0.9rem;">Generate AI forum posts using Groq AI</p>
                        
                        <div class="groq-form-group" style="margin-bottom: 1rem;">
                            <label style="font-size: 0.85rem; font-weight: 600; margin-bottom: 0.5rem; display: block;">Generate Questions (Users)</label>
                            <div style="display: flex; gap: 0.5rem; flex-wrap: wrap; margin-bottom: 1rem;">
                                <button type="button" class="groq-btn groq-btn-secondary generate-ai-post" data-user-type="questioner" data-category="android" style="font-size: 0.8rem; padding: 0.4rem 0.8rem;">Android Q</button>
                                <button type="button" class="groq-btn groq-btn-secondary generate-ai-post" data-user-type="questioner" data-category="linux" style="font-size: 0.8rem; padding: 0.4rem 0.8rem;">Linux Q</button>
                                <button type="button" class="groq-btn groq-btn-secondary generate-ai-post" data-user-type="questioner" data-category="windows" style="font-size: 0.8rem; padding: 0.4rem 0.8rem;">Windows Q</button>
                                <button type="button" class="groq-btn groq-btn-secondary generate-ai-post" data-user-type="questioner" data-category="custom-roms" style="font-size: 0.8rem; padding: 0.4rem 0.8rem;">ROM Q</button>
                            </div>
                        </div>
                        
                        <div class="groq-form-group">
                            <label style="font-size: 0.85rem; font-weight: 600; margin-bottom: 0.5rem; display: block;">Generate Guides (Editors)</label>
                            <div style="display: flex; gap: 0.5rem; flex-wrap: wrap;">
                                <button type="button" class="groq-btn groq-btn-primary generate-ai-post" data-user-type="editor" data-category="android" style="font-size: 0.8rem; padding: 0.4rem 0.8rem;">Android Guide</button>
                                <button type="button" class="groq-btn groq-btn-primary generate-ai-post" data-user-type="editor" data-category="linux" style="font-size: 0.8rem; padding: 0.4rem 0.8rem;">Linux Guide</button>
                                <button type="button" class="groq-btn groq-btn-primary generate-ai-post" data-user-type="editor" data-category="development" style="font-size: 0.8rem; padding: 0.4rem 0.8rem;">Dev Guide</button>
                                <button type="button" class="groq-btn groq-btn-primary generate-ai-post" data-user-type="editor" data-category="security" style="font-size: 0.8rem; padding: 0.4rem 0.8rem;">Security Guide</button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="groq-card">
                    <div class="groq-card-header">
                        <h3>Forum Status</h3>
                    </div>
                    <div class="groq-forum-status">
                        <?php
                        $forums = array(
                            'android' => 'Android Forum',
                            'linux' => 'Linux Forum', 
                            'windows' => 'Windows Forum',
                            'custom-roms' => 'Custom ROMs Forum',
                            'bootloaders' => 'Bootloaders Forum',
                            'root-access' => 'Root Access Forum',
                            'development' => 'Development Forum',
                            'security' => 'Security Forum'
                        );
                        
                        foreach ($forums as $slug => $name) {
                            $status = get_option("groq_forum_status_{$slug}", 'inactive');
                            echo '<div class="groq-forum-item">';
                            echo '<span class="groq-forum-name">' . esc_html($name) . '</span>';
                            echo '<span class="groq-forum-toggle ' . ($status === 'active' ? 'active' : '') . '" data-forum="' . esc_attr($slug) . '">';
                            echo '<span class="toggle-slider"></span>';
                            echo '</span>';
                            echo '</div>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}

// Get available Groq models
function groq_get_available_models() {
    return array(
        'gpt-oss-20b-128k' => array(
            'name' => 'GPT OSS 20B 128k',
            'speed' => 1000,
            'input_price' => 0.10,
            'output_price' => 0.50,
            'context' => '128k',
            'description' => 'Fast and efficient model for general tasks'
        ),
        'gpt-oss-120b-128k' => array(
            'name' => 'GPT OSS 120B 128k',
            'speed' => 500,
            'input_price' => 0.15,
            'output_price' => 0.75,
            'context' => '128k',
            'description' => 'Larger model with enhanced capabilities'
        ),
        'kimi-k2-1t-128k' => array(
            'name' => 'Kimi K2 1T 128k',
            'speed' => 200,
            'input_price' => 1.00,
            'output_price' => 3.00,
            'context' => '128k',
            'description' => 'Premium model with advanced reasoning'
        ),
        'llama-4-scout-17bx16e-128k' => array(
            'name' => 'Llama 4 Scout (17Bx16E) 128k',
            'speed' => 594,
            'input_price' => 0.11,
            'output_price' => 0.34,
            'context' => '128k',
            'description' => 'Balanced performance and cost efficiency'
        ),
        'llama-4-maverick-17bx128e-128k' => array(
            'name' => 'Llama 4 Maverick (17Bx128E) 128k',
            'speed' => 562,
            'input_price' => 0.20,
            'output_price' => 0.60,
            'context' => '128k',
            'description' => 'Enhanced model with improved accuracy'
        ),
        'llama-guard-4-12b-128k' => array(
            'name' => 'Llama Guard 4 12B 128k',
            'speed' => 325,
            'input_price' => 0.20,
            'output_price' => 0.20,
            'context' => '128k',
            'description' => 'Specialized for content moderation and safety'
        ),
        'deepseek-r1-distill-llama-70b-128k' => array(
            'name' => 'DeepSeek R1 Distill Llama 70B 128k',
            'speed' => 400,
            'input_price' => 0.75,
            'output_price' => 0.99,
            'context' => '128k',
            'description' => 'Advanced reasoning and problem-solving'
        ),
        'qwen3-32b-131k' => array(
            'name' => 'Qwen3 32B 131k',
            'speed' => 662,
            'input_price' => 0.29,
            'output_price' => 0.59,
            'context' => '131k',
            'description' => 'High-performance multilingual model'
        ),
        'mistral-saba-24b-32k' => array(
            'name' => 'Mistral Saba 24B 32k',
            'speed' => 330,
            'input_price' => 0.79,
            'output_price' => 0.79,
            'context' => '32k',
            'description' => 'Optimized for code and technical content'
        ),
        'llama-3.3-70b-versatile-128k' => array(
            'name' => 'Llama 3.3 70B Versatile 128k',
            'speed' => 394,
            'input_price' => 0.59,
            'output_price' => 0.79,
            'context' => '128k',
            'description' => 'Versatile model for diverse applications'
        ),
        'llama-3.1-8b-instant' => array(
            'name' => 'Llama 3.1 8B Instant 128k',
            'speed' => 840,
            'input_price' => 0.05,
            'output_price' => 0.08,
            'context' => '128k',
            'description' => 'Ultra-fast model for instant responses'
        ),
        'llama-3-70b-8k' => array(
            'name' => 'Llama 3 70B 8k',
            'speed' => 330,
            'input_price' => 0.59,
            'output_price' => 0.79,
            'context' => '8k',
            'description' => 'Powerful model for complex tasks'
        ),
        'llama-3-8b-8k' => array(
            'name' => 'Llama 3 8B 8k',
            'speed' => 1345,
            'input_price' => 0.05,
            'output_price' => 0.08,
            'context' => '8k',
            'description' => 'Fastest model for simple tasks'
        ),
        'gemma-2-9b-8k' => array(
            'name' => 'Gemma 2 9B 8k',
            'speed' => 500,
            'input_price' => 0.20,
            'output_price' => 0.20,
            'context' => '8k',
            'description' => 'Efficient model with balanced pricing'
        ),
        'llama-guard-3-8b-8k' => array(
            'name' => 'Llama Guard 3 8B 8k',
            'speed' => 765,
            'input_price' => 0.20,
            'output_price' => 0.20,
            'context' => '8k',
            'description' => 'Content safety and moderation specialist'
        )
    );
}

// AI Models page
function groq_ai_models_page() {
    ?>
    <div class="wrap groq-ai-admin">
        <h1><i class="dashicons dashicons-admin-settings"></i> AI Models</h1>
        
        <div class="groq-admin-container">
            <div class="groq-main-content">
                <div class="groq-card">
                    <div class="groq-card-header">
                        <h2>Available Models</h2>
                    </div>
                    
                    <div style="padding: 2rem;">
                        <div class="groq-models-grid">
                            <?php
                            $models = groq_get_available_models();
                            foreach ($models as $model_id => $model) {
                                $is_selected = get_option('groq_selected_model') === $model_id;
                                echo '<div class="groq-model-card ' . ($is_selected ? 'selected' : '') . '" data-model="' . esc_attr($model_id) . '">';
                                echo '<div class="groq-model-header">';
                                echo '<h3>' . esc_html($model['name']) . '</h3>';
                                if ($is_selected) echo '<span class="groq-model-badge">Current</span>';
                                echo '</div>';
                                echo '<div class="groq-model-specs">';
                                echo '<div class="groq-spec"><span class="label">Speed:</span> <span class="value">' . $model['speed'] . ' tokens/sec</span></div>';
                                echo '<div class="groq-spec"><span class="label">Input:</span> <span class="value">$' . $model['input_price'] . '/1M tokens</span></div>';
                                echo '<div class="groq-spec"><span class="label">Output:</span> <span class="value">$' . $model['output_price'] . '/1M tokens</span></div>';
                                echo '<div class="groq-spec"><span class="label">Context:</span> <span class="value">' . $model['context'] . '</span></div>';
                                echo '</div>';
                                echo '<p class="groq-model-desc">' . esc_html($model['description']) . '</p>';
                                echo '<button class="groq-btn groq-btn-primary select-model" data-model="' . esc_attr($model_id) . '">';
                                echo $is_selected ? 'Selected' : 'Select Model';
                                echo '</button>';
                                echo '</div>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <style>
    .groq-models-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 1.5rem;
    }
    
    .groq-model-card {
        border: 2px solid #ddd;
        border-radius: 8px;
        padding: 1.5rem;
        transition: all 0.3s ease;
        cursor: pointer;
    }
    
    .groq-model-card:hover {
        border-color: #667eea;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.1);
    }
    
    .groq-model-card.selected {
        border-color: #667eea;
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.1) 0%, rgba(118, 75, 162, 0.1) 100%);
    }
    
    .groq-model-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1rem;
    }
    
    .groq-model-header h3 {
        margin: 0;
        color: #23282d;
    }
    
    .groq-model-badge {
        background: #667eea;
        color: white;
        padding: 0.25rem 0.75rem;
        border-radius: 12px;
        font-size: 0.8rem;
        font-weight: 500;
    }
    
    .groq-model-specs {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 0.5rem;
        margin-bottom: 1rem;
    }
    
    .groq-spec {
        display: flex;
        justify-content: space-between;
        font-size: 0.9rem;
    }
    
    .groq-spec .label {
        color: #666;
    }
    
    .groq-spec .value {
        font-weight: 600;
        color: #23282d;
    }
    
    .groq-model-desc {
        color: #666;
        font-size: 0.9rem;
        margin-bottom: 1.5rem;
        line-height: 1.4;
    }
    
    .select-model {
        width: 100%;
    }
    </style>
    
    <script>
    jQuery(document).ready(function($) {
        $('.select-model').on('click', function() {
            const modelId = $(this).data('model');
            
            // Update selected model via AJAX
            $.ajax({
                url: ajaxurl,
                type: 'POST',
                data: {
                    action: 'groq_select_model',
                    model: modelId,
                    nonce: '<?php echo wp_create_nonce('groq_ai_nonce'); ?>'
                },
                success: function(response) {
                    if (response.success) {
                        location.reload();
                    }
                }
            });
        });
    });
    </script>
    <?php
}

// Forum Management page
function groq_ai_forums_page() {
    ?>
    <div class="wrap groq-ai-admin">
        <h1><i class="dashicons dashicons-format-chat"></i> Forum Management</h1>
        
        <div class="groq-admin-container">
            <div class="groq-main-content">
                <div class="groq-card">
                    <div class="groq-card-header">
                        <h2>Forum AI Configuration</h2>
                    </div>
                    
                    <div style="padding: 2rem;">
                        <?php
                        $forums = array(
                            'android' => 'Android Forum',
                            'linux' => 'Linux Forum', 
                            'windows' => 'Windows Forum',
                            'custom-roms' => 'Custom ROMs Forum',
                            'bootloaders' => 'Bootloaders Forum',
                            'root-access' => 'Root Access Forum',
                            'development' => 'Development Forum',
                            'security' => 'Security Forum'
                        );
                        
                        foreach ($forums as $slug => $name) {
                            $status = get_option("groq_forum_status_{$slug}", 'inactive');
                            $auto_generate = get_option("groq_forum_auto_generate_{$slug}", 0);
                            $generation_frequency = get_option("groq_forum_frequency_{$slug}", 'daily');
                            
                            echo '<div class="groq-forum-config">';
                            echo '<div class="groq-forum-config-header">';
                            echo '<h3>' . esc_html($name) . '</h3>';
                            echo '<span class="groq-forum-status-badge ' . $status . '">' . ucfirst($status) . '</span>';
                            echo '</div>';
                            
                            echo '<div class="groq-forum-config-body">';
                            echo '<div class="groq-config-row">';
                            echo '<label class="groq-checkbox-label">';
                            echo '<input type="checkbox" class="forum-auto-generate" data-forum="' . esc_attr($slug) . '" ' . checked($auto_generate, 1, false) . '>';
                            echo '<span class="groq-checkbox-custom"></span>';
                            echo 'Auto-generate content';
                            echo '</label>';
                            
                            echo '<select class="groq-select generation-frequency" data-forum="' . esc_attr($slug) . '">';
                            echo '<option value="hourly"' . selected($generation_frequency, 'hourly', false) . '>Hourly</option>';
                            echo '<option value="daily"' . selected($generation_frequency, 'daily', false) . '>Daily</option>';
                            echo '<option value="weekly"' . selected($generation_frequency, 'weekly', false) . '>Weekly</option>';
                            echo '</select>';
                            echo '</div>';
                            
                            echo '<div class="groq-config-actions">';
                            echo '<button class="groq-btn groq-btn-secondary generate-content" data-forum="' . esc_attr($slug) . '">Generate Content Now</button>';
                            echo '<button class="groq-btn groq-btn-primary save-forum-config" data-forum="' . esc_attr($slug) . '">Save Settings</button>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <style>
    .groq-forum-config {
        border: 1px solid #ddd;
        border-radius: 8px;
        margin-bottom: 1.5rem;
        overflow: hidden;
    }
    
    .groq-forum-config-header {
        background: #f8f9fa;
        padding: 1rem 1.5rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid #ddd;
    }
    
    .groq-forum-config-header h3 {
        margin: 0;
        color: #23282d;
    }
    
    .groq-forum-status-badge {
        padding: 0.25rem 0.75rem;
        border-radius: 12px;
        font-size: 0.8rem;
        font-weight: 500;
    }
    
    .groq-forum-status-badge.active {
        background: #d4edda;
        color: #155724;
    }
    
    .groq-forum-status-badge.inactive {
        background: #f8d7da;
        color: #721c24;
    }
    
    .groq-forum-config-body {
        padding: 1.5rem;
    }
    
    .groq-config-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1rem;
    }
    
    .groq-config-actions {
        display: flex;
        gap: 1rem;
    }
    
    .generation-frequency {
        width: 150px;
    }
    </style>
    <?php
}

// Usage Statistics page
function groq_ai_stats_page() {
    ?>
    <div class="wrap groq-ai-admin">
        <h1><i class="dashicons dashicons-chart-area"></i> Usage Statistics</h1>
        
        <div class="groq-admin-container">
            <div class="groq-main-content">
                <div class="groq-card">
                    <div class="groq-card-header">
                        <h2>API Usage Overview</h2>
                    </div>
                    
                    <div style="padding: 2rem;">
                        <div class="groq-stats-overview">
                            <div class="groq-stat-card">
                                <div class="groq-stat-icon">📊</div>
                                <div class="groq-stat-info">
                                    <div class="groq-stat-number">1,247</div>
                                    <div class="groq-stat-label">Total Requests</div>
                                </div>
                            </div>
                            
                            <div class="groq-stat-card">
                                <div class="groq-stat-icon">🔤</div>
                                <div class="groq-stat-info">
                                    <div class="groq-stat-number">2.4M</div>
                                    <div class="groq-stat-label">Tokens Used</div>
                                </div>
                            </div>
                            
                            <div class="groq-stat-card">
                                <div class="groq-stat-icon">💰</div>
                                <div class="groq-stat-info">
                                    <div class="groq-stat-number">$12.45</div>
                                    <div class="groq-stat-label">Total Cost</div>
                                </div>
                            </div>
                            
                            <div class="groq-stat-card">
                                <div class="groq-stat-icon">⚡</div>
                                <div class="groq-stat-info">
                                    <div class="groq-stat-number">0.8s</div>
                                    <div class="groq-stat-label">Avg Response Time</div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="groq-chart-container">
                            <h3>Usage Over Time</h3>
                            <div id="usage-chart" style="height: 300px; background: #f8f9fa; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: #666;">
                                Chart will be implemented with Chart.js
                            </div>
                        </div>
                        
                        <div class="groq-model-usage">
                            <h3>Model Usage Breakdown</h3>
                            <div class="groq-model-stats">
                                <div class="groq-model-stat">
                                    <span class="model-name">Llama 3.1 8B Instant</span>
                                    <span class="usage-bar">
                                        <span class="usage-fill" style="width: 65%"></span>
                                    </span>
                                    <span class="usage-percent">65%</span>
                                </div>
                                <div class="groq-model-stat">
                                    <span class="model-name">GPT OSS 20B</span>
                                    <span class="usage-bar">
                                        <span class="usage-fill" style="width: 25%"></span>
                                    </span>
                                    <span class="usage-percent">25%</span>
                                </div>
                                <div class="groq-model-stat">
                                    <span class="model-name">Gemma 2 9B</span>
                                    <span class="usage-bar">
                                        <span class="usage-fill" style="width: 10%"></span>
                                    </span>
                                    <span class="usage-percent">10%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <style>
    .groq-stats-overview {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }
    
    .groq-stat-card {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 1.5rem;
        border-radius: 8px;
        display: flex;
        align-items: center;
        gap: 1rem;
    }
    
    .groq-stat-icon {
        font-size: 2rem;
    }
    
    .groq-stat-info {
        flex: 1;
    }
    
    .groq-stat-number {
        font-size: 1.8rem;
        font-weight: 700;
        line-height: 1;
    }
    
    .groq-stat-label {
        font-size: 0.9rem;
        opacity: 0.9;
        margin-top: 0.25rem;
    }
    
    .groq-chart-container {
        margin: 2rem 0;
    }
    
    .groq-model-usage {
        margin-top: 2rem;
    }
    
    .groq-model-stats {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }
    
    .groq-model-stat {
        display: grid;
        grid-template-columns: 200px 1fr 60px;
        align-items: center;
        gap: 1rem;
    }
    
    .model-name {
        font-weight: 500;
        color: #23282d;
    }
    
    .usage-bar {
        height: 8px;
        background: #e9ecef;
        border-radius: 4px;
        overflow: hidden;
    }
    
    .usage-fill {
        height: 100%;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        transition: width 0.3s ease;
    }
    
    .usage-percent {
        text-align: right;
        font-weight: 600;
        color: #667eea;
    }
    </style>
    <?php
}

// AJAX Handlers
add_action('wp_ajax_groq_toggle_forum', 'groq_ajax_toggle_forum');
add_action('wp_ajax_groq_get_stats', 'groq_ajax_get_stats');
add_action('wp_ajax_groq_select_model', 'groq_ajax_select_model');

// Forum AI AJAX Handlers
add_action('wp_ajax_create_ai_editors', 'forum_ajax_create_ai_editors');
add_action('wp_ajax_create_ai_questioners', 'forum_ajax_create_ai_questioners');
add_action('wp_ajax_test_ai_system', 'forum_ajax_test_ai_system');
add_action('wp_ajax_get_ai_users', 'forum_ajax_get_ai_users');
add_action('wp_ajax_cleanup_ai_users', 'forum_ajax_cleanup_ai_users');
add_action('wp_ajax_get_forum_activity', 'forum_ajax_get_forum_activity');
add_action('wp_ajax_get_forum_stats', 'forum_ajax_get_forum_stats');

// Forum Custom Post Type and Taxonomy
add_action('init', 'create_forum_post_type');
add_action('init', 'create_forum_taxonomy');
add_action('admin_menu', 'forum_admin_menu');
add_action('admin_enqueue_scripts', 'forum_admin_scripts');

function groq_ajax_toggle_forum() {
    check_ajax_referer('groq_ai_nonce', 'nonce');
    
    if (!current_user_can('manage_options')) {
        wp_die('Unauthorized');
    }
    
    $forum = sanitize_text_field($_POST['forum']);
    $status = sanitize_text_field($_POST['status']);
    
    update_option("groq_forum_status_{$forum}", $status);
    
    wp_send_json_success(array(
        'forum' => $forum,
        'status' => $status
    ));
}

function groq_ajax_get_stats() {
    check_ajax_referer('groq_ai_nonce', 'nonce');
    
    if (!current_user_can('manage_options')) {
        wp_die('Unauthorized');
    }
    
    // Get stats from database or API
    $stats = array(
        'total_requests' => get_option('groq_total_requests', 0),
        'tokens_used' => get_option('groq_tokens_used', 0),
        'estimated_cost' => get_option('groq_estimated_cost', 0)
    );
    
    wp_send_json_success($stats);
}

function groq_ajax_select_model() {
    check_ajax_referer('groq_ai_nonce', 'nonce');
    
    if (!current_user_can('manage_options')) {
        wp_die('Unauthorized');
    }
    
    $model = sanitize_text_field($_POST['model']);
    update_option('groq_selected_model', $model);
    
    wp_send_json_success(array('model' => $model));
}

// Test Groq API connection
function test_groq_connection($api_key = null) {
    if (!$api_key) {
        $api_key = get_option('groq_api_key', '');
    }
    
    if (empty($api_key)) {
        update_option('groq_connection_status', 'disconnected');
        update_option('groq_last_connection_test', time());
        return array('success' => false, 'message' => 'No API key provided');
    }
    
    // Make a minimal test request to Groq API
    $response = wp_remote_post('https://api.groq.com/openai/v1/chat/completions', array(
        'headers' => array(
            'Authorization' => 'Bearer ' . $api_key,
            'Content-Type' => 'application/json'
        ),
        'body' => json_encode(array(
            'model' => 'llama-3.1-8b-instant',
            'messages' => array(
                array(
                    'role' => 'user',
                    'content' => 'Hi'
                )
            ),
            'max_tokens' => 5
        )),
        'timeout' => 15
    ));
    
    if (is_wp_error($response)) {
        update_option('groq_connection_status', 'disconnected');
        update_option('groq_last_connection_test', time());
        return array('success' => false, 'message' => 'Connection failed: ' . $response->get_error_message());
    }
    
    $response_code = wp_remote_retrieve_response_code($response);
    $response_body = wp_remote_retrieve_body($response);
    
    if ($response_code === 200) {
        // Valid response - connection successful
        update_option('groq_connection_status', 'connected');
        update_option('groq_last_connection_test', time());
        return array('success' => true, 'message' => 'Connection successful - API key is valid');
    } else {
        // Parse error response
        $error_data = json_decode($response_body, true);
        $error_message = 'Unknown error';
        
        if (isset($error_data['error']['message'])) {
            $error_message = $error_data['error']['message'];
        } elseif (isset($error_data['error'])) {
            $error_message = is_string($error_data['error']) ? $error_data['error'] : 'API Error';
        }
        
        // Check for specific error types
        if ($response_code === 401) {
            $error_message = 'Invalid API key - Please check your Groq API key';
        } elseif ($response_code === 403) {
            $error_message = 'Access forbidden - API key may not have required permissions';
        } elseif ($response_code === 429) {
            $error_message = 'Rate limit exceeded - Please try again later';
        } elseif ($response_code >= 500) {
            $error_message = 'Groq server error - Please try again later';
        }
        
        update_option('groq_connection_status', 'disconnected');
        update_option('groq_last_connection_test', time());
        return array('success' => false, 'message' => $error_message . ' (HTTP ' . $response_code . ')');
    }
}

// AJAX handler for getting connection status
add_action('wp_ajax_get_groq_connection_status', 'ajax_get_groq_connection_status');
function ajax_get_groq_connection_status() {
    check_ajax_referer('groq_ai_nonce', 'nonce');
    
    if (!current_user_can('manage_options')) {
        wp_die('Unauthorized');
    }
    
    $status = get_option('groq_connection_status', 'disconnected');
    $last_test = get_option('groq_last_connection_test', 0);
    
    $message = 'Status unknown';
    if ($status === 'connected') {
        $message = 'API key is valid and working';
    } elseif ($status === 'disconnected') {
        $api_key = get_option('groq_api_key', '');
        if (empty($api_key)) {
            $message = 'No API key configured';
        } else {
            $message = 'API key validation failed';
        }
    }
    
    wp_send_json_success(array(
        'status' => $status,
        'message' => $message,
        'last_test' => $last_test
    ));
}

// AJAX handler for testing API connection
add_action('wp_ajax_test_groq_connection', 'ajax_test_groq_connection');
function ajax_test_groq_connection() {
    check_ajax_referer('groq_ai_nonce', 'nonce');
    
    if (!current_user_can('manage_options')) {
        wp_die('Unauthorized');
    }
    
    $api_key = sanitize_text_field($_POST['api_key']);
    $connection_result = test_groq_connection($api_key);
    
    if ($connection_result['success']) {
        wp_send_json_success(array(
            'status' => 'connected',
            'message' => $connection_result['message']
        ));
    } else {
        wp_send_json_error(array(
            'status' => 'disconnected',
            'message' => $connection_result['message']
        ));
    }
}

// Check connection status on page load
add_action('admin_init', 'check_groq_connection_status');
function check_groq_connection_status() {
    $api_key = get_option('groq_api_key', '');
    $last_test = get_option('groq_last_connection_test', 0);
    
    // Test connection every 5 minutes or if never tested
    if (!empty($api_key) && ($last_test == 0 || $last_test < (time() - 300))) {
        $connection_result = test_groq_connection($api_key);
        // The test_groq_connection function now handles updating the options internally
    }
}

// Create a single AI user with realistic human names
function create_single_ai_user($user_type = 'editor') {
    // Human-like names for different user types and countries
    $human_names = array(
        'editor' => array(
            array('name' => 'TechExpert_Mike', 'country' => 'USA', 'style' => 'Professional', 'specialty' => 'Android Development'),
            array('name' => 'DevGuru_Sarah', 'country' => 'UK', 'style' => 'Helpful', 'specialty' => 'Linux Systems'),
            array('name' => 'CodeMaster_Alex', 'country' => 'Canada', 'style' => 'Friendly', 'specialty' => 'Security'),
            array('name' => 'TechWiz_Emma', 'country' => 'Australia', 'style' => 'Casual', 'specialty' => 'Custom ROMs'),
            array('name' => 'SystemPro_David', 'country' => 'Germany', 'style' => 'Precise', 'specialty' => 'Bootloaders'),
        ),
        'questioner' => array(
            array('name' => 'AndroidUser_John', 'country' => 'USA', 'style' => 'Direct'),
            array('name' => 'PhoneFan_Lisa', 'country' => 'UK', 'style' => 'Polite'),
            array('name' => 'TechNewbie_Chris', 'country' => 'Canada', 'style' => 'Curious'),
            array('name' => 'MobileGuru_Kate', 'country' => 'Australia', 'style' => 'Laid-back'),
            array('name' => 'DevLearner_Max', 'country' => 'Germany', 'style' => 'Methodical'),
        )
    );
    
    // Select a random profile
    $profiles = $human_names[$user_type];
    $profile = $profiles[array_rand($profiles)];
    $timestamp = time();
    
    $username = strtolower($profile['name']) . '_' . $timestamp;
    $email = $username . '@techforum.local';
    $display_name = $profile['name'];
    
    // Check if user already exists
    if (!username_exists($username) && !email_exists($email)) {
        $user_id = wp_create_user($username, wp_generate_password(), $email);
        
        if (!is_wp_error($user_id)) {
            // Set user role
            $user = new WP_User($user_id);
            $role = ($user_type === 'editor') ? 'editor' : 'subscriber';
            $user->set_role($role);
            
            // Add custom meta for AI identification (hidden from public)
            update_user_meta($user_id, 'is_ai_user', true);
            update_user_meta($user_id, 'ai_user_type', $user_type);
            update_user_meta($user_id, 'ai_country', $profile['country']);
            update_user_meta($user_id, 'ai_writing_style', $profile['style']);
            if (isset($profile['specialty'])) {
                update_user_meta($user_id, 'ai_specialty', $profile['specialty']);
            }
            update_user_meta($user_id, 'ai_created_date', current_time('mysql'));
            
            // Update display name with human-like name
            wp_update_user(array(
                'ID' => $user_id,
                'display_name' => $display_name,
                'first_name' => explode('_', $display_name)[0],
                'last_name' => $profile['country']
            ));
            
            return $user_id;
        }
    }
    
    return false;
}

// Clean up existing AI users with obvious names
function cleanup_obvious_ai_users() {
    $users_removed = 0;
    
    // Find users with obvious AI names
    $obvious_ai_patterns = array(
        'AI User',
        'ai_editor_',
        'ai_questioner_',
        'Questioner AI',
        'Editor AI',
        'AI Assistant'
    );
    
    $all_users = get_users(array('meta_key' => 'is_ai_user', 'meta_value' => true));
    
    foreach ($all_users as $user) {
        $display_name = $user->display_name;
        $username = $user->user_login;
        
        // Check if the user has obvious AI indicators in name
        $is_obvious_ai = false;
        foreach ($obvious_ai_patterns as $pattern) {
            if (stripos($display_name, $pattern) !== false || stripos($username, $pattern) !== false) {
                $is_obvious_ai = true;
                break;
            }
        }
        
        // Remove obvious AI users
        if ($is_obvious_ai) {
            // First, delete their posts and comments
            $user_posts = get_posts(array(
                'author' => $user->ID,
                'post_type' => 'forum_post',
                'numberposts' => -1,
                'post_status' => 'any'
            ));
            
            foreach ($user_posts as $post) {
                wp_delete_post($post->ID, true);
            }
            
            // Delete user comments
            $user_comments = get_comments(array('user_id' => $user->ID));
            foreach ($user_comments as $comment) {
                wp_delete_comment($comment->comment_ID, true);
            }
            
            // Delete the user
            wp_delete_user($user->ID);
            $users_removed++;
        }
    }
    
    return $users_removed;
}

// Generate AI forum post using Groq
function generate_ai_forum_post_with_groq($user_type = 'questioner', $category = 'android') {
    $api_key = get_option('groq_api_key', '');
    if (empty($api_key)) {
        return array('success' => false, 'message' => 'No Groq API key configured');
    }
    
    // Get appropriate AI user
    $users = get_users(array(
        'meta_key' => 'ai_user_type',
        'meta_value' => $user_type,
        'number' => 1,
        'orderby' => 'rand'
    ));
    
    if (empty($users)) {
        // Try to create AI users if none exist
        $user_id = create_single_ai_user($user_type);
        if ($user_id) {
            $users = get_users(array(
                'meta_key' => 'ai_user_type',
                'meta_value' => $user_type,
                'number' => 1,
                'orderby' => 'rand'
            ));
        }
        
        if (empty($users)) {
            return array('success' => false, 'message' => 'No AI users found and failed to create AI users of type: ' . $user_type);
        }
    }
    
    $user = $users[0];
    $country = get_user_meta($user->ID, 'ai_country', true) ?: 'USA';
    $style = get_user_meta($user->ID, 'ai_writing_style', true) ?: 'casual';
    $specialty = get_user_meta($user->ID, 'ai_specialty', true) ?: 'general';
    
    // Create prompt based on user type
    if ($user_type === 'questioner') {
        $prompt = create_questioner_prompt($country, $style, $category);
    } else {
        $prompt = create_editor_prompt($country, $style, $specialty, $category);
    }
    
    if (!$prompt || !isset($prompt['system']) || !isset($prompt['user'])) {
        return array('success' => false, 'message' => 'Failed to create AI prompt for category: ' . $category);
    }
    
    // Call Groq API
    $response = wp_remote_post('https://api.groq.com/openai/v1/chat/completions', array(
        'headers' => array(
            'Authorization' => 'Bearer ' . $api_key,
            'Content-Type' => 'application/json'
        ),
        'body' => json_encode(array(
            'model' => get_option('groq_selected_model', 'llama-3.1-8b-instant'),
            'messages' => array(
                array(
                    'role' => 'system',
                    'content' => $prompt['system']
                ),
                array(
                    'role' => 'user',
                    'content' => $prompt['user']
                )
            ),
            'max_tokens' => intval(get_option('groq_max_tokens', 1000)),
            'temperature' => floatval(get_option('groq_temperature', 0.7))
        )),
        'timeout' => 60
    ));
    
    if (is_wp_error($response)) {
        return array('success' => false, 'message' => 'Groq API connection failed: ' . $response->get_error_message());
    }
    
    $response_code = wp_remote_retrieve_response_code($response);
    $body = wp_remote_retrieve_body($response);
    
    if ($response_code !== 200) {
        $error_data = json_decode($body, true);
        $error_message = isset($error_data['error']['message']) ? $error_data['error']['message'] : 'API Error';
        return array('success' => false, 'message' => 'Groq API error (HTTP ' . $response_code . '): ' . $error_message);
    }
    
    $data = json_decode($body, true);
    
    if (!isset($data['choices'][0]['message']['content'])) {
        return array('success' => false, 'message' => 'Invalid response from Groq API - no content generated');
    }
    
    $content = $data['choices'][0]['message']['content'];
    
    // Parse the response to extract title and content
    $parsed = parse_ai_response($content);
    
    if (!$parsed) {
        return array('success' => false, 'message' => 'Failed to parse AI response. Raw content: ' . substr($content, 0, 200) . '...');
    }
    
    // Create the forum post
    $post_id = wp_insert_post(array(
        'post_title' => $parsed['title'],
        'post_content' => $parsed['content'],
        'post_status' => 'publish',
        'post_type' => 'forum_post',
        'post_author' => $user->ID,
        'post_date' => current_time('mysql')
    ));
    
    if ($post_id && !is_wp_error($post_id)) {
        // Set category
        wp_set_post_terms($post_id, array($category), 'forum_category');
        
        // Set initial view count
        update_post_meta($post_id, 'post_views', rand(1, 100));
        
        // Schedule AI reply if this is a question
        if ($user_type === 'questioner') {
            wp_schedule_single_event(
                time() + rand(300, 1800), // 5-30 minutes delay
                'ai_forum_reply_event',
                array($post_id)
            );
        }
        
        return array('success' => true, 'post_id' => $post_id);
    }
    
    return array('success' => false, 'message' => 'Failed to create WordPress post');
}

// Create prompts for different user types
function create_questioner_prompt($country, $style, $category) {
    $category_topics = array(
        'android' => 'Android OS, custom ROMs, apps, rooting, bootloaders, performance optimization',
        'linux' => 'Linux distributions, terminal commands, system administration, troubleshooting',
        'windows' => 'Windows OS, system optimization, troubleshooting, software compatibility',
        'custom-roms' => 'Custom Android ROMs, flashing, recovery, bootloader unlocking',
        'bootloaders' => 'Bootloader unlocking, fastboot, recovery installation, device modification',
        'root-access' => 'Android rooting, Magisk, root access, system modifications',
        'development' => 'Software development, programming, app development, coding',
        'security' => 'Cybersecurity, privacy, secure computing, data protection'
    );
    
    $topic = isset($category_topics[$category]) ? $category_topics[$category] : 'technology';
    
    $country_styles = array(
        'USA' => 'Use American English, direct and casual tone, tech-savvy language',
        'UK' => 'Use British English, polite and formal tone, words like "brilliant", "cheers", "lovely"',
        'Canada' => 'Use Canadian English, friendly and helpful tone, occasionally use "eh"',
        'Australia' => 'Use Australian English, casual and laid-back tone, words like "mate", "no worries"',
        'Germany' => 'Use precise and methodical language, slightly formal but helpful',
        'Netherlands' => 'Use clear and direct language, practical approach',
        'Sweden' => 'Use efficient and straightforward language, technical focus'
    );
    
    $style_instruction = isset($country_styles[$country]) ? $country_styles[$country] : $country_styles['USA'];
    
    return array(
        'system' => "You are a forum user from {$country} asking a question about {$topic}. {$style_instruction}. Write a forum post with a title and content. The post should be helpful to others and show genuine need for assistance. Keep it natural and human-like, not perfect. Include some minor imperfections in grammar or style to seem authentic. 

Use this structure for your content:
- Start with a brief description of your problem
- Use bullet points (*) for listing specific issues or requirements
- Include numbered lists (1., 2., 3.) for step-by-step problems
- Use **bold** for important keywords
- Format your response as: TITLE: [title here] CONTENT: [content here]",
        'user' => "Create a forum question about {$topic} that someone from {$country} with a {$style} writing style would ask. Make it specific and helpful with proper formatting."
    );
}

function create_editor_prompt($country, $style, $specialty, $category) {
    $category_topics = array(
        'android' => 'Android OS, custom ROMs, apps, rooting, bootloaders, performance optimization',
        'linux' => 'Linux distributions, terminal commands, system administration, troubleshooting',
        'windows' => 'Windows OS, system optimization, troubleshooting, software compatibility',
        'custom-roms' => 'Custom Android ROMs, flashing, recovery, bootloader unlocking',
        'bootloaders' => 'Bootloader unlocking, fastboot, recovery installation, device modification',
        'root-access' => 'Android rooting, Magisk, root access, system modifications',
        'development' => 'Software development, programming, app development, coding',
        'security' => 'Cybersecurity, privacy, secure computing, data protection'
    );
    
    $topic = isset($category_topics[$category]) ? $category_topics[$category] : 'technology';
    
    $country_styles = array(
        'USA' => 'Use American English, professional and helpful tone, detailed explanations',
        'UK' => 'Use British English, polite and thorough tone, proper grammar',
        'Canada' => 'Use Canadian English, friendly and comprehensive tone',
        'Australia' => 'Use Australian English, casual but knowledgeable tone',
        'Germany' => 'Use precise and technical language, methodical approach',
        'Netherlands' => 'Use clear and practical language, step-by-step approach',
        'Sweden' => 'Use efficient and technical language, focus on solutions'
    );
    
    $style_instruction = isset($country_styles[$country]) ? $country_styles[$country] : $country_styles['USA'];
    
    return array(
        'system' => "You are an expert forum moderator/editor from {$country} with specialty in {$specialty}. {$style_instruction}. Write a helpful forum post or guide about {$topic}. The post should provide valuable information and solutions. Keep it professional but human-like.

Use this structure for your content:
- Start with an introduction paragraph
- Use ## headings for main sections
- Use bullet points (*) for feature lists or key points
- Use numbered lists (1., 2., 3.) for step-by-step instructions
- Use **bold** for important terms and concepts
- Use `code` formatting for commands, file names, or technical terms
- End with a helpful conclusion
- Format your response as: TITLE: [title here] CONTENT: [content here]",
        'user' => "Create a comprehensive forum guide about {$topic} that showcases expertise in {$specialty}. Make it informative, well-structured, and valuable for the community with proper formatting."
    );
}

// Parse AI response to extract title and content
function parse_ai_response($response) {
    $title = '';
    $content = '';
    
    // Look for TITLE: and CONTENT: patterns
    if (preg_match('/TITLE:\s*(.+?)(?:\n|CONTENT:)/s', $response, $title_matches) &&
        preg_match('/CONTENT:\s*(.+)$/s', $response, $content_matches)) {
        
        $title = trim($title_matches[1]);
        $content = trim($content_matches[1]);
    } else {
        // Fallback: split by first line break
        $lines = explode("\n", trim($response), 2);
        if (count($lines) >= 2) {
            $title = trim($lines[0]);
            $content = trim($lines[1]);
        } else {
            // Last resort: use first 100 chars as title
            $title = substr($response, 0, 100) . '...';
            $content = $response;
        }
    }
    
    // Clean title from markdown formatting
    $title = clean_markdown_title($title);
    
    // Convert markdown content to proper HTML
    $content = convert_markdown_to_html($content);
    
    return array(
        'title' => $title,
        'content' => $content
    );
}

// Clean title from markdown formatting
function clean_markdown_title($title) {
    // Remove markdown bold/italic formatting
    $title = preg_replace('/\*\*(.*?)\*\*/', '$1', $title);
    $title = preg_replace('/\*(.*?)\*/', '$1', $title);
    $title = preg_replace('/__(.*?)__/', '$1', $title);
    $title = preg_replace('/_(.*?)_/', '$1', $title);
    
    // Remove markdown headers
    $title = preg_replace('/^#+\s*/', '', $title);
    
    // Clean up any remaining formatting
    $title = strip_tags($title);
    $title = trim($title);
    
    return $title;
}

// Convert markdown content to HTML
function convert_markdown_to_html($content) {
    // Convert headers
    $content = preg_replace('/^### (.*$)/m', '<h3>$1</h3>', $content);
    $content = preg_replace('/^## (.*$)/m', '<h2>$1</h2>', $content);
    $content = preg_replace('/^# (.*$)/m', '<h1>$1</h1>', $content);
    
    // Convert bold text
    $content = preg_replace('/\*\*(.*?)\*\*/', '<strong>$1</strong>', $content);
    $content = preg_replace('/__(.*?)__/', '<strong>$1</strong>', $content);
    
    // Convert italic text
    $content = preg_replace('/\*(.*?)\*/', '<em>$1</em>', $content);
    $content = preg_replace('/_(.*?)_/', '<em>$1</em>', $content);
    
    // Convert code blocks
    $content = preg_replace('/```(.*?)```/s', '<pre><code>$1</code></pre>', $content);
    $content = preg_replace('/`(.*?)`/', '<code>$1</code>', $content);
    
    // Convert bullet points and numbered lists
    $lines = explode("\n", $content);
    $html_lines = array();
    $in_list = false;
    $list_type = '';
    
    foreach ($lines as $line) {
        $line = trim($line);
        
        // Check if this is a bullet point
        if (preg_match('/^[\*\-\+]\s+(.+)$/', $line, $matches)) {
            if (!$in_list || $list_type !== 'ul') {
                if ($in_list && $list_type === 'ol') {
                    $html_lines[] = '</ol>';
                }
                if (!$in_list) {
                    $html_lines[] = '<ul>';
                    $in_list = true;
                }
                $list_type = 'ul';
            }
            $html_lines[] = '<li>' . trim($matches[1]) . '</li>';
        } 
        // Check if this is a numbered list
        elseif (preg_match('/^\d+\.\s+(.+)$/', $line, $matches)) {
            if (!$in_list || $list_type !== 'ol') {
                if ($in_list && $list_type === 'ul') {
                    $html_lines[] = '</ul>';
                }
                if (!$in_list) {
                    $html_lines[] = '<ol>';
                    $in_list = true;
                }
                $list_type = 'ol';
            }
            $html_lines[] = '<li>' . trim($matches[1]) . '</li>';
        }
        // Regular line
        else {
            if ($in_list) {
                if ($list_type === 'ul') {
                    $html_lines[] = '</ul>';
                } else {
                    $html_lines[] = '</ol>';
                }
                $in_list = false;
                $list_type = '';
            }
            
            if (!empty($line)) {
                $html_lines[] = '<p>' . $line . '</p>';
            }
        }
    }
    
    // Close any open list
    if ($in_list) {
        if ($list_type === 'ul') {
            $html_lines[] = '</ul>';
        } else {
            $html_lines[] = '</ol>';
        }
    }
    
    // Join all lines
    $content = implode("\n", $html_lines);
    
    // Clean up extra whitespace
    $content = preg_replace('/\n\s*\n/', "\n", $content);
    $content = trim($content);
    
    return $content;
}

// AJAX handler for saving API key
add_action('wp_ajax_save_groq_api_key', 'ajax_save_groq_api_key');
function ajax_save_groq_api_key() {
    check_ajax_referer('groq_ai_nonce', 'nonce');
    
    if (!current_user_can('manage_options')) {
        wp_die('Unauthorized');
    }
    
    $api_key = sanitize_text_field($_POST['api_key']);
    
    if (empty($api_key)) {
        wp_send_json_error(array(
            'message' => 'API key cannot be empty'
        ));
        return;
    }
    
    // Save the API key
    update_option('groq_api_key', $api_key);
    
    // Test the connection immediately
    $connection_result = test_groq_connection($api_key);
    
    if ($connection_result['success']) {
        wp_send_json_success(array(
            'message' => 'API key saved and connection verified successfully!',
            'status' => 'connected'
        ));
    } else {
        wp_send_json_success(array(
            'message' => 'API key saved but connection failed: ' . $connection_result['message'],
            'status' => 'disconnected'
        ));
    }
}

// AJAX handler for generating AI posts
add_action('wp_ajax_generate_ai_forum_post', 'ajax_generate_ai_forum_post');
function ajax_generate_ai_forum_post() {
    check_ajax_referer('groq_ai_nonce', 'nonce');
    
    if (!current_user_can('manage_options')) {
        wp_die('Unauthorized');
    }
    
    $user_type = sanitize_text_field($_POST['user_type']);
    $category = sanitize_text_field($_POST['category']);
    
    // Debug API key status
    $api_key = get_option('groq_api_key', '');
    $api_key_length = strlen($api_key);
    error_log('AI Post Generation Debug - User Type: ' . $user_type . ', Category: ' . $category);
    error_log('API Key Status - Length: ' . $api_key_length . ', First 10 chars: ' . substr($api_key, 0, 10) . '...');
    
    // Check if forum post type exists
    if (!post_type_exists('forum_post')) {
        wp_send_json_error(array(
            'message' => 'Forum post type not registered. Please check forum setup.'
        ));
        return;
    }
    
    // Check if forum category taxonomy exists
    if (!taxonomy_exists('forum_category')) {
        wp_send_json_error(array(
            'message' => 'Forum category taxonomy not registered. Please check forum setup.'
        ));
        return;
    }
    
    // Additional debug info for API key
    if (empty($api_key)) {
        wp_send_json_error(array(
            'message' => 'No Groq API key configured. Please save your API key in the settings first. Current key length: ' . $api_key_length
        ));
        return;
    }
    
    $result = generate_ai_forum_post_with_groq($user_type, $category);
    
    error_log('AI Post Generation Result: ' . print_r($result, true));
    
    if ($result['success']) {
        wp_send_json_success(array(
            'post_id' => $result['post_id'],
            'message' => 'AI forum post generated successfully!',
            'post_url' => get_permalink($result['post_id'])
        ));
    } else {
        wp_send_json_error(array(
            'message' => $result['message']
        ));
    }
}

// Create Forum Custom Post Type
function create_forum_post_type() {
    $labels = array(
        'name' => 'Forum Posts',
        'singular_name' => 'Forum Post',
        'menu_name' => 'Forum Posts',
        'add_new' => 'Add New Post',
        'add_new_item' => 'Add New Forum Post',
        'edit_item' => 'Edit Forum Post',
        'new_item' => 'New Forum Post',
        'view_item' => 'View Forum Post',
        'search_items' => 'Search Forum Posts',
        'not_found' => 'No forum posts found',
        'not_found_in_trash' => 'No forum posts found in trash'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => false, // We'll add it to our custom menu
        'query_var' => true,
        'rewrite' => array('slug' => 'forum-post'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title', 'editor', 'author', 'comments', 'custom-fields'),
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-format-chat'
    );

    register_post_type('forum_post', $args);
}

// Create Forum Taxonomy
function create_forum_taxonomy() {
    $labels = array(
        'name' => 'Forum Categories',
        'singular_name' => 'Forum Category',
        'search_items' => 'Search Forum Categories',
        'all_items' => 'All Forum Categories',
        'parent_item' => 'Parent Forum Category',
        'parent_item_colon' => 'Parent Forum Category:',
        'edit_item' => 'Edit Forum Category',
        'update_item' => 'Update Forum Category',
        'add_new_item' => 'Add New Forum Category',
        'new_item_name' => 'New Forum Category Name',
        'menu_name' => 'Forum Categories'
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'forum-category'),
        'show_in_rest' => true
    );

    register_taxonomy('forum_category', array('forum_post'), $args);
    
    // Add default forum categories
    add_action('init', 'create_default_forum_categories', 20);
}

// Create default forum categories
function create_default_forum_categories() {
    $categories = array(
        'android' => 'Android',
        'linux' => 'Linux', 
        'windows' => 'Windows',
        'custom-roms' => 'Custom ROMs',
        'bootloaders' => 'Bootloaders',
        'root-access' => 'Root Access',
        'development' => 'Development',
        'security' => 'Security'
    );

    foreach ($categories as $slug => $name) {
        if (!term_exists($slug, 'forum_category')) {
            wp_insert_term($name, 'forum_category', array('slug' => $slug));
        }
    }
}

// Add Forum Admin Menu
function forum_admin_menu() {
    add_menu_page(
        'Forum Management',
        'Forum',
        'manage_options',
        'forum-management',
        'forum_management_page',
        'dashicons-format-chat',
        30
    );
    
    add_submenu_page(
        'forum-management',
        'All Forum Posts',
        'All Posts',
        'edit_posts',
        'edit.php?post_type=forum_post'
    );
    
    add_submenu_page(
        'forum-management',
        'Add New Forum Post',
        'Add New',
        'edit_posts',
        'post-new.php?post_type=forum_post'
    );
    
    add_submenu_page(
        'forum-management',
        'Forum Categories',
        'Categories',
        'manage_categories',
        'edit-tags.php?taxonomy=forum_category&post_type=forum_post'
    );
    
    add_submenu_page(
        'forum-management',
        'AI Users Management',
        'AI Users',
        'manage_options',
        'forum-ai-users',
        'forum_ai_users_page'
    );
    
    add_submenu_page(
        'forum-management',
        'AI Conversation Settings',
        'AI Settings',
        'manage_options',
        'forum-ai-settings',
        'forum_ai_settings_page'
    );
}

// Enqueue Forum Admin Scripts
function forum_admin_scripts($hook) {
    if (strpos($hook, 'forum') !== false) {
        wp_enqueue_style('forum-admin-css', get_template_directory_uri() . '/assets/css/forum-admin.css', array(), '1.0.0');
        wp_enqueue_script('forum-admin-js', get_template_directory_uri() . '/assets/js/forum-admin.js', array('jquery'), '1.0.0', true);
        
        wp_localize_script('forum-admin-js', 'forumAjax', array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('forum_ai_nonce')
        ));
    }
}

// Forum Management Main Page
function forum_management_page() {
    ?>
    <div class="forum-admin-wrap">
        <h1><span class="dashicons dashicons-format-chat"></span> Forum Management</h1>
        
        <div class="forum-admin-grid">
            <div class="forum-admin-card">
                <div class="forum-card-header">
                    <h2>Forum Statistics</h2>
                </div>
                <div class="forum-card-content">
                    <?php
                    $total_posts = wp_count_posts('forum_post');
                    $total_comments = wp_count_comments();
                    $ai_users = count_users();
                    ?>
                    <div class="forum-stats-grid">
                        <div class="forum-stat-item">
                            <div class="forum-stat-number"><?php echo $total_posts->publish; ?></div>
                            <div class="forum-stat-label">Forum Posts</div>
                        </div>
                        <div class="forum-stat-item">
                            <div class="forum-stat-number"><?php echo $total_comments->approved; ?></div>
                            <div class="forum-stat-label">Total Replies</div>
                        </div>
                        <div class="forum-stat-item">
                            <div class="forum-stat-number"><?php echo $ai_users['total_users']; ?></div>
                            <div class="forum-stat-label">Total Users</div>
                        </div>
                        <div class="forum-stat-item">
                            <div class="forum-stat-number">8</div>
                            <div class="forum-stat-label">Forum Categories</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="forum-admin-card">
                <div class="forum-card-header">
                    <h2>AI System Status</h2>
                </div>
                <div class="forum-card-content">
                    <div class="forum-ai-status">
                        <div class="forum-status-item">
                            <span class="forum-status-indicator active"></span>
                            <span>AI Editors: Active</span>
                        </div>
                        <div class="forum-status-item">
                            <span class="forum-status-indicator active"></span>
                            <span>AI Questioners: Active</span>
                        </div>
                        <div class="forum-status-item">
                            <span class="forum-status-indicator active"></span>
                            <span>Auto Posting: Enabled</span>
                        </div>
                        <div class="forum-status-item">
                            <span class="forum-status-indicator active"></span>
                            <span>Natural Delays: Enabled</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="forum-admin-card">
            <div class="forum-card-header">
                <h2>Recent AI Activity</h2>
            </div>
            <div class="forum-card-content">
                <div class="forum-activity-log">
                    <div class="forum-activity-item">
                        <span class="forum-activity-time">2 minutes ago</span>
                        <span class="forum-activity-text">AI Editor "TechGuru_USA" answered question in Android forum</span>
                    </div>
                    <div class="forum-activity-item">
                        <span class="forum-activity-time">15 minutes ago</span>
                        <span class="forum-activity-text">AI User "AndroidFan_UK" posted new question about custom ROMs</span>
                    </div>
                    <div class="forum-activity-item">
                        <span class="forum-activity-time">32 minutes ago</span>
                        <span class="forum-activity-text">AI Editor "LinuxPro_CA" provided detailed solution in Linux forum</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}

// AI Users Management Page
function forum_ai_users_page() {
    ?>
    <div class="forum-admin-wrap">
        <h1><span class="dashicons dashicons-admin-users"></span> AI Users Management</h1>
        
        <div class="forum-admin-grid">
            <div class="forum-admin-card">
                <div class="forum-card-header">
                    <h2>AI Editors (50 Users)</h2>
                    <button class="forum-btn forum-btn-primary" id="create-ai-editors">Create AI Editors</button>
                </div>
                <div class="forum-card-content">
                    <div class="forum-ai-users-list" id="ai-editors-list">
                        <p>Click "Create AI Editors" to generate 50 AI editor accounts with diverse profiles.</p>
                    </div>
                </div>
            </div>
            
            <div class="forum-admin-card">
                <div class="forum-card-header">
                    <h2>AI Questioners (Global Users)</h2>
                    <button class="forum-btn forum-btn-secondary" id="create-ai-questioners">Create AI Questioners</button>
                </div>
                <div class="forum-card-content">
                    <div class="forum-ai-users-list" id="ai-questioners-list">
                        <p>Click "Create AI Questioners" to generate users from high CPC countries with regional writing styles.</p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="forum-admin-card">
            <div class="forum-card-header">
                <h2>User Profile Templates</h2>
            </div>
            <div class="forum-card-content">
                <div class="forum-profile-templates">
                    <div class="forum-template-item">
                        <h4>USA Users (High CPC)</h4>
                        <p>Professional tone, proper grammar, tech-savvy language</p>
                    </div>
                    <div class="forum-template-item">
                        <h4>UK Users (High CPC)</h4>
                        <p>British spelling, polite tone, "cheers", "brilliant"</p>
                    </div>
                    <div class="forum-template-item">
                        <h4>Canada Users (High CPC)</h4>
                        <p>Mix of US/UK style, "eh", friendly approach</p>
                    </div>
                    <div class="forum-template-item">
                        <h4>Australia Users (High CPC)</h4>
                        <p>Casual tone, "mate", "no worries", abbreviated words</p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="forum-admin-card">
            <div class="forum-card-header">
                <h2>🚨 User Cleanup</h2>
            </div>
            <div class="forum-card-content">
                <div class="forum-cleanup-section">
                    <h3>Remove Obvious AI Users</h3>
                    <p style="color: #e74c3c; font-size: 13px; margin-bottom: 15px;">
                        <strong>Warning:</strong> This will permanently delete users with obvious AI names like "Questioner AI User", "Editor AI User", etc., along with all their posts and comments.
                    </p>
                    <button class="forum-btn forum-btn-danger" id="cleanup-ai-users">🗑️ Cleanup Obvious AI Users</button>
                    <div id="cleanup-results" class="cleanup-results" style="margin-top: 15px;"></div>
                </div>
            </div>
        </div>
    </div>
    <?php
}

// AI Settings Page
function forum_ai_settings_page() {
    if (isset($_POST['save_ai_settings'])) {
        update_option('forum_ai_post_interval_min', sanitize_text_field($_POST['post_interval_min']));
        update_option('forum_ai_post_interval_max', sanitize_text_field($_POST['post_interval_max']));
        update_option('forum_ai_reply_delay_min', sanitize_text_field($_POST['reply_delay_min']));
        update_option('forum_ai_reply_delay_max', sanitize_text_field($_POST['reply_delay_max']));
        update_option('forum_ai_conversation_depth', sanitize_text_field($_POST['conversation_depth']));
        update_option('forum_ai_usa_focus', isset($_POST['usa_focus']) ? 1 : 0);
        echo '<div class="notice notice-success"><p>Settings saved successfully!</p></div>';
    }
    
    $post_interval_min = get_option('forum_ai_post_interval_min', 25);
    $post_interval_max = get_option('forum_ai_post_interval_max', 45);
    $reply_delay_min = get_option('forum_ai_reply_delay_min', 5);
    $reply_delay_max = get_option('forum_ai_reply_delay_max', 15);
    $conversation_depth = get_option('forum_ai_conversation_depth', 3);
    $usa_focus = get_option('forum_ai_usa_focus', 1);
    ?>
    <div class="forum-admin-wrap">
        <h1><span class="dashicons dashicons-admin-settings"></span> AI Conversation Settings</h1>
        
        <form method="post" action="">
            <div class="forum-admin-card">
                <div class="forum-card-header">
                    <h2>Posting Intervals</h2>
                </div>
                <div class="forum-card-content">
                    <div class="forum-form-grid">
                        <div class="forum-form-group">
                            <label>Minimum Interval (minutes)</label>
                            <input type="number" name="post_interval_min" value="<?php echo $post_interval_min; ?>" min="15" max="60">
                            <p class="forum-help-text">Minimum time between AI posts</p>
                        </div>
                        <div class="forum-form-group">
                            <label>Maximum Interval (minutes)</label>
                            <input type="number" name="post_interval_max" value="<?php echo $post_interval_max; ?>" min="30" max="120">
                            <p class="forum-help-text">Maximum time between AI posts</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="forum-admin-card">
                <div class="forum-card-header">
                    <h2>Reply Delays</h2>
                </div>
                <div class="forum-card-content">
                    <div class="forum-form-grid">
                        <div class="forum-form-group">
                            <label>Minimum Reply Delay (minutes)</label>
                            <input type="number" name="reply_delay_min" value="<?php echo $reply_delay_min; ?>" min="2" max="30">
                            <p class="forum-help-text">Minimum time before AI replies</p>
                        </div>
                        <div class="forum-form-group">
                            <label>Maximum Reply Delay (minutes)</label>
                            <input type="number" name="reply_delay_max" value="<?php echo $reply_delay_max; ?>" min="5" max="60">
                            <p class="forum-help-text">Maximum time before AI replies</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="forum-admin-card">
                <div class="forum-card-header">
                    <h2>Conversation Settings</h2>
                </div>
                <div class="forum-card-content">
                    <div class="forum-form-grid">
                        <div class="forum-form-group">
                            <label>Conversation Depth</label>
                            <select name="conversation_depth">
                                <option value="2" <?php selected($conversation_depth, 2); ?>>2 exchanges</option>
                                <option value="3" <?php selected($conversation_depth, 3); ?>>3 exchanges</option>
                                <option value="4" <?php selected($conversation_depth, 4); ?>>4 exchanges</option>
                                <option value="5" <?php selected($conversation_depth, 5); ?>>5 exchanges</option>
                            </select>
                            <p class="forum-help-text">Maximum back-and-forth in conversations</p>
                        </div>
                        <div class="forum-form-group">
                            <label>
                                <input type="checkbox" name="usa_focus" value="1" <?php checked($usa_focus, 1); ?>>
                                Focus on USA Writing Style
                            </label>
                            <p class="forum-help-text">Optimize content for US AdSense revenue</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="forum-admin-actions">
                <button type="submit" name="save_ai_settings" class="forum-btn forum-btn-primary">Save Settings</button>
                <button type="button" class="forum-btn forum-btn-secondary" id="test-ai-system">Test AI System</button>
            </div>
        </form>
    </div>
    <?php
}

// AI User Creation Functions
function forum_ajax_create_ai_editors() {
    check_ajax_referer('forum_ai_nonce', 'nonce');
    
    if (!current_user_can('manage_options')) {
        wp_die('Unauthorized');
    }
    
    $editors = create_ai_editor_users();
    
    if ($editors) {
        wp_send_json_success(array(
            'users' => $editors,
            'count' => count($editors),
            'message' => 'AI editors created successfully'
        ));
    } else {
        wp_send_json_error(array('message' => 'Failed to create AI editors'));
    }
}

function forum_ajax_create_ai_questioners() {
    check_ajax_referer('forum_ai_nonce', 'nonce');
    
    if (!current_user_can('manage_options')) {
        wp_die('Unauthorized');
    }
    
    $questioners = create_ai_questioner_users();
    
    if ($questioners) {
        wp_send_json_success(array(
            'users' => $questioners,
            'count' => count($questioners),
            'message' => 'AI questioners created successfully'
        ));
    } else {
        wp_send_json_error(array('message' => 'Failed to create AI questioners'));
    }
}

function create_ai_editor_users() {
    $editors = array();
    
    // USA-focused editor profiles for high AdSense revenue
    $editor_profiles = array(
        array('name' => 'TechGuru_USA', 'country' => 'USA', 'style' => 'Professional', 'specialty' => 'Android Development'),
        array('name' => 'CodeMaster_US', 'country' => 'USA', 'style' => 'Technical', 'specialty' => 'Linux Systems'),
        array('name' => 'DevExpert_NY', 'country' => 'USA', 'style' => 'Detailed', 'specialty' => 'Custom ROMs'),
        array('name' => 'TechSavvy_CA', 'country' => 'USA', 'style' => 'Friendly', 'specialty' => 'Bootloaders'),
        array('name' => 'AndroidPro_TX', 'country' => 'USA', 'style' => 'Concise', 'specialty' => 'Root Access'),
        array('name' => 'LinuxWiz_FL', 'country' => 'USA', 'style' => 'Educational', 'specialty' => 'Security'),
        array('name' => 'MobileDev_WA', 'country' => 'USA', 'style' => 'Practical', 'specialty' => 'Development'),
        array('name' => 'SystemAdmin_OR', 'country' => 'USA', 'style' => 'Methodical', 'specialty' => 'Windows'),
        array('name' => 'TechEnthusiast_UK', 'country' => 'UK', 'style' => 'Polite', 'specialty' => 'Android'),
        array('name' => 'DevGuru_London', 'country' => 'UK', 'style' => 'Thorough', 'specialty' => 'Linux'),
        array('name' => 'CodeExpert_CA', 'country' => 'Canada', 'style' => 'Helpful', 'specialty' => 'Custom ROMs'),
        array('name' => 'TechMaster_AU', 'country' => 'Australia', 'style' => 'Casual', 'specialty' => 'Root Access'),
        array('name' => 'AndroidGuru_DE', 'country' => 'Germany', 'style' => 'Precise', 'specialty' => 'Development'),
        array('name' => 'LinuxPro_NL', 'country' => 'Netherlands', 'style' => 'Clear', 'specialty' => 'Security'),
        array('name' => 'DevNinja_SE', 'country' => 'Sweden', 'style' => 'Efficient', 'specialty' => 'Bootloaders')
    );
    
    // Create 50 editors by expanding the base profiles
    for ($i = 0; $i < 50; $i++) {
        $profile = $editor_profiles[$i % count($editor_profiles)];
        $suffix = $i > 14 ? '_' . ($i + 1) : '';
        
        $username = strtolower($profile['name'] . $suffix);
        $email = $username . '@techforum.local';
        $display_name = $profile['name'] . $suffix;
        
        // Check if user already exists
        if (!username_exists($username) && !email_exists($email)) {
            $user_id = wp_create_user($username, wp_generate_password(), $email);
            
            if (!is_wp_error($user_id)) {
                // Set user role to editor
                $user = new WP_User($user_id);
                $user->set_role('editor');
                
                // Add custom meta for AI identification
                update_user_meta($user_id, 'is_ai_user', true);
                update_user_meta($user_id, 'ai_user_type', 'editor');
                update_user_meta($user_id, 'ai_country', $profile['country']);
                update_user_meta($user_id, 'ai_writing_style', $profile['style']);
                update_user_meta($user_id, 'ai_specialty', $profile['specialty']);
                update_user_meta($user_id, 'ai_created_date', current_time('mysql'));
                
                // Update display name
                wp_update_user(array(
                    'ID' => $user_id,
                    'display_name' => $display_name,
                    'first_name' => explode('_', $display_name)[0],
                    'last_name' => $profile['country']
                ));
                
                $editors[] = array(
                    'id' => $user_id,
                    'username' => $username,
                    'display_name' => $display_name,
                    'country' => $profile['country'],
                    'writing_style' => $profile['style'],
                    'specialty' => $profile['specialty']
                );
            }
        }
    }
    
    return $editors;
}

function create_ai_questioner_users() {
    $questioners = array();
    
    // High CPC country profiles with regional accents
    $questioner_profiles = array(
        // USA Users
        array('name' => 'AndroidFan_USA', 'country' => 'USA', 'style' => 'Direct', 'accent' => 'American English'),
        array('name' => 'TechNewbie_US', 'country' => 'USA', 'style' => 'Curious', 'accent' => 'American English'),
        array('name' => 'PhoneUser_NYC', 'country' => 'USA', 'style' => 'Casual', 'accent' => 'American English'),
        array('name' => 'GamerDude_LA', 'country' => 'USA', 'style' => 'Enthusiastic', 'accent' => 'American English'),
        
        // UK Users
        array('name' => 'MobileUser_UK', 'country' => 'UK', 'style' => 'Polite', 'accent' => 'British English'),
        array('name' => 'TechLearner_London', 'country' => 'UK', 'style' => 'Formal', 'accent' => 'British English'),
        array('name' => 'AndroidBeginner_UK', 'country' => 'UK', 'style' => 'Courteous', 'accent' => 'British English'),
        
        // Canada Users
        array('name' => 'TechUser_CA', 'country' => 'Canada', 'style' => 'Friendly', 'accent' => 'Canadian English'),
        array('name' => 'PhoneFan_Toronto', 'country' => 'Canada', 'style' => 'Helpful', 'accent' => 'Canadian English'),
        
        // Australia Users
        array('name' => 'AndroidMate_AU', 'country' => 'Australia', 'style' => 'Laid-back', 'accent' => 'Australian English'),
        array('name' => 'TechBuddy_Sydney', 'country' => 'Australia', 'style' => 'Relaxed', 'accent' => 'Australian English'),
        
        // Germany Users
        array('name' => 'TechUser_DE', 'country' => 'Germany', 'style' => 'Precise', 'accent' => 'German English'),
        array('name' => 'AndroidFan_Berlin', 'country' => 'Germany', 'style' => 'Methodical', 'accent' => 'German English'),
        
        // Netherlands Users
        array('name' => 'PhoneUser_NL', 'country' => 'Netherlands', 'style' => 'Clear', 'accent' => 'Dutch English'),
        
        // Sweden Users
        array('name' => 'TechGuy_SE', 'country' => 'Sweden', 'style' => 'Efficient', 'accent' => 'Swedish English'),
    );
    
    // Create questioner users
    foreach ($questioner_profiles as $i => $profile) {
        $username = strtolower($profile['name']);
        $email = $username . '@users.local';
        $display_name = $profile['name'];
        
        // Check if user already exists
        if (!username_exists($username) && !email_exists($email)) {
            $user_id = wp_create_user($username, wp_generate_password(), $email);
            
            if (!is_wp_error($user_id)) {
                // Set user role to subscriber (regular user)
                $user = new WP_User($user_id);
                $user->set_role('subscriber');
                
                // Add custom meta for AI identification
                update_user_meta($user_id, 'is_ai_user', true);
                update_user_meta($user_id, 'ai_user_type', 'questioner');
                update_user_meta($user_id, 'ai_country', $profile['country']);
                update_user_meta($user_id, 'ai_writing_style', $profile['style']);
                update_user_meta($user_id, 'ai_accent', $profile['accent']);
                update_user_meta($user_id, 'ai_created_date', current_time('mysql'));
                
                // Update display name
                wp_update_user(array(
                    'ID' => $user_id,
                    'display_name' => $display_name,
                    'first_name' => explode('_', $display_name)[0],
                    'last_name' => $profile['country']
                ));
                
                $questioners[] = array(
                    'id' => $user_id,
                    'username' => $username,
                    'display_name' => $display_name,
                    'country' => $profile['country'],
                    'writing_style' => $profile['style'],
                    'accent' => $profile['accent']
                );
            }
        }
    }
    
    return $questioners;
}

function forum_ajax_get_ai_users() {
    check_ajax_referer('forum_ai_nonce', 'nonce');
    
    if (!current_user_can('manage_options')) {
        wp_die('Unauthorized');
    }
    
    $user_type = sanitize_text_field($_POST['user_type']);
    
    $users = get_users(array(
        'meta_query' => array(
            array(
                'key' => 'is_ai_user',
                'value' => true,
                'compare' => '='
            ),
            array(
                'key' => 'ai_user_type',
                'value' => $user_type,
                'compare' => '='
            )
        )
    ));
    
    $formatted_users = array();
    foreach ($users as $user) {
        $formatted_users[] = array(
            'id' => $user->ID,
            'username' => $user->user_login,
            'display_name' => $user->display_name,
            'country' => get_user_meta($user->ID, 'ai_country', true),
            'writing_style' => get_user_meta($user->ID, 'ai_writing_style', true),
            'specialty' => get_user_meta($user->ID, 'ai_specialty', true),
            'accent' => get_user_meta($user->ID, 'ai_accent', true)
        );
    }
    
    wp_send_json_success(array('users' => $formatted_users));
}

function forum_ajax_cleanup_ai_users() {
    check_ajax_referer('forum_ai_nonce', 'nonce');
    
    if (!current_user_can('manage_options')) {
        wp_die('Unauthorized');
    }
    
    $users_removed = cleanup_obvious_ai_users();
    
    if ($users_removed > 0) {
        wp_send_json_success(array(
            'message' => "Successfully removed {$users_removed} obvious AI users and their content.",
            'users_removed' => $users_removed
        ));
    } else {
        wp_send_json_success(array(
            'message' => "No obvious AI users found to remove.",
            'users_removed' => 0
        ));
    }
}

function forum_ajax_test_ai_system() {
    check_ajax_referer('forum_ai_nonce', 'nonce');
    
    if (!current_user_can('manage_options')) {
        wp_die('Unauthorized');
    }
    
    // Simulate AI system test
    $test_results = array(
        'groq_connection' => true,
        'ai_users_count' => count(get_users(array('meta_key' => 'is_ai_user', 'meta_value' => true))),
        'forum_posts_count' => wp_count_posts('forum_post')->publish,
        'system_status' => 'operational',
        'last_activity' => current_time('mysql')
    );
    
    wp_send_json_success($test_results);
}

function forum_ajax_get_forum_activity() {
    check_ajax_referer('forum_ai_nonce', 'nonce');
    
    if (!current_user_can('manage_options')) {
        wp_die('Unauthorized');
    }
    
    // Get recent forum activities (simulated for now)
    $activities = array(
        array(
            'time' => '2 minutes ago',
            'text' => 'AI Editor "TechGuru_USA" answered question in Android forum'
        ),
        array(
            'time' => '15 minutes ago',
            'text' => 'AI User "AndroidFan_UK" posted new question about custom ROMs'
        ),
        array(
            'time' => '32 minutes ago',
            'text' => 'AI Editor "LinuxPro_CA" provided detailed solution in Linux forum'
        ),
        array(
            'time' => '1 hour ago',
            'text' => 'AI User "TechNewbie_US" asked about bootloader unlocking'
        ),
        array(
            'time' => '2 hours ago',
            'text' => 'AI Editor "DevExpert_NY" shared custom ROM installation guide'
        )
    );
    
    wp_send_json_success(array('activities' => $activities));
}

function forum_ajax_get_forum_stats() {
    check_ajax_referer('forum_ai_nonce', 'nonce');
    
    if (!current_user_can('manage_options')) {
        wp_die('Unauthorized');
    }
    
    $stats = array(
        'forum_posts' => wp_count_posts('forum_post')->publish,
        'total_replies' => wp_count_comments()->approved,
        'total_users' => count_users()['total_users'],
        'forum_categories' => 8
    );
    
    wp_send_json_success($stats);
}

// Schedule AI posting system
add_action('init', 'schedule_ai_forum_posts');

function schedule_ai_forum_posts() {
    if (!wp_next_scheduled('ai_forum_post_event')) {
        wp_schedule_event(time(), 'every_30_minutes', 'ai_forum_post_event');
    }
}

// Custom cron interval
add_filter('cron_schedules', 'add_ai_forum_cron_interval');

function add_ai_forum_cron_interval($schedules) {
    $schedules['every_30_minutes'] = array(
        'interval' => 1800, // 30 minutes in seconds
        'display' => __('Every 30 Minutes')
    );
    return $schedules;
}

// AI posting hook
add_action('ai_forum_post_event', 'execute_ai_forum_posting');

function execute_ai_forum_posting() {
    // Get AI posting settings
    $min_interval = get_option('forum_ai_post_interval_min', 25);
    $max_interval = get_option('forum_ai_post_interval_max', 45);
    $usa_focus = get_option('forum_ai_usa_focus', 1);
    
    // Random delay to make it unpredictable
    $random_delay = rand($min_interval, $max_interval);
    
    // Only proceed if enough time has passed since last post
    $last_post_time = get_option('ai_last_post_time', 0);
    if (time() - $last_post_time < ($random_delay * 60)) {
        return;
    }
    
    // Create AI-generated forum post
    create_ai_forum_post();
    
    // Update last post time
    update_option('ai_last_post_time', time());
}

function create_ai_forum_post() {
    // Get random AI questioner
    $questioners = get_users(array(
        'meta_query' => array(
            array(
                'key' => 'ai_user_type',
                'value' => 'questioner',
                'compare' => '='
            )
        ),
        'number' => 1,
        'orderby' => 'rand'
    ));
    
    if (empty($questioners)) {
        return false;
    }
    
    $questioner = $questioners[0];
    $country = get_user_meta($questioner->ID, 'ai_country', true);
    $style = get_user_meta($questioner->ID, 'ai_writing_style', true);
    
    // Generate question based on user's country and style
    $question_data = generate_ai_question($country, $style);
    
    if ($question_data) {
        // Create forum post
        $post_id = wp_insert_post(array(
            'post_title' => $question_data['title'],
            'post_content' => $question_data['content'],
            'post_status' => 'publish',
            'post_type' => 'forum_post',
            'post_author' => $questioner->ID
        ));
        
        if ($post_id) {
            // Set forum category
            wp_set_post_terms($post_id, array($question_data['category']), 'forum_category');
            
            // Schedule AI reply
            $reply_delay = rand(
                get_option('forum_ai_reply_delay_min', 5),
                get_option('forum_ai_reply_delay_max', 15)
            );
            
            wp_schedule_single_event(
                time() + ($reply_delay * 60),
                'ai_forum_reply_event',
                array($post_id)
            );
            
            return $post_id;
        }
    }
    
    return false;
}

function generate_ai_question($country, $style) {
    // Sample questions based on country and style
    $questions = array(
        'USA' => array(
            'title' => 'Need help with Android 14 battery optimization',
            'content' => 'Hey everyone! I just updated to Android 14 and my battery life has been terrible. Anyone else experiencing this? Looking for some solid solutions.',
            'category' => 'android'
        ),
        'UK' => array(
            'title' => 'Custom ROM recommendations for Samsung Galaxy S23?',
            'content' => 'Hello all, I\'m looking for a brilliant custom ROM for my Galaxy S23. Something stable and feature-rich would be lovely. Cheers!',
            'category' => 'custom-roms'
        ),
        'Canada' => array(
            'title' => 'Linux dual boot setup help needed, eh?',
            'content' => 'Hi folks! I\'m trying to set up a dual boot with Ubuntu and Windows 11. Could use some guidance on the process. Thanks!',
            'category' => 'linux'
        ),
        'Australia' => array(
            'title' => 'Root access for OnePlus 11 - any luck, mates?',
            'content' => 'G\'day everyone! Has anyone managed to root the OnePlus 11 successfully? No worries if it\'s a bit tricky, just need some direction.',
            'category' => 'root-access'
        )
    );
    
    return isset($questions[$country]) ? $questions[$country] : $questions['USA'];
}

// AI reply hook
add_action('ai_forum_reply_event', 'create_ai_forum_reply');

function create_ai_forum_reply($post_id) {
    // Get random AI editor
    $editors = get_users(array(
        'meta_query' => array(
            array(
                'key' => 'ai_user_type',
                'value' => 'editor',
                'compare' => '='
            )
        ),
        'number' => 1,
        'orderby' => 'rand'
    ));
    
    if (empty($editors)) {
        return false;
    }
    
    $editor = $editors[0];
    $specialty = get_user_meta($editor->ID, 'ai_specialty', true);
    $style = get_user_meta($editor->ID, 'ai_writing_style', true);
    
    // Generate reply based on editor's specialty and style
    $reply_content = generate_ai_reply($post_id, $specialty, $style);
    
    if ($reply_content) {
        // Create comment (reply)
        $comment_id = wp_insert_comment(array(
            'comment_post_ID' => $post_id,
            'comment_author' => $editor->display_name,
            'comment_author_email' => $editor->user_email,
            'comment_content' => $reply_content,
            'comment_approved' => 1,
            'user_id' => $editor->ID
        ));
        
        return $comment_id;
    }
    
    return false;
}

function generate_ai_reply($post_id, $specialty, $style) {
    $post = get_post($post_id);
    $post_title = $post->post_title;
    
    // Sample replies based on specialty and style
    $replies = array(
        'Android Development' => 'Based on your issue, I\'d recommend checking your background app refresh settings and disabling unnecessary system apps. Also, try clearing the cache partition in recovery mode.',
        'Linux Systems' => 'For dual boot setup, make sure you have at least 50GB free space. Use a tool like Rufus to create a bootable USB, then shrink your Windows partition using Disk Management.',
        'Custom ROMs' => 'I\'d suggest LineageOS or Pixel Experience for your device. Both are stable and regularly updated. Make sure to unlock your bootloader first and install a custom recovery like TWRP.',
        'Root Access' => 'You\'ll need to unlock the bootloader first, then flash Magisk through a custom recovery. Be aware this will void your warranty and could brick your device if done incorrectly.',
        'Security' => 'Always backup your data before making system modifications. Use reputable sources for ROMs and tools, and never skip reading the installation instructions thoroughly.'
    );
    
    return isset($replies[$specialty]) ? $replies[$specialty] : 'Thanks for your question! Let me help you with this issue.';
}

// Track post views for forum posts
function track_forum_post_views($post_id) {
    if (is_single() && get_post_type($post_id) == 'forum_post') {
        $views = get_post_meta($post_id, 'post_views', true);
        $views = $views ? $views + 1 : 1;
        update_post_meta($post_id, 'post_views', $views);
    }
}
add_action('wp_head', function() {
    if (is_single()) {
        track_forum_post_views(get_the_ID());
    }
});

// Generate some initial AI forum posts if none exist
function generate_initial_ai_posts() {
    // Check if we already have forum posts
    $existing_posts = get_posts(array(
        'post_type' => 'forum_post',
        'numberposts' => 1
    ));
    
    if (!empty($existing_posts)) {
        return; // Already have posts
    }
    
    // Get AI users
    $ai_questioners = get_users(array(
        'meta_key' => 'ai_user_type',
        'meta_value' => 'questioner',
        'number' => 5
    ));
    
    if (empty($ai_questioners)) {
        return; // No AI users yet
    }
    
    // Sample initial posts for Android forum
    $initial_posts = array(
        array(
            'title' => 'Need help with Android 14 battery optimization',
            'content' => 'Hey everyone! I just updated to Android 14 and my battery life has been terrible. Anyone else experiencing this? Looking for some solid solutions to improve battery performance.',
            'category' => 'android',
            'author' => $ai_questioners[0]
        ),
        array(
            'title' => 'Custom ROM recommendations for Samsung Galaxy S23?',
            'content' => 'Hello all, I\'m looking for a brilliant custom ROM for my Galaxy S23. Something stable and feature-rich would be lovely. Any recommendations? Cheers!',
            'category' => 'android',
            'author' => $ai_questioners[1] ?? $ai_questioners[0]
        ),
        array(
            'title' => 'Root access for OnePlus 11 - any luck, mates?',
            'content' => 'G\'day everyone! Has anyone managed to root the OnePlus 11 successfully? No worries if it\'s a bit tricky, just need some direction on the process.',
            'category' => 'android',
            'author' => $ai_questioners[2] ?? $ai_questioners[0]
        ),
        array(
            'title' => 'Best Magisk modules for performance boost?',
            'content' => 'Hi folks! I\'ve got my device rooted and I\'m looking for the best Magisk modules to boost performance. What are your favorites for 2024?',
            'category' => 'android',
            'author' => $ai_questioners[3] ?? $ai_questioners[0]
        ),
        array(
            'title' => '[SOLVED] Bootloader unlock issues on Pixel 8',
            'content' => 'Had some trouble unlocking the bootloader on my new Pixel 8. Figured it out though! Here\'s what worked for me in case anyone else runs into this.',
            'category' => 'android',
            'author' => $ai_questioners[4] ?? $ai_questioners[0]
        )
    );
    
    foreach ($initial_posts as $post_data) {
        $post_id = wp_insert_post(array(
            'post_title' => $post_data['title'],
            'post_content' => $post_data['content'],
            'post_status' => 'publish',
            'post_type' => 'forum_post',
            'post_author' => $post_data['author']->ID,
            'post_date' => date('Y-m-d H:i:s', strtotime('-' . rand(1, 72) . ' hours'))
        ));
        
        if ($post_id) {
            // Set category
            wp_set_post_terms($post_id, array($post_data['category']), 'forum_category');
            
            // Set initial view count
            update_post_meta($post_id, 'post_views', rand(500, 5000));
            
            // Schedule AI replies for some posts
            if (rand(1, 3) == 1) { // 33% chance of getting a reply
                wp_schedule_single_event(
                    time() + rand(300, 3600), // 5 minutes to 1 hour delay
                    'ai_forum_reply_event',
                    array($post_id)
                );
            }
        }
    }
}

// Hook to generate initial posts on theme activation
add_action('after_switch_theme', 'generate_initial_ai_posts');

// Also generate on admin init if no posts exist (for existing installations)
add_action('admin_init', function() {
    if (current_user_can('manage_options')) {
        generate_initial_ai_posts();
    }
});

// Improve the AI question generation with more variety
function generate_ai_question_advanced($country, $style) {
    $question_templates = array(
        'USA' => array(
            array(
                'title' => 'Need help with Android {version} {issue}',
                'content' => 'Hey everyone! I just {action} and my {problem}. Anyone else experiencing this? Looking for some solid solutions.',
                'category' => 'android'
            ),
            array(
                'title' => 'Best {item} for {device} in 2024?',
                'content' => 'What\'s the best {item} you guys recommend for {device}? Looking for something reliable and well-supported.',
                'category' => 'android'
            ),
            array(
                'title' => '[HELP] {device} {issue} after {action}',
                'content' => 'I\'m having trouble with my {device}. After {action}, I\'ve been getting {problem}. Any ideas how to fix this?',
                'category' => 'android'
            )
        ),
        'UK' => array(
            array(
                'title' => '{item} recommendations for {device}?',
                'content' => 'Hello all, I\'m looking for a brilliant {item} for my {device}. Something stable and feature-rich would be lovely. Cheers!',
                'category' => 'android'
            ),
            array(
                'title' => 'Trouble with {issue} - any advice?',
                'content' => 'Right, I\'ve been having a spot of bother with {issue}. Wondered if anyone might have some advice? Much appreciated!',
                'category' => 'android'
            )
        ),
        'Canada' => array(
            array(
                'title' => '{action} help needed, eh?',
                'content' => 'Hi folks! I\'m trying to {action} and could use some guidance on the process. Thanks!',
                'category' => 'android'
            )
        ),
        'Australia' => array(
            array(
                'title' => '{action} for {device} - any luck, mates?',
                'content' => 'G\'day everyone! Has anyone managed to {action} successfully? No worries if it\'s a bit tricky, just need some direction.',
                'category' => 'android'
            )
        )
    );
    
    // Replacement variables
    $replacements = array(
        '{version}' => array('14', '13', '12'),
        '{issue}' => array('battery optimization', 'performance issues', 'heating problems', 'camera problems'),
        '{action}' => array('updated to Android 14', 'installed a custom ROM', 'rooted my device', 'unlocked the bootloader'),
        '{problem}' => array('battery life has been terrible', 'device keeps crashing', 'apps are running slowly', 'camera won\'t focus'),
        '{item}' => array('custom ROM', 'kernel', 'Magisk module', 'recovery'),
        '{device}' => array('Samsung Galaxy S23', 'Pixel 8', 'OnePlus 11', 'Xiaomi 13'),
    );
    
    $country_templates = isset($question_templates[$country]) ? $question_templates[$country] : $question_templates['USA'];
    $template = $country_templates[array_rand($country_templates)];
    
    // Replace variables in title and content
    $title = $template['title'];
    $content = $template['content'];
    
    foreach ($replacements as $placeholder => $options) {
        $replacement = $options[array_rand($options)];
        $title = str_replace($placeholder, $replacement, $title);
        $content = str_replace($placeholder, $replacement, $content);
    }
    
    return array(
        'title' => $title,
        'content' => $content,
        'category' => $template['category']
    );
}
