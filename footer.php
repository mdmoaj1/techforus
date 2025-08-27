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

    <!-- Forum Post Creation Modal -->
<div id="forum-post-modal" class="auth-overlay" style="display: none;">
    <div class="auth-modal" style="max-width: 600px;">
        <div class="modal-header">
            <h3><i class="fas fa-edit"></i> Create New Forum Post</h3>
            <button class="modal-close">&times;</button>
        </div>
        <div class="modal-body">
            <form id="forum-post-form">
                <div class="form-group">
                    <label for="post-category">Category</label>
                    <select id="post-category" name="category" required>
                        <option value="">Select Category</option>
                        <option value="android">Android</option>
                        <option value="linux">Linux</option>
                        <option value="windows">Windows</option>
                        <option value="kaios">KaiOS</option>
                        <option value="security">Security</option>
                        <option value="development">Development</option>
                        <option value="general">General Discussion</option>
                    </select>
                    <i class="fas fa-folder form-icon"></i>
                </div>
                <div class="form-group" id="kaios-taxonomy-group" style="display: none;">
                    <label for="kaios-category">KaiOS Category</label>
                    <select id="kaios-category" name="kaios_category">
                        <option value="">Select KaiOS Category (Optional)</option>
                        <option value="kaios-development">KaiOS Development</option>
                        <option value="kaios-apps">KaiOS Apps</option>
                        <option value="kaios-devices">KaiOS Devices</option>
                        <option value="kaios-modding">KaiOS Modding</option>
                        <option value="kaios-support">KaiOS Support</option>
                    </select>
                    <i class="fas fa-mobile-alt form-icon"></i>
                    <small class="form-help">Choose a specific KaiOS subcategory</small>
                </div>
                <div class="form-group" id="tech-taxonomy-group" style="display: none;">
                    <label for="tech-category">Tech Category</label>
                    <select id="tech-category" name="tech_category">
                        <option value="">Select Tech Category (Optional)</option>
                        <option value="android">Android</option>
                        <option value="linux">Linux</option>
                        <option value="windows">Windows</option>
                        <option value="security">Security</option>
                        <option value="root-access">Root Access</option>
                        <option value="custom-roms">Custom ROMs</option>
                        <option value="general-tech">General Tech</option>
                    </select>
                    <i class="fas fa-cogs form-icon"></i>
                    <small class="form-help">Choose a specific tech subcategory</small>
                </div>
                <div class="form-group">
                    <label for="post-title">Post Title</label>
                    <input type="text" id="post-title" name="title" required maxlength="255">
                    <i class="fas fa-heading form-icon"></i>
                    <small class="form-help">Choose a clear, descriptive title</small>
                </div>
                <div class="form-group">
                    <label for="post-content">Content</label>
                    <textarea id="post-content" name="content" rows="10" required placeholder="Write your post content here..."></textarea>
                    <small class="form-help">You can use basic HTML formatting</small>
                </div>
                <div class="form-options">
                    <label class="checkbox-wrapper">
                        <input type="checkbox" id="post-guidelines">
                        <span class="checkmark"></span>
                        I agree to follow the community guidelines
                    </label>
                </div>
                <button type="submit" class="btn btn-primary btn-full">
                    <i class="fas fa-paper-plane"></i> Create Post
                </button>
            </form>
        </div>
        <div class="auth-loading" style="display: none;">
            <div class="loading-spinner"></div>
            <p>Creating your post...</p>
        </div>
    </div>
</div>

<!-- Forum Posts Browser Modal -->
<div id="forum-browse-modal" class="auth-overlay" style="display: none;">
    <div class="auth-modal" style="max-width: 800px; max-height: 90vh;">
        <div class="modal-header">
            <h3><i class="fas fa-list"></i> <span id="browse-category-title">Forum Posts</span></h3>
            <button class="modal-close">&times;</button>
        </div>
        <div class="modal-body">
            <div class="forum-filters">
                <div class="filter-group">
                    <label>Sort by:</label>
                    <select id="posts-sort">
                        <option value="latest">Latest Activity</option>
                        <option value="newest">Newest Posts</option>
                        <option value="most-replies">Most Replies</option>
                        <option value="most-views">Most Views</option>
                    </select>
                </div>
                <div class="filter-group">
                    <button class="btn btn-outline" id="refresh-posts">
                        <i class="fas fa-refresh"></i> Refresh
                    </button>
                </div>
            </div>
            <div id="forum-posts-list" class="forum-posts">
                <div class="loading-spinner"></div>
                <p>Loading posts...</p>
            </div>
            <div class="forum-pagination">
                <button id="load-more-posts" class="btn btn-outline" style="display: none;">
                    Load More Posts
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Post Reply Modal -->
<div id="forum-reply-modal" class="auth-overlay" style="display: none;">
    <div class="auth-modal" style="max-width: 600px;">
        <div class="modal-header">
            <h3><i class="fas fa-reply"></i> Reply to Post</h3>
            <button class="modal-close">&times;</button>
        </div>
        <div class="modal-body">
            <div class="original-post-preview">
                <h4>Replying to:</h4>
                <div class="post-preview-content"></div>
            </div>
            <form id="forum-reply-form">
                <input type="hidden" id="reply-post-id" name="post_id">
                <input type="hidden" id="reply-parent-id" name="parent_reply_id">
                <div class="form-group">
                    <label for="reply-content">Your Reply</label>
                    <textarea id="reply-content" name="content" rows="8" required placeholder="Write your reply here..."></textarea>
                    <small class="form-help">Be respectful and constructive in your response</small>
                </div>
                <button type="submit" class="btn btn-primary btn-full">
                    <i class="fas fa-reply"></i> Post Reply
                </button>
            </form>
        </div>
        <div class="auth-loading" style="display: none;">
            <div class="loading-spinner"></div>
            <p>Posting your reply...</p>
        </div>
    </div>
</div>

<?php wp_footer(); ?>
</body>
</html>
