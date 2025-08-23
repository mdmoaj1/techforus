<?php
/**
 * Template Name: Root Access Forum Page
 * 
 * @package TechForum_Theme
 */

get_header(); ?>

<main id="primary" class="site-main">
    <!-- Forum Header -->
    <section class="forum-header root-header">
        <div class="container">
            <h1><i class="fas fa-user-shield"></i> Root Access Forum</h1>
            <p>Discuss Android rooting methods, Magisk modules, root applications, and advanced system modifications for power users.</p>
            <a href="#" class="btn btn-root">Share Root Method</a>
        </div>
    </section>

    <div class="container">
        <!-- Breadcrumb -->
        <ul class="breadcrumb-nav">
            <li class="breadcrumb-item"><a href="<?php echo home_url(); ?>"><i class="fas fa-home"></i> Home</a></li>
            <li class="breadcrumb-item"><a href="#">Forums</a></li>
            <li class="breadcrumb-item active">Root Access</li>
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
                            <img src="https://i.pravatar.cc/150?img=101" alt="User Avatar">
                        </div>
                        <div class="thread-content">
                            <a href="#" class="thread-title">Magisk v27.0 Released: New Features and Installation Guide</a>
                            <div class="thread-meta">
                                <span><i class="fas fa-user"></i> MagiskMaster</span>
                                <span><i class="far fa-clock"></i> 1 hour ago</span>
                                <span><i class="fas fa-eye"></i> 4.2k views</span>
                            </div>
                            <p class="thread-preview">Latest Magisk release with improved Zygisk, better SafetyNet bypass, and enhanced module support. Installation guide for Android 14 devices and troubleshooting tips...</p>
                            <div class="thread-tags">
                                <span class="tag">Magisk</span>
                                <span class="tag">v27.0</span>
                                <span class="tag">Installation</span>
                                <span class="tag">Android 14</span>
                            </div>
                        </div>
                        <div class="thread-stats">
                            <div class="stats-number">78</div>
                            <div class="stats-label">Replies</div>
                        </div>
                    </li>
                    
                    <li class="thread-item">
                        <div class="thread-avatar">
                            <img src="https://i.pravatar.cc/150?img=102" alt="User Avatar">
                        </div>
                        <div class="thread-content">
                            <a href="#" class="thread-title">[MODULE] Universal SafetyNet Fix v2.4.0 - Pass All Checks</a>
                            <div class="thread-meta">
                                <span><i class="fas fa-user"></i> SafetyNetGuru</span>
                                <span><i class="far fa-clock"></i> Yesterday</span>
                                <span><i class="fas fa-eye"></i> 8.9k views</span>
                            </div>
                            <p class="thread-preview">Updated SafetyNet Fix module that bypasses Google Play Protect checks on rooted devices. Compatible with latest Google Play Services and banking apps...</p>
                            <div class="thread-tags">
                                <span class="tag">SafetyNet</span>
                                <span class="tag">Module</span>
                                <span class="tag">Banking Apps</span>
                                <span class="tag">Play Protect</span>
                            </div>
                        </div>
                        <div class="thread-stats">
                            <div class="stats-number">245</div>
                            <div class="stats-label">Replies</div>
                        </div>
                    </li>
                    
                    <li class="thread-item">
                        <div class="thread-avatar">
                            <img src="https://i.pravatar.cc/150?img=103" alt="User Avatar">
                        </div>
                        <div class="thread-content">
                            <a href="#" class="thread-title">Root Samsung Galaxy S24 Ultra with Magisk - Complete Guide</a>
                            <div class="thread-meta">
                                <span><i class="fas fa-user"></i> SamsungRooter</span>
                                <span><i class="far fa-clock"></i> 2 days ago</span>
                                <span><i class="fas fa-eye"></i> 6.7k views</span>
                            </div>
                            <p class="thread-preview">Step-by-step guide to root Samsung Galaxy S24 Ultra using Magisk. Includes bootloader unlock, custom recovery installation, and Knox bypass methods...</p>
                            <div class="thread-tags">
                                <span class="tag">Samsung</span>
                                <span class="tag">Galaxy S24</span>
                                <span class="tag">Root</span>
                                <span class="tag">Knox</span>
                            </div>
                        </div>
                        <div class="thread-stats">
                            <div class="stats-number">167</div>
                            <div class="stats-label">Replies</div>
                        </div>
                    </li>
                    
                    <li class="thread-item">
                        <div class="thread-avatar">
                            <img src="https://i.pravatar.cc/150?img=104" alt="User Avatar">
                        </div>
                        <div class="thread-content">
                            <a href="#" class="thread-title">Best Magisk Modules Collection 2024 - Performance & Privacy</a>
                            <div class="thread-meta">
                                <span><i class="fas fa-user"></i> ModuleCollector</span>
                                <span><i class="far fa-clock"></i> 4 days ago</span>
                                <span><i class="fas fa-eye"></i> 12.1k views</span>
                            </div>
                            <p class="thread-preview">Curated collection of the best Magisk modules for 2024. Performance boosters, privacy enhancers, audio improvements, and system modifications. Installation and compatibility notes...</p>
                            <div class="thread-tags">
                                <span class="tag">Modules</span>
                                <span class="tag">Performance</span>
                                <span class="tag">Privacy</span>
                                <span class="tag">2024</span>
                            </div>
                        </div>
                        <div class="thread-stats">
                            <div class="stats-number">389</div>
                            <div class="stats-label">Replies</div>
                        </div>
                    </li>
                    
                    <li class="thread-item">
                        <div class="thread-avatar">
                            <img src="https://i.pravatar.cc/150?img=105" alt="User Avatar">
                        </div>
                        <div class="thread-content">
                            <a href="#" class="thread-title">[SOLVED] Root Detection Bypass for Banking Apps - Multiple Methods</a>
                            <div class="thread-meta">
                                <span><i class="fas fa-user"></i> BypassExpert</span>
                                <span><i class="far fa-clock"></i> 1 week ago</span>
                                <span><i class="fas fa-eye"></i> 9.8k views</span>
                            </div>
                            <p class="thread-preview">Comprehensive guide to bypass root detection in banking and financial apps. Magisk Hide alternatives, Universal SafetyNet Fix, and app-specific solutions...</p>
                            <div class="thread-tags">
                                <span class="tag">Root Detection</span>
                                <span class="tag">Banking Apps</span>
                                <span class="tag">Bypass</span>
                                <span class="tag">Magisk Hide</span>
                            </div>
                        </div>
                        <div class="thread-stats">
                            <div class="stats-number">456</div>
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
                        <li><a href="#"><i class="fas fa-magic"></i> Magisk & Modules</a></li>
                        <li><a href="#"><i class="fas fa-mobile-alt"></i> Device Specific Root</a></li>
                        <li><a href="#"><i class="fas fa-shield-alt"></i> Root Detection Bypass</a></li>
                        <li><a href="#"><i class="fas fa-apps"></i> Root Applications</a></li>
                        <li><a href="#"><i class="fas fa-cogs"></i> System Modifications</a></li>
                        <li><a href="#"><i class="fas fa-bug"></i> Troubleshooting</a></li>
                        <li><a href="#"><i class="fas fa-code"></i> Root Development</a></li>
                        <li><a href="#"><i class="fas fa-question-circle"></i> Rooting Help</a></li>
                    </ul>
                </div>

                <div class="sidebar-widget">
                    <h3>Featured Modules</h3>
                    <div class="featured-threads">
                        <div class="featured-thread">
                            <div class="featured-thread-icon">
                                <i class="fas fa-fire"></i>
                            </div>
                            <div class="featured-thread-content">
                                <a href="#">Universal SafetyNet Fix - Most Downloaded</a>
                                <div class="featured-thread-meta">
                                    <span>By Displax • 2.1M downloads</span>
                                </div>
                            </div>
                        </div>
                        <div class="featured-thread">
                            <div class="featured-thread-icon">
                                <i class="fas fa-fire"></i>
                            </div>
                            <div class="featured-thread-content">
                                <a href="#">Viper4Android FX - Audio Enhancement</a>
                                <div class="featured-thread-meta">
                                    <span>By ViperTeam • 1.8M downloads</span>
                                </div>
                            </div>
                        </div>
                        <div class="featured-thread">
                            <div class="featured-thread-icon">
                                <i class="fas fa-fire"></i>
                            </div>
                            <div class="featured-thread-content">
                                <a href="#">AdAway - System-wide Ad Blocking</a>
                                <div class="featured-thread-meta">
                                    <span>By AdAway • 1.5M downloads</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="sidebar-widget">
                    <h3>Popular Tags</h3>
                    <div class="tag-cloud">
                        <span class="tag">Magisk</span>
                        <span class="tag">SuperSU</span>
                        <span class="tag">Xposed</span>
                        <span class="tag">SafetyNet</span>
                        <span class="tag">Root Apps</span>
                        <span class="tag">Modules</span>
                        <span class="tag">Titanium Backup</span>
                        <span class="tag">AdAway</span>
                        <span class="tag">Viper4Android</span>
                        <span class="tag">Greenify</span>
                        <span class="tag">Root Explorer</span>
                        <span class="tag">Banking Apps</span>
                        <span class="tag">Knox</span>
                        <span class="tag">Systemless</span>
                        <span class="tag">Zygisk</span>
                    </div>
                </div>

                <div class="sidebar-widget">
                    <h3>Root Experts</h3>
                    <div class="online-users">
                        <div class="user-avatar">
                            <img src="https://i.pravatar.cc/150?img=111" alt="Expert Avatar">
                        </div>
                        <div class="user-avatar">
                            <img src="https://i.pravatar.cc/150?img=112" alt="Expert Avatar">
                        </div>
                        <div class="user-avatar">
                            <img src="https://i.pravatar.cc/150?img=113" alt="Expert Avatar">
                        </div>
                        <div class="user-avatar">
                            <img src="https://i.pravatar.cc/150?img=114" alt="Expert Avatar">
                        </div>
                        <div class="user-avatar">
                            <img src="https://i.pravatar.cc/150?img=115" alt="Expert Avatar">
                        </div>
                        <div class="user-avatar">
                            <img src="https://i.pravatar.cc/150?img=116" alt="Expert Avatar">
                        </div>
                    </div>
                    <p class="online-stats">
                        <strong>89</strong> experts online • <a href="#" class="view-all-link">View All</a>
                    </p>
                </div>

                <div class="sidebar-widget">
                    <h3>Latest Root News</h3>
                    <div class="featured-threads">
                        <div class="featured-thread">
                            <div class="featured-thread-icon">
                                <i class="fas fa-newspaper"></i>
                            </div>
                            <div class="featured-thread-content">
                                <a href="#">Magisk v27.0 Stable Released with New Features</a>
                                <div class="featured-thread-meta">
                                    <span>2 hours ago</span>
                                </div>
                            </div>
                        </div>
                        <div class="featured-thread">
                            <div class="featured-thread-icon">
                                <i class="fas fa-newspaper"></i>
                            </div>
                            <div class="featured-thread-content">
                                <a href="#">Google Updates Play Integrity API</a>
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
                                <a href="#">New Root Method for MediaTek Devices</a>
                                <div class="featured-thread-meta">
                                    <span>3 days ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Root Methods by Device -->
        <div class="device-forums-section">
            <h2>Root Methods by Device Type</h2>
            <div class="device-forums-grid">
                <div class="device-forum-card">
                    <h3>
                        <i class="fas fa-mobile-alt" style="color: #e74c3c; margin-right: 0.5rem;"></i>
                        Samsung Devices
                    </h3>
                    <ul class="device-list">
                        <li><a href="#">Galaxy S Series Root</a></li>
                        <li><a href="#">Knox Bypass Methods</a></li>
                        <li><a href="#">One UI Root Guide</a></li>
                        <li><a href="#">Samsung Root Tools</a></li>
                        <li><a href="#" class="view-all-devices">View All Samsung Root →</a></li>
                    </ul>
                </div>
                
                <div class="device-forum-card">
                    <h3>
                        <i class="fas fa-mobile-alt" style="color: #f39c12; margin-right: 0.5rem;"></i>
                        Xiaomi/MIUI
                    </h3>
                    <ul class="device-list">
                        <li><a href="#">MIUI Root Methods</a></li>
                        <li><a href="#">Redmi Root Guide</a></li>
                        <li><a href="#">POCO Root Methods</a></li>
                        <li><a href="#">Anti-Rollback Bypass</a></li>
                        <li><a href="#" class="view-all-devices">View All Xiaomi Root →</a></li>
                    </ul>
                </div>
                
                <div class="device-forum-card">
                    <h3>
                        <i class="fas fa-mobile-alt" style="color: #27ae60; margin-right: 0.5rem;"></i>
                        OnePlus Devices
                    </h3>
                    <ul class="device-list">
                        <li><a href="#">OnePlus Root Guide</a></li>
                        <li><a href="#">OxygenOS Root</a></li>
                        <li><a href="#">Nord Series Root</a></li>
                        <li><a href="#">MSM Tool Root</a></li>
                        <li><a href="#" class="view-all-devices">View All OnePlus Root →</a></li>
                    </ul>
                </div>
                
                <div class="device-forum-card">
                    <h3>
                        <i class="fas fa-mobile-alt" style="color: #3498db; margin-right: 0.5rem;"></i>
                        Google Pixel
                    </h3>
                    <ul class="device-list">
                        <li><a href="#">Pixel Root Methods</a></li>
                        <li><a href="#">Stock Android Root</a></li>
                        <li><a href="#">Pixel 8 Series Root</a></li>
                        <li><a href="#">Verified Boot Disable</a></li>
                        <li><a href="#" class="view-all-devices">View All Pixel Root →</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Root Tools & Resources -->
        <div class="development-resources-section">
            <h2>Root Tools & Resources</h2>
            <div class="resources-grid">
                <div class="resource-item">
                    <div class="resource-icon">
                        <i class="fas fa-magic"></i>
                    </div>
                    <div class="resource-content">
                        <h3>Magisk Manager</h3>
                        <p>The most popular systemless root solution with module support and SafetyNet bypass.</p>
                        <a href="#" class="resource-link">Download Magisk →</a>
                    </div>
                </div>
                
                <div class="resource-item">
                    <div class="resource-icon">
                        <i class="fas fa-puzzle-piece"></i>
                    </div>
                    <div class="resource-content">
                        <h3>Magisk Modules Repository</h3>
                        <p>Browse and download thousands of Magisk modules for system modifications.</p>
                        <a href="#" class="resource-link">Browse Modules →</a>
                    </div>
                </div>
                
                <div class="resource-item">
                    <div class="resource-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <div class="resource-content">
                        <h3>SafetyNet Bypass Tools</h3>
                        <p>Tools and modules to bypass Google's SafetyNet and Play Integrity checks.</p>
                        <a href="#" class="resource-link">View Bypass Tools →</a>
                    </div>
                </div>
                
                <div class="resource-item">
                    <div class="resource-icon">
                        <i class="fas fa-apps"></i>
                    </div>
                    <div class="resource-content">
                        <h3>Root Applications</h3>
                        <p>Essential applications that require root access for advanced system control.</p>
                        <a href="#" class="resource-link">View Root Apps →</a>
                    </div>
                </div>
                
                <div class="resource-item">
                    <div class="resource-icon">
                        <i class="fas fa-code"></i>
                    </div>
                    <div class="resource-content">
                        <h3>Root Development</h3>
                        <p>Resources for developing root applications and Magisk modules.</p>
                        <a href="#" class="resource-link">View Dev Resources →</a>
                    </div>
                </div>
                
                <div class="resource-item">
                    <div class="resource-icon">
                        <i class="fas fa-first-aid"></i>
                    </div>
                    <div class="resource-content">
                        <h3>Root Troubleshooting</h3>
                        <p>Common root issues, bootloop fixes, and recovery procedures.</p>
                        <a href="#" class="resource-link">View Troubleshooting →</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Thread Button -->
    <a href="#" class="create-thread-btn root-btn">
        <i class="fas fa-plus"></i>
    </a>
</main>

<?php get_footer(); ?>
