/**
 * TechForum Theme JavaScript
 */

(function($) {
    'use strict';

    // DOM Ready
    $(document).ready(function() {
        
        // Mobile Menu Toggle
        initMobileMenu();
        
        // Smooth Scrolling
        initSmoothScrolling();
        
        // Search Form Enhancement
        initSearchForm();
        
        // Comments Enhancement
        initComments();
        
        // Back to Top Button
        initBackToTop();
        
        // Image Lazy Loading
        initLazyLoading();
        
        // Social Share Enhancement
        initSocialShare();
        
    });

    /**
     * Mobile Menu Toggle
     */
    function initMobileMenu() {
        // Add mobile menu toggle button
        if ($('.nav-links').length && $(window).width() <= 768) {
            if (!$('.mobile-menu-toggle').length) {
                $('.navbar').prepend('<button class="mobile-menu-toggle" aria-label="Toggle Menu"><i class="fas fa-bars"></i></button>');
            }
        }
        
        // Toggle menu on button click
        $(document).on('click', '.mobile-menu-toggle', function() {
            $('.nav-links').toggleClass('active');
            $(this).find('i').toggleClass('fa-bars fa-times');
        });
        
        // Close menu when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.navbar').length) {
                $('.nav-links').removeClass('active');
                $('.mobile-menu-toggle i').removeClass('fa-times').addClass('fa-bars');
            }
        });
        
        // Handle window resize
        $(window).on('resize', function() {
            if ($(window).width() > 768) {
                $('.nav-links').removeClass('active');
                $('.mobile-menu-toggle i').removeClass('fa-times').addClass('fa-bars');
            }
        });
    }

    /**
     * Smooth Scrolling for Anchor Links
     */
    function initSmoothScrolling() {
        $('a[href*="#"]:not([href="#"])').on('click', function() {
            if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html, body').animate({
                        scrollTop: target.offset().top - 100
                    }, 1000);
                    return false;
                }
            }
        });
    }

    /**
     * Search Form Enhancement
     */
    function initSearchForm() {
        // Add search suggestions (placeholder for future enhancement)
        $('.search-field').on('focus', function() {
            $(this).parent().addClass('focused');
        }).on('blur', function() {
            $(this).parent().removeClass('focused');
        });
        
        // Search form validation
        $('.search-form').on('submit', function(e) {
            var searchTerm = $(this).find('.search-field').val().trim();
            if (searchTerm.length < 2) {
                e.preventDefault();
                alert('Please enter at least 2 characters to search.');
                return false;
            }
        });
    }

    /**
     * Comments Enhancement
     */
    function initComments() {
        // Add character counter to comment textarea
        if ($('#comment').length) {
            $('#comment').after('<div class="char-counter"><span class="current">0</span> / <span class="max">65525</span> characters</div>');
            
            $('#comment').on('input', function() {
                var current = $(this).val().length;
                var max = $(this).attr('maxlength') || 65525;
                $('.char-counter .current').text(current);
                
                if (current > max * 0.9) {
                    $('.char-counter').addClass('warning');
                } else {
                    $('.char-counter').removeClass('warning');
                }
            });
        }
        
        // Comment form validation
        $('.comment-form').on('submit', function(e) {
            var comment = $('#comment').val().trim();
            var author = $('#author').val().trim();
            var email = $('#email').val().trim();
            
            if (comment.length < 10) {
                e.preventDefault();
                alert('Please enter a comment with at least 10 characters.');
                $('#comment').focus();
                return false;
            }
            
            if (author.length < 2) {
                e.preventDefault();
                alert('Please enter your name.');
                $('#author').focus();
                return false;
            }
            
            // Basic email validation
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                e.preventDefault();
                alert('Please enter a valid email address.');
                $('#email').focus();
                return false;
            }
        });
    }

    /**
     * Back to Top Button
     */
    function initBackToTop() {
        // Add back to top button
        $('body').append('<button id="back-to-top" title="Back to Top"><i class="fas fa-arrow-up"></i></button>');
        
        // Show/hide button based on scroll position
        $(window).on('scroll', function() {
            if ($(this).scrollTop() > 300) {
                $('#back-to-top').fadeIn();
            } else {
                $('#back-to-top').fadeOut();
            }
        });
        
        // Smooth scroll to top
        $('#back-to-top').on('click', function() {
            $('html, body').animate({
                scrollTop: 0
            }, 800);
            return false;
        });
    }

    /**
     * Image Lazy Loading (basic implementation)
     */
    function initLazyLoading() {
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        if (img.dataset.src) {
                            img.src = img.dataset.src;
                            img.classList.remove('lazy');
                            imageObserver.unobserve(img);
                        }
                    }
                });
            });

            document.querySelectorAll('img[data-src]').forEach(img => {
                imageObserver.observe(img);
            });
        }
    }

    /**
     * Social Share Enhancement
     */
    function initSocialShare() {
        // Open social share links in popup windows
        $('.social-share a').on('click', function(e) {
            var url = $(this).attr('href');
            
            // Skip email links
            if (url.startsWith('mailto:')) {
                return true;
            }
            
            e.preventDefault();
            
            var width = 600;
            var height = 400;
            var left = (screen.width / 2) - (width / 2);
            var top = (screen.height / 2) - (height / 2);
            
            window.open(url, 'share', 
                'width=' + width + 
                ',height=' + height + 
                ',left=' + left + 
                ',top=' + top + 
                ',scrollbars=yes,resizable=yes'
            );
            
            return false;
        });
    }

    /**
     * AJAX Search (placeholder for future enhancement)
     */
    function initAjaxSearch() {
        // This can be implemented later for live search functionality
        var searchTimeout;
        
        $('.search-field').on('input', function() {
            var searchTerm = $(this).val().trim();
            
            clearTimeout(searchTimeout);
            
            if (searchTerm.length >= 3) {
                searchTimeout = setTimeout(function() {
                    // Perform AJAX search
                    performAjaxSearch(searchTerm);
                }, 300);
            }
        });
    }

    /**
     * Perform AJAX Search
     */
    function performAjaxSearch(term) {
        // Placeholder for AJAX search implementation
        $.ajax({
            url: techforum_ajax.ajax_url,
            type: 'POST',
            data: {
                action: 'techforum_search',
                term: term,
                nonce: techforum_ajax.nonce
            },
            success: function(response) {
                // Handle search results
                console.log('Search results:', response);
            },
            error: function() {
                console.log('Search failed');
            }
        });
    }

    /**
     * Form Enhancements
     */
    function initFormEnhancements() {
        // Add loading states to forms
        $('form').on('submit', function() {
            var $form = $(this);
            var $submitBtn = $form.find('input[type="submit"], button[type="submit"]');
            
            if (!$submitBtn.hasClass('loading')) {
                $submitBtn.addClass('loading').prop('disabled', true);
                
                // Add loading text or spinner
                var originalText = $submitBtn.val() || $submitBtn.text();
                $submitBtn.data('original-text', originalText);
                
                if ($submitBtn.is('input')) {
                    $submitBtn.val('Loading...');
                } else {
                    $submitBtn.html('<i class="fas fa-spinner fa-spin"></i> Loading...');
                }
                
                // Reset after 10 seconds (fallback)
                setTimeout(function() {
                    $submitBtn.removeClass('loading').prop('disabled', false);
                    if ($submitBtn.is('input')) {
                        $submitBtn.val($submitBtn.data('original-text'));
                    } else {
                        $submitBtn.text($submitBtn.data('original-text'));
                    }
                }, 10000);
            }
        });
    }

    /**
     * Accessibility Enhancements
     */
    function initAccessibility() {
        // Add skip link
        if (!$('.skip-link').length) {
            $('body').prepend('<a class="skip-link screen-reader-text" href="#primary">Skip to content</a>');
        }
        
        // Improve keyboard navigation
        $('.nav-links a, .btn').on('keydown', function(e) {
            if (e.keyCode === 13) { // Enter key
                $(this).click();
            }
        });
        
        // Add ARIA labels where needed
        $('.search-submit').attr('aria-label', 'Submit search');
        $('.mobile-menu-toggle').attr('aria-label', 'Toggle navigation menu');
    }

    // Initialize additional features
    $(document).ready(function() {
        initFormEnhancements();
        initAccessibility();
    });

})(jQuery);
