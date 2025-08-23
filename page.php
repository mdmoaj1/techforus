<?php
/**
 * The template for displaying all pages
 *
 * @package TechForum_Theme
 */

get_header(); ?>

<main id="primary" class="site-main">
    <div class="container">
        <div class="content-area">
            
            <?php while (have_posts()) : the_post(); ?>
                
                <article id="post-<?php the_ID(); ?>" <?php post_class('single-page'); ?>>
                    
                    <header class="entry-header">
                        <h1 class="entry-title"><?php the_title(); ?></h1>
                        
                        <?php if (get_edit_post_link()) : ?>
                            <div class="edit-link">
                                <?php edit_post_link(__('Edit', 'techforum-theme'), '<span class="edit-link">', '</span>'); ?>
                            </div>
                        <?php endif; ?>
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
                    
                </article>
                
                <?php
                // If comments are open or we have at least one comment, load up the comment template.
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;
                ?>
                
            <?php endwhile; ?>
            
        </div>
        
        <?php if (is_active_sidebar('sidebar-1')) : ?>
            <?php get_sidebar(); ?>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>
