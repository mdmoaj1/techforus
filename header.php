<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
    <div class="container">
        <nav class="navbar">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="logo">
                <i class="fas fa-code"></i> 
                <?php bloginfo('name'); ?>
            </a>
            
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_class' => 'nav-links',
                'container' => false,
                'fallback_cb' => 'techforum_fallback_menu',
                'walker' => new TechForum_Walker_Nav_Menu()
            ));
            ?>
        </nav>
    </div>
</header>
