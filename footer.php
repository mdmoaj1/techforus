    <footer class="site-footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h3><?php echo get_theme_mod('footer_title_1', get_bloginfo('name')); ?></h3>
                    <p><?php echo get_theme_mod('footer_description', 'The ultimate community for Android, Linux, Windows, and all things tech.'); ?></p>
                    <div class="social-links">
                        <?php if (get_theme_mod('twitter_url', '#')) : ?>
                            <a href="<?php echo esc_url(get_theme_mod('twitter_url', '#')); ?>" target="_blank" rel="noopener">
                                <i class="fab fa-twitter"></i>
                            </a>
                        <?php endif; ?>
                        
                        <?php if (get_theme_mod('facebook_url', '#')) : ?>
                            <a href="<?php echo esc_url(get_theme_mod('facebook_url', '#')); ?>" target="_blank" rel="noopener">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        <?php endif; ?>
                        
                        <?php if (get_theme_mod('github_url', '#')) : ?>
                            <a href="<?php echo esc_url(get_theme_mod('github_url', '#')); ?>" target="_blank" rel="noopener">
                                <i class="fab fa-github"></i>
                            </a>
                        <?php endif; ?>
                        
                        <?php if (get_theme_mod('discord_url', '#')) : ?>
                            <a href="<?php echo esc_url(get_theme_mod('discord_url', '#')); ?>" target="_blank" rel="noopener">
                                <i class="fab fa-discord"></i>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
                
                <div class="footer-column">
                    <h3><?php echo get_theme_mod('footer_title_2', 'Navigation'); ?></h3>
                    <?php
                    // Check if custom menu exists, otherwise show default links
                    if (has_nav_menu('footer')) {
                        wp_nav_menu(array(
                            'theme_location' => 'footer',
                            'menu_class' => 'footer-links',
                            'container' => false,
                            'fallback_cb' => false,
                            'depth' => 1
                        ));
                    } else {
                        // Default navigation links
                        echo '<ul class="footer-links">';
                        echo '<li><a href="' . esc_url(home_url('/')) . '">Home</a></li>';
                        echo '<li><a href="#">Forums</a></li>';
                        echo '<li><a href="#">Tutorials</a></li>';
                        echo '<li><a href="#">Downloads</a></li>';
                        echo '<li><a href="#">News</a></li>';
                        echo '</ul>';
                    }
                    ?>
                </div>
                
                <div class="footer-column">
                    <h3><?php echo get_theme_mod('footer_title_3', 'Resources'); ?></h3>
                    <?php
                    // Check if custom menu exists, otherwise show default links
                    if (has_nav_menu('footer-resources')) {
                        wp_nav_menu(array(
                            'theme_location' => 'footer-resources',
                            'menu_class' => 'footer-links',
                            'container' => false,
                            'fallback_cb' => false,
                            'depth' => 1
                        ));
                    } else {
                        // Default resource links
                        echo '<ul class="footer-links">';
                        echo '<li><a href="#">Device Database</a></li>';
                        echo '<li><a href="#">Developer Tools</a></li>';
                        echo '<li><a href="#">ROM Repository</a></li>';
                        echo '<li><a href="#">Kernel Sources</a></li>';
                        echo '<li><a href="#">Documentation</a></li>';
                        echo '</ul>';
                    }
                    ?>
                </div>
                
                <div class="footer-column">
                    <h3><?php echo get_theme_mod('footer_title_4', 'Support'); ?></h3>
                    <?php
                    // Check if custom menu exists, otherwise show default links
                    if (has_nav_menu('footer-support')) {
                        wp_nav_menu(array(
                            'theme_location' => 'footer-support',
                            'menu_class' => 'footer-links',
                            'container' => false,
                            'fallback_cb' => false,
                            'depth' => 1
                        ));
                    } else {
                        // Default support links
                        echo '<ul class="footer-links">';
                        echo '<li><a href="#">Help Center</a></li>';
                        echo '<li><a href="#">Community Guidelines</a></li>';
                        echo '<li><a href="#">Report Issues</a></li>';
                        echo '<li><a href="#">Contact Us</a></li>';
                        echo '<li><a href="#">Privacy Policy</a></li>';
                        echo '</ul>';
                    }
                    ?>
                </div>
            </div>
            
            <div class="copyright">
                <p>&copy; <?php echo date('Y'); ?> <?php echo get_theme_mod('footer_copyright', get_bloginfo('name') . '. All rights reserved.'); ?></p>
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>
