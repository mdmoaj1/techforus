<?php
/**
 * The home page template file (for blog posts page)
 *
 * @package TechForum_Theme
 */

get_header(); ?>

<main id="primary" class="site-main">
    <div class="container">
        <div class="content-area">
            
            <?php if (have_posts()) : ?>
                
                <header class="page-header">
                    <h1 class="page-title"><?php _e('Latest Posts', 'techforum-theme'); ?></h1>
                    <div class="kaios-section-intro">
                        <div class="kaios-banner">
                            <div class="kaios-banner-content">
                                <h3>🔥 Explore KaiOS Development</h3>
                                <p>Discover the complete guide to KaiOS development, apps, and community resources</p>
                                <a href="<?php echo esc_url(home_url('/kaios')); ?>" class="btn btn-kaios">
                                    <i class="fas fa-mobile-alt"></i> Visit KaiOS Page
                                </a>
                            </div>
                        </div>
                    </div>
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
                        <p><?php _e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'techforum-theme'); ?></p>
                        <?php get_search_form(); ?>
                    </div>
                </section>
                
            <?php endif; ?>
            
        </div>
        
        <?php get_sidebar(); ?>
    </div>
</main>

<?php get_footer(); ?>
