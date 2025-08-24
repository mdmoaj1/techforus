/**
 * Forum Admin Interface JavaScript
 */

jQuery(document).ready(function($) {
    
    // AI Editor Creation
    $('#create-ai-editors').on('click', function() {
        const button = $(this);
        const originalText = button.text();
        
        button.text('Creating...').prop('disabled', true);
        
        $.ajax({
            url: forumAjax.ajaxurl,
            type: 'POST',
            data: {
                action: 'create_ai_editors',
                nonce: forumAjax.nonce
            },
            success: function(response) {
                if (response.success) {
                    displayAIUsers(response.data.users, '#ai-editors-list', 'editor');
                    showNotice('Successfully created ' + response.data.count + ' AI editors!', 'success');
                } else {
                    showNotice('Error creating AI editors: ' + response.data.message, 'error');
                }
            },
            error: function() {
                showNotice('Network error occurred while creating AI editors.', 'error');
            },
            complete: function() {
                button.text(originalText).prop('disabled', false);
            }
        });
    });
    
    // AI Questioner Creation
    $('#create-ai-questioners').on('click', function() {
        const button = $(this);
        const originalText = button.text();
        
        button.text('Creating...').prop('disabled', true);
        
        $.ajax({
            url: forumAjax.ajaxurl,
            type: 'POST',
            data: {
                action: 'create_ai_questioners',
                nonce: forumAjax.nonce
            },
            success: function(response) {
                if (response.success) {
                    displayAIUsers(response.data.users, '#ai-questioners-list', 'questioner');
                    showNotice('Successfully created ' + response.data.count + ' AI questioners!', 'success');
                } else {
                    showNotice('Error creating AI questioners: ' + response.data.message, 'error');
                }
            },
            error: function() {
                showNotice('Network error occurred while creating AI questioners.', 'error');
            },
            complete: function() {
                button.text(originalText).prop('disabled', false);
            }
        });
    });
    
    // Test AI System
    $('#test-ai-system').on('click', function() {
        const button = $(this);
        const originalText = button.text();
        
        button.text('Testing...').prop('disabled', true);
        
        $.ajax({
            url: forumAjax.ajaxurl,
            type: 'POST',
            data: {
                action: 'test_ai_system',
                nonce: forumAjax.nonce
            },
            success: function(response) {
                if (response.success) {
                    showNotice('AI System test completed successfully!', 'success');
                    console.log('Test results:', response.data);
                } else {
                    showNotice('AI System test failed: ' + response.data.message, 'error');
                }
            },
            error: function() {
                showNotice('Network error occurred during AI system test.', 'error');
            },
            complete: function() {
                button.text(originalText).prop('disabled', false);
            }
        });
    });
    
    // Display AI Users
    function displayAIUsers(users, container, type) {
        const $container = $(container);
        $container.empty();
        
        if (users.length === 0) {
            $container.html('<p>No ' + type + 's created yet.</p>');
            return;
        }
        
        users.forEach(function(user) {
            const userCard = $(`
                <div class="forum-user-card forum-fade-in">
                    <div class="forum-user-avatar">
                        ${user.display_name.charAt(0).toUpperCase()}
                    </div>
                    <div class="forum-user-info">
                        <div class="forum-user-name">${user.display_name}</div>
                        <div class="forum-user-meta">
                            <span>Country: ${user.country}</span>
                            <span>Style: ${user.writing_style}</span>
                            <span>Specialty: ${user.specialty}</span>
                        </div>
                    </div>
                    <div class="forum-user-status active">Active</div>
                </div>
            `);
            
            $container.append(userCard);
        });
    }
    
    // Show Notice
    function showNotice(message, type) {
        const notice = $(`
            <div class="forum-notice ${type}">
                ${message}
            </div>
        `);
        
        $('.forum-admin-wrap').prepend(notice);
        
        setTimeout(function() {
            notice.fadeOut(function() {
                notice.remove();
            });
        }, 5000);
    }
    
    // Auto-refresh activity log every 30 seconds
    setInterval(function() {
        refreshActivityLog();
    }, 30000);
    
    function refreshActivityLog() {
        $.ajax({
            url: forumAjax.ajaxurl,
            type: 'POST',
            data: {
                action: 'get_forum_activity',
                nonce: forumAjax.nonce
            },
            success: function(response) {
                if (response.success && response.data.activities) {
                    updateActivityLog(response.data.activities);
                }
            }
        });
    }
    
    function updateActivityLog(activities) {
        const $log = $('.forum-activity-log');
        $log.empty();
        
        activities.forEach(function(activity) {
            const activityItem = $(`
                <div class="forum-activity-item">
                    <span class="forum-activity-time">${activity.time}</span>
                    <span class="forum-activity-text">${activity.text}</span>
                </div>
            `);
            
            $log.append(activityItem);
        });
    }
    
    // Load existing AI users on page load
    loadExistingUsers();
    
    function loadExistingUsers() {
        // Load AI Editors
        $.ajax({
            url: forumAjax.ajaxurl,
            type: 'POST',
            data: {
                action: 'get_ai_users',
                user_type: 'editor',
                nonce: forumAjax.nonce
            },
            success: function(response) {
                if (response.success && response.data.users.length > 0) {
                    displayAIUsers(response.data.users, '#ai-editors-list', 'editor');
                }
            }
        });
        
        // Load AI Questioners
        $.ajax({
            url: forumAjax.ajaxurl,
            type: 'POST',
            data: {
                action: 'get_ai_users',
                user_type: 'questioner',
                nonce: forumAjax.nonce
            },
            success: function(response) {
                if (response.success && response.data.users.length > 0) {
                    displayAIUsers(response.data.users, '#ai-questioners-list', 'questioner');
                }
            }
        });
    }
    
    // Real-time stats update
    setInterval(function() {
        updateForumStats();
    }, 60000); // Update every minute
    
    function updateForumStats() {
        $.ajax({
            url: forumAjax.ajaxurl,
            type: 'POST',
            data: {
                action: 'get_forum_stats',
                nonce: forumAjax.nonce
            },
            success: function(response) {
                if (response.success) {
                    updateStatsDisplay(response.data);
                }
            }
        });
    }
    
    function updateStatsDisplay(stats) {
        $('.forum-stat-number').each(function(index) {
            const $this = $(this);
            const newValue = Object.values(stats)[index];
            
            if (newValue && $this.text() !== newValue.toString()) {
                $this.fadeOut(200, function() {
                    $this.text(newValue).fadeIn(200);
                });
            }
        });
    }
    
    // Smooth scrolling for internal links
    $('a[href^="#"]').on('click', function(e) {
        e.preventDefault();
        
        const target = $(this.getAttribute('href'));
        if (target.length) {
            $('html, body').animate({
                scrollTop: target.offset().top - 100
            }, 500);
        }
    });
    
    // Enhanced form validation
    $('form').on('submit', function(e) {
        const form = $(this);
        let isValid = true;
        
        // Validate number inputs
        form.find('input[type="number"]').each(function() {
            const $input = $(this);
            const value = parseInt($input.val());
            const min = parseInt($input.attr('min'));
            const max = parseInt($input.attr('max'));
            
            if (isNaN(value) || value < min || value > max) {
                $input.addClass('error');
                isValid = false;
            } else {
                $input.removeClass('error');
            }
        });
        
        if (!isValid) {
            e.preventDefault();
            showNotice('Please check your input values and try again.', 'error');
        }
    });
    
    // Add error styling for invalid inputs
    $('<style>')
        .prop('type', 'text/css')
        .html(`
            .forum-form-group input.error,
            .forum-form-group select.error {
                border-color: #dc3545 !important;
                box-shadow: 0 0 0 3px rgba(220, 53, 69, 0.1) !important;
            }
        `)
        .appendTo('head');
    
    // Keyboard shortcuts
    $(document).on('keydown', function(e) {
        // Ctrl/Cmd + S to save settings
        if ((e.ctrlKey || e.metaKey) && e.which === 83) {
            e.preventDefault();
            const saveButton = $('button[name="save_ai_settings"]');
            if (saveButton.length) {
                saveButton.click();
            }
        }
        
        // Ctrl/Cmd + T to test AI system
        if ((e.ctrlKey || e.metaKey) && e.which === 84) {
            e.preventDefault();
            const testButton = $('#test-ai-system');
            if (testButton.length) {
                testButton.click();
            }
        }
    });
    
    // Tooltip functionality
    $('[data-tooltip]').each(function() {
        const $this = $(this);
        const tooltipText = $this.data('tooltip');
        
        $this.on('mouseenter', function() {
            const tooltip = $(`<div class="forum-tooltip">${tooltipText}</div>`);
            $('body').append(tooltip);
            
            const offset = $this.offset();
            tooltip.css({
                position: 'absolute',
                top: offset.top - tooltip.outerHeight() - 10,
                left: offset.left + ($this.outerWidth() / 2) - (tooltip.outerWidth() / 2),
                zIndex: 9999
            });
        });
        
        $this.on('mouseleave', function() {
            $('.forum-tooltip').remove();
        });
    });
    
    // Add tooltip styles
    $('<style>')
        .prop('type', 'text/css')
        .html(`
            .forum-tooltip {
                background: #1e293b;
                color: white;
                padding: 0.5rem 0.75rem;
                border-radius: 4px;
                font-size: 0.8rem;
                white-space: nowrap;
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
                animation: fadeIn 0.2s ease-in-out;
            }
            
            .forum-tooltip::after {
                content: '';
                position: absolute;
                top: 100%;
                left: 50%;
                margin-left: -5px;
                border-width: 5px;
                border-style: solid;
                border-color: #1e293b transparent transparent transparent;
            }
        `)
        .appendTo('head');
    
    // AI Users Cleanup
    $('#cleanup-ai-users').on('click', function() {
        const button = $(this);
        const originalText = button.text();
        
        // Confirmation dialog
        if (!confirm('⚠️ WARNING: This will permanently delete all users with obvious AI names (like "Questioner AI User") and all their posts/comments. This action cannot be undone!\n\nAre you sure you want to continue?')) {
            return;
        }
        
        button.text('🗑️ Cleaning up...').prop('disabled', true);
        
        $.ajax({
            url: forumAjax.ajaxurl,
            type: 'POST',
            data: {
                action: 'cleanup_ai_users',
                nonce: forumAjax.nonce
            },
            success: function(response) {
                if (response.success) {
                    const message = response.data.message;
                    const usersRemoved = response.data.users_removed;
                    
                    if (usersRemoved > 0) {
                        $('#cleanup-results').html(`
                            <div class="cleanup-success">
                                <i class="dashicons dashicons-yes-alt"></i>
                                <strong>Cleanup completed!</strong><br>
                                ${message}
                            </div>
                        `);
                        showNotice(`Cleanup completed! Removed ${usersRemoved} obvious AI users.`, 'success');
                    } else {
                        $('#cleanup-results').html(`
                            <div class="cleanup-info">
                                <i class="dashicons dashicons-info"></i>
                                <strong>No cleanup needed</strong><br>
                                ${message}
                            </div>
                        `);
                        showNotice('No obvious AI users found to remove.', 'info');
                    }
                } else {
                    $('#cleanup-results').html(`
                        <div class="cleanup-error">
                            <i class="dashicons dashicons-warning"></i>
                            <strong>Cleanup failed</strong><br>
                            ${response.data.message || 'Unknown error occurred'}
                        </div>
                    `);
                    showNotice('Error during cleanup: ' + (response.data.message || 'Unknown error'), 'error');
                }
            },
            error: function() {
                $('#cleanup-results').html(`
                    <div class="cleanup-error">
                        <i class="dashicons dashicons-warning"></i>
                        <strong>Network error</strong><br>
                        Failed to connect to server during cleanup.
                    </div>
                `);
                showNotice('Network error occurred during cleanup.', 'error');
            },
            complete: function() {
                button.text(originalText).prop('disabled', false);
            }
        });
    });
    
    console.log('Forum Admin Interface initialized successfully!');
});
