/**
 * Forum Authentication System JavaScript
 */

(function($) {
    'use strict';

    $(document).ready(function() {
        initForumAuth();
    });

    function initForumAuth() {
        // Modal management
        $('.forum-login-btn').on('click', showLoginModal);
        $('.forum-register-btn').on('click', showRegisterModal);
        $('.switch-to-register').on('click', switchToRegister);
        $('.switch-to-login').on('click', switchToLogin);
        $('.modal-close, .auth-overlay').on('click', closeModals);
        
        // Forum post management
        $('.create-post-btn').on('click', showCreatePostModal);
        $('.browse-posts-btn').on('click', showBrowsePostsModal);
        $('#forum-post-form').on('submit', handleCreatePost);
        $('#forum-reply-form').on('submit', handleCreateReply);
        $('#refresh-posts').on('click', refreshPosts);
        $('#load-more-posts').on('click', loadMorePosts);
        
        // Handle category change for taxonomy display
        $('#post-category').on('change', handleCategoryChange);
        
        // Prevent modal from closing when clicking inside
        $('.auth-modal').on('click', function(e) {
            e.stopPropagation();
        });

        // Form submissions
        $('#forum-login-form').on('submit', handleLogin);
        $('#forum-register-form').on('submit', handleRegister);
        
        // Logout functionality
        $('.forum-logout-btn').on('click', handleLogout);
        
        // Password strength checker
        $('#register-password').on('input', checkPasswordStrength);
        $('#register-confirm-password').on('input', checkPasswordMatch);
        
        // Form validation
        $('#register-username').on('input', validateUsername);
        $('#register-email').on('input', validateEmail);
        
        // Real-time form validation
        $('.auth-modal input').on('blur', validateField);
        
        // Keyboard navigation
        $(document).on('keydown', function(e) {
            if (e.key === 'Escape') {
                closeModals();
            }
        });
    }

    function showLoginModal(e) {
        e.preventDefault();
        $('#forum-auth-overlay').show();
        $('#login-modal').show();
        $('#register-modal').hide();
        $('#login-username').focus();
        clearMessages();
    }

    function showRegisterModal(e) {
        e.preventDefault();
        $('#forum-auth-overlay').show();
        $('#register-modal').show();
        $('#login-modal').hide();
        $('#register-username').focus();
        clearMessages();
    }

    function switchToRegister(e) {
        e.preventDefault();
        $('#login-modal').hide();
        $('#register-modal').show();
        $('#register-username').focus();
        clearMessages();
    }

    function switchToLogin(e) {
        e.preventDefault();
        $('#register-modal').hide();
        $('#login-modal').show();
        $('#login-username').focus();
        clearMessages();
    }

    function closeModals() {
        $('#forum-auth-overlay').hide();
        $('#login-modal, #register-modal').hide();
        clearMessages();
        resetForms();
    }

    function handleLogin(e) {
        e.preventDefault();
        
        const form = $(this);
        const formData = {
            action: 'forum_login',
            nonce: forumAuth.nonce,
            username: $('#login-username').val(),
            password: $('#login-password').val()
        };
        
        showLoading('#login-modal');
        
        $.ajax({
            url: forumAuth.ajaxUrl,
            type: 'POST',
            data: formData,
            success: function(response) {
                hideLoading('#login-modal');
                
                if (response.success) {
                    showMessage('success', response.message, '#login-modal');
                    setTimeout(function() {
                        location.reload();
                    }, 1500);
                } else {
                    showMessage('error', response.message, '#login-modal');
                }
            },
            error: function() {
                hideLoading('#login-modal');
                showMessage('error', 'An error occurred. Please try again.', '#login-modal');
            }
        });
    }

    function handleRegister(e) {
        e.preventDefault();
        
        const form = $(this);
        const password = $('#register-password').val();
        const confirmPassword = $('#register-confirm-password').val();
        
        // Client-side validation
        if (password !== confirmPassword) {
            showMessage('error', 'Passwords do not match.', '#register-modal');
            return;
        }
        
        if (!$('#agree-terms').is(':checked')) {
            showMessage('error', 'Please agree to the Terms of Service.', '#register-modal');
            return;
        }
        
        const formData = {
            action: 'forum_register',
            nonce: forumAuth.nonce,
            username: $('#register-username').val(),
            email: $('#register-email').val(),
            password: password,
            display_name: $('#register-display-name').val()
        };
        
        showLoading('#register-modal');
        
        $.ajax({
            url: forumAuth.ajaxUrl,
            type: 'POST',
            data: formData,
            success: function(response) {
                hideLoading('#register-modal');
                
                if (response.success) {
                    showMessage('success', response.message, '#register-modal');
                    setTimeout(function() {
                        switchToLogin();
                        showMessage('info', 'Please login with your new account.', '#login-modal');
                    }, 2000);
                } else {
                    showMessage('error', response.message, '#register-modal');
                }
            },
            error: function() {
                hideLoading('#register-modal');
                showMessage('error', 'An error occurred. Please try again.', '#register-modal');
            }
        });
    }

    function handleLogout(e) {
        e.preventDefault();
        
        if (!confirm('Are you sure you want to logout?')) {
            return;
        }
        
        $.ajax({
            url: forumAuth.ajaxUrl,
            type: 'POST',
            data: {
                action: 'forum_logout',
                nonce: forumAuth.nonce
            },
            success: function(response) {
                if (response.success) {
                    location.reload();
                }
            }
        });
    }

    function checkPasswordStrength() {
        const password = $(this).val();
        const strengthFill = $('.strength-fill');
        const strengthText = $('.strength-text');
        
        let strength = 0;
        let text = 'Enter password';
        
        if (password.length >= 8) strength++;
        if (password.match(/[a-z]/)) strength++;
        if (password.match(/[A-Z]/)) strength++;
        if (password.match(/[0-9]/)) strength++;
        if (password.match(/[^a-zA-Z0-9]/)) strength++;
        
        strengthFill.removeClass('weak fair good strong');
        
        if (password.length === 0) {
            strengthFill.css('width', '0%');
        } else if (strength <= 2) {
            strengthFill.addClass('weak');
            text = 'Weak password';
        } else if (strength === 3) {
            strengthFill.addClass('fair');
            text = 'Fair password';
        } else if (strength === 4) {
            strengthFill.addClass('good');
            text = 'Good password';
        } else {
            strengthFill.addClass('strong');
            text = 'Strong password';
        }
        
        strengthText.text(text);
        checkPasswordMatch();
    }

    function checkPasswordMatch() {
        const password = $('#register-password').val();
        const confirmPassword = $('#register-confirm-password').val();
        const confirmField = $('#register-confirm-password');
        
        if (confirmPassword.length > 0) {
            if (password === confirmPassword) {
                confirmField.css('border-color', '#10b981');
            } else {
                confirmField.css('border-color', '#ef4444');
            }
        } else {
            confirmField.css('border-color', '');
        }
    }

    function validateUsername() {
        const username = $(this).val();
        const field = $(this);
        
        if (username.length < 3) {
            field.css('border-color', '#ef4444');
            return false;
        } else if (!/^[a-zA-Z0-9_]+$/.test(username)) {
            field.css('border-color', '#ef4444');
            return false;
        } else {
            field.css('border-color', '#10b981');
            return true;
        }
    }

    function validateEmail() {
        const email = $(this).val();
        const field = $(this);
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        
        if (emailRegex.test(email)) {
            field.css('border-color', '#10b981');
            return true;
        } else {
            field.css('border-color', '#ef4444');
            return false;
        }
    }

    function validateField() {
        const field = $(this);
        const value = field.val();
        
        if (field.prop('required') && value.length === 0) {
            field.css('border-color', '#ef4444');
        } else {
            field.css('border-color', '');
        }
    }

    function showLoading(modal) {
        $(modal + ' .modal-body').hide();
        $(modal + ' .auth-loading').show();
    }

    function hideLoading(modal) {
        $(modal + ' .auth-loading').hide();
        $(modal + ' .modal-body').show();
    }

    function showMessage(type, message, modal) {
        clearMessages();
        
        const messageHtml = `
            <div class="auth-message ${type}">
                <i class="fas fa-${getMessageIcon(type)}"></i>
                ${message}
            </div>
        `;
        
        $(modal + ' .modal-body').prepend(messageHtml);
        
        // Auto-hide success messages
        if (type === 'success') {
            setTimeout(function() {
                $('.auth-message').fadeOut();
            }, 3000);
        }
    }

    function getMessageIcon(type) {
        switch (type) {
            case 'success': return 'check-circle';
            case 'error': return 'exclamation-circle';
            case 'info': return 'info-circle';
            default: return 'info-circle';
        }
    }

    function clearMessages() {
        $('.auth-message').remove();
    }

    function resetForms() {
        $('#forum-login-form, #forum-register-form')[0].reset();
        $('.form-group input').css('border-color', '');
        $('.strength-fill').removeClass('weak fair good strong').css('width', '0%');
        $('.strength-text').text('Enter password');
    }

    // Auto-fill display name from username
    $('#register-username').on('input', function() {
        const username = $(this).val();
        const displayNameField = $('#register-display-name');
        
        if (displayNameField.val() === '' || displayNameField.data('auto-filled')) {
            displayNameField.val(username).data('auto-filled', true);
        }
    });

    $('#register-display-name').on('input', function() {
        $(this).data('auto-filled', false);
    });

    // Enhanced form interactions
    $('.form-group input').on('focus', function() {
        $(this).parent().addClass('focused');
    }).on('blur', function() {
        $(this).parent().removeClass('focused');
        if ($(this).val() !== '') {
            $(this).parent().addClass('filled');
        } else {
            $(this).parent().removeClass('filled');
        }
    });

    // Forum Post Management Functions
    let currentPostsPage = 1;
    let currentCategory = '';

    function showCreatePostModal(e) {
        e.preventDefault();
        
        const category = $(this).data('category');
        if (category) {
            $('#post-category').val(category);
        }
        
        $('#forum-post-modal').show();
        $('#post-title').focus();
        clearMessages();
    }

    function showBrowsePostsModal(e) {
        e.preventDefault();
        
        currentCategory = $(this).data('category') || '';
        currentPostsPage = 1;
        
        const categoryTitle = currentCategory ? 
            currentCategory.charAt(0).toUpperCase() + currentCategory.slice(1) + ' Forum' : 
            'All Forum Posts';
        
        $('#browse-category-title').text(categoryTitle);
        $('#forum-browse-modal').show();
        
        loadPosts();
    }

    function handleCreatePost(e) {
        e.preventDefault();
        
        if (!$('#post-guidelines').is(':checked')) {
            showMessage('error', 'Please agree to follow the community guidelines.', '#forum-post-modal');
            return;
        }
        
        const formData = {
            action: 'create_forum_post',
            nonce: forumAuth.nonce,
            category: $('#post-category').val(),
            title: $('#post-title').val(),
            content: $('#post-content').val(),
            kaios_category: $('#kaios-category').val(),
            tech_category: $('#tech-category').val()
        };
        
        showLoading('#forum-post-modal');
        
        $.ajax({
            url: forumAuth.ajaxUrl,
            type: 'POST',
            data: formData,
            success: function(response) {
                hideLoading('#forum-post-modal');
                
                if (response.success) {
                    showMessage('success', response.message, '#forum-post-modal');
                    $('#forum-post-form')[0].reset();
                    setTimeout(function() {
                        closeModals();
                    }, 2000);
                } else {
                    showMessage('error', response.message, '#forum-post-modal');
                }
            },
            error: function() {
                hideLoading('#forum-post-modal');
                showMessage('error', 'An error occurred. Please try again.', '#forum-post-modal');
            }
        });
    }

    function handleCreateReply(e) {
        e.preventDefault();
        
        const formData = {
            action: 'create_forum_reply',
            nonce: forumAuth.nonce,
            post_id: $('#reply-post-id').val(),
            content: $('#reply-content').val(),
            parent_reply_id: $('#reply-parent-id').val() || null
        };
        
        showLoading('#forum-reply-modal');
        
        $.ajax({
            url: forumAuth.ajaxUrl,
            type: 'POST',
            data: formData,
            success: function(response) {
                hideLoading('#forum-reply-modal');
                
                if (response.success) {
                    showMessage('success', response.message, '#forum-reply-modal');
                    $('#forum-reply-form')[0].reset();
                    setTimeout(function() {
                        closeModals();
                    }, 2000);
                } else {
                    showMessage('error', response.message, '#forum-reply-modal');
                }
            },
            error: function() {
                hideLoading('#forum-reply-modal');
                showMessage('error', 'An error occurred. Please try again.', '#forum-reply-modal');
            }
        });
    }

    function loadPosts() {
        const postsContainer = $('#forum-posts-list');
        
        if (currentPostsPage === 1) {
            postsContainer.html('<div class="loading-spinner"></div><p>Loading posts...</p>');
        }
        
        $.ajax({
            url: forumAuth.ajaxUrl,
            type: 'POST',
            data: {
                action: 'get_forum_posts',
                nonce: forumAuth.nonce,
                category: currentCategory,
                page: currentPostsPage
            },
            success: function(response) {
                if (response.success) {
                    if (currentPostsPage === 1) {
                        postsContainer.empty();
                    }
                    
                    if (response.posts.length === 0) {
                        if (currentPostsPage === 1) {
                            postsContainer.html('<div class="no-posts"><p>No posts found in this category yet.</p><button class="btn btn-primary create-post-btn" data-category="' + currentCategory + '">Be the first to post!</button></div>');
                        } else {
                            $('#load-more-posts').hide();
                        }
                        return;
                    }
                    
                    response.posts.forEach(function(post) {
                        const postHtml = createPostHTML(post);
                        postsContainer.append(postHtml);
                    });
                    
                    if (response.posts.length === 20) {
                        $('#load-more-posts').show();
                    } else {
                        $('#load-more-posts').hide();
                    }
                } else {
                    postsContainer.html('<div class="error-message">Failed to load posts. Please try again.</div>');
                }
            },
            error: function() {
                postsContainer.html('<div class="error-message">An error occurred while loading posts.</div>');
            }
        });
    }

    function createPostHTML(post) {
        const timeAgo = formatTimeAgo(post.created_date);
        const avatar = post.avatar_url || 'https://www.gravatar.com/avatar/' + btoa(post.display_name) + '?d=identicon&s=40';
        
        return `
            <div class="forum-post-item" data-post-id="${post.id}">
                <div class="post-avatar">
                    <img src="${avatar}" alt="${post.display_name}" loading="lazy">
                </div>
                <div class="post-content">
                    <div class="post-header">
                        <h4 class="post-title">${post.title}</h4>
                        <div class="post-meta">
                            <span class="post-author">${post.display_name}</span>
                            <span class="post-time">${timeAgo}</span>
                            <span class="post-category">${post.category}</span>
                        </div>
                    </div>
                    <div class="post-excerpt">
                        ${post.content.substring(0, 200)}${post.content.length > 200 ? '...' : ''}
                    </div>
                    <div class="post-stats">
                        <span class="stat-item">
                            <i class="fas fa-eye"></i> ${post.views} views
                        </span>
                        <span class="stat-item">
                            <i class="fas fa-comments"></i> ${post.replies_count} replies
                        </span>
                        <button class="btn btn-sm btn-outline reply-btn" data-post-id="${post.id}" data-post-title="${post.title}">
                            <i class="fas fa-reply"></i> Reply
                        </button>
                    </div>
                </div>
            </div>
        `;
    }

    function formatTimeAgo(dateString) {
        const now = new Date();
        const date = new Date(dateString);
        const diffInSeconds = Math.floor((now - date) / 1000);
        
        if (diffInSeconds < 60) return 'just now';
        if (diffInSeconds < 3600) return Math.floor(diffInSeconds / 60) + ' minutes ago';
        if (diffInSeconds < 86400) return Math.floor(diffInSeconds / 3600) + ' hours ago';
        if (diffInSeconds < 604800) return Math.floor(diffInSeconds / 86400) + ' days ago';
        
        return date.toLocaleDateString();
    }

    function refreshPosts() {
        currentPostsPage = 1;
        loadPosts();
    }

    function loadMorePosts() {
        currentPostsPage++;
        loadPosts();
    }

    // Handle reply button clicks
    $(document).on('click', '.reply-btn', function() {
        if (!forumAuth.isLoggedIn) {
            showLoginModal();
            return;
        }
        
        const postId = $(this).data('post-id');
        const postTitle = $(this).data('post-title');
        
        $('#reply-post-id').val(postId);
        $('#reply-parent-id').val('');
        $('.post-preview-content').html('<strong>' + postTitle + '</strong>');
        $('#forum-reply-modal').show();
        $('#reply-content').focus();
    });

    // Handle create post button in no-posts state
    $(document).on('click', '.no-posts .create-post-btn', showCreatePostModal);

    // Handle category change for taxonomy display
    function handleCategoryChange() {
        const category = $(this).val();
        
        // Hide all taxonomy groups
        $('#kaios-taxonomy-group, #tech-taxonomy-group').hide();
        
        // Show relevant taxonomy group
        if (category === 'kaios') {
            $('#kaios-taxonomy-group').show();
        } else if (category && category !== 'general') {
            $('#tech-taxonomy-group').show();
        }
    }

    // Load KaiOS posts for KaiOS page
    function loadKaiOSPosts() {
        if (!$('.kaios-main').length) return;
        
        $.ajax({
            url: forumAuth.ajaxUrl,
            type: 'POST',
            data: {
                action: 'get_kaios_posts',
                nonce: forumAuth.nonce,
                limit: 5
            },
            success: function(response) {
                if (response.success && response.posts.length > 0) {
                    displayKaiOSPosts(response.posts);
                }
            }
        });
    }

    function displayKaiOSPosts(posts) {
        let postsHTML = `
            <section class="kaios-recent-posts">
                <div class="section-header">
                    <h2><i class="fas fa-newspaper"></i> Recent KaiOS Posts</h2>
                    <p>Latest discussions from our KaiOS community</p>
                </div>
                <div class="recent-posts-grid">
        `;

        posts.forEach(function(post) {
            const avatar = post.avatar_url || 'https://www.gravatar.com/avatar/' + btoa(post.display_name) + '?d=identicon&s=40';
            const timeAgo = formatTimeAgo(post.created_date);
            const categories = post.kaios_categories.length > 0 ? post.kaios_categories.join(', ') : 'General';

            postsHTML += `
                <div class="recent-post-card">
                    <div class="post-header">
                        <div class="post-author">
                            <img src="${avatar}" alt="${post.display_name}" class="author-avatar">
                            <div class="author-info">
                                <span class="author-name">${post.display_name}</span>
                                <span class="post-time">${timeAgo}</span>
                            </div>
                        </div>
                        <div class="post-categories">
                            ${categories}
                        </div>
                    </div>
                    <h4 class="post-title">${post.title}</h4>
                    <p class="post-excerpt">${post.excerpt}</p>
                    <div class="post-stats">
                        <span class="stat"><i class="fas fa-eye"></i> ${post.views}</span>
                        <span class="stat"><i class="fas fa-comments"></i> ${post.replies_count}</span>
                        <button class="btn btn-sm btn-outline view-post-btn" data-post-id="${post.id}">
                            <i class="fas fa-arrow-right"></i> Read More
                        </button>
                    </div>
                </div>
            `;
        });

        postsHTML += `
                </div>
                <div class="view-all-posts">
                    <button class="btn btn-primary browse-posts-btn" data-category="kaios">
                        <i class="fas fa-list"></i> View All KaiOS Posts
                    </button>
                </div>
            </section>
        `;

        // Insert before the modification section
        $('#modification').before(postsHTML);
    }

    // Load KaiOS posts on page load
    $(document).ready(function() {
        setTimeout(loadKaiOSPosts, 1000); // Load after other content
    });

})(jQuery);
