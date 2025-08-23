<?php
/**
 * Template Name: Android Forum Page
 * 
 * @package TechForum_Theme
 */

get_header(); ?>

<main id="primary" class="site-main">
    <!-- Forum Header -->
    <section class="forum-header">
        <div class="container">
            <h1><i class="fab fa-android"></i> Android Forum</h1>
            <p>Discuss Android OS, custom ROMs, apps, development, and troubleshooting for all Android devices.</p>
            <a href="#" class="btn btn-android">Start New Thread</a>
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
                    <li class="thread-item">
                        <div class="thread-avatar">
                            <img src="https://i.pravatar.cc/150?img=1" alt="User Avatar">
                        </div>
                        <div class="thread-content">
                            <a href="#" class="thread-title">Android 14 Beta 3 Released: New Features and Improvements</a>
                            <div class="thread-meta">
                                <span><i class="fas fa-user"></i> AndroidDev</span>
                                <span><i class="far fa-clock"></i> 2 hours ago</span>
                                <span><i class="fas fa-eye"></i> 1.2k views</span>
                            </div>
                            <p class="thread-preview">Google has released Android 14 Beta 3 with several new features including improved privacy controls, enhanced notification management, and better battery optimization...</p>
                            <div class="thread-tags">
                                <span class="tag">Android 14</span>
                                <span class="tag">Beta</span>
                                <span class="tag">Google</span>
                            </div>
                        </div>
                        <div class="thread-stats">
                            <div class="stats-number">42</div>
                            <div class="stats-label">Replies</div>
                        </div>
                    </li>
                    
                    <li class="thread-item">
                        <div class="thread-avatar">
                            <img src="https://i.pravatar.cc/150?img=2" alt="User Avatar">
                        </div>
                        <div class="thread-content">
                            <a href="#" class="thread-title">[GUIDE] How to Install Custom ROMs on Samsung Galaxy S23 Ultra</a>
                            <div class="thread-meta">
                                <span><i class="fas fa-user"></i> ROMmaster</span>
                                <span><i class="far fa-clock"></i> Yesterday</span>
                                <span><i class="fas fa-eye"></i> 3.5k views</span>
                            </div>
                            <p class="thread-preview">Complete step-by-step guide to unlock bootloader, install TWRP recovery, and flash custom ROMs on the Samsung Galaxy S23 Ultra. Includes troubleshooting tips...</p>
                            <div class="thread-tags">
                                <span class="tag">Samsung</span>
                                <span class="tag">Galaxy S23</span>
                                <span class="tag">Custom ROM</span>
                                <span class="tag">TWRP</span>
                            </div>
                        </div>
                        <div class="thread-stats">
                            <div class="stats-number">87</div>
                            <div class="stats-label">Replies</div>
                        </div>
                    </li>
                    
                    <li class="thread-item">
                        <div class="thread-avatar">
                            <img src="https://i.pravatar.cc/150?img=3" alt="User Avatar">
                        </div>
                        <div class="thread-content">
                            <a href="#" class="thread-title">Pixel Experience ROM for OnePlus 11 - Official Release</a>
                            <div class="thread-meta">
                                <span><i class="fas fa-user"></i> PixelMaster</span>
                                <span><i class="far fa-clock"></i> 3 days ago</span>
                                <span><i class="fas fa-eye"></i> 5.8k views</span>
                            </div>
                            <p class="thread-preview">Official release of Pixel Experience ROM for OnePlus 11. Brings pure Google Pixel experience with all Pixel features. Android 13 based with monthly security updates...</p>
                            <div class="thread-tags">
                                <span class="tag">OnePlus</span>
                                <span class="tag">Pixel Experience</span>
                                <span class="tag">ROM</span>
                            </div>
                        </div>
                        <div class="thread-stats">
                            <div class="stats-number">124</div>
                            <div class="stats-label">Replies</div>
                        </div>
                    </li>
                    
                    <li class="thread-item">
                        <div class="thread-avatar">
                            <img src="https://i.pravatar.cc/150?img=4" alt="User Avatar">
                        </div>
                        <div class="thread-content">
                            <a href="#" class="thread-title">[SOLVED] Battery Drain Issues After Android 13 Update</a>
                            <div class="thread-meta">
                                <span><i class="fas fa-user"></i> BatteryGuru</span>
                                <span><i class="far fa-clock"></i> 5 days ago</span>
                                <span><i class="fas fa-eye"></i> 7.2k views</span>
                            </div>
                            <p class="thread-preview">Experiencing severe battery drain after updating to Android 13? Here's a comprehensive guide to diagnose and fix battery issues, including identifying rogue apps...</p>
                            <div class="thread-tags">
                                <span class="tag">Battery</span>
                                <span class="tag">Android 13</span>
                                <span class="tag">Troubleshooting</span>
                            </div>
                        </div>
                        <div class="thread-stats">
                            <div class="stats-number">156</div>
                            <div class="stats-label">Replies</div>
                        </div>
                    </li>
                    
                    <li class="thread-item">
                        <div class="thread-avatar">
                            <img src="https://i.pravatar.cc/150?img=5" alt="User Avatar">
                        </div>
                        <div class="thread-content">
                            <a href="#" class="thread-title">Best Magisk Modules of 2023 - Ultimate Collection</a>
                            <div class="thread-meta">
                                <span><i class="fas fa-user"></i> RootWizard</span>
                                <span><i class="far fa-clock"></i> 1 week ago</span>
                                <span><i class="fas fa-eye"></i> 12.4k views</span>
                            </div>
                            <p class="thread-preview">Curated list of the best Magisk modules in 2023. Includes performance enhancers, battery optimizers, audio mods, camera improvements, and system tweaks...</p>
                            <div class="thread-tags">
                                <span class="tag">Magisk</span>
                                <span class="tag">Root</span>
                                <span class="tag">Modules</span>
                            </div>
                        </div>
                        <div class="thread-stats">
                            <div class="stats-number">203</div>
                            <div class="stats-label">Replies</div>
                        </div>
                    </li>
                </ul>

                <!-- Pagination -->
                <div class="pagination">
                    <a href="#" class="page-item"><i class="fas fa-angle-left"></i></a>
                    <a href="#" class="page-item active">1</a>
                    <a href="#" class="page-item">2</a>
                    <a href="#" class="page-item">3</a>
                    <a href="#" class="page-item">4</a>
                    <a href="#" class="page-item">5</a>
                    <a href="#" class="page-item"><i class="fas fa-angle-right"></i></a>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="forum-sidebar">
                <div class="sidebar-widget">
                    <h3>Categories</h3>
                    <ul class="category-list">
                        <li><a href="#"><i class="fas fa-mobile-alt"></i> Android Devices</a></li>
                        <li><a href="#"><i class="fas fa-code"></i> Development</a></li>
                        <li><a href="#"><i class="fas fa-cog"></i> Custom ROMs</a></li>
                        <li><a href="#"><i class="fas fa-terminal"></i> Root & Mods</a></li>
                        <li><a href="#"><i class="fas fa-rocket"></i> Performance</a></li>
                        <li><a href="#"><i class="fas fa-battery-full"></i> Battery</a></li>
                        <li><a href="#"><i class="fas fa-camera"></i> Camera</a></li>
                        <li><a href="#"><i class="fas fa-question-circle"></i> Troubleshooting</a></li>
                    </ul>
                </div>

                <div class="sidebar-widget">
                    <h3>Featured Threads</h3>
                    <div class="featured-threads">
                        <div class="featured-thread">
                            <div class="featured-thread-icon">
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="featured-thread-content">
                                <a href="#">Complete Android Root Guide 2023</a>
                                <div class="featured-thread-meta">
                                    <span>By RootMaster • 15.3k views</span>
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
                                    <span>By GoogleExpert • 8.7k views</span>
                                </div>
                            </div>
                        </div>
                        <div class="featured-thread">
                            <div class="featured-thread-icon">
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="featured-thread-content">
                                <a href="#">Top 10 GCam Ports for 2023</a>
                                <div class="featured-thread-meta">
                                    <span>By PixelShooter • 12.1k views</span>
                                </div>
                            </div>
                        </div>
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
                        <div class="user-avatar">
                            <img src="https://i.pravatar.cc/150?img=11" alt="User Avatar">
                        </div>
                        <div class="user-avatar">
                            <img src="https://i.pravatar.cc/150?img=12" alt="User Avatar">
                        </div>
                        <div class="user-avatar">
                            <img src="https://i.pravatar.cc/150?img=13" alt="User Avatar">
                        </div>
                        <div class="user-avatar">
                            <img src="https://i.pravatar.cc/150?img=14" alt="User Avatar">
                        </div>
                        <div class="user-avatar">
                            <img src="https://i.pravatar.cc/150?img=15" alt="User Avatar">
                        </div>
                        <div class="user-avatar">
                            <img src="https://i.pravatar.cc/150?img=16" alt="User Avatar">
                        </div>
                        <div class="user-avatar">
                            <img src="https://i.pravatar.cc/150?img=17" alt="User Avatar">
                        </div>
                        <div class="user-avatar">
                            <img src="https://i.pravatar.cc/150?img=18" alt="User Avatar">
                        </div>
                    </div>
                    <p class="online-stats">
                        <strong>253</strong> users online now • <a href="#" class="view-all-link">View All</a>
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
                                    <span>3 hours ago</span>
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
        <div class="device-forums-section">
            <h2>Popular Android Device Forums</h2>
            <div class="device-forums-grid">
                <div class="device-forum-card">
                    <h3>
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2f/Google_2015_logo.svg/2560px-Google_2015_logo.svg.png" alt="Google" class="brand-logo">
                        Google Pixel
                    </h3>
                    <ul class="device-list">
                        <li><a href="#">Pixel 8 Pro</a></li>
                        <li><a href="#">Pixel 8</a></li>
                        <li><a href="#">Pixel 7 Series</a></li>
                        <li><a href="#">Pixel 6 Series</a></li>
                        <li><a href="#" class="view-all-devices">View All Pixel Devices →</a></li>
                    </ul>
                </div>
                
                <div class="device-forum-card">
                    <h3>
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/24/Samsung_Logo.svg/2560px-Samsung_Logo.svg.png" alt="Samsung" class="brand-logo">
                        Samsung Galaxy
                    </h3>
                    <ul class="device-list">
                        <li><a href="#">Galaxy S23 Series</a></li>
                        <li><a href="#">Galaxy S22 Series</a></li>
                        <li><a href="#">Galaxy Z Fold/Flip</a></li>
                        <li><a href="#">Galaxy A Series</a></li>
                        <li><a href="#" class="view-all-devices">View All Samsung Devices →</a></li>
                    </ul>
                </div>
                
                <div class="device-forum-card">
                    <h3>
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ae/Xiaomi_logo_%282021-%29.svg/2560px-Xiaomi_logo_%282021-%29.svg.png" alt="Xiaomi" class="brand-logo">
                        Xiaomi
                    </h3>
                    <ul class="device-list">
                        <li><a href="#">Xiaomi 13 Series</a></li>
                        <li><a href="#">Redmi Note 12 Series</a></li>
                        <li><a href="#">POCO F5 Series</a></li>
                        <li><a href="#">Xiaomi 12 Series</a></li>
                        <li><a href="#" class="view-all-devices">View All Xiaomi Devices →</a></li>
                    </ul>
                </div>
                
                <div class="device-forum-card">
                    <h3>
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c9/OnePlus_logo.svg/2560px-OnePlus_logo.svg.png" alt="OnePlus" class="brand-logo">
                        OnePlus
                    </h3>
                    <ul class="device-list">
                        <li><a href="#">OnePlus 11 Series</a></li>
                        <li><a href="#">OnePlus 10 Series</a></li>
                        <li><a href="#">OnePlus Nord Series</a></li>
                        <li><a href="#">OnePlus 9 Series</a></li>
                        <li><a href="#" class="view-all-devices">View All OnePlus Devices →</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Android Development Resources -->
        <div class="development-resources-section">
            <h2>Android Development Resources</h2>
            <div class="resources-grid">
                <div class="resource-item">
                    <div class="resource-icon">
                        <i class="fas fa-code"></i>
                    </div>
                    <div class="resource-content">
                        <h3>Android SDK Tutorials</h3>
                        <p>Learn Android app development with our comprehensive SDK tutorials.</p>
                        <a href="#" class="resource-link">View Tutorials →</a>
                    </div>
                </div>
                
                <div class="resource-item">
                    <div class="resource-icon">
                        <i class="fas fa-terminal"></i>
                    </div>
                    <div class="resource-content">
                        <h3>ADB & Fastboot Guides</h3>
                        <p>Master Android Debug Bridge and Fastboot commands for device control.</p>
                        <a href="#" class="resource-link">View Guides →</a>
                    </div>
                </div>
                
                <div class="resource-item">
                    <div class="resource-icon">
                        <i class="fas fa-unlock-alt"></i>
                    </div>
                    <div class="resource-content">
                        <h3>Bootloader Unlocking</h3>
                        <p>Device-specific guides for unlocking bootloaders safely and effectively.</p>
                        <a href="#" class="resource-link">View Guides →</a>
                    </div>
                </div>
                
                <div class="resource-item">
                    <div class="resource-icon">
                        <i class="fas fa-cog"></i>
                    </div>
                    <div class="resource-content">
                        <h3>Custom ROM Development</h3>
                        <p>Learn how to build, customize, and maintain your own Android ROM.</p>
                        <a href="#" class="resource-link">View Tutorials →</a>
                    </div>
                </div>
                
                <div class="resource-item">
                    <div class="resource-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <div class="resource-content">
                        <h3>Root & Security</h3>
                        <p>Safe rooting methods and security considerations for Android devices.</p>
                        <a href="#" class="resource-link">View Guides →</a>
                    </div>
                </div>
                
                <div class="resource-item">
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

    <!-- Create Thread Button -->
    <a href="#" class="create-thread-btn">
        <i class="fas fa-plus"></i>
    </a>
</main>

<?php get_footer(); ?>
