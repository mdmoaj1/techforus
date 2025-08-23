<?php
/**
 * Template Name: Custom ROMs Forum Page
 * 
 * @package TechForum_Theme
 */

get_header(); ?>

<main id="primary" class="site-main">
    <!-- Forum Header -->
    <section class="forum-header roms-header">
        <div class="container">
            <h1><i class="fas fa-microchip"></i> Custom ROMs Forum</h1>
            <p>Explore custom Android ROMs, installation guides, device-specific builds, and the latest developments in Android customization.</p>
            <a href="#" class="btn btn-roms">Share Your ROM</a>
        </div>
    </section>

    <div class="container">
        <!-- Breadcrumb -->
        <ul class="breadcrumb-nav">
            <li class="breadcrumb-item"><a href="<?php echo home_url(); ?>"><i class="fas fa-home"></i> Home</a></li>
            <li class="breadcrumb-item"><a href="#">Forums</a></li>
            <li class="breadcrumb-item active">Custom ROMs</li>
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
                            <img src="https://i.pravatar.cc/150?img=61" alt="User Avatar">
                        </div>
                        <div class="thread-content">
                            <a href="#" class="thread-title">[ROM] LineageOS 21 Official for Samsung Galaxy S23 Series</a>
                            <div class="thread-meta">
                                <span><i class="fas fa-user"></i> LineageDev</span>
                                <span><i class="far fa-clock"></i> 2 hours ago</span>
                                <span><i class="fas fa-eye"></i> 3.4k views</span>
                            </div>
                            <p class="thread-preview">Official LineageOS 21 release for Galaxy S23, S23+, and S23 Ultra. Based on Android 14 with enhanced privacy features, improved performance, and monthly security updates...</p>
                            <div class="thread-tags">
                                <span class="tag">LineageOS</span>
                                <span class="tag">Samsung</span>
                                <span class="tag">Galaxy S23</span>
                                <span class="tag">Official</span>
                            </div>
                        </div>
                        <div class="thread-stats">
                            <div class="stats-number">89</div>
                            <div class="stats-label">Replies</div>
                        </div>
                    </li>
                    
                    <li class="thread-item">
                        <div class="thread-avatar">
                            <img src="https://i.pravatar.cc/150?img=62" alt="User Avatar">
                        </div>
                        <div class="thread-content">
                            <a href="#" class="thread-title">Pixel Experience Plus for OnePlus 11 - Android 14 Based</a>
                            <div class="thread-meta">
                                <span><i class="fas fa-user"></i> PixelROMDev</span>
                                <span><i class="far fa-clock"></i> Yesterday</span>
                                <span><i class="fas fa-eye"></i> 5.7k views</span>
                            </div>
                            <p class="thread-preview">Latest Pixel Experience Plus ROM for OnePlus 11. Includes all Google Pixel features, Call Recording, Now Playing, and exclusive Pixel wallpapers. Stable build with OTA support...</p>
                            <div class="thread-tags">
                                <span class="tag">Pixel Experience</span>
                                <span class="tag">OnePlus 11</span>
                                <span class="tag">Android 14</span>
                                <span class="tag">Stable</span>
                            </div>
                        </div>
                        <div class="thread-stats">
                            <div class="stats-number">156</div>
                            <div class="stats-label">Replies</div>
                        </div>
                    </li>
                    
                    <li class="thread-item">
                        <div class="thread-avatar">
                            <img src="https://i.pravatar.cc/150?img=63" alt="User Avatar">
                        </div>
                        <div class="thread-content">
                            <a href="#" class="thread-title">[GUIDE] How to Build Custom ROM from Source - Complete Tutorial</a>
                            <div class="thread-meta">
                                <span><i class="fas fa-user"></i> ROMBuilder</span>
                                <span><i class="far fa-clock"></i> 3 days ago</span>
                                <span><i class="fas fa-eye"></i> 8.2k views</span>
                            </div>
                            <p class="thread-preview">Comprehensive guide to building custom ROMs from AOSP source. Covers environment setup, device tree configuration, kernel compilation, and debugging common build errors...</p>
                            <div class="thread-tags">
                                <span class="tag">ROM Building</span>
                                <span class="tag">AOSP</span>
                                <span class="tag">Tutorial</span>
                                <span class="tag">Development</span>
                            </div>
                        </div>
                        <div class="thread-stats">
                            <div class="stats-number">234</div>
                            <div class="stats-label">Replies</div>
                        </div>
                    </li>
                    
                    <li class="thread-item">
                        <div class="thread-avatar">
                            <img src="https://i.pravatar.cc/150?img=64" alt="User Avatar">
                        </div>
                        <div class="thread-content">
                            <a href="#" class="thread-title">crDroid v10.1 for Xiaomi Redmi Note 12 Pro - Feature Rich ROM</a>
                            <div class="thread-meta">
                                <span><i class="fas fa-user"></i> crDroidTeam</span>
                                <span><i class="far fa-clock"></i> 5 days ago</span>
                                <span><i class="fas fa-eye"></i> 4.1k views</span>
                            </div>
                            <p class="thread-preview">crDroid v10.1 release for Redmi Note 12 Pro with extensive customization options, performance optimizations, and unique features. Based on Android 14 with regular updates...</p>
                            <div class="thread-tags">
                                <span class="tag">crDroid</span>
                                <span class="tag">Xiaomi</span>
                                <span class="tag">Redmi Note 12</span>
                                <span class="tag">Customization</span>
                            </div>
                        </div>
                        <div class="thread-stats">
                            <div class="stats-number">178</div>
                            <div class="stats-label">Replies</div>
                        </div>
                    </li>
                    
                    <li class="thread-item">
                        <div class="thread-avatar">
                            <img src="https://i.pravatar.cc/150?img=65" alt="User Avatar">
                        </div>
                        <div class="thread-content">
                            <a href="#" class="thread-title">[RECOVERY] TWRP 3.7.1 for Popular Devices - Installation Guide</a>
                            <div class="thread-meta">
                                <span><i class="fas fa-user"></i> TWRPMaintainer</span>
                                <span><i class="far fa-clock"></i> 1 week ago</span>
                                <span><i class="fas fa-eye"></i> 12.3k views</span>
                            </div>
                            <p class="thread-preview">Latest TWRP recovery builds for popular Android devices. Installation instructions, backup procedures, and troubleshooting common issues. Essential for ROM flashing...</p>
                            <div class="thread-tags">
                                <span class="tag">TWRP</span>
                                <span class="tag">Recovery</span>
                                <span class="tag">Installation</span>
                                <span class="tag">Flashing</span>
                            </div>
                        </div>
                        <div class="thread-stats">
                            <div class="stats-number">312</div>
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
                        <li><a href="#"><i class="fas fa-mobile-alt"></i> Device Specific ROMs</a></li>
                        <li><a href="#"><i class="fas fa-code"></i> ROM Development</a></li>
                        <li><a href="#"><i class="fas fa-wrench"></i> Custom Recovery</a></li>
                        <li><a href="#"><i class="fas fa-download"></i> ROM Downloads</a></li>
                        <li><a href="#"><i class="fas fa-bug"></i> Bug Reports</a></li>
                        <li><a href="#"><i class="fas fa-question-circle"></i> Installation Help</a></li>
                        <li><a href="#"><i class="fas fa-palette"></i> Themes & Mods</a></li>
                        <li><a href="#"><i class="fas fa-tools"></i> ROM Tools</a></li>
                    </ul>
                </div>

                <div class="sidebar-widget">
                    <h3>Featured ROMs</h3>
                    <div class="featured-threads">
                        <div class="featured-thread">
                            <div class="featured-thread-icon">
                                <i class="fas fa-fire"></i>
                            </div>
                            <div class="featured-thread-content">
                                <a href="#">LineageOS 21 - Most Popular AOSP ROM</a>
                                <div class="featured-thread-meta">
                                    <span>By LineageTeam • 45.2k downloads</span>
                                </div>
                            </div>
                        </div>
                        <div class="featured-thread">
                            <div class="featured-thread-icon">
                                <i class="fas fa-fire"></i>
                            </div>
                            <div class="featured-thread-content">
                                <a href="#">Pixel Experience - Pure Google Experience</a>
                                <div class="featured-thread-meta">
                                    <span>By PixelTeam • 38.7k downloads</span>
                                </div>
                            </div>
                        </div>
                        <div class="featured-thread">
                            <div class="featured-thread-icon">
                                <i class="fas fa-fire"></i>
                            </div>
                            <div class="featured-thread-content">
                                <a href="#">Evolution X - Feature Rich ROM</a>
                                <div class="featured-thread-meta">
                                    <span>By EvolutionX • 29.1k downloads</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="sidebar-widget">
                    <h3>Popular Tags</h3>
                    <div class="tag-cloud">
                        <span class="tag">LineageOS</span>
                        <span class="tag">Pixel Experience</span>
                        <span class="tag">crDroid</span>
                        <span class="tag">Evolution X</span>
                        <span class="tag">AOSP</span>
                        <span class="tag">TWRP</span>
                        <span class="tag">OrangeFox</span>
                        <span class="tag">Magisk</span>
                        <span class="tag">GApps</span>
                        <span class="tag">Kernel</span>
                        <span class="tag">Xposed</span>
                        <span class="tag">Root</span>
                        <span class="tag">Bootloader</span>
                        <span class="tag">Fastboot</span>
                        <span class="tag">ADB</span>
                    </div>
                </div>

                <div class="sidebar-widget">
                    <h3>ROM Developers</h3>
                    <div class="online-users">
                        <div class="user-avatar">
                            <img src="https://i.pravatar.cc/150?img=71" alt="Developer Avatar">
                        </div>
                        <div class="user-avatar">
                            <img src="https://i.pravatar.cc/150?img=72" alt="Developer Avatar">
                        </div>
                        <div class="user-avatar">
                            <img src="https://i.pravatar.cc/150?img=73" alt="Developer Avatar">
                        </div>
                        <div class="user-avatar">
                            <img src="https://i.pravatar.cc/150?img=74" alt="Developer Avatar">
                        </div>
                        <div class="user-avatar">
                            <img src="https://i.pravatar.cc/150?img=75" alt="Developer Avatar">
                        </div>
                        <div class="user-avatar">
                            <img src="https://i.pravatar.cc/150?img=76" alt="Developer Avatar">
                        </div>
                    </div>
                    <p class="online-stats">
                        <strong>67</strong> developers online • <a href="#" class="view-all-link">View All</a>
                    </p>
                </div>

                <div class="sidebar-widget">
                    <h3>ROM News & Updates</h3>
                    <div class="featured-threads">
                        <div class="featured-thread">
                            <div class="featured-thread-icon">
                                <i class="fas fa-newspaper"></i>
                            </div>
                            <div class="featured-thread-content">
                                <a href="#">Android 14 QPR2 Source Code Released</a>
                                <div class="featured-thread-meta">
                                    <span>1 hour ago</span>
                                </div>
                            </div>
                        </div>
                        <div class="featured-thread">
                            <div class="featured-thread-icon">
                                <i class="fas fa-newspaper"></i>
                            </div>
                            <div class="featured-thread-content">
                                <a href="#">LineageOS 21 Adds Support for 15 New Devices</a>
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
                                <a href="#">TWRP 3.7.1 Released with Android 14 Support</a>
                                <div class="featured-thread-meta">
                                    <span>2 days ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Popular ROM Projects -->
        <div class="device-forums-section">
            <h2>Popular ROM Projects</h2>
            <div class="device-forums-grid">
                <div class="device-forum-card">
                    <h3>
                        <i class="fas fa-code" style="color: #167c80; margin-right: 0.5rem;"></i>
                        LineageOS
                    </h3>
                    <ul class="device-list">
                        <li><a href="#">LineageOS 21 (Android 14)</a></li>
                        <li><a href="#">LineageOS 20 (Android 13)</a></li>
                        <li><a href="#">Device Support List</a></li>
                        <li><a href="#">Installation Guides</a></li>
                        <li><a href="#" class="view-all-devices">View All LineageOS →</a></li>
                    </ul>
                </div>
                
                <div class="device-forum-card">
                    <h3>
                        <i class="fas fa-mobile-alt" style="color: #4285f4; margin-right: 0.5rem;"></i>
                        Pixel Experience
                    </h3>
                    <ul class="device-list">
                        <li><a href="#">Pixel Experience 14</a></li>
                        <li><a href="#">Pixel Experience Plus</a></li>
                        <li><a href="#">CAF Based Builds</a></li>
                        <li><a href="#">Official Devices</a></li>
                        <li><a href="#" class="view-all-devices">View All Pixel Experience →</a></li>
                    </ul>
                </div>
                
                <div class="device-forum-card">
                    <h3>
                        <i class="fas fa-palette" style="color: #ff6b35; margin-right: 0.5rem;"></i>
                        crDroid
                    </h3>
                    <ul class="device-list">
                        <li><a href="#">crDroid v10 (Android 14)</a></li>
                        <li><a href="#">Customization Features</a></li>
                        <li><a href="#">Device Specific Builds</a></li>
                        <li><a href="#">Themes & Mods</a></li>
                        <li><a href="#" class="view-all-devices">View All crDroid →</a></li>
                    </ul>
                </div>
                
                <div class="device-forum-card">
                    <h3>
                        <i class="fas fa-rocket" style="color: #9c27b0; margin-right: 0.5rem;"></i>
                        Evolution X
                    </h3>
                    <ul class="device-list">
                        <li><a href="#">Evolution X 8 (Android 14)</a></li>
                        <li><a href="#">Performance Optimizations</a></li>
                        <li><a href="#">Gaming Features</a></li>
                        <li><a href="#">Battery Optimizations</a></li>
                        <li><a href="#" class="view-all-devices">View All Evolution X →</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- ROM Development Resources -->
        <div class="development-resources-section">
            <h2>ROM Development Resources</h2>
            <div class="resources-grid">
                <div class="resource-item">
                    <div class="resource-icon">
                        <i class="fas fa-code"></i>
                    </div>
                    <div class="resource-content">
                        <h3>AOSP Building Guide</h3>
                        <p>Learn to build Android from source code, set up build environment, and compile ROMs.</p>
                        <a href="#" class="resource-link">View Building Guides →</a>
                    </div>
                </div>
                
                <div class="resource-item">
                    <div class="resource-icon">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <div class="resource-content">
                        <h3>Device Tree Creation</h3>
                        <p>Create and maintain device trees for custom ROM compatibility and features.</p>
                        <a href="#" class="resource-link">View Device Tree Guides →</a>
                    </div>
                </div>
                
                <div class="resource-item">
                    <div class="resource-icon">
                        <i class="fas fa-wrench"></i>
                    </div>
                    <div class="resource-content">
                        <h3>Custom Recovery</h3>
                        <p>Build and maintain TWRP, OrangeFox, and other custom recovery solutions.</p>
                        <a href="#" class="resource-link">View Recovery Guides →</a>
                    </div>
                </div>
                
                <div class="resource-item">
                    <div class="resource-icon">
                        <i class="fas fa-microchip"></i>
                    </div>
                    <div class="resource-content">
                        <h3>Kernel Development</h3>
                        <p>Custom kernel compilation, optimization, and feature implementation for ROMs.</p>
                        <a href="#" class="resource-link">View Kernel Guides →</a>
                    </div>
                </div>
                
                <div class="resource-item">
                    <div class="resource-icon">
                        <i class="fas fa-bug"></i>
                    </div>
                    <div class="resource-content">
                        <h3>Debugging & Testing</h3>
                        <p>ROM testing procedures, bug reporting, and debugging common ROM issues.</p>
                        <a href="#" class="resource-link">View Testing Guides →</a>
                    </div>
                </div>
                
                <div class="resource-item">
                    <div class="resource-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="resource-content">
                        <h3>Community Guidelines</h3>
                        <p>ROM sharing etiquette, licensing, and community contribution guidelines.</p>
                        <a href="#" class="resource-link">View Guidelines →</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Thread Button -->
    <a href="#" class="create-thread-btn roms-btn">
        <i class="fas fa-plus"></i>
    </a>
</main>

<?php get_footer(); ?>
