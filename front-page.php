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
