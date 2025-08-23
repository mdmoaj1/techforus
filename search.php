<?php
/**
 * The template for displaying search results pages
 *
 * @package TechForum_Theme
 */

get_header(); ?>

<main id="primary" class="site-main">
    <div class="container">
        <div class="content-area">
            
            <?php if (have_posts()) : ?>
                
                <header class="page-header">
                    <h1 class="page-title">
                        <?php
                        printf(
                            esc_html__('Search Results for: %s', 'techforum-theme'),
                            '<span>' . get_search_query() . '</span>'
                        );
                        ?>
                    </h1>
                    
                    <div class="search-results-count">
                        <?php
                        global $wp_query;
                        printf(
                            _n(
                                'Found %s result',
                                'Found %s results',
                                $wp_query->found_posts,
                                'techforum-theme'
                            ),
                            number_format_i18n($wp_query->found_posts)
                        );
                        ?>
                    </div>
                </header>
                
                <div class="posts-container">
                    <?php while (have_posts()) : the_post(); ?>
                        
                        <article id="post-<?php the_ID(); ?>" <?php post_class('post-card search-result'); ?>>
                            
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
                                        <span class="post-type">
                                            <i class="fas fa-file"></i>
                                            <?php echo esc_html(get_post_type_object(get_post_type())->labels->singular_name); ?>
                                        </span>
                                        
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
                        <h1 class="page-title"><?php _e('Nothing found', 'techforum-theme'); ?></h1>
                    </header>
                    
                    <div class="page-content">
                        <p><?php _e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'techforum-theme'); ?></p>
                        
                        <div class="search-again">
                            <?php get_search_form(); ?>
                        </div>
                        
                        <div class="search-suggestions">
                            <h3><?php _e('Search Suggestions:', 'techforum-theme'); ?></h3>
                            <ul>
                                <li><?php _e('Make sure all words are spelled correctly.', 'techforum-theme'); ?></li>
                                <li><?php _e('Try different keywords.', 'techforum-theme'); ?></li>
                                <li><?php _e('Try more general keywords.', 'techforum-theme'); ?></li>
                                <li><?php _e('Try fewer keywords.', 'techforum-theme'); ?></li>
                            </ul>
                        </div>
                        
                        <div class="popular-categories">
                            <h3><?php _e('Popular Categories', 'techforum-theme'); ?></h3>
                            <?php
                            wp_list_categories(array(
                                'orderby'    => 'count',
                                'order'      => 'DESC',
                                'show_count' => 1,
                                'title_li'   => '',
                                'number'     => 8,
                            ));
                            ?>
                        </div>
                    </div>
                </section>
                
            <?php endif; ?>
            
        </div>
        
        <?php get_sidebar(); ?>
    </div>
</main>

<?php get_footer(); ?>
