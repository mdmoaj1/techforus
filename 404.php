<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package TechForum_Theme
 */

get_header(); ?>

<main id="primary" class="site-main">
    <div class="container">
        <div class="error-404 not-found">
            <header class="page-header">
                <h1 class="page-title"><?php _e('Oops! That page can&rsquo;t be found.', 'techforum-theme'); ?></h1>
            </header>
            
            <div class="page-content">
                <p><?php _e('It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'techforum-theme'); ?></p>
                
                <div class="error-search">
                    <?php get_search_form(); ?>
                </div>
                
                <div class="error-widgets">
                    <div class="widget">
                        <h3><?php _e('Most Used Categories', 'techforum-theme'); ?></h3>
                        <?php
                        wp_list_categories(array(
                            'orderby'    => 'count',
                            'order'      => 'DESC',
                            'show_count' => 1,
                            'title_li'   => '',
                            'number'     => 10,
                        ));
                        ?>
                    </div>
                    
                    <div class="widget">
                        <h3><?php _e('Recent Posts', 'techforum-theme'); ?></h3>
                        <?php
                        $recent_posts = wp_get_recent_posts(array(
                            'numberposts' => 5,
                            'post_status' => 'publish'
                        ));
                        
                        if ($recent_posts) {
                            echo '<ul>';
                            foreach ($recent_posts as $post) {
                                echo '<li><a href="' . get_permalink($post['ID']) . '">' . $post['post_title'] . '</a></li>';
                            }
                            echo '</ul>';
                        }
                        ?>
                    </div>
                    
                    <div class="widget">
                        <h3><?php _e('Archives', 'techforum-theme'); ?></h3>
                        <?php wp_get_archives(array('type' => 'monthly')); ?>
                    </div>
                </div>
                
                <div class="error-actions">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary">
                        <?php _e('Go to Homepage', 'techforum-theme'); ?>
                    </a>
                    <a href="javascript:history.back()" class="btn btn-secondary">
                        <?php _e('Go Back', 'techforum-theme'); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
