<?php
/**
 * Template for displaying single forum posts
 * XDA Forum Design Clone
 */

get_header(); ?>

<div class="forum-discussion-container">
    <?php while (have_posts()) : the_post(); ?>
        
        <!-- Breadcrumb Navigation -->
        <div class="forum-breadcrumb">
            <div class="container">
                <nav class="breadcrumb-nav">
                    <a href="<?php echo home_url(); ?>" class="breadcrumb-link">
                        <i class="fas fa-home"></i> Home
                    </a>
                    <span class="breadcrumb-separator">/</span>
                    <a href="<?php echo home_url('/android/'); ?>" class="breadcrumb-link">Forums</a>
                    <span class="breadcrumb-separator">/</span>
                    <?php
                    $terms = get_the_terms(get_the_ID(), 'forum_category');
                    if ($terms && !is_wp_error($terms)) {
                        $term = array_shift($terms);
                        echo '<a href="' . get_term_link($term) . '" class="breadcrumb-link">' . esc_html($term->name) . '</a>';
                        echo '<span class="breadcrumb-separator">/</span>';
                    }
                    ?>
                    <span class="breadcrumb-current"><?php the_title(); ?></span>
                </nav>
            </div>
        </div>

        <!-- Forum Discussion Header -->
        <div class="forum-discussion-header">
            <div class="container">
                <div class="discussion-header-content">
                    <div class="discussion-title-section">
                        <h1 class="discussion-title"><?php the_title(); ?></h1>
                        <div class="discussion-meta">
                            <div class="meta-group">
                                <span class="meta-item">
                                    <i class="fas fa-eye"></i>
                                    <?php echo number_format(get_post_meta(get_the_ID(), 'post_views', true) ?: rand(50, 500)); ?> views
                                </span>
                                <span class="meta-item">
                                    <i class="fas fa-comments"></i>
                                    <?php echo get_comments_number(); ?> replies
                                </span>
                                <span class="meta-item">
                                    <i class="fas fa-clock"></i>
                                    <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ago'; ?>
                                </span>
                            </div>
                            <div class="discussion-tags">
                                <?php
                                $terms = get_the_terms(get_the_ID(), 'forum_category');
                                if ($terms && !is_wp_error($terms)) {
                                    foreach ($terms as $term) {
                                        echo '<span class="discussion-tag">' . esc_html($term->name) . '</span>';
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="discussion-actions">
                        <button class="action-btn watch-btn">
                            <i class="fas fa-eye"></i> Watch
                        </button>
                        <button class="action-btn share-btn">
                            <i class="fas fa-share"></i> Share
                        </button>
                        <button class="action-btn bookmark-btn">
                            <i class="fas fa-bookmark"></i> Bookmark
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Discussion Content -->
        <div class="forum-discussion-content">
            <div class="container">
                <div class="discussion-layout">
                    
                    <!-- Original Post -->
                    <div class="discussion-post original-post">
                        <div class="post-sidebar">
                            <div class="user-profile">
                                <div class="user-avatar">
                                    <?php 
                                    $author_id = get_the_author_meta('ID');
                                    $avatar_url = get_avatar_url($author_id, array('size' => 80));
                                    ?>
                                    <img src="<?php echo $avatar_url; ?>" alt="<?php the_author(); ?>" class="avatar-img">
                                    <?php 
                                    $is_ai = get_user_meta($author_id, 'is_ai_user', true);
                                    if ($is_ai) {
                                        $country = get_user_meta($author_id, 'ai_country', true);
                                        echo '<span class="user-country"><i class="fas fa-flag"></i> ' . esc_html($country) . '</span>';
                                    }
                                    ?>
                                </div>
                                <div class="user-info">
                                    <h3 class="username"><?php the_author(); ?></h3>
                                    <p class="user-role">
                                        <?php 
                                        $user_roles = get_userdata($author_id)->roles;
                                        echo ucfirst($user_roles[0]); 
                                        ?>
                                    </p>
                                    <div class="user-stats">
                                        <div class="stat-item">
                                            <span class="stat-label">Posts</span>
                                            <span class="stat-value"><?php echo count_user_posts($author_id, 'forum_post'); ?></span>
                                        </div>
                                        <div class="stat-item">
                                            <span class="stat-label">Joined</span>
                                            <span class="stat-value"><?php echo date('M Y', strtotime(get_userdata($author_id)->user_registered)); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="post-number">#1</div>
                        </div>
                        
                        <div class="post-content">
                            <div class="post-header">
                                <div class="post-meta">
                                    <span class="post-date"><?php echo get_the_date('F j, Y') . ' at ' . get_the_time('g:i A'); ?></span>
                                </div>
                                <div class="post-actions">
                                    <button class="post-action-btn quote-btn" title="Quote">
                                        <i class="fas fa-quote-right"></i>
                                    </button>
                                    <button class="post-action-btn like-btn" title="Like">
                                        <i class="fas fa-heart"></i>
                                    </button>
                                    <button class="post-action-btn report-btn" title="Report">
                                        <i class="fas fa-flag"></i>
                                    </button>
                                </div>
                            </div>
                            
                            <div class="post-body">
                                <?php the_content(); ?>
                            </div>
                            

                            
                            <div class="post-footer">
                                <div class="post-signature">
                                    <?php 
                                    $signature = get_user_meta($author_id, 'user_signature', true);
                                    if ($signature) {
                                        echo '<div class="signature-content">' . wp_kses_post($signature) . '</div>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Comments/Replies Section -->
                    <div class="discussion-replies">
                        <div class="replies-header">
                            <h2 class="replies-title">
                                <i class="fas fa-comments"></i>
                                <?php echo get_comments_number(); ?> Replies
                            </h2>
                            <div class="reply-controls">
                                <select class="sort-select">
                                    <option value="newest">Newest First</option>
                                    <option value="oldest">Oldest First</option>
                                    <option value="most-liked">Most Liked</option>
                                </select>
                            </div>
                        </div>

                        <?php if (have_comments()) : ?>
                            <div class="replies-list">
                                <?php
                                $comments = get_comments(array(
                                    'post_id' => get_the_ID(),
                                    'status' => 'approve',
                                    'order' => 'ASC'
                                ));
                                
                                $comment_number = 2; // Start from #2 since original post is #1
                                foreach ($comments as $comment) :
                                    $comment_author_id = $comment->user_id;
                                    $comment_is_ai = get_user_meta($comment_author_id, 'is_ai_user', true);
                                ?>
                                
                                <div class="discussion-post reply-post">
                                    <div class="post-sidebar">
                                        <div class="user-profile">
                                            <div class="user-avatar">
                                                <?php 
                                                $comment_avatar = get_avatar_url($comment_author_id, array('size' => 60));
                                                ?>
                                                <img src="<?php echo $comment_avatar; ?>" alt="<?php echo $comment->comment_author; ?>" class="avatar-img">
                                                <?php 
                                                if ($comment_is_ai) {
                                                    $comment_country = get_user_meta($comment_author_id, 'ai_country', true);
                                                    echo '<span class="user-country"><i class="fas fa-flag"></i> ' . esc_html($comment_country) . '</span>';
                                                }
                                                ?>
                                            </div>
                                            <div class="user-info">
                                                <h4 class="username"><?php echo $comment->comment_author; ?></h4>
                                                <p class="user-role">
                                                    <?php 
                                                    if ($comment_author_id) {
                                                        $user_roles = get_userdata($comment_author_id)->roles;
                                                        echo ucfirst($user_roles[0]); 
                                                    } else {
                                                        echo 'Guest';
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="post-number">#<?php echo $comment_number++; ?></div>
                                    </div>
                                    
                                    <div class="post-content">
                                        <div class="post-header">
                                            <div class="post-meta">
                                                <span class="post-date"><?php echo date('F j, Y \a\t g:i A', strtotime($comment->comment_date)); ?></span>
                                            </div>
                                            <div class="post-actions">
                                                <button class="post-action-btn quote-btn" title="Quote">
                                                    <i class="fas fa-quote-right"></i>
                                                </button>
                                                <button class="post-action-btn like-btn" title="Like">
                                                    <i class="fas fa-heart"></i>
                                                </button>
                                                <button class="post-action-btn report-btn" title="Report">
                                                    <i class="fas fa-flag"></i>
                                                </button>
                                            </div>
                                        </div>
                                        
                                        <div class="post-body">
                                            <?php echo wpautop($comment->comment_content); ?>
                                        </div>
                                        

                                    </div>
                                </div>
                                
                                <?php endforeach; ?>
                            </div>
                        <?php else : ?>
                            <div class="no-replies">
                                <div class="no-replies-content">
                                    <i class="fas fa-comments"></i>
                                    <h3>No replies yet</h3>
                                    <p>Be the first to share your thoughts!</p>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Reply Form -->
                    <div class="reply-form-section">
                        <div class="reply-form-header">
                            <h3>Post a Reply</h3>
                        </div>
                        
                        <?php if (comments_open()) : ?>
                            <div class="reply-form-container">
                                <?php
                                $args = array(
                                    'title_reply' => '',
                                    'label_submit' => 'Post Reply',
                                    'comment_field' => '<div class="form-group">
                                        <label for="comment">Your Reply</label>
                                        <textarea id="comment" name="comment" rows="8" placeholder="Type your reply here..." required></textarea>
                                    </div>',
                                    'fields' => array(
                                        'author' => '<div class="form-row">
                                            <div class="form-group">
                                                <label for="author">Name *</label>
                                                <input id="author" name="author" type="text" required>
                                            </div>',
                                        'email' => '<div class="form-group">
                                                <label for="email">Email *</label>
                                                <input id="email" name="email" type="email" required>
                                            </div></div>',
                                    ),
                                    'class_submit' => 'submit-btn',
                                    'submit_button' => '<button type="submit" class="submit-btn"><i class="fas fa-paper-plane"></i> Post Reply</button>',
                                );
                                comment_form($args);
                                ?>
                            </div>
                        <?php else : ?>
                            <div class="comments-closed">
                                <p><i class="fas fa-lock"></i> Comments are closed for this discussion.</p>
                            </div>
                        <?php endif; ?>
                    </div>

                </div>
            </div>
        </div>

    <?php endwhile; ?>
</div>

<!-- Quick Reply Floating Button -->
<div class="quick-reply-btn">
    <button class="floating-reply-btn" title="Quick Reply">
        <i class="fas fa-reply"></i>
    </button>
</div>

<style>
/* Modern Forum Thread Design */
.forum-discussion-container {
    background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
    min-height: 100vh;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Oxygen', 'Ubuntu', 'Cantarell', sans-serif;
    font-size: 14px;
    color: #2c3e50;
    line-height: 1.6;
}

/* Modern Breadcrumb */
.forum-breadcrumb {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    padding: 16px 0;
    box-shadow: 0 2px 20px rgba(0, 0, 0, 0.05);
}

.breadcrumb-nav {
    display: flex;
    align-items: center;
    font-size: 14px;
}

.breadcrumb-link {
    color: #3498db;
    text-decoration: none;
    font-weight: 500;
    transition: all 0.3s ease;
    padding: 4px 8px;
    border-radius: 6px;
}

.breadcrumb-link:hover {
    color: #2980b9;
    background: rgba(52, 152, 219, 0.1);
    transform: translateY(-1px);
}

.breadcrumb-separator {
    margin: 0 8px;
    color: #7f8c8d;
    font-weight: 300;
}

.breadcrumb-current {
    color: #2c3e50;
    font-weight: 600;
    background: rgba(52, 152, 219, 0.1);
    padding: 4px 12px;
    border-radius: 20px;
}

/* Modern Thread Header */
.forum-discussion-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    padding: 32px 0;
    color: white;
    position: relative;
    overflow: hidden;
}

.forum-discussion-header::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
}

.discussion-header-content {
    position: relative;
    z-index: 2;
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 24px;
}

.discussion-title {
    font-size: 28px;
    font-weight: 700;
    color: #ffffff;
    margin: 0 0 16px 0;
    line-height: 1.3;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
}

.discussion-meta {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 14px;
    flex-wrap: wrap;
    gap: 16px;
}

.meta-group {
    display: flex;
    gap: 24px;
    flex-wrap: wrap;
}

.meta-item {
    color: rgba(255, 255, 255, 0.9);
    display: flex;
    align-items: center;
    background: rgba(255, 255, 255, 0.1);
    padding: 6px 12px;
    border-radius: 20px;
    backdrop-filter: blur(10px);
}

.meta-item i {
    margin-right: 8px;
    color: #ffffff;
}

.discussion-tags {
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
}

.discussion-tag {
    background: rgba(255, 255, 255, 0.2);
    border: 1px solid rgba(255, 255, 255, 0.3);
    color: #ffffff;
    padding: 6px 14px;
    font-size: 12px;
    text-decoration: none;
    border-radius: 20px;
    font-weight: 500;
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
}

.discussion-tag:hover {
    background: rgba(255, 255, 255, 0.3);
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
}

.discussion-actions {
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
}

.action-btn {
    background: rgba(255, 255, 255, 0.2);
    border: 1px solid rgba(255, 255, 255, 0.3);
    color: #ffffff;
    padding: 10px 16px;
    cursor: pointer;
    font-size: 13px;
    text-decoration: none;
    border-radius: 25px;
    font-weight: 500;
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
}

.action-btn:hover {
    background: rgba(255, 255, 255, 0.3);
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
}

.action-btn i {
    margin-right: 6px;
}

/* Modern Discussion Content */
.forum-discussion-content {
    padding: 32px 0;
}

.discussion-layout {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 24px;
}

/* Modern Card-Based Posts */
.discussion-post {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    border-radius: 16px;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
    margin-bottom: 24px;
    overflow: hidden;
    transition: all 0.3s ease;
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.discussion-post:hover {
    transform: translateY(-4px);
    box-shadow: 0 16px 48px rgba(0, 0, 0, 0.15);
}

.original-post {
    border-left: 6px solid #3498db;
    background: linear-gradient(135deg, rgba(52, 152, 219, 0.05) 0%, rgba(255, 255, 255, 0.95) 100%);
}

.post-sidebar {
    width: 240px;
    padding: 24px;
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    border-right: 1px solid rgba(0, 0, 0, 0.08);
    display: inline-block;
    vertical-align: top;
    text-align: center;
    min-height: 200px;
}

.user-profile {
    margin-bottom: 16px;
}

.user-avatar {
    position: relative;
    margin-bottom: 16px;
    display: inline-block;
}

.avatar-img {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    border: 4px solid #ffffff;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.15);
    transition: all 0.3s ease;
}

.avatar-img:hover {
    transform: scale(1.05);
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
}

.reply-post .avatar-img {
    width: 64px;
    height: 64px;
}

.user-country {
    position: absolute;
    bottom: -2px;
    right: -2px;
    background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
    color: #ffffff;
    padding: 4px 8px;
    font-size: 10px;
    border-radius: 12px;
    font-weight: 600;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
}

.username {
    color: #2c3e50;
    font-size: 16px;
    font-weight: 700;
    margin: 0 0 6px 0;
    text-decoration: none;
    transition: all 0.3s ease;
}

.username:hover {
    color: #3498db;
    transform: translateY(-1px);
}

.reply-post .username {
    font-size: 14px;
}

.user-role {
    color: #7f8c8d;
    font-size: 12px;
    margin: 0 0 16px 0;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    background: rgba(52, 152, 219, 0.1);
    padding: 4px 12px;
    border-radius: 20px;
    display: inline-block;
}

.user-stats {
    font-size: 12px;
    line-height: 1.6;
    background: rgba(255, 255, 255, 0.7);
    padding: 12px;
    border-radius: 12px;
    margin-bottom: 16px;
}

.stat-item {
    margin-bottom: 8px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.stat-label {
    color: #7f8c8d;
    font-weight: 500;
}

.stat-value {
    color: #2c3e50;
    font-weight: 700;
}

.post-number {
    background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
    color: #ffffff;
    padding: 8px 16px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 700;
    box-shadow: 0 4px 12px rgba(52, 152, 219, 0.3);
    display: inline-block;
}

/* Modern Post Content */
.post-content {
    display: inline-block;
    width: calc(100% - 240px);
    padding: 24px;
    vertical-align: top;
    font-size: 15px;
    line-height: 1.7;
}

.post-header {
    border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
    padding-bottom: 16px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.post-date {
    color: #7f8c8d;
    font-size: 13px;
    font-weight: 500;
    background: rgba(127, 140, 141, 0.1);
    padding: 6px 12px;
    border-radius: 20px;
}

.post-actions {
    display: flex;
    gap: 8px;
}

.post-action-btn {
    background: linear-gradient(135deg, #ecf0f1 0%, #bdc3c7 100%);
    border: 1px solid rgba(0, 0, 0, 0.1);
    color: #2c3e50;
    padding: 8px 12px;
    cursor: pointer;
    font-size: 12px;
    text-decoration: none;
    border-radius: 20px;
    font-weight: 500;
    transition: all 0.3s ease;
}

.post-action-btn:hover {
    background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
    color: #ffffff;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(52, 152, 219, 0.3);
}

.post-body {
    color: #2c3e50;
    line-height: 1.7;
    margin-bottom: 20px;
    font-size: 15px;
}

.post-body h1, .post-body h2, .post-body h3 {
    color: #2c3e50;
    margin: 24px 0 16px 0;
    font-weight: 700;
    line-height: 1.3;
}

.post-body h1 { 
    font-size: 24px; 
    background: linear-gradient(135deg, #3498db, #9b59b6);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}
.post-body h2 { 
    font-size: 20px;
    color: #34495e;
}
.post-body h3 { 
    font-size: 18px;
    color: #34495e;
}

.post-body ul, .post-body ol {
    margin: 16px 0;
    padding-left: 24px;
}

.post-body li {
    margin-bottom: 8px;
    position: relative;
}

.post-body ul li::marker {
    color: #3498db;
}

.post-body code {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    border: 1px solid rgba(52, 152, 219, 0.2);
    padding: 4px 8px;
    border-radius: 6px;
    font-family: 'SF Mono', 'Monaco', 'Inconsolata', 'Roboto Mono', monospace;
    font-size: 13px;
    color: #e74c3c;
    font-weight: 500;
}

.post-body pre {
    background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
    border: 1px solid rgba(52, 152, 219, 0.3);
    padding: 20px;
    border-radius: 12px;
    overflow-x: auto;
    margin: 20px 0;
    font-family: 'SF Mono', 'Monaco', 'Inconsolata', 'Roboto Mono', monospace;
    font-size: 13px;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
}

.post-body pre code {
    background: none;
    border: none;
    padding: 0;
    color: #ecf0f1;
    font-weight: 400;
}

.post-body a {
    color: #3498db;
    text-decoration: none;
    font-weight: 500;
    border-bottom: 2px solid transparent;
    transition: all 0.3s ease;
}

.post-body a:hover {
    color: #2980b9;
    border-bottom-color: #3498db;
    transform: translateY(-1px);
}

.post-body strong {
    font-weight: 700;
    color: #2c3e50;
    background: linear-gradient(135deg, rgba(52, 152, 219, 0.1), rgba(155, 89, 182, 0.1));
    padding: 2px 4px;
    border-radius: 4px;
}

.post-body em {
    font-style: italic;
    color: #7f8c8d;
}

.post-body p {
    margin-bottom: 16px;
}



/* Modern Replies Section */
.discussion-replies {
    margin-top: 32px;
}

.replies-header {
    background: linear-gradient(135deg, rgba(52, 152, 219, 0.1) 0%, rgba(155, 89, 182, 0.1) 100%);
    padding: 20px 24px;
    border-radius: 12px 12px 0 0;
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 14px;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(52, 152, 219, 0.2);
}

.replies-title {
    color: #2c3e50;
    font-size: 18px;
    font-weight: 700;
    margin: 0;
    display: flex;
    align-items: center;
}

.replies-title i {
    margin-right: 8px;
    color: #3498db;
    font-size: 20px;
}

.sort-select {
    background: rgba(255, 255, 255, 0.9);
    border: 1px solid rgba(52, 152, 219, 0.3);
    padding: 8px 12px;
    font-size: 13px;
    color: #2c3e50;
    border-radius: 20px;
    font-weight: 500;
    backdrop-filter: blur(10px);
}

.no-replies {
    padding: 48px;
    text-align: center;
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    border-radius: 0 0 12px 12px;
    border: 1px solid rgba(52, 152, 219, 0.2);
    border-top: none;
}

.no-replies-content i {
    font-size: 48px;
    color: #bdc3c7;
    margin-bottom: 16px;
    opacity: 0.7;
}

.no-replies-content h3 {
    color: #2c3e50;
    margin-bottom: 8px;
    font-size: 20px;
    font-weight: 600;
}

.no-replies-content p {
    color: #7f8c8d;
    font-size: 14px;
    font-weight: 400;
}

/* Modern Reply Form */
.reply-form-section {
    background: linear-gradient(135deg, rgba(52, 152, 219, 0.05) 0%, rgba(155, 89, 182, 0.05) 100%);
    padding: 32px 24px;
    margin-top: 32px;
    border-radius: 16px;
    backdrop-filter: blur(20px);
    border: 1px solid rgba(52, 152, 219, 0.2);
}

.reply-form-header h3 {
    color: #2c3e50;
    margin-bottom: 24px;
    font-weight: 700;
    font-size: 20px;
    display: flex;
    align-items: center;
}

.reply-form-header h3::before {
    content: '✍️';
    margin-right: 12px;
    font-size: 24px;
}

.reply-form-container {
    background: rgba(255, 255, 255, 0.95);
    padding: 24px;
    border-radius: 12px;
    backdrop-filter: blur(20px);
    border: 1px solid rgba(52, 152, 219, 0.2);
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
}

.form-group {
    margin-bottom: 20px;
}

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 16px;
}

.form-group label {
    display: block;
    color: #2c3e50;
    font-weight: 600;
    margin-bottom: 8px;
    font-size: 14px;
}

.form-group input,
.form-group textarea {
    width: 100%;
    padding: 12px 16px;
    border: 2px solid rgba(52, 152, 219, 0.2);
    border-radius: 8px;
    font-size: 14px;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
    transition: all 0.3s ease;
    background: rgba(255, 255, 255, 0.9);
}

.form-group input:focus,
.form-group textarea:focus {
    outline: none;
    border-color: #3498db;
    background: #ffffff;
    box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
    transform: translateY(-2px);
}

.form-group textarea {
    min-height: 120px;
    resize: vertical;
}

.submit-btn {
    background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
    color: #ffffff;
    border: none;
    padding: 14px 28px;
    font-weight: 600;
    cursor: pointer;
    font-size: 14px;
    border-radius: 25px;
    transition: all 0.3s ease;
    box-shadow: 0 4px 16px rgba(52, 152, 219, 0.3);
}

.submit-btn:hover {
    background: linear-gradient(135deg, #2980b9 0%, #3498db 100%);
    transform: translateY(-2px);
    box-shadow: 0 8px 24px rgba(52, 152, 219, 0.4);
}

.submit-btn i {
    margin-right: 8px;
}

.comments-closed {
    text-align: center;
    padding: 32px;
    color: #7f8c8d;
    font-size: 16px;
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    border-radius: 16px;
    border: 1px solid rgba(52, 152, 219, 0.2);
}

/* Modern Quick Reply Button */
.quick-reply-btn {
    position: fixed;
    bottom: 32px;
    right: 32px;
    z-index: 1000;
}

.floating-reply-btn {
    width: 64px;
    height: 64px;
    background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
    color: #ffffff;
    border: none;
    border-radius: 50%;
    font-size: 20px;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 8px 24px rgba(52, 152, 219, 0.4);
}

.floating-reply-btn:hover {
    background: linear-gradient(135deg, #2980b9 0%, #3498db 100%);
    transform: translateY(-4px) scale(1.1);
    box-shadow: 0 12px 32px rgba(52, 152, 219, 0.5);
}

/* Modern Responsive Design */
@media (max-width: 768px) {
    .forum-discussion-container {
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
    }
    
    .discussion-header-content {
        flex-direction: column;
        align-items: stretch;
        gap: 16px;
    }
    
    .discussion-title {
        font-size: 22px;
    }
    
    .discussion-post {
        margin-bottom: 16px;
    }
    
    .post-sidebar {
        width: 100%;
        display: block;
        border-right: none;
        border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        padding: 16px;
        text-align: left;
    }
    
    .user-profile {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 0;
    }
    
    .user-avatar {
        margin-bottom: 0;
    }
    
    .avatar-img {
        width: 48px;
        height: 48px;
    }
    
    .post-content {
        width: 100%;
        display: block;
        padding: 16px;
    }
    
    .form-row {
        grid-template-columns: 1fr;
        gap: 12px;
    }
    
    .meta-group {
        flex-direction: column;
        gap: 12px;
    }
    
    .discussion-actions {
        margin-top: 16px;
        justify-content: center;
    }
    
    .floating-reply-btn {
        width: 56px;
        height: 56px;
        bottom: 24px;
        right: 24px;
        font-size: 18px;
    }
    
    .discussion-layout {
        padding: 0 16px;
    }
}

.container {
    max-width: 1024px;
    margin: 0 auto;
    padding: 0;
}

/* XDA Table Layout Override */
.discussion-post table {
    width: 100%;
    border-collapse: collapse;
}

.discussion-post td {
    vertical-align: top;
    border: 1px solid #d6d6d6;
}

/* Additional XDA styling */
.post-signature {
    border-top: 1px solid #d6d6d6;
    margin-top: 8px;
    padding-top: 5px;
    font-size: 10px;
    color: #666666;
    font-style: italic;
}

.post-footer {
    margin-top: 8px;
}

/* XDA Post Icons */
.post-icons {
    float: right;
    margin-left: 5px;
}

.post-icon {
    margin-left: 3px;
    cursor: pointer;
}

.post-icon img {
    width: 16px;
    height: 16px;
    border: none;
}
</style>

<script>
jQuery(document).ready(function($) {
    // Floating reply button scroll to form
    $('.floating-reply-btn').on('click', function() {
        $('html, body').animate({
            scrollTop: $('.reply-form-section').offset().top - 100
        }, 500);
        $('#comment').focus();
    });
    
    // Quote functionality
    $('.quote-btn').on('click', function() {
        const postContent = $(this).closest('.post-content').find('.post-body').text();
        const author = $(this).closest('.discussion-post').find('.username').text();
        const quote = `[quote="${author}"]${postContent.substring(0, 200)}...[/quote]\n\n`;
        
        const textarea = $('#comment');
        textarea.val(quote + textarea.val());
        $('html, body').animate({
            scrollTop: $('.reply-form-section').offset().top - 100
        }, 500);
        textarea.focus();
    });
    
    // Like functionality (placeholder)
    $('.like-btn').on('click', function() {
        $(this).toggleClass('liked');
        $(this).css('color', $(this).hasClass('liked') ? '#e74c3c' : '');
    });
    
    // Sort replies
    $('.sort-select').on('change', function() {
        // Placeholder for sorting functionality
        console.log('Sort by:', $(this).val());
    });
});
</script>

<?php get_footer(); ?>
