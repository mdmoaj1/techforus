<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
    <div class="container">
        <nav class="navbar">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="logo">
                <i class="fas fa-code"></i> 
                <?php bloginfo('name'); ?>
            </a>
            
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_class' => 'nav-links',
                'container' => false,
                'fallback_cb' => 'techforum_fallback_menu',
                'walker' => new TechForum_Walker_Nav_Menu()
            ));
            
            // Forum authentication buttons
            $current_user = ForumAuth::get_current_user();
            if ($current_user) {
                echo '<div class="forum-user-menu">';
                echo '<div class="user-avatar">';
                echo '<img src="' . (!empty($current_user->avatar_url) ? esc_url($current_user->avatar_url) : 'https://www.gravatar.com/avatar/' . md5($current_user->email) . '?d=identicon&s=32') . '" alt="Avatar">';
                echo '</div>';
                echo '<div class="user-dropdown">';
                echo '<span class="user-name">' . esc_html($current_user->display_name) . '</span>';
                echo '<div class="dropdown-content">';
                echo '<a href="#" class="user-profile-link"><i class="fas fa-user"></i> Profile</a>';
                echo '<a href="#" class="user-posts-link"><i class="fas fa-list"></i> My Posts</a>';
                echo '<a href="#" class="user-settings-link"><i class="fas fa-cog"></i> Settings</a>';
                echo '<a href="#" class="forum-logout-btn"><i class="fas fa-sign-out-alt"></i> Logout</a>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            } else {
                echo '<div class="forum-auth-buttons">';
                echo '<button class="btn btn-outline forum-login-btn"><i class="fas fa-sign-in-alt"></i> Login</button>';
                echo '<button class="btn btn-primary forum-register-btn"><i class="fas fa-user-plus"></i> Register</button>';
                echo '</div>';
            }
            ?>
        </nav>
    </div>
</header>

<!-- Forum Authentication Modals -->
<div id="forum-auth-overlay" class="auth-overlay" style="display: none;">
    <!-- Login Modal -->
    <div id="login-modal" class="auth-modal">
        <div class="modal-header">
            <h3><i class="fas fa-sign-in-alt"></i> Login to Forum</h3>
            <button class="modal-close">&times;</button>
        </div>
        <div class="modal-body">
            <form id="forum-login-form">
                <div class="form-group">
                    <label for="login-username">Username or Email</label>
                    <input type="text" id="login-username" name="username" required>
                    <i class="fas fa-user form-icon"></i>
                </div>
                <div class="form-group">
                    <label for="login-password">Password</label>
                    <input type="password" id="login-password" name="password" required>
                    <i class="fas fa-lock form-icon"></i>
                </div>
                <div class="form-options">
                    <label class="checkbox-wrapper">
                        <input type="checkbox" id="remember-me">
                        <span class="checkmark"></span>
                        Remember me
                    </label>
                    <a href="#" class="forgot-password">Forgot password?</a>
                </div>
                <button type="submit" class="btn btn-primary btn-full">
                    <i class="fas fa-sign-in-alt"></i> Login
                </button>
                <div class="modal-footer">
                    <p>Don't have an account? <a href="#" class="switch-to-register">Register here</a></p>
                </div>
            </form>
        </div>
        <div class="auth-loading" style="display: none;">
            <div class="loading-spinner"></div>
            <p>Logging you in...</p>
        </div>
    </div>

    <!-- Register Modal -->
    <div id="register-modal" class="auth-modal" style="display: none;">
        <div class="modal-header">
            <h3><i class="fas fa-user-plus"></i> Join Our Community</h3>
            <button class="modal-close">&times;</button>
        </div>
        <div class="modal-body">
            <form id="forum-register-form">
                <div class="form-group">
                    <label for="register-username">Username</label>
                    <input type="text" id="register-username" name="username" required>
                    <i class="fas fa-user form-icon"></i>
                    <small class="form-help">3-20 characters, letters and numbers only</small>
                </div>
                <div class="form-group">
                    <label for="register-email">Email Address</label>
                    <input type="email" id="register-email" name="email" required>
                    <i class="fas fa-envelope form-icon"></i>
                </div>
                <div class="form-group">
                    <label for="register-display-name">Display Name</label>
                    <input type="text" id="register-display-name" name="display_name" required>
                    <i class="fas fa-id-card form-icon"></i>
                    <small class="form-help">How others will see your name</small>
                </div>
                <div class="form-group">
                    <label for="register-password">Password</label>
                    <input type="password" id="register-password" name="password" required>
                    <i class="fas fa-lock form-icon"></i>
                    <div class="password-strength">
                        <div class="strength-meter">
                            <div class="strength-fill"></div>
                        </div>
                        <span class="strength-text">Enter password</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="register-confirm-password">Confirm Password</label>
                    <input type="password" id="register-confirm-password" name="confirm_password" required>
                    <i class="fas fa-lock form-icon"></i>
                </div>
                <div class="form-options">
                    <label class="checkbox-wrapper">
                        <input type="checkbox" id="agree-terms" required>
                        <span class="checkmark"></span>
                        I agree to the <a href="#" target="_blank">Terms of Service</a> and <a href="#" target="_blank">Privacy Policy</a>
                    </label>
                </div>
                <button type="submit" class="btn btn-primary btn-full">
                    <i class="fas fa-user-plus"></i> Create Account
                </button>
                <div class="modal-footer">
                    <p>Already have an account? <a href="#" class="switch-to-login">Login here</a></p>
                </div>
            </form>
        </div>
        <div class="auth-loading" style="display: none;">
            <div class="loading-spinner"></div>
            <p>Creating your account...</p>
        </div>
    </div>
</div>
