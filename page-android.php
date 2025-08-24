<?php
/**
 * Template Name: Android Forum Page
 * 
 * @package TechForum_Theme
 */

get_header(); 

// Get Android forum posts from our AI system
$android_posts = new WP_Query(array(
    'post_type' => 'forum_post',
    'posts_per_page' => 10,
    'tax_query' => array(
        array(
            'taxonomy' => 'forum_category',
            'field' => 'slug',
            'terms' => 'android'
        )
    ),
    'orderby' => 'date',
    'order' => 'DESC'
));

// Get AI users for online users display
$ai_users = get_users(array(
    'meta_key' => 'is_ai_user',
    'meta_value' => true,
    'number' => 8,
    'orderby' => 'rand'
));

// Get featured threads (popular posts with most comments)
$featured_posts = new WP_Query(array(
    'post_type' => 'forum_post',
    'posts_per_page' => 3,
    'tax_query' => array(
        array(
            'taxonomy' => 'forum_category',
            'field' => 'slug',
            'terms' => 'android'
        )
    ),
    'meta_key' => 'post_views',
    'orderby' => 'meta_value_num',
    'order' => 'DESC'
));

// Get total forum stats
$total_android_posts = wp_count_posts('forum_post');
$total_online_users = count($ai_users) + rand(50, 200); // AI users + simulated real users

?>

<main id="primary" class="site-main">
    <!-- Forum Header -->
    <section class="forum-header">
        <div class="container">
            <h1><i class="fab fa-android"></i> Android Forum</h1>
            <p>Discuss Android OS, custom ROMs, apps, development, and troubleshooting for all Android devices.</p>
            <a href="<?php echo admin_url('post-new.php?post_type=forum_post'); ?>" class="btn btn-android">Start New Thread</a>
        </div>
    </section>

    <div class="container">
        <!-- Breadcrumb -->
        <ul class="breadcrumb-nav">
            <li class="breadcrumb-item"><a href="<?php echo home_url(); ?>"><i class="fas fa-home"></i> Home</a></li>
            <li class="breadcrumb-item"><a href="#">Forums</a></li>
            <li class="breadcrumb-item active">Android</li>
        </ul>

        <div class="forum-layout">
            <div class="main-content">
                <!-- Forum Tabs -->
                <div class="forum-tabs">
                    <div class="forum-tab active" data-tab="latest">Latest</div>
                    <div class="forum-tab" data-tab="popular">Popular</div>
                    <div class="forum-tab" data-tab="unanswered">Unanswered</div>
                    <div class="forum-tab" data-tab="featured">Featured</div>
                </div>

                <!-- Thread List -->
                <ul class="thread-list">
                    <?php if ($android_posts->have_posts()) : ?>
                        <?php while ($android_posts->have_posts()) : $android_posts->the_post(); ?>
                            <?php
                            $author_id = get_the_author_meta('ID');
                            $author_country = get_user_meta($author_id, 'ai_country', true);
                            $author_style = get_user_meta($author_id, 'ai_writing_style', true);
                            $is_ai_user = get_user_meta($author_id, 'is_ai_user', true);
                            $post_views = get_post_meta(get_the_ID(), 'post_views', true) ?: rand(500, 15000);
                            $comment_count = get_comments_number();
                            
                            // Generate avatar based on user
                            $avatar_seed = $is_ai_user ? $author_id : rand(1, 70);
                            $avatar_url = "https://i.pravatar.cc/150?img=" . ($avatar_seed % 70 + 1);
                            
                            // Get post categories/tags
                            $categories = get_the_terms(get_the_ID(), 'forum_category');
                            $category_names = array();
                            if ($categories) {
                                foreach ($categories as $category) {
                                    $category_names[] = $category->name;
                                }
                            }
                            
                            // Generate realistic tags based on content
                            $content_lower = strtolower(get_the_content());
                            $auto_tags = array();
                            if (strpos($content_lower, 'android 14') !== false) $auto_tags[] = 'Android 14';
                            if (strpos($content_lower, 'android 13') !== false) $auto_tags[] = 'Android 13';
                            if (strpos($content_lower, 'samsung') !== false) $auto_tags[] = 'Samsung';
                            if (strpos($content_lower, 'pixel') !== false) $auto_tags[] = 'Pixel';
                            if (strpos($content_lower, 'oneplus') !== false) $auto_tags[] = 'OnePlus';
                            if (strpos($content_lower, 'root') !== false) $auto_tags[] = 'Root';
                            if (strpos($content_lower, 'magisk') !== false) $auto_tags[] = 'Magisk';
                            if (strpos($content_lower, 'custom rom') !== false || strpos($content_lower, 'rom') !== false) $auto_tags[] = 'Custom ROM';
                            if (strpos($content_lower, 'battery') !== false) $auto_tags[] = 'Battery';
                            if (strpos($content_lower, 'bootloader') !== false) $auto_tags[] = 'Bootloader';
                            
                            // Combine category names and auto tags
                            $all_tags = array_merge($category_names, $auto_tags);
                            $all_tags = array_unique(array_slice($all_tags, 0, 4)); // Limit to 4 tags
                            ?>
                            <li class="thread-item">
                                <div class="thread-avatar">
                                    <img src="<?php echo $avatar_url; ?>" alt="<?php echo get_the_author(); ?> Avatar">
                                </div>
                                <div class="thread-content">
                                    <a href="<?php the_permalink(); ?>" class="thread-title"><?php the_title(); ?></a>
                                    <div class="thread-meta">
                                        <span><i class="fas fa-user"></i> <?php the_author(); ?></span>
                                        <span><i class="far fa-clock"></i> <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ago'; ?></span>
                                        <span><i class="fas fa-eye"></i> <?php echo number_format($post_views); ?> views</span>
                                        <?php if ($is_ai_user && $author_country): ?>
                                            <span class="user-country" title="<?php echo $author_country; ?>"><i class="fas fa-globe"></i> <?php echo $author_country; ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <p class="thread-preview"><?php echo wp_trim_words(get_the_content(), 25, '...'); ?></p>
                                    <?php if (!empty($all_tags)): ?>
                                        <div class="thread-tags">
                                            <?php foreach ($all_tags as $tag): ?>
                                                <span class="tag"><?php echo esc_html($tag); ?></span>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="thread-stats">
                                    <div class="stats-number"><?php echo $comment_count; ?></div>
                                    <div class="stats-label">Replies</div>
                                </div>
                            </li>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    <?php else: ?>
                        <!-- Fallback content if no AI posts exist yet -->
                        <li class="thread-item">
                            <div class="thread-avatar">
                                <img src="https://i.pravatar.cc/150?img=1" alt="System Avatar">
                            </div>
                            <div class="thread-content">
                                <a href="#" class="thread-title">Welcome to the Android Forum!</a>
                                <div class="thread-meta">
                                    <span><i class="fas fa-user"></i> TechForum Admin</span>
                                    <span><i class="far fa-clock"></i> Just now</span>
                                    <span><i class="fas fa-eye"></i> 1 views</span>
                                </div>
                                <p class="thread-preview">Our AI-powered forum system is starting up. Real discussions will appear here soon as our AI users begin posting questions and answers.</p>
                                <div class="thread-tags">
                                    <span class="tag">Welcome</span>
                                    <span class="tag">Android</span>
                                    <span class="tag">AI Forum</span>
                                </div>
                            </div>
                            <div class="thread-stats">
                                <div class="stats-number">0</div>
                                <div class="stats-label">Replies</div>
                            </div>
                        </li>
                    <?php endif; ?>
                </ul>

                <!-- Pagination -->
                <div class="pagination">
                    <?php
                    $big = 999999999; // need an unlikely integer
                    echo paginate_links(array(
                        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                        'format' => '?paged=%#%',
                        'current' => max(1, get_query_var('paged')),
                        'total' => $android_posts->max_num_pages,
                        'prev_text' => '<i class="fas fa-angle-left"></i>',
                        'next_text' => '<i class="fas fa-angle-right"></i>',
                        'type' => 'list',
                        'before_page_number' => '<span class="page-item">',
                        'after_page_number' => '</span>'
                    ));
                    ?>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="forum-sidebar">
                <div class="sidebar-widget">
                    <h3>Categories</h3>
                    <ul class="category-list">
                        <li><a href="#"><i class="fas fa-mobile-alt"></i> Android Devices</a></li>
                        <li><a href="#"><i class="fas fa-code"></i> Development</a></li>
                        <li><a href="<?php echo home_url('/custom-roms/'); ?>"><i class="fas fa-cog"></i> Custom ROMs</a></li>
                        <li><a href="<?php echo home_url('/root-access/'); ?>"><i class="fas fa-terminal"></i> Root & Mods</a></li>
                        <li><a href="#"><i class="fas fa-rocket"></i> Performance</a></li>
                        <li><a href="#"><i class="fas fa-battery-full"></i> Battery</a></li>
                        <li><a href="#"><i class="fas fa-camera"></i> Camera</a></li>
                        <li><a href="#"><i class="fas fa-question-circle"></i> Troubleshooting</a></li>
                    </ul>
                </div>

                <div class="sidebar-widget">
                    <h3>Featured Threads</h3>
                    <div class="featured-threads">
                        <?php if ($featured_posts->have_posts()) : ?>
                            <?php while ($featured_posts->have_posts()) : $featured_posts->the_post(); ?>
                                <div class="featured-thread">
                                    <div class="featured-thread-icon">
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <div class="featured-thread-content">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        <div class="featured-thread-meta">
                                            <span>By <?php the_author(); ?> • <?php echo get_post_meta(get_the_ID(), 'post_views', true) ?: rand(1000, 20000); ?> views</span>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>
                        <?php else: ?>
                            <!-- Fallback featured threads -->
                            <div class="featured-thread">
                                <div class="featured-thread-icon">
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="featured-thread-content">
                                    <a href="#">Complete Android Root Guide 2024</a>
                                    <div class="featured-thread-meta">
                                        <span>By TechGuru_USA • 15.3k views</span>
                                    </div>
                                </div>
                            </div>
                            <div class="featured-thread">
                                <div class="featured-thread-icon">
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="featured-thread-content">
                                    <a href="#">Android 14 Feature Roundup</a>
                                    <div class="featured-thread-meta">
                                        <span>By AndroidPro_TX • 8.7k views</span>
                                    </div>
                                </div>
                            </div>
                            <div class="featured-thread">
                                <div class="featured-thread-icon">
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="featured-thread-content">
                                    <a href="#">Top 10 GCam Ports for 2024</a>
                                    <div class="featured-thread-meta">
                                        <span>By DevExpert_NY • 12.1k views</span>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="sidebar-widget">
                    <h3>Popular Tags</h3>
                    <div class="tag-cloud">
                        <span class="tag">Android 14</span>
                        <span class="tag">Samsung</span>
                        <span class="tag">Pixel</span>
                        <span class="tag">OnePlus</span>
                        <span class="tag">MIUI</span>
                        <span class="tag">Root</span>
                        <span class="tag">Magisk</span>
                        <span class="tag">Custom ROM</span>
                        <span class="tag">LineageOS</span>
                        <span class="tag">TWRP</span>
                        <span class="tag">Kernel</span>
                        <span class="tag">Xposed</span>
                        <span class="tag">Bootloader</span>
                        <span class="tag">ADB</span>
                        <span class="tag">Fastboot</span>
                    </div>
                </div>

                <div class="sidebar-widget">
                    <h3>Online Users</h3>
                    <div class="online-users">
                        <?php if (!empty($ai_users)) : ?>
                            <?php foreach (array_slice($ai_users, 0, 8) as $user) : ?>
                                <?php 
                                $user_avatar_seed = $user->ID % 70 + 1;
                                $user_country = get_user_meta($user->ID, 'ai_country', true);
                                ?>
                                <div class="user-avatar" title="<?php echo $user->display_name; ?> (<?php echo $user_country; ?>)">
                                    <img src="https://i.pravatar.cc/150?img=<?php echo $user_avatar_seed; ?>" alt="<?php echo $user->display_name; ?>">
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <!-- Fallback avatars -->
                            <?php for ($i = 11; $i <= 18; $i++) : ?>
                                <div class="user-avatar">
                                    <img src="https://i.pravatar.cc/150?img=<?php echo $i; ?>" alt="User Avatar">
                                </div>
                            <?php endfor; ?>
                        <?php endif; ?>
                    </div>
                    <p class="online-stats">
                        <strong><?php echo $total_online_users; ?></strong> users online now • <a href="#" class="view-all-link">View All</a>
                    </p>
                </div>

                <div class="sidebar-widget">
                    <h3>Latest Android News</h3>
                    <div class="featured-threads">
                        <div class="featured-thread">
                            <div class="featured-thread-icon">
                                <i class="fas fa-newspaper"></i>
                            </div>
                            <div class="featured-thread-content">
                                <a href="#">Google Announces Pixel 8a with Tensor G3</a>
                                <div class="featured-thread-meta">
                                    <span><?php echo rand(1, 6); ?> hours ago</span>
                                </div>
                            </div>
                        </div>
                        <div class="featured-thread">
                            <div class="featured-thread-icon">
                                <i class="fas fa-newspaper"></i>
                            </div>
                            <div class="featured-thread-content">
                                <a href="#">Samsung One UI 6.1 Rolling Out to Older Devices</a>
                                <div class="featured-thread-meta">
                                    <span>Yesterday</span>
                                </div>
                            </div>
                        </div>
                        <div class="featured-thread">
                            <div class="featured-thread-icon">
                                <i class="fas fa-newspaper"></i>
                            </div>
                            <div class="featured-thread-content">
                                <a href="#">LineageOS 21 Now Available for 50+ Devices</a>
                                <div class="featured-thread-meta">
                                    <span>2 days ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Popular Android Device Forums -->
        <div class="forum-section">
            <h2>Popular Android Device Forums</h2>
            <div class="device-forums-grid">
                <div class="device-forum-card">
                    <h3><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2f/Google_2015_logo.svg/2560px-Google_2015_logo.svg.png" alt="Google" class="brand-logo"> Google Pixel</h3>
                    <ul class="device-list">
                        <li><a href="#">Pixel 8 Pro</a></li>
                        <li><a href="#">Pixel 8</a></li>
                        <li><a href="#">Pixel 7 Series</a></li>
                        <li><a href="#">Pixel 6 Series</a></li>
                        <li><a href="#" class="view-all">View All Pixel Devices →</a></li>
                    </ul>
                </div>
                <div class="device-forum-card">
                    <h3><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/24/Samsung_Logo.svg/2560px-Samsung_Logo.svg.png" alt="Samsung" class="brand-logo"> Samsung Galaxy</h3>
                    <ul class="device-list">
                        <li><a href="#">Galaxy S24 Series</a></li>
                        <li><a href="#">Galaxy S23 Series</a></li>
                        <li><a href="#">Galaxy Z Fold/Flip</a></li>
                        <li><a href="#">Galaxy A Series</a></li>
                        <li><a href="#" class="view-all">View All Samsung Devices →</a></li>
                    </ul>
                </div>
                <div class="device-forum-card">
                    <h3><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ae/Xiaomi_logo_%282021-%29.svg/2560px-Xiaomi_logo_%282021-%29.svg.png" alt="Xiaomi" class="brand-logo"> Xiaomi</h3>
                    <ul class="device-list">
                        <li><a href="#">Xiaomi 14 Series</a></li>
                        <li><a href="#">Redmi Note 13 Series</a></li>
                        <li><a href="#">POCO F6 Series</a></li>
                        <li><a href="#">Xiaomi 13 Series</a></li>
                        <li><a href="#" class="view-all">View All Xiaomi Devices →</a></li>
                    </ul>
                </div>
                <div class="device-forum-card">
                    <h3><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c9/OnePlus_logo.svg/2560px-OnePlus_logo.svg.png" alt="OnePlus" class="brand-logo"> OnePlus</h3>
                    <ul class="device-list">
                        <li><a href="#">OnePlus 12 Series</a></li>
                        <li><a href="#">OnePlus 11 Series</a></li>
                        <li><a href="#">OnePlus Nord Series</a></li>
                        <li><a href="#">OnePlus 10 Series</a></li>
                        <li><a href="#" class="view-all">View All OnePlus Devices →</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Android Development Resources -->
        <div class="forum-section">
            <h2>Android Development Resources</h2>
            <div class="dev-resources-grid">
                <div class="resource-card">
                    <div class="resource-icon">
                        <i class="fas fa-code"></i>
                    </div>
                    <div class="resource-content">
                        <h3>Android SDK Tutorials</h3>
                        <p>Learn Android app development with our comprehensive SDK tutorials and guides.</p>
                        <a href="#" class="resource-link">View Tutorials →</a>
                    </div>
                </div>
                <div class="resource-card">
                    <div class="resource-icon">
                        <i class="fas fa-terminal"></i>
                    </div>
                    <div class="resource-content">
                        <h3>ADB & Fastboot Guides</h3>
                        <p>Master Android Debug Bridge and Fastboot commands for device control.</p>
                        <a href="#" class="resource-link">View Guides →</a>
                    </div>
                </div>
                <div class="resource-card">
                    <div class="resource-icon">
                        <i class="fas fa-unlock-alt"></i>
                    </div>
                    <div class="resource-content">
                        <h3>Bootloader Unlocking</h3>
                        <p>Device-specific guides for unlocking bootloaders safely and effectively.</p>
                        <a href="#" class="resource-link">View Guides →</a>
                    </div>
                </div>
                <div class="resource-card">
                    <div class="resource-icon">
                        <i class="fas fa-cog"></i>
                    </div>
                    <div class="resource-content">
                        <h3>Custom ROM Development</h3>
                        <p>Learn how to build, customize, and maintain your own Android ROM.</p>
                        <a href="#" class="resource-link">View Tutorials →</a>
                    </div>
                </div>
                <div class="resource-card">
                    <div class="resource-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <div class="resource-content">
                        <h3>Root & Security</h3>
                        <p>Safe rooting methods and security considerations for Android devices.</p>
                        <a href="#" class="resource-link">View Guides →</a>
                    </div>
                </div>
                <div class="resource-card">
                    <div class="resource-icon">
                        <i class="fas fa-microchip"></i>
                    </div>
                    <div class="resource-content">
                        <h3>Kernel Development</h3>
                        <p>Learn to compile and customize Android kernels for better performance.</p>
                        <a href="#" class="resource-link">View Tutorials →</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Floating Create Thread Button -->
    <a href="<?php echo admin_url('post-new.php?post_type=forum_post'); ?>" class="create-thread-btn" title="Create New Thread">
        <i class="fas fa-plus"></i>
    </a>
</main>

<?php get_footer(); ?>