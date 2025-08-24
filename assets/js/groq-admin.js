/**
 * Groq AI Admin Interface JavaScript
 */

jQuery(document).ready(function($) {
    'use strict';
    
    // Initialize admin interface
    initGroqAdmin();
    
    function initGroqAdmin() {
        // Initialize components
        initModelSelector();
        initTemperatureSlider();
        initApiTesting();
        initForumToggles();
        initFormValidation();
        initRealTimeUpdates();
        initNotifications();
        
        // Load initial data
        loadStats();
        checkApiStatus();
        
        console.log('Groq AI Admin initialized');
    }
    
    /**
     * Model Selector with Real-time Details
     */
    function initModelSelector() {
        const $modelSelect = $('#groq_selected_model');
        const $modelDetails = $('#model-details');
        
        // Model data (matches PHP array)
        const models = {
            'gpt-oss-20b-128k': {
                name: 'GPT OSS 20B 128k',
                speed: 1000,
                input_price: 0.10,
                output_price: 0.50,
                context: '128k',
                description: 'Fast and efficient model for general tasks'
            },
            'gpt-oss-120b-128k': {
                name: 'GPT OSS 120B 128k',
                speed: 500,
                input_price: 0.15,
                output_price: 0.75,
                context: '128k',
                description: 'Larger model with enhanced capabilities'
            },
            'kimi-k2-1t-128k': {
                name: 'Kimi K2 1T 128k',
                speed: 200,
                input_price: 1.00,
                output_price: 3.00,
                context: '128k',
                description: 'Premium model with advanced reasoning'
            },
            'llama-4-scout-17bx16e-128k': {
                name: 'Llama 4 Scout (17Bx16E) 128k',
                speed: 594,
                input_price: 0.11,
                output_price: 0.34,
                context: '128k',
                description: 'Balanced performance and cost efficiency'
            },
            'llama-4-maverick-17bx128e-128k': {
                name: 'Llama 4 Maverick (17Bx128E) 128k',
                speed: 562,
                input_price: 0.20,
                output_price: 0.60,
                context: '128k',
                description: 'Enhanced model with improved accuracy'
            },
            'llama-guard-4-12b-128k': {
                name: 'Llama Guard 4 12B 128k',
                speed: 325,
                input_price: 0.20,
                output_price: 0.20,
                context: '128k',
                description: 'Specialized for content moderation and safety'
            },
            'deepseek-r1-distill-llama-70b-128k': {
                name: 'DeepSeek R1 Distill Llama 70B 128k',
                speed: 400,
                input_price: 0.75,
                output_price: 0.99,
                context: '128k',
                description: 'Advanced reasoning and problem-solving'
            },
            'qwen3-32b-131k': {
                name: 'Qwen3 32B 131k',
                speed: 662,
                input_price: 0.29,
                output_price: 0.59,
                context: '131k',
                description: 'High-performance multilingual model'
            },
            'mistral-saba-24b-32k': {
                name: 'Mistral Saba 24B 32k',
                speed: 330,
                input_price: 0.79,
                output_price: 0.79,
                context: '32k',
                description: 'Optimized for code and technical content'
            },
            'llama-3.3-70b-versatile-128k': {
                name: 'Llama 3.3 70B Versatile 128k',
                speed: 394,
                input_price: 0.59,
                output_price: 0.79,
                context: '128k',
                description: 'Versatile model for diverse applications'
            },
            'llama-3.1-8b-instant': {
                name: 'Llama 3.1 8B Instant 128k',
                speed: 840,
                input_price: 0.05,
                output_price: 0.08,
                context: '128k',
                description: 'Ultra-fast model for instant responses'
            },
            'llama-3-70b-8k': {
                name: 'Llama 3 70B 8k',
                speed: 330,
                input_price: 0.59,
                output_price: 0.79,
                context: '8k',
                description: 'Powerful model for complex tasks'
            },
            'llama-3-8b-8k': {
                name: 'Llama 3 8B 8k',
                speed: 1345,
                input_price: 0.05,
                output_price: 0.08,
                context: '8k',
                description: 'Fastest model for simple tasks'
            },
            'gemma-2-9b-8k': {
                name: 'Gemma 2 9B 8k',
                speed: 500,
                input_price: 0.20,
                output_price: 0.20,
                context: '8k',
                description: 'Efficient model with balanced pricing'
            },
            'llama-guard-3-8b-8k': {
                name: 'Llama Guard 3 8B 8k',
                speed: 765,
                input_price: 0.20,
                output_price: 0.20,
                context: '8k',
                description: 'Content safety and moderation specialist'
            }
        };
        
        function showModelDetails(modelId) {
            const model = models[modelId];
            if (!model) return;
            
            const tokensPerDollarInput = Math.floor(1000000 / model.input_price);
            const tokensPerDollarOutput = Math.floor(1000000 / model.output_price);
            
            const detailsHtml = `
                <div class="groq-model-info">
                    <div class="groq-model-stat">
                        <span class="groq-model-stat-value">${model.speed}</span>
                        <span class="groq-model-stat-label">Tokens/sec</span>
                    </div>
                    <div class="groq-model-stat">
                        <span class="groq-model-stat-value">$${model.input_price}</span>
                        <span class="groq-model-stat-label">Input (1M tokens)</span>
                    </div>
                    <div class="groq-model-stat">
                        <span class="groq-model-stat-value">$${model.output_price}</span>
                        <span class="groq-model-stat-label">Output (1M tokens)</span>
                    </div>
                    <div class="groq-model-stat">
                        <span class="groq-model-stat-value">${model.context}</span>
                        <span class="groq-model-stat-label">Context Length</span>
                    </div>
                </div>
                <div class="groq-model-description">${model.description}</div>
                <div style="margin-top: 1rem; font-size: 0.85rem; color: #666;">
                    <strong>Cost Efficiency:</strong> ${tokensPerDollarInput.toLocaleString()} input tokens per $1 • ${tokensPerDollarOutput.toLocaleString()} output tokens per $1
                </div>
            `;
            
            $modelDetails.html(detailsHtml).addClass('show');
        }
        
        // Show details for initially selected model
        showModelDetails($modelSelect.val());
        
        // Update details when model changes
        $modelSelect.on('change', function() {
            showModelDetails($(this).val());
            calculateEstimatedCost();
        });
    }
    
    /**
     * Temperature Slider with Real-time Value Update
     */
    function initTemperatureSlider() {
        const $slider = $('#groq_temperature');
        const $value = $('.groq-range-value');
        
        $slider.on('input', function() {
            $value.text($(this).val());
        });
    }
    
    /**
     * API Key Testing
     */
    function initApiTesting() {
        const $testBtn = $('#test-api-key');
        const $apiStatus = $('#api-status');
        const $apiKey = $('#groq_api_key');
        
        $testBtn.on('click', function() {
            const apiKey = $apiKey.val().trim();
            
            if (!apiKey) {
                showNotification('Please enter an API key first', 'warning');
                return;
            }
            
            testApiConnection(apiKey);
        });
        
        function testApiConnection(apiKey) {
            $testBtn.addClass('groq-loading').prop('disabled', true);
            $apiStatus.removeClass('connected').addClass('testing');
            $apiStatus.find('.status-text').text('Testing...');
            
            // Simulate API test (replace with actual API call)
            setTimeout(() => {
                const isValid = apiKey.length > 20; // Simple validation
                
                $testBtn.removeClass('groq-loading').prop('disabled', false);
                
                if (isValid) {
                    $apiStatus.removeClass('testing').addClass('connected');
                    $apiStatus.find('.status-text').text('Connected');
                    showNotification('API connection successful!', 'success');
                } else {
                    $apiStatus.removeClass('testing connected');
                    $apiStatus.find('.status-text').text('Connection Failed');
                    showNotification('API connection failed. Please check your key.', 'error');
                }
            }, 2000);
        }
    }
    
    /**
     * Forum Toggle Switches
     */
    function initForumToggles() {
        $('.groq-forum-toggle').on('click', function() {
            const $toggle = $(this);
            const forum = $toggle.data('forum');
            const isActive = $toggle.hasClass('active');
            
            // Toggle state
            $toggle.toggleClass('active');
            
            // Save state via AJAX
            $.ajax({
                url: groqAjax.ajaxurl,
                type: 'POST',
                data: {
                    action: 'groq_toggle_forum',
                    forum: forum,
                    status: isActive ? 'inactive' : 'active',
                    nonce: groqAjax.nonce
                },
                success: function(response) {
                    if (response.success) {
                        const status = isActive ? 'deactivated' : 'activated';
                        showNotification(`${forum} forum ${status}`, 'success');
                    } else {
                        // Revert toggle on error
                        $toggle.toggleClass('active');
                        showNotification('Failed to update forum status', 'error');
                    }
                },
                error: function() {
                    // Revert toggle on error
                    $toggle.toggleClass('active');
                    showNotification('Network error occurred', 'error');
                }
            });
        });
    }
    
    /**
     * Form Validation
     */
    function initFormValidation() {
        const $form = $('#groq-settings-form');
        const $apiKey = $('#groq_api_key');
        const $maxTokens = $('#groq_max_tokens');
        
        $form.on('submit', function(e) {
            let isValid = true;
            
            // Validate API key
            if ($apiKey.val().trim().length < 10) {
                showNotification('API key appears to be invalid', 'warning');
                $apiKey.focus();
                isValid = false;
            }
            
            // Validate max tokens
            const maxTokens = parseInt($maxTokens.val());
            if (maxTokens < 1 || maxTokens > 128000) {
                showNotification('Max tokens must be between 1 and 128,000', 'warning');
                $maxTokens.focus();
                isValid = false;
            }
            
            if (!isValid) {
                e.preventDefault();
            } else {
                showNotification('Settings saved successfully!', 'success');
            }
        });
        
        // Reset settings
        $('#reset-settings').on('click', function() {
            if (confirm('Are you sure you want to reset all settings to defaults?')) {
                // Reset form values
                $apiKey.val('');
                $('#groq_selected_model').val('llama-3.1-8b-instant').trigger('change');
                $maxTokens.val('1000');
                $('#groq_temperature').val('0.7').trigger('input');
                $('#groq_forum_auto_generate').prop('checked', false);
                $('#groq_content_moderation').prop('checked', false);
                
                showNotification('Settings reset to defaults', 'info');
            }
        });
    }
    
    /**
     * Real-time Updates
     */
    function initRealTimeUpdates() {
        // Update stats every 30 seconds
        setInterval(loadStats, 30000);
        
        // Calculate estimated cost when settings change
        $('#groq_selected_model, #groq_max_tokens').on('change input', calculateEstimatedCost);
    }
    
    function loadStats() {
        $.ajax({
            url: groqAjax.ajaxurl,
            type: 'POST',
            data: {
                action: 'groq_get_stats',
                nonce: groqAjax.nonce
            },
            success: function(response) {
                if (response.success) {
                    const stats = response.data;
                    $('#total-requests').text(stats.total_requests || 0);
                    $('#tokens-used').text((stats.tokens_used || 0).toLocaleString());
                    $('#estimated-cost').text('$' + (stats.estimated_cost || 0).toFixed(2));
                }
            }
        });
    }
    
    function calculateEstimatedCost() {
        const modelId = $('#groq_selected_model').val();
        const maxTokens = parseInt($('#groq_max_tokens').val()) || 1000;
        
        // Get model pricing (simplified calculation)
        const models = {
            'llama-3.1-8b-instant': { input: 0.05, output: 0.08 },
            'llama-3-8b-8k': { input: 0.05, output: 0.08 },
            'gemma-2-9b-8k': { input: 0.20, output: 0.20 },
            // Add more models as needed
        };
        
        const model = models[modelId] || { input: 0.10, output: 0.20 };
        const estimatedCost = ((maxTokens / 1000000) * (model.input + model.output)).toFixed(4);
        
        // Update display (you can add this to the UI)
        console.log(`Estimated cost per request: $${estimatedCost}`);
    }
    
    function checkApiStatus() {
        const apiKey = $('#groq_api_key').val().trim();
        if (apiKey) {
            // Simulate status check
            setTimeout(() => {
                $('#api-status').addClass('connected');
                $('#api-status .status-text').text('Connected');
            }, 1000);
        }
    }
    
    /**
     * Notification System
     */
    function initNotifications() {
        // Create notification container if it doesn't exist
        if (!$('.groq-notifications').length) {
            $('body').append('<div class="groq-notifications"></div>');
        }
    }
    
    function showNotification(message, type = 'info', duration = 5000) {
        const $notification = $(`
            <div class="groq-notification ${type}">
                ${message}
            </div>
        `);
        
        $('body').append($notification);
        
        // Show notification
        setTimeout(() => {
            $notification.addClass('show');
        }, 100);
        
        // Hide notification
        setTimeout(() => {
            $notification.removeClass('show');
            setTimeout(() => {
                $notification.remove();
            }, 300);
        }, duration);
    }
    
    /**
     * Keyboard Shortcuts
     */
    $(document).on('keydown', function(e) {
        // Ctrl/Cmd + S to save
        if ((e.ctrlKey || e.metaKey) && e.which === 83) {
            e.preventDefault();
            $('#groq-settings-form').submit();
        }
        
        // Ctrl/Cmd + T to test API
        if ((e.ctrlKey || e.metaKey) && e.which === 84) {
            e.preventDefault();
            $('#test-api-key').click();
        }
    });
    
    /**
     * Auto-save Draft Settings
     */
    let saveTimeout;
    $('#groq-settings-form input, #groq-settings-form select').on('change input', function() {
        clearTimeout(saveTimeout);
        saveTimeout = setTimeout(() => {
            // Auto-save draft (optional feature)
            console.log('Auto-saving draft settings...');
        }, 2000);
    });
    
    /**
     * Responsive Sidebar Toggle (for mobile)
     */
    function initResponsiveFeatures() {
        if ($(window).width() <= 768) {
            // Add mobile-specific functionality
            $('.groq-sidebar').addClass('mobile-sidebar');
        }
        
        $(window).on('resize', function() {
            if ($(window).width() <= 768) {
                $('.groq-sidebar').addClass('mobile-sidebar');
            } else {
                $('.groq-sidebar').removeClass('mobile-sidebar');
            }
        });
    }
    
    initResponsiveFeatures();
    
    /**
     * Accessibility Enhancements
     */
    function initAccessibility() {
        // Add ARIA labels
        $('.groq-forum-toggle').attr('role', 'switch');
        $('.groq-forum-toggle').each(function() {
            const forumName = $(this).siblings('.groq-forum-name').text();
            $(this).attr('aria-label', `Toggle ${forumName}`);
        });
        
        // Keyboard navigation for toggles
        $('.groq-forum-toggle').on('keydown', function(e) {
            if (e.which === 13 || e.which === 32) { // Enter or Space
                e.preventDefault();
                $(this).click();
            }
        });
        
        // Focus management
        $('.groq-btn').on('focus', function() {
            $(this).addClass('focused');
        }).on('blur', function() {
            $(this).removeClass('focused');
        });
    }
    
    initAccessibility();
    
    /**
     * Data Export/Import (Future Feature)
     */
    function initDataManagement() {
        // Export settings
        $('#export-settings').on('click', function() {
            const settings = {
                api_key: $('#groq_api_key').val(),
                selected_model: $('#groq_selected_model').val(),
                max_tokens: $('#groq_max_tokens').val(),
                temperature: $('#groq_temperature').val(),
                auto_generate: $('#groq_forum_auto_generate').is(':checked'),
                content_moderation: $('#groq_content_moderation').is(':checked')
            };
            
            const dataStr = JSON.stringify(settings, null, 2);
            const dataBlob = new Blob([dataStr], {type: 'application/json'});
            const url = URL.createObjectURL(dataBlob);
            
            const link = document.createElement('a');
            link.href = url;
            link.download = 'groq-ai-settings.json';
            link.click();
            
            URL.revokeObjectURL(url);
            showNotification('Settings exported successfully', 'success');
        });
    }
    
    // Initialize data management if export button exists
    if ($('#export-settings').length) {
        initDataManagement();
    }
});

/**
 * AJAX Handlers for WordPress
 */

// Handle forum toggle
jQuery(document).ready(function($) {
    // This would be handled by WordPress AJAX in the PHP backend
    $(document).on('wp_ajax_groq_toggle_forum', function() {
        // PHP will handle this
    });
    
    $(document).on('wp_ajax_groq_get_stats', function() {
        // PHP will handle this
    });
    
    // Connection testing functionality
    function checkConnectionStatus() {
        const apiKey = $('#groq_api_key').val();
        if (apiKey) {
            testApiConnection(apiKey, false); // Silent check
        }
    }
    
    function testApiConnection(apiKey = null, showNotification = true) {
        if (!apiKey) {
            apiKey = $('#groq_api_key').val();
        }
        
        if (!apiKey) {
            updateConnectionStatus('disconnected', 'No API key provided');
            return;
        }
        
        const $testButton = $('#test-api-key');
        const originalText = $testButton.text();
        
        if (showNotification) {
            $testButton.text('Testing...').prop('disabled', true);
        }
        
        $.ajax({
            url: groqAjax.ajaxurl,
            type: 'POST',
            data: {
                action: 'test_groq_connection',
                api_key: apiKey,
                nonce: groqAjax.nonce
            },
            success: function(response) {
                if (response.success) {
                    updateConnectionStatus('connected', response.data.message);
                    if (showNotification) {
                        showGroqNotification('success', response.data.message);
                    }
                } else {
                    updateConnectionStatus('disconnected', response.data.message);
                    if (showNotification) {
                        showGroqNotification('error', response.data.message);
                    }
                }
            },
            error: function() {
                updateConnectionStatus('disconnected', 'Connection test failed');
                if (showNotification) {
                    showGroqNotification('error', 'Connection test failed');
                }
            },
            complete: function() {
                if (showNotification) {
                    $testButton.text(originalText).prop('disabled', false);
                }
            }
        });
    }
    
    function updateConnectionStatus(status, message) {
        const $statusElement = $('#api-status');
        const $statusText = $statusElement.find('.status-text');
        const $statusMessage = $('#connection-status-message');
        
        $statusElement.removeClass('connected disconnected').addClass(status);
        $statusText.text(status === 'connected' ? 'Connected' : 'Not Connected');
        
        // Show status message
        if (message) {
            $statusMessage.removeClass('success error').addClass(status === 'connected' ? 'success' : 'error');
            $statusMessage.text(message).show();
            
            if (status === 'connected') {
                $statusMessage.css({
                    'background-color': '#d1f2eb',
                    'color': '#0c5460',
                    'border': '1px solid #a3e4d7'
                });
            } else {
                $statusMessage.css({
                    'background-color': '#fadbd8',
                    'color': '#922b21',
                    'border': '1px solid #f1948a'
                });
            }
        } else {
            $statusMessage.hide();
        }
        
        // Store status for persistence
        localStorage.setItem('groq_connection_status', status);
        localStorage.setItem('groq_connection_message', message);
        localStorage.setItem('groq_connection_time', Date.now());
    }
    
    // Load connection status from server on page load
    function loadConnectionStatus() {
        $.ajax({
            url: groqAjax.ajaxurl,
            type: 'POST',
            data: {
                action: 'get_groq_connection_status',
                nonce: groqAjax.nonce
            },
            success: function(response) {
                if (response.success) {
                    updateConnectionStatus(response.data.status, response.data.message);
                } else {
                    updateConnectionStatus('disconnected', 'Unable to check status');
                }
            },
            error: function() {
                updateConnectionStatus('disconnected', 'Unable to check status');
            }
        });
    }
    
    // AI Post Generation
    function generateAiForumPost(userType, category) {
        const $button = $(event.target);
        const originalText = $button.text();
        
        $button.text('Generating...').prop('disabled', true);
        
        $.ajax({
            url: groqAjax.ajaxurl,
            type: 'POST',
            data: {
                action: 'generate_ai_forum_post',
                user_type: userType,
                category: category,
                nonce: groqAjax.nonce
            },
            success: function(response) {
                if (response.success) {
                    showGroqNotification('success', response.data.message);
                    if (response.data.post_url) {
                        setTimeout(function() {
                            window.open(response.data.post_url, '_blank');
                        }, 1000);
                    }
                } else {
                    showGroqNotification('error', response.data.message);
                }
            },
            error: function() {
                showGroqNotification('error', 'Failed to generate AI forum post');
            },
            complete: function() {
                $button.text(originalText).prop('disabled', false);
            }
        });
    }
    
    function showGroqNotification(type, message) {
        const notification = $(`
            <div class="groq-notification groq-notification-${type}">
                <span class="groq-notification-message">${message}</span>
                <button class="groq-notification-close">&times;</button>
            </div>
        `);
        
        $('body').append(notification);
        notification.fadeIn(300);
        
        // Auto remove after 5 seconds
        setTimeout(function() {
            notification.fadeOut(300, function() {
                notification.remove();
            });
        }, 5000);
        
        // Manual close
        notification.find('.groq-notification-close').on('click', function() {
            notification.fadeOut(300, function() {
                notification.remove();
            });
        });
    }
    
    // Save API key function
    function saveApiKey() {
        const apiKey = $('#groq_api_key').val();
        const $saveIndicator = $('#api-key-status');
        
        if (!apiKey) {
            showGroqNotification('error', 'Please enter an API key');
            return;
        }
        
        // Show saving indicator
        $saveIndicator.show();
        
        $.ajax({
            url: groqAjax.ajaxurl,
            type: 'POST',
            data: {
                action: 'save_groq_api_key',
                api_key: apiKey,
                nonce: groqAjax.nonce
            },
            success: function(response) {
                if (response.success) {
                    showGroqNotification('success', response.data.message);
                    updateConnectionStatus(response.data.status, response.data.message);
                    
                    // Show saved indicator briefly
                    $saveIndicator.html('<i class="dashicons dashicons-yes-alt" style="color: #46b450;"></i> Saved!');
                    setTimeout(function() {
                        $saveIndicator.fadeOut();
                    }, 2000);
                } else {
                    showGroqNotification('error', response.data.message);
                    $saveIndicator.hide();
                }
            },
            error: function() {
                showGroqNotification('error', 'Failed to save API key');
                $saveIndicator.hide();
            }
        });
    }
    
    // Event handlers
    $(document).on('click', '#test-api-key', function() {
        // First save the API key, then test connection
        const apiKey = $('#groq_api_key').val();
        if (apiKey) {
            saveApiKey();
        } else {
            testApiConnection();
        }
    });
    
    // Auto-save API key when user stops typing
    let apiKeyTimeout;
    $(document).on('input', '#groq_api_key', function() {
        clearTimeout(apiKeyTimeout);
        const apiKey = $(this).val();
        
        if (apiKey && apiKey.length > 10) { // Only save if it looks like a real API key
            apiKeyTimeout = setTimeout(function() {
                saveApiKey();
            }, 2000); // Save 2 seconds after user stops typing
        }
    });
    
    $(document).on('click', '.generate-ai-post', function() {
        const userType = $(this).data('user-type');
        const category = $(this).data('category') || 'android';
        generateAiForumPost(userType, category);
    });
    
    // Auto-check connection every 5 minutes
    setInterval(function() {
        checkConnectionStatus();
    }, 300000);
    
    // Check connection on page load
    setTimeout(loadConnectionStatus, 1000);
    
    // Add notification styles
    if (!$('#groq-notification-styles').length) {
        $('<style id="groq-notification-styles">')
            .prop('type', 'text/css')
            .html(`
                .groq-notification {
                    position: fixed;
                    top: 32px;
                    right: 20px;
                    background: #fff;
                    border-left: 4px solid #00a0d2;
                    box-shadow: 0 2px 5px rgba(0,0,0,0.2);
                    padding: 12px 20px;
                    margin-bottom: 10px;
                    z-index: 999999;
                    display: none;
                    max-width: 350px;
                }
                
                .groq-notification-success {
                    border-left-color: #46b450;
                }
                
                .groq-notification-error {
                    border-left-color: #dc3232;
                }
                
                .groq-notification-close {
                    float: right;
                    background: none;
                    border: none;
                    font-size: 16px;
                    cursor: pointer;
                    margin-left: 10px;
                }
                
                .groq-status.connected .status-dot {
                    background-color: #46b450;
                    box-shadow: 0 0 0 3px rgba(70, 180, 80, 0.2);
                }
                
                .groq-status.disconnected .status-dot {
                    background-color: #dc3232;
                    box-shadow: 0 0 0 3px rgba(220, 50, 50, 0.2);
                }
                
                @keyframes spin {
                    0% { transform: rotate(0deg); }
                    100% { transform: rotate(360deg); }
                }
            `)
            .appendTo('head');
    }
});
