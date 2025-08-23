    <footer class="site-footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h3><?php bloginfo('name'); ?></h3>
                    <p><?php bloginfo('description'); ?></p>
                    <div class="social-links">
                        <?php if (get_theme_mod('twitter_url')) : ?>
                            <a href="<?php echo esc_url(get_theme_mod('twitter_url')); ?>" target="_blank" rel="noopener">
                                <i class="fab fa-twitter"></i>
                            </a>
                        <?php endif; ?>
                        
                        <?php if (get_theme_mod('facebook_url')) : ?>
                            <a href="<?php echo esc_url(get_theme_mod('facebook_url')); ?>" target="_blank" rel="noopener">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        <?php endif; ?>
                        
                        <?php if (get_theme_mod('github_url')) : ?>
                            <a href="<?php echo esc_url(get_theme_mod('github_url')); ?>" target="_blank" rel="noopener">
                                <i class="fab fa-github"></i>
                            </a>
                        <?php endif; ?>
                        
                        <?php if (get_theme_mod('discord_url')) : ?>
                            <a href="<?php echo esc_url(get_theme_mod('discord_url')); ?>" target="_blank" rel="noopener">
                                <i class="fab fa-discord"></i>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
                
                <div class="footer-column">
                    <h3><?php _e('Navigation', 'techforum-theme'); ?></h3>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer',
                        'menu_class' => 'footer-links',
                        'container' => false,
                        'fallback_cb' => false,
                        'depth' => 1
                    ));
                    ?>
                </div>
                
                <div class="footer-column">
                    <h3><?php _e('Resources', 'techforum-theme'); ?></h3>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer-resources',
                        'menu_class' => 'footer-links',
                        'container' => false,
                        'fallback_cb' => false,
                        'depth' => 1
                    ));
                    ?>
                </div>
                
                <div class="footer-column">
                    <h3><?php _e('Support', 'techforum-theme'); ?></h3>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer-support',
                        'menu_class' => 'footer-links',
                        'container' => false,
                        'fallback_cb' => false,
                        'depth' => 1
                    ));
                    ?>
                </div>
            </div>
            
            <div class="copyright">
                <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php _e('All rights reserved.', 'techforum-theme'); ?></p>
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>
