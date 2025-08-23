<?php
/**
 * The front page template file
 *
 * @package TechForum_Theme
 */

get_header(); ?>

<main id="primary" class="site-main">
    
    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1>The Ultimate Tech Community</h1>
            <p>Join thousands of developers, modders, and tech enthusiasts discussing Android, Linux, Windows, custom ROMs, and everything in between.</p>
            <div class="search-bar">
                <input type="text" placeholder="Search forums, tutorials, devices...">
                <button><i class="fas fa-search"></i></button>
            </div>
            <div class="cta-buttons">
                <a href="#" class="btn">Join Community</a>
                <a href="#" class="btn btn-secondary">Browse Forums</a>
            </div>
        </div>
    </section>

    <!-- Featured Discussions Section -->
    <section class="features">
        <div class="container">
            <div class="section-title">
                <h2>Featured Discussions</h2>
                <p>Check out the hottest topics and latest developments in the tech community</p>
            </div>
            <div class="cards">
                <div class="card">
                    <div class="card-img">
                        <img src="https://images.unsplash.com/photo-1598965402089-897f5794335d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80" alt="Android 14">
                    </div>
                    <div class="card-content">
                        <h3>Android 14 Beta Features</h3>
                        <p>Explore the latest features in Android 14 Beta and what to expect in the final release.</p>
                        <a href="#" class="btn">Read More</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-img">
                        <img src="https://images.unsplash.com/photo-1629654297299-c8506221ca97?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80" alt="Linux">
                    </div>
                    <div class="card-content">
                        <h3>Linux Kernel 6.0 Updates</h3>
                        <p>Discover the performance improvements and new hardware support in the latest kernel.</p>
                        <a href="#" class="btn">Read More</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-img">
                        <img src="https://images.unsplash.com/photo-1624571409108-e9a41746af53?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80" alt="Custom ROM">
                    </div>
                    <div class="card-content">
                        <h3>Best Custom ROMs of 2023</h3>
                        <p>A comprehensive comparison of the top custom ROMs for popular Android devices.</p>
                        <a href="#" class="btn">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Popular Topics Section -->
    <section class="topics">
        <div class="container">
            <div class="section-title">
                <h2>Popular Topics</h2>
                <p>Find discussions on your favorite tech subjects</p>
            </div>
            <div class="topic-list">
                <div class="topic-item">
                    <div class="topic-icon">
                        <i class="fab fa-android"></i>
                    </div>
                    <div class="topic-content">
                        <h3>Android</h3>
                        <p>12.5k discussions</p>
                    </div>
                </div>
                <div class="topic-item">
                    <div class="topic-icon">
                        <i class="fab fa-linux"></i>
                    </div>
                    <div class="topic-content">
                        <h3>Linux</h3>
                        <p>8.3k discussions</p>
                    </div>
                </div>
                <div class="topic-item">
                    <div class="topic-icon">
                        <i class="fab fa-windows"></i>
                    </div>
                    <div class="topic-content">
                        <h3>Windows</h3>
                        <p>7.1k discussions</p>
                    </div>
                </div>
                <div class="topic-item">
                    <div class="topic-icon">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <div class="topic-content">
                        <h3>Custom ROMs</h3>
                        <p>9.7k discussions</p>
                    </div>
                </div>
                <div class="topic-item">
                    <div class="topic-icon">
                        <i class="fas fa-microchip"></i>
                    </div>
                    <div class="topic-content">
                        <h3>Bootloaders</h3>
                        <p>5.2k discussions</p>
                    </div>
                </div>
                <div class="topic-item">
                    <div class="topic-icon">
                        <i class="fas fa-terminal"></i>
                    </div>
                    <div class="topic-content">
                        <h3>Root Access</h3>
                        <p>6.8k discussions</p>
                    </div>
                </div>
                <div class="topic-item">
                    <div class="topic-icon">
                        <i class="fas fa-code-branch"></i>
                    </div>
                    <div class="topic-content">
                        <h3>Development</h3>
                        <p>10.3k discussions</p>
                    </div>
                </div>
                <div class="topic-item">
                    <div class="topic-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <div class="topic-content">
                        <h3>Security</h3>
                        <p>4.9k discussions</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats">
        <div class="container">
            <div class="stats-container">
                <div class="stat-item">
                    <h3>1.2M+</h3>
                    <p>Community Members</p>
                </div>
                <div class="stat-item">
                    <h3>500K+</h3>
                    <p>Forum Threads</p>
                </div>
                <div class="stat-item">
                    <h3>8.5M+</h3>
                    <p>Total Posts</p>
                </div>
                <div class="stat-item">
                    <h3>12K+</h3>
                    <p>Device Guides</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Latest Posts Carousel Section -->
    <section class="latest-posts-carousel">
        <div class="container">
            <div class="section-title">
                <h2>Latest Tech Insights</h2>
                <p>Stay updated with the newest articles, tutorials, and discussions from our community</p>
            </div>
            
            <div class="posts-carousel owl-carousel owl-theme">
                <?php
                // Query latest posts
                $latest_posts = new WP_Query(array(
                    'post_type' => 'post',
                    'posts_per_page' => 8,
                    'post_status' => 'publish',
                    'orderby' => 'date',
                    'order' => 'DESC'
                ));
                
                if ($latest_posts->have_posts()) :
                    while ($latest_posts->have_posts()) : $latest_posts->the_post();
                        $categories = get_the_category();
                        $primary_category = !empty($categories) ? $categories[0] : null;
                        $reading_time = ceil(str_word_count(get_the_content()) / 200);
                ?>
                
                <div class="carousel-post-card">
                    <div class="carousel-post-image">
                        <?php if (has_post_thumbnail()) : ?>
                            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium_large'); ?>" alt="<?php the_title_attribute(); ?>">
                        <?php else : ?>
                            <img src="https://images.unsplash.com/photo-1518709268805-4e9042af2176?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="<?php the_title_attribute(); ?>">
                        <?php endif; ?>
                        
                        <div class="post-overlay">
                            <?php if ($primary_category) : ?>
                                <span class="category-badge"><?php echo esc_html($primary_category->name); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <div class="carousel-post-content">
                        <div class="post-meta">
                            <span><i class="fas fa-calendar-alt"></i> <?php echo get_the_date('M j, Y'); ?></span>
                            <span><i class="fas fa-clock"></i> <?php echo $reading_time; ?> min read</span>
                            <span><i class="fas fa-user"></i> <?php echo get_the_author(); ?></span>
                        </div>
                        
                        <h3 class="carousel-post-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3>
                        
                        <div class="carousel-post-excerpt">
                            <?php echo wp_trim_words(get_the_excerpt(), 15, '...'); ?>
                        </div>
                        
                        <div class="carousel-post-footer">
                            <a href="<?php the_permalink(); ?>" class="read-more-btn">
                                Read More <i class="fas fa-arrow-right"></i>
                            </a>
                            
                            <div class="post-stats">
                                <span class="comments-count">
                                    <i class="fas fa-comments"></i>
                                    <?php echo get_comments_number(); ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <?php 
                    endwhile;
                    wp_reset_postdata();
                else : 
                ?>
                
                <!-- Fallback content if no posts -->
                <div class="carousel-post-card">
                    <div class="carousel-post-image">
                        <img src="https://images.unsplash.com/photo-1518709268805-4e9042af2176?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Tech Community">
                        <div class="post-overlay">
                            <span class="category-badge">Technology</span>
                        </div>
                    </div>
                    <div class="carousel-post-content">
                        <div class="post-meta">
                            <span><i class="fas fa-calendar-alt"></i> <?php echo date('M j, Y'); ?></span>
                            <span><i class="fas fa-clock"></i> 5 min read</span>
                            <span><i class="fas fa-user"></i> TechForus Team</span>
                        </div>
                        <h3 class="carousel-post-title">
                            <a href="#">Welcome to TechForus Community</a>
                        </h3>
                        <div class="carousel-post-excerpt">
                            Join our growing community of tech enthusiasts, developers, and innovators sharing knowledge and experiences.
                        </div>
                        <div class="carousel-post-footer">
                            <a href="#" class="read-more-btn">
                                Read More <i class="fas fa-arrow-right"></i>
                            </a>
                            <div class="post-stats">
                                <span class="comments-count">
                                    <i class="fas fa-comments"></i> 0
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <?php endif; ?>
            </div>
            
            <div class="carousel-navigation">
                <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="view-all-posts btn btn-secondary">
                    View All Posts <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta">
        <div class="container">
            <h2>Join Our Tech Community Today</h2>
            <p>Connect with like-minded tech enthusiasts, get help with your devices, share your knowledge, and stay updated with the latest in tech.</p>
            <div class="cta-buttons">
                <a href="#" class="btn">Create Account</a>
                <a href="#" class="btn btn-secondary">Learn More</a>
            </div>
        </div>
    </section>
    
</main>

<?php get_footer(); ?>
