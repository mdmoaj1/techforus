<?php
/**
 * The template for displaying all single posts
 *
 * @package TechForum_Theme
 */

get_header(); ?>

<main id="primary" class="site-main">
    <div class="container">
        <div class="content-area">
            
            <?php while (have_posts()) : the_post(); ?>
                
                <article id="post-<?php the_ID(); ?>" <?php post_class('single-post'); ?>>
                    
                    <header class="entry-header">
                        <h1 class="entry-title"><?php the_title(); ?></h1>
                        
                        <div class="entry-meta">
                            <div class="meta-item">
                                <i class="fas fa-calendar"></i>
                                <time datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                                    <?php echo esc_html(get_the_date()); ?>
                                </time>
                            </div>
                            
                            <div class="meta-item">
                                <i class="fas fa-user"></i>
                                <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                                    <?php echo esc_html(get_the_author()); ?>
                                </a>
                            </div>
                            
                            <?php if (has_category()) : ?>
                                <div class="meta-item">
                                    <i class="fas fa-folder"></i>
                                    <?php the_category(', '); ?>
                                </div>
                            <?php endif; ?>
                            
                            <?php if (has_tag()) : ?>
                                <div class="meta-item">
                                    <i class="fas fa-tags"></i>
                                    <?php the_tags('', ', '); ?>
                                </div>
                            <?php endif; ?>
                            
                            <div class="meta-item">
                                <i class="fas fa-comments"></i>
                                <a href="#comments">
                                    <?php comments_number(__('No Comments', 'techforum-theme'), __('1 Comment', 'techforum-theme'), __('% Comments', 'techforum-theme')); ?>
                                </a>
                            </div>
                        </div>
                    </header>
                    
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="post-thumbnail">
                            <?php the_post_thumbnail('techforum-large'); ?>
                        </div>
                    <?php endif; ?>
                    
                    <div class="entry-content">
                        <?php the_content(); ?>
                        
                        <?php
                        wp_link_pages(array(
                            'before' => '<div class="page-links">' . __('Pages:', 'techforum-theme'),
                            'after'  => '</div>',
                        ));
                        ?>
                    </div>
                    
                    <footer class="entry-footer">
                        <div class="post-navigation">
                            <?php
                            $prev_post = get_previous_post();
                            $next_post = get_next_post();
                            ?>
                            
                            <?php if ($prev_post) : ?>
                                <div class="nav-previous">
                                    <a href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>">
                                        <i class="fas fa-arrow-left"></i>
                                        <span><?php _e('Previous Post', 'techforum-theme'); ?></span>
                                        <strong><?php echo esc_html($prev_post->post_title); ?></strong>
                                    </a>
                                </div>
                            <?php endif; ?>
                            
                            <?php if ($next_post) : ?>
                                <div class="nav-next">
                                    <a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>">
                                        <span><?php _e('Next Post', 'techforum-theme'); ?></span>
                                        <strong><?php echo esc_html($next_post->post_title); ?></strong>
                                        <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                        
                        <div class="share-buttons">
                            <h4><?php _e('Share this post:', 'techforum-theme'); ?></h4>
                            <div class="social-share">
                                <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>" target="_blank" rel="noopener" class="share-twitter">
                                    <i class="fab fa-twitter"></i> <?php _e('Twitter', 'techforum-theme'); ?>
                                </a>
                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" target="_blank" rel="noopener" class="share-facebook">
                                    <i class="fab fa-facebook-f"></i> <?php _e('Facebook', 'techforum-theme'); ?>
                                </a>
                                <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo urlencode(get_permalink()); ?>" target="_blank" rel="noopener" class="share-linkedin">
                                    <i class="fab fa-linkedin-in"></i> <?php _e('LinkedIn', 'techforum-theme'); ?>
                                </a>
                                <a href="mailto:?subject=<?php echo urlencode(get_the_title()); ?>&body=<?php echo urlencode(get_permalink()); ?>" class="share-email">
                                    <i class="fas fa-envelope"></i> <?php _e('Email', 'techforum-theme'); ?>
                                </a>
                            </div>
                        </div>
                    </footer>
                    
                </article>
                
                <!-- Author Bio -->
                <?php if (get_the_author_meta('description')) : ?>
                    <div class="author-bio">
                        <div class="author-avatar">
                            <?php echo get_avatar(get_the_author_meta('ID'), 80); ?>
                        </div>
                        <div class="author-info">
                            <h4><?php _e('About', 'techforum-theme'); ?> <?php echo esc_html(get_the_author()); ?></h4>
                            <p><?php echo wp_kses_post(get_the_author_meta('description')); ?></p>
                            <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" class="btn btn-small">
                                <?php _e('View all posts', 'techforum-theme'); ?>
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
                
                <!-- Related Posts -->
                <?php
                $related_posts = new WP_Query(array(
                    'post_type' => 'post',
                    'posts_per_page' => 3,
                    'post__not_in' => array(get_the_ID()),
                    'category__in' => wp_get_post_categories(get_the_ID()),
                    'orderby' => 'rand'
                ));
                
                if ($related_posts->have_posts()) :
                ?>
                    <section class="related-posts">
                        <h3><?php _e('Related Posts', 'techforum-theme'); ?></h3>
                        <div class="related-posts-grid">
                            <?php while ($related_posts->have_posts()) : $related_posts->the_post(); ?>
                                <article class="related-post">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <div class="related-post-thumbnail">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_post_thumbnail('techforum-thumbnail'); ?>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <div class="related-post-content">
                                        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                        <div class="related-post-meta">
                                            <time datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                                                <?php echo esc_html(get_the_date()); ?>
                                            </time>
                                        </div>
                                    </div>
                                </article>
                            <?php endwhile; ?>
                        </div>
                    </section>
                <?php
                    wp_reset_postdata();
                endif;
                ?>
                
                <!-- Comments -->
                <?php
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;
                ?>
                
            <?php endwhile; ?>
            
        </div>
        
        <?php get_sidebar(); ?>
    </div>
</main>

<?php get_footer(); ?>
