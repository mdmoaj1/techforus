<?php
/**
 * Template Name: Windows Forum Page
 * 
 * @package TechForum_Theme
 */

get_header(); ?>

<main id="primary" class="site-main">
    <!-- Forum Header -->
    <section class="forum-header windows-header">
        <div class="container">
            <h1><i class="fab fa-windows"></i> Windows Forum</h1>
            <p>Discuss Windows OS, system administration, troubleshooting, and Microsoft technologies for desktop and server environments.</p>
            <a href="#" class="btn btn-windows">Start New Discussion</a>
        </div>
    </section>

    <div class="container">
        <!-- Breadcrumb -->
        <ul class="breadcrumb-nav">
            <li class="breadcrumb-item"><a href="<?php echo home_url(); ?>"><i class="fas fa-home"></i> Home</a></li>
            <li class="breadcrumb-item"><a href="#">Forums</a></li>
            <li class="breadcrumb-item active">Windows</li>
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
                            <img src="https://i.pravatar.cc/150?img=41" alt="User Avatar">
                        </div>
                        <div class="thread-content">
                            <a href="#" class="thread-title">Windows 11 23H2 Update: New Features and Performance Improvements</a>
                            <div class="thread-meta">
                                <span><i class="fas fa-user"></i> WindowsPro</span>
                                <span><i class="far fa-clock"></i> 1 hour ago</span>
                                <span><i class="fas fa-eye"></i> 1.8k views</span>
                            </div>
                            <p class="thread-preview">Comprehensive overview of Windows 11 23H2 update including new AI features, enhanced security, improved performance, and compatibility updates. Installation guide and troubleshooting tips...</p>
                            <div class="thread-tags">
                                <span class="tag">Windows 11</span>
                                <span class="tag">23H2</span>
                                <span class="tag">Update</span>
                                <span class="tag">Features</span>
                            </div>
                        </div>
                        <div class="thread-stats">
                            <div class="stats-number">34</div>
                            <div class="stats-label">Replies</div>
                        </div>
                    </li>
                    
                    <li class="thread-item">
                        <div class="thread-avatar">
                            <img src="https://i.pravatar.cc/150?img=42" alt="User Avatar">
                        </div>
                        <div class="thread-content">
                            <a href="#" class="thread-title">[SOLVED] Blue Screen of Death (BSOD) Troubleshooting Guide</a>
                            <div class="thread-meta">
                                <span><i class="fas fa-user"></i> TechSupport</span>
                                <span><i class="far fa-clock"></i> Yesterday</span>
                                <span><i class="fas fa-eye"></i> 5.2k views</span>
                            </div>
                            <p class="thread-preview">Complete guide to diagnosing and fixing Windows Blue Screen errors. Common error codes, memory dump analysis, driver issues, and hardware troubleshooting methods...</p>
                            <div class="thread-tags">
                                <span class="tag">BSOD</span>
                                <span class="tag">Troubleshooting</span>
                                <span class="tag">Drivers</span>
                                <span class="tag">Hardware</span>
                            </div>
                        </div>
                        <div class="thread-stats">
                            <div class="stats-number">178</div>
                            <div class="stats-label">Replies</div>
                        </div>
                    </li>
                    
                    <li class="thread-item">
                        <div class="thread-avatar">
                            <img src="https://i.pravatar.cc/150?img=43" alt="User Avatar">
                        </div>
                        <div class="thread-content">
                            <a href="#" class="thread-title">PowerShell 7 vs Windows PowerShell: Migration Guide</a>
                            <div class="thread-meta">
                                <span><i class="fas fa-user"></i> PowerShellExpert</span>
                                <span><i class="far fa-clock"></i> 2 days ago</span>
                                <span><i class="fas fa-eye"></i> 3.1k views</span>
                            </div>
                            <p class="thread-preview">Detailed comparison between PowerShell 7 and Windows PowerShell. Migration strategies, new features, cross-platform capabilities, and script compatibility considerations...</p>
                            <div class="thread-tags">
                                <span class="tag">PowerShell</span>
                                <span class="tag">Migration</span>
                                <span class="tag">Scripting</span>
                                <span class="tag">Automation</span>
                            </div>
                        </div>
                        <div class="thread-stats">
                            <div class="stats-number">92</div>
                            <div class="stats-label">Replies</div>
                        </div>
                    </li>
                    
                    <li class="thread-item">
                        <div class="thread-avatar">
                            <img src="https://i.pravatar.cc/150?img=44" alt="User Avatar">
                        </div>
                        <div class="thread-content">
                            <a href="#" class="thread-title">Windows Server 2022: Complete Setup and Configuration Guide</a>
                            <div class="thread-meta">
                                <span><i class="fas fa-user"></i> ServerAdmin</span>
                                <span><i class="far fa-clock"></i> 3 days ago</span>
                                <span><i class="fas fa-eye"></i> 4.7k views</span>
                            </div>
                            <p class="thread-preview">Step-by-step guide for Windows Server 2022 installation, Active Directory setup, DNS configuration, and security hardening. Best practices for enterprise environments...</p>
                            <div class="thread-tags">
                                <span class="tag">Server 2022</span>
                                <span class="tag">Active Directory</span>
                                <span class="tag">DNS</span>
                                <span class="tag">Enterprise</span>
                            </div>
                        </div>
                        <div class="thread-stats">
                            <div class="stats-number">145</div>
                            <div class="stats-label">Replies</div>
                        </div>
                    </li>
                    
                    <li class="thread-item">
                        <div class="thread-avatar">
                            <img src="https://i.pravatar.cc/150?img=45" alt="User Avatar">
                        </div>
                        <div class="thread-content">
                            <a href="#" class="thread-title">Registry Tweaks for Windows 11 Performance Optimization</a>
                            <div class="thread-meta">
                                <span><i class="fas fa-user"></i> RegistryMaster</span>
                                <span><i class="far fa-clock"></i> 1 week ago</span>
                                <span><i class="fas fa-eye"></i> 8.3k views</span>
                            </div>
                            <p class="thread-preview">Safe registry modifications to improve Windows 11 performance. Startup optimization, visual effects, network tweaks, and privacy settings. Backup and restore procedures included...</p>
                            <div class="thread-tags">
                                <span class="tag">Registry</span>
                                <span class="tag">Performance</span>
                                <span class="tag">Optimization</span>
                                <span class="tag">Tweaks</span>
                            </div>
                        </div>
                        <div class="thread-stats">
                            <div class="stats-number">267</div>
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
                        <li><a href="#"><i class="fas fa-desktop"></i> Windows 11</a></li>
                        <li><a href="#"><i class="fas fa-server"></i> Windows Server</a></li>
                        <li><a href="#"><i class="fas fa-terminal"></i> PowerShell</a></li>
                        <li><a href="#"><i class="fas fa-cogs"></i> System Administration</a></li>
                        <li><a href="#"><i class="fas fa-shield-alt"></i> Security</a></li>
                        <li><a href="#"><i class="fas fa-network-wired"></i> Networking</a></li>
                        <li><a href="#"><i class="fas fa-tools"></i> Troubleshooting</a></li>
                        <li><a href="#"><i class="fas fa-cloud"></i> Azure Integration</a></li>
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
                                <a href="#">Ultimate Windows 11 Optimization Guide</a>
                                <div class="featured-thread-meta">
                                    <span>By OptimizationGuru • 22.1k views</span>
                                </div>
                            </div>
                        </div>
                        <div class="featured-thread">
                            <div class="featured-thread-icon">
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="featured-thread-content">
                                <a href="#">Active Directory Best Practices 2024</a>
                                <div class="featured-thread-meta">
                                    <span>By ADExpert • 16.7k views</span>
                                </div>
                            </div>
                        </div>
                        <div class="featured-thread">
                            <div class="featured-thread-icon">
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="featured-thread-content">
                                <a href="#">PowerShell Automation Scripts Collection</a>
                                <div class="featured-thread-meta">
                                    <span>By ScriptMaster • 14.3k views</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="sidebar-widget">
                    <h3>Popular Tags</h3>
                    <div class="tag-cloud">
                        <span class="tag">Windows 11</span>
                        <span class="tag">Server 2022</span>
                        <span class="tag">PowerShell</span>
                        <span class="tag">BSOD</span>
                        <span class="tag">Registry</span>
                        <span class="tag">Active Directory</span>
                        <span class="tag">Group Policy</span>
                        <span class="tag">Hyper-V</span>
                        <span class="tag">Azure</span>
                        <span class="tag">Office 365</span>
                        <span class="tag">IIS</span>
                        <span class="tag">DNS</span>
                        <span class="tag">DHCP</span>
                        <span class="tag">Backup</span>
                        <span class="tag">Security</span>
                    </div>
                </div>

                <div class="sidebar-widget">
                    <h3>Online Users</h3>
                    <div class="online-users">
                        <div class="user-avatar">
                            <img src="https://i.pravatar.cc/150?img=51" alt="User Avatar">
                        </div>
                        <div class="user-avatar">
                            <img src="https://i.pravatar.cc/150?img=52" alt="User Avatar">
                        </div>
                        <div class="user-avatar">
                            <img src="https://i.pravatar.cc/150?img=53" alt="User Avatar">
                        </div>
                        <div class="user-avatar">
                            <img src="https://i.pravatar.cc/150?img=54" alt="User Avatar">
                        </div>
                        <div class="user-avatar">
                            <img src="https://i.pravatar.cc/150?img=55" alt="User Avatar">
                        </div>
                        <div class="user-avatar">
                            <img src="https://i.pravatar.cc/150?img=56" alt="User Avatar">
                        </div>
                    </div>
                    <p class="online-stats">
                        <strong>156</strong> users online now • <a href="#" class="view-all-link">View All</a>
                    </p>
                </div>

                <div class="sidebar-widget">
                    <h3>Latest Windows News</h3>
                    <div class="featured-threads">
                        <div class="featured-thread">
                            <div class="featured-thread-icon">
                                <i class="fas fa-newspaper"></i>
                            </div>
                            <div class="featured-thread-content">
                                <a href="#">Microsoft Announces Windows 12 Development</a>
                                <div class="featured-thread-meta">
                                    <span>4 hours ago</span>
                                </div>
                            </div>
                        </div>
                        <div class="featured-thread">
                            <div class="featured-thread-icon">
                                <i class="fas fa-newspaper"></i>
                            </div>
                            <div class="featured-thread-content">
                                <a href="#">Windows 11 Copilot Gets Major Update</a>
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
                                <a href="#">Azure Integration Improvements in Server 2025</a>
                                <div class="featured-thread-meta">
                                    <span>2 days ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Windows Versions -->
        <div class="device-forums-section">
            <h2>Windows Versions & Products</h2>
            <div class="device-forums-grid">
                <div class="device-forum-card">
                    <h3>
                        <i class="fab fa-windows" style="color: #0078d4; margin-right: 0.5rem;"></i>
                        Windows 11
                    </h3>
                    <ul class="device-list">
                        <li><a href="#">Windows 11 Home</a></li>
                        <li><a href="#">Windows 11 Pro</a></li>
                        <li><a href="#">Windows 11 Enterprise</a></li>
                        <li><a href="#">Windows 11 Education</a></li>
                        <li><a href="#" class="view-all-devices">View All Windows 11 →</a></li>
                    </ul>
                </div>
                
                <div class="device-forum-card">
                    <h3>
                        <i class="fas fa-server" style="color: #0078d4; margin-right: 0.5rem;"></i>
                        Windows Server
                    </h3>
                    <ul class="device-list">
                        <li><a href="#">Server 2022</a></li>
                        <li><a href="#">Server 2019</a></li>
                        <li><a href="#">Server Core</a></li>
                        <li><a href="#">Hyper-V Server</a></li>
                        <li><a href="#" class="view-all-devices">View All Server Editions →</a></li>
                    </ul>
                </div>
                
                <div class="device-forum-card">
                    <h3>
                        <i class="fas fa-cloud" style="color: #0078d4; margin-right: 0.5rem;"></i>
                        Microsoft Azure
                    </h3>
                    <ul class="device-list">
                        <li><a href="#">Azure Virtual Machines</a></li>
                        <li><a href="#">Azure Active Directory</a></li>
                        <li><a href="#">Azure DevOps</a></li>
                        <li><a href="#">Azure Storage</a></li>
                        <li><a href="#" class="view-all-devices">View All Azure Services →</a></li>
                    </ul>
                </div>
                
                <div class="device-forum-card">
                    <h3>
                        <i class="fas fa-briefcase" style="color: #0078d4; margin-right: 0.5rem;"></i>
                        Office 365
                    </h3>
                    <ul class="device-list">
                        <li><a href="#">Exchange Online</a></li>
                        <li><a href="#">SharePoint Online</a></li>
                        <li><a href="#">Teams Administration</a></li>
                        <li><a href="#">Power Platform</a></li>
                        <li><a href="#" class="view-all-devices">View All Office 365 →</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Windows Administration Resources -->
        <div class="development-resources-section">
            <h2>Windows Administration Resources</h2>
            <div class="resources-grid">
                <div class="resource-item">
                    <div class="resource-icon">
                        <i class="fas fa-terminal"></i>
                    </div>
                    <div class="resource-content">
                        <h3>PowerShell Scripting</h3>
                        <p>Master PowerShell automation, cmdlets, and advanced scripting techniques.</p>
                        <a href="#" class="resource-link">View PowerShell Guides →</a>
                    </div>
                </div>
                
                <div class="resource-item">
                    <div class="resource-icon">
                        <i class="fas fa-users-cog"></i>
                    </div>
                    <div class="resource-content">
                        <h3>Active Directory</h3>
                        <p>Complete guides for AD setup, management, and Group Policy configuration.</p>
                        <a href="#" class="resource-link">View AD Resources →</a>
                    </div>
                </div>
                
                <div class="resource-item">
                    <div class="resource-icon">
                        <i class="fas fa-network-wired"></i>
                    </div>
                    <div class="resource-content">
                        <h3>Network Services</h3>
                        <p>Configure DNS, DHCP, IIS, and other Windows network services.</p>
                        <a href="#" class="resource-link">View Network Guides →</a>
                    </div>
                </div>
                
                <div class="resource-item">
                    <div class="resource-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <div class="resource-content">
                        <h3>Windows Security</h3>
                        <p>Security hardening, Windows Defender, and enterprise security policies.</p>
                        <a href="#" class="resource-link">View Security Guides →</a>
                    </div>
                </div>
                
                <div class="resource-item">
                    <div class="resource-icon">
                        <i class="fas fa-hdd"></i>
                    </div>
                    <div class="resource-content">
                        <h3>Backup & Recovery</h3>
                        <p>Windows backup solutions, disaster recovery, and system restore procedures.</p>
                        <a href="#" class="resource-link">View Backup Guides →</a>
                    </div>
                </div>
                
                <div class="resource-item">
                    <div class="resource-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <div class="resource-content">
                        <h3>Performance Monitoring</h3>
                        <p>System monitoring, performance counters, and optimization techniques.</p>
                        <a href="#" class="resource-link">View Monitoring Tools →</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Thread Button -->
    <a href="#" class="create-thread-btn windows-btn">
        <i class="fas fa-plus"></i>
    </a>
</main>

<?php get_footer(); ?>
