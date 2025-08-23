<?php
/**
 * The main template file
 *
 * @package TechForum_Theme
 */

get_header(); ?>

<main id="primary" class="site-main">
    
    <?php if (is_home() && is_front_page()) : ?>
        <!-- Hero Section for Front Page -->
        <section class="hero">
            <div class="container">
                <h1><?php echo esc_html(get_theme_mod('hero_title', 'The Ultimate Tech Community')); ?></h1>
                <p><?php echo esc_html(get_theme_mod('hero_description', 'Join thousands of developers, modders, and tech enthusiasts discussing Android, Linux, Windows, custom ROMs, and everything in between.')); ?></p>
                
                <div class="search-bar">
                    <?php get_search_form(); ?>
                </div>
                
                <div class="cta-buttons">
                    <a href="<?php echo esc_url(wp_registration_url()); ?>" class="btn"><?php _e('Join Community', 'techforum-theme'); ?></a>
                    <a href="<?php echo esc_url(home_url('/blog/')); ?>" class="btn btn-secondary"><?php _e('Browse Posts', 'techforum-theme'); ?></a>
                </div>
            </div>
        </section>
        
        <!-- Featured Posts Section -->
        <section class="features">
            <div class="container">
                <div class="section-title">
                    <h2><?php _e('Featured Posts', 'techforum-theme'); ?></h2>
                    <p><?php _e('Check out the latest and most popular posts from our community', 'techforum-theme'); ?></p>
                </div>
                
                <div class="cards">
                    <?php
                    $featured_posts = new WP_Query(array(
                        'posts_per_page' => 3,
                        'meta_key' => '_featured_post',
                        'meta_value' => 'yes',
                        'post_status' => 'publish'
                    ));
                    
                    if (!$featured_posts->have_posts()) {
                        // Fallback to latest posts if no featured posts
                        $featured_posts = new WP_Query(array(
                            'posts_per_page' => 3,
                            'post_status' => 'publish'
                        ));
                    }
                    
                    if ($featured_posts->have_posts()) :
                        while ($featured_posts->have_posts()) : $featured_posts->the_post();
                    ?>
                        <div class="card">
                            <div class="card-img">
                                <?php if (has_post_thumbnail()) : ?>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('techforum-featured'); ?>
                                    </a>
                                <?php else : ?>
                                    <a href="<?php the_permalink(); ?>">
                                        <img src="https://images.unsplash.com/photo-1550751827-4bd374c3f58b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="<?php the_title(); ?>">
                                    </a>
                                <?php endif; ?>
                            </div>
                            <div class="card-content">
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <p><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                                <a href="<?php the_permalink(); ?>" class="btn"><?php _e('Read More', 'techforum-theme'); ?></a>
                            </div>
                        </div>
                    <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>
            </div>
        </section>
        
        <!-- Topics Section -->
        <section class="topics">
            <div class="container">
                <div class="section-title">
                    <h2><?php _e('Popular Categories', 'techforum-theme'); ?></h2>
                    <p><?php _e('Explore discussions by category', 'techforum-theme'); ?></p>
                </div>
                
                <div class="topic-list">
                    <?php
                    $categories = get_categories(array(
                        'orderby' => 'count',
                        'order' => 'DESC',
                        'number' => 8,
                        'hide_empty' => true
                    ));
                    
                    $icons = array('fab fa-android', 'fab fa-linux', 'fab fa-windows', 'fas fa-mobile-alt', 'fas fa-microchip', 'fas fa-terminal', 'fas fa-code-branch', 'fas fa-shield-alt');
                    
                    foreach ($categories as $index => $category) :
                        $icon = isset($icons[$index]) ? $icons[$index] : 'fas fa-folder';
                    ?>
                        <div class="topic-item">
                            <div class="topic-icon">
                                <i class="<?php echo esc_attr($icon); ?>"></i>
                            </div>
                            <div class="topic-content">
                                <h3><a href="<?php echo esc_url(get_category_link($category->term_id)); ?>"><?php echo esc_html($category->name); ?></a></h3>
                                <p><?php printf(_n('%s post', '%s posts', $category->count, 'techforum-theme'), number_format_i18n($category->count)); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        
        <!-- Stats Section -->
        <section class="stats">
            <div class="container">
                <div class="stats-container">
                    <div class="stat-item">
                        <h3><?php echo number_format_i18n(wp_count_posts()->publish); ?>+</h3>
                        <p><?php _e('Published Posts', 'techforum-theme'); ?></p>
                    </div>
                    <div class="stat-item">
                        <h3><?php echo number_format_i18n(count_users()['total_users']); ?>+</h3>
                        <p><?php _e('Community Members', 'techforum-theme'); ?></p>
                    </div>
                    <div class="stat-item">
                        <h3><?php echo number_format_i18n(wp_count_comments()->approved); ?>+</h3>
                        <p><?php _e('Comments', 'techforum-theme'); ?></p>
                    </div>
                    <div class="stat-item">
                        <h3><?php echo number_format_i18n(wp_count_terms('category')); ?>+</h3>
                        <p><?php _e('Categories', 'techforum-theme'); ?></p>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- CTA Section -->
        <section class="cta">
            <div class="container">
                <h2><?php _e('Join Our Tech Community Today', 'techforum-theme'); ?></h2>
                <p><?php _e('Connect with like-minded tech enthusiasts, get help with your devices, share your knowledge, and stay updated with the latest in tech.', 'techforum-theme'); ?></p>
                <div class="cta-buttons">
                    <a href="<?php echo esc_url(wp_registration_url()); ?>" class="btn"><?php _e('Create Account', 'techforum-theme'); ?></a>
                    <a href="<?php echo esc_url(home_url('/about/')); ?>" class="btn btn-secondary"><?php _e('Learn More', 'techforum-theme'); ?></a>
                </div>
            </div>
        </section>
        
    <?php else : ?>
        <!-- Blog/Archive Layout -->
        <div class="container">
            <div class="content-area">
                
                <?php if (have_posts()) : ?>
                    
                    <header class="page-header">
                        <?php if (is_home() && !is_front_page()) : ?>
                            <h1 class="page-title"><?php single_post_title(); ?></h1>
                        <?php elseif (is_category()) : ?>
                            <h1 class="page-title"><?php printf(__('Category: %s', 'techforum-theme'), single_cat_title('', false)); ?></h1>
                        <?php elseif (is_tag()) : ?>
                            <h1 class="page-title"><?php printf(__('Tag: %s', 'techforum-theme'), single_tag_title('', false)); ?></h1>
                        <?php elseif (is_author()) : ?>
                            <h1 class="page-title"><?php printf(__('Author: %s', 'techforum-theme'), get_the_author()); ?></h1>
                        <?php elseif (is_search()) : ?>
                            <h1 class="page-title"><?php printf(__('Search Results for: %s', 'techforum-theme'), get_search_query()); ?></h1>
                        <?php endif; ?>
                    </header>
                    
                    <div class="posts-container">
                        <?php while (have_posts()) : the_post(); ?>
                            
                            <article id="post-<?php the_ID(); ?>" <?php post_class('post-card'); ?>>
                                
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="post-thumbnail">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail('techforum-thumbnail'); ?>
                                        </a>
                                    </div>
                                <?php endif; ?>
                                
                                <div class="post-content">
                                    <header class="entry-header">
                                        <h2 class="entry-title">
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </h2>
                                        
                                        <div class="entry-meta">
                                            <span class="posted-on">
                                                <i class="fas fa-calendar"></i>
                                                <time datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                                                    <?php echo esc_html(get_the_date()); ?>
                                                </time>
                                            </span>
                                            
                                            <span class="byline">
                                                <i class="fas fa-user"></i>
                                                <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                                                    <?php echo esc_html(get_the_author()); ?>
                                                </a>
                                            </span>
                                            
                                            <?php if (has_category()) : ?>
                                                <span class="cat-links">
                                                    <i class="fas fa-folder"></i>
                                                    <?php the_category(', '); ?>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </header>
                                    
                                    <div class="entry-summary">
                                        <?php the_excerpt(); ?>
                                    </div>
                                    
                                    <footer class="entry-footer">
                                        <a href="<?php the_permalink(); ?>" class="read-more btn">
                                            <?php _e('Read More', 'techforum-theme'); ?>
                                        </a>
                                    </footer>
                                </div>
                            </article>
                            
                        <?php endwhile; ?>
                    </div>
                    
                    <div class="pagination">
                        <?php techforum_pagination(); ?>
                    </div>
                    
                <?php else : ?>
                    
                    <section class="no-results not-found">
                        <header class="page-header">
                            <h1 class="page-title"><?php _e('Nothing here', 'techforum-theme'); ?></h1>
                        </header>
                        
                        <div class="page-content">
                            <?php if (is_home() && current_user_can('publish_posts')) : ?>
                                <p><?php printf(__('Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'techforum-theme'), esc_url(admin_url('post-new.php'))); ?></p>
                            <?php elseif (is_search()) : ?>
                                <p><?php _e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'techforum-theme'); ?></p>
                                <?php get_search_form(); ?>
                            <?php else : ?>
                                <p><?php _e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'techforum-theme'); ?></p>
                                <?php get_search_form(); ?>
                            <?php endif; ?>
                        </div>
                    </section>
                    
                <?php endif; ?>
                
            </div>
            
            <?php get_sidebar(); ?>
        </div>
    <?php endif; ?>
    
</main>

<?php get_footer(); ?>
