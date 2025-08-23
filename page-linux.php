<?php
/**
 * Template Name: Linux Forum Page
 * 
 * @package TechForum_Theme
 */

get_header(); ?>

<main id="primary" class="site-main">
    <!-- Forum Header -->
    <section class="forum-header linux-header">
        <div class="container">
            <h1><i class="fab fa-linux"></i> Linux Forum</h1>
            <p>Discuss Linux distributions, server administration, command line tools, and open-source software development.</p>
            <a href="#" class="btn btn-linux">Start New Discussion</a>
        </div>
    </section>

    <div class="container">
        <!-- Breadcrumb -->
        <ul class="breadcrumb-nav">
            <li class="breadcrumb-item"><a href="<?php echo home_url(); ?>"><i class="fas fa-home"></i> Home</a></li>
            <li class="breadcrumb-item"><a href="#">Forums</a></li>
            <li class="breadcrumb-item active">Linux</li>
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
                            <img src="https://i.pravatar.cc/150?img=21" alt="User Avatar">
                        </div>
                        <div class="thread-content">
                            <a href="#" class="thread-title">[GUIDE] Complete Ubuntu 22.04 LTS Server Setup for Beginners</a>
                            <div class="thread-meta">
                                <span><i class="fas fa-user"></i> LinuxMaster</span>
                                <span><i class="far fa-clock"></i> 3 hours ago</span>
                                <span><i class="fas fa-eye"></i> 2.1k views</span>
                            </div>
                            <p class="thread-preview">Step-by-step guide to setting up Ubuntu Server 22.04 LTS with essential packages, security hardening, and performance optimization. Includes Docker, Nginx, and SSL configuration...</p>
                            <div class="thread-tags">
                                <span class="tag">Ubuntu</span>
                                <span class="tag">Server</span>
                                <span class="tag">Guide</span>
                                <span class="tag">LTS</span>
                            </div>
                        </div>
                        <div class="thread-stats">
                            <div class="stats-number">67</div>
                            <div class="stats-label">Replies</div>
                        </div>
                    </li>
                    
                    <li class="thread-item">
                        <div class="thread-avatar">
                            <img src="https://i.pravatar.cc/150?img=22" alt="User Avatar">
                        </div>
                        <div class="thread-content">
                            <a href="#" class="thread-title">Arch Linux vs Manjaro: Which Distribution Should You Choose?</a>
                            <div class="thread-meta">
                                <span><i class="fas fa-user"></i> ArchExpert</span>
                                <span><i class="far fa-clock"></i> Yesterday</span>
                                <span><i class="fas fa-eye"></i> 4.2k views</span>
                            </div>
                            <p class="thread-preview">Comprehensive comparison between Arch Linux and Manjaro. Covering installation complexity, package management, stability, community support, and use cases for each distribution...</p>
                            <div class="thread-tags">
                                <span class="tag">Arch Linux</span>
                                <span class="tag">Manjaro</span>
                                <span class="tag">Comparison</span>
                                <span class="tag">Distro</span>
                            </div>
                        </div>
                        <div class="thread-stats">
                            <div class="stats-number">143</div>
                            <div class="stats-label">Replies</div>
                        </div>
                    </li>
                    
                    <li class="thread-item">
                        <div class="thread-avatar">
                            <img src="https://i.pravatar.cc/150?img=23" alt="User Avatar">
                        </div>
                        <div class="thread-content">
                            <a href="#" class="thread-title">[SOLVED] Docker Container Networking Issues on CentOS 8</a>
                            <div class="thread-meta">
                                <span><i class="fas fa-user"></i> DevOpsGuru</span>
                                <span><i class="far fa-clock"></i> 2 days ago</span>
                                <span><i class="fas fa-eye"></i> 1.8k views</span>
                            </div>
                            <p class="thread-preview">Troubleshooting Docker networking problems on CentOS 8. Issues with container-to-container communication, port mapping, and firewall configuration. Solution included...</p>
                            <div class="thread-tags">
                                <span class="tag">Docker</span>
                                <span class="tag">CentOS</span>
                                <span class="tag">Networking</span>
                                <span class="tag">DevOps</span>
                            </div>
                        </div>
                        <div class="thread-stats">
                            <div class="stats-number">89</div>
                            <div class="stats-label">Replies</div>
                        </div>
                    </li>
                    
                    <li class="thread-item">
                        <div class="thread-avatar">
                            <img src="https://i.pravatar.cc/150?img=24" alt="User Avatar">
                        </div>
                        <div class="thread-content">
                            <a href="#" class="thread-title">Best Linux Distributions for Programming and Development in 2024</a>
                            <div class="thread-meta">
                                <span><i class="fas fa-user"></i> CodeWarrior</span>
                                <span><i class="far fa-clock"></i> 4 days ago</span>
                                <span><i class="fas fa-eye"></i> 6.5k views</span>
                            </div>
                            <p class="thread-preview">Curated list of the best Linux distributions for developers. Covering Ubuntu, Fedora, Pop!_OS, Elementary OS, and specialized distros with pre-installed development tools...</p>
                            <div class="thread-tags">
                                <span class="tag">Development</span>
                                <span class="tag">Programming</span>
                                <span class="tag">Distro</span>
                                <span class="tag">2024</span>
                            </div>
                        </div>
                        <div class="thread-stats">
                            <div class="stats-number">201</div>
                            <div class="stats-label">Replies</div>
                        </div>
                    </li>
                    
                    <li class="thread-item">
                        <div class="thread-avatar">
                            <img src="https://i.pravatar.cc/150?img=25" alt="User Avatar">
                        </div>
                        <div class="thread-content">
                            <a href="#" class="thread-title">Bash Scripting: Advanced Techniques and Best Practices</a>
                            <div class="thread-meta">
                                <span><i class="fas fa-user"></i> ShellScripter</span>
                                <span><i class="far fa-clock"></i> 1 week ago</span>
                                <span><i class="fas fa-eye"></i> 3.7k views</span>
                            </div>
                            <p class="thread-preview">Advanced bash scripting techniques including error handling, logging, argument parsing, and performance optimization. Real-world examples and automation scripts...</p>
                            <div class="thread-tags">
                                <span class="tag">Bash</span>
                                <span class="tag">Scripting</span>
                                <span class="tag">Automation</span>
                                <span class="tag">Shell</span>
                            </div>
                        </div>
                        <div class="thread-stats">
                            <div class="stats-number">156</div>
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
                        <li><a href="#"><i class="fas fa-desktop"></i> Desktop Environments</a></li>
                        <li><a href="#"><i class="fas fa-server"></i> Server Administration</a></li>
                        <li><a href="#"><i class="fas fa-terminal"></i> Command Line</a></li>
                        <li><a href="#"><i class="fas fa-code"></i> Shell Scripting</a></li>
                        <li><a href="#"><i class="fas fa-network-wired"></i> Networking</a></li>
                        <li><a href="#"><i class="fas fa-shield-alt"></i> Security</a></li>
                        <li><a href="#"><i class="fas fa-cogs"></i> System Administration</a></li>
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
                                <a href="#">Linux Performance Tuning Guide 2024</a>
                                <div class="featured-thread-meta">
                                    <span>By SysAdmin • 18.2k views</span>
                                </div>
                            </div>
                        </div>
                        <div class="featured-thread">
                            <div class="featured-thread-icon">
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="featured-thread-content">
                                <a href="#">Complete Kubernetes Setup on Ubuntu</a>
                                <div class="featured-thread-meta">
                                    <span>By K8sExpert • 12.4k views</span>
                                </div>
                            </div>
                        </div>
                        <div class="featured-thread">
                            <div class="featured-thread-icon">
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="featured-thread-content">
                                <a href="#">Vim Mastery: Advanced Tips & Tricks</a>
                                <div class="featured-thread-meta">
                                    <span>By VimGuru • 9.8k views</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="sidebar-widget">
                    <h3>Popular Tags</h3>
                    <div class="tag-cloud">
                        <span class="tag">Ubuntu</span>
                        <span class="tag">Debian</span>
                        <span class="tag">CentOS</span>
                        <span class="tag">Arch</span>
                        <span class="tag">Fedora</span>
                        <span class="tag">Docker</span>
                        <span class="tag">Bash</span>
                        <span class="tag">Vim</span>
                        <span class="tag">SSH</span>
                        <span class="tag">Apache</span>
                        <span class="tag">Nginx</span>
                        <span class="tag">MySQL</span>
                        <span class="tag">Git</span>
                        <span class="tag">Python</span>
                        <span class="tag">Systemd</span>
                    </div>
                </div>

                <div class="sidebar-widget">
                    <h3>Online Users</h3>
                    <div class="online-users">
                        <div class="user-avatar">
                            <img src="https://i.pravatar.cc/150?img=31" alt="User Avatar">
                        </div>
                        <div class="user-avatar">
                            <img src="https://i.pravatar.cc/150?img=32" alt="User Avatar">
                        </div>
                        <div class="user-avatar">
                            <img src="https://i.pravatar.cc/150?img=33" alt="User Avatar">
                        </div>
                        <div class="user-avatar">
                            <img src="https://i.pravatar.cc/150?img=34" alt="User Avatar">
                        </div>
                        <div class="user-avatar">
                            <img src="https://i.pravatar.cc/150?img=35" alt="User Avatar">
                        </div>
                        <div class="user-avatar">
                            <img src="https://i.pravatar.cc/150?img=36" alt="User Avatar">
                        </div>
                    </div>
                    <p class="online-stats">
                        <strong>189</strong> users online now • <a href="#" class="view-all-link">View All</a>
                    </p>
                </div>

                <div class="sidebar-widget">
                    <h3>Latest Linux News</h3>
                    <div class="featured-threads">
                        <div class="featured-thread">
                            <div class="featured-thread-icon">
                                <i class="fas fa-newspaper"></i>
                            </div>
                            <div class="featured-thread-content">
                                <a href="#">Linux Kernel 6.7 Released with New Features</a>
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
                                <a href="#">Ubuntu 24.04 LTS Beta Now Available</a>
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
                                <a href="#">Red Hat Enterprise Linux 9.3 Updates</a>
                                <div class="featured-thread-meta">
                                    <span>3 days ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Popular Linux Distributions -->
        <div class="device-forums-section">
            <h2>Popular Linux Distributions</h2>
            <div class="device-forums-grid">
                <div class="device-forum-card">
                    <h3>
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ab/Logo-ubuntu_cof-orange-hex.svg/120px-Logo-ubuntu_cof-orange-hex.svg.png" alt="Ubuntu" class="brand-logo">
                        Ubuntu
                    </h3>
                    <ul class="device-list">
                        <li><a href="#">Ubuntu 22.04 LTS</a></li>
                        <li><a href="#">Ubuntu Server</a></li>
                        <li><a href="#">Ubuntu Desktop</a></li>
                        <li><a href="#">Kubuntu</a></li>
                        <li><a href="#" class="view-all-devices">View All Ubuntu →</a></li>
                    </ul>
                </div>
                
                <div class="device-forum-card">
                    <h3>
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/3f/Fedora_logo.svg/120px-Fedora_logo.svg.png" alt="Fedora" class="brand-logo">
                        Fedora
                    </h3>
                    <ul class="device-list">
                        <li><a href="#">Fedora Workstation</a></li>
                        <li><a href="#">Fedora Server</a></li>
                        <li><a href="#">Fedora CoreOS</a></li>
                        <li><a href="#">Fedora Silverblue</a></li>
                        <li><a href="#" class="view-all-devices">View All Fedora →</a></li>
                    </ul>
                </div>
                
                <div class="device-forum-card">
                    <h3>
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a5/Archlinux-icon-crystal-64.svg/120px-Archlinux-icon-crystal-64.svg.png" alt="Arch" class="brand-logo">
                        Arch Linux
                    </h3>
                    <ul class="device-list">
                        <li><a href="#">Arch Linux</a></li>
                        <li><a href="#">Manjaro</a></li>
                        <li><a href="#">EndeavourOS</a></li>
                        <li><a href="#">ArcoLinux</a></li>
                        <li><a href="#" class="view-all-devices">View All Arch-based →</a></li>
                    </ul>
                </div>
                
                <div class="device-forum-card">
                    <h3>
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/4a/Debian-OpenLogo.svg/120px-Debian-OpenLogo.svg.png" alt="Debian" class="brand-logo">
                        Debian
                    </h3>
                    <ul class="device-list">
                        <li><a href="#">Debian Stable</a></li>
                        <li><a href="#">Debian Testing</a></li>
                        <li><a href="#">Linux Mint</a></li>
                        <li><a href="#">Pop!_OS</a></li>
                        <li><a href="#" class="view-all-devices">View All Debian-based →</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Linux Learning Resources -->
        <div class="development-resources-section">
            <h2>Linux Learning Resources</h2>
            <div class="resources-grid">
                <div class="resource-item">
                    <div class="resource-icon">
                        <i class="fas fa-terminal"></i>
                    </div>
                    <div class="resource-content">
                        <h3>Command Line Mastery</h3>
                        <p>Learn essential Linux commands, shell scripting, and terminal productivity tips.</p>
                        <a href="#" class="resource-link">View Tutorials →</a>
                    </div>
                </div>
                
                <div class="resource-item">
                    <div class="resource-icon">
                        <i class="fas fa-server"></i>
                    </div>
                    <div class="resource-content">
                        <h3>Server Administration</h3>
                        <p>Complete guides for Linux server setup, configuration, and maintenance.</p>
                        <a href="#" class="resource-link">View Guides →</a>
                    </div>
                </div>
                
                <div class="resource-item">
                    <div class="resource-icon">
                        <i class="fas fa-network-wired"></i>
                    </div>
                    <div class="resource-content">
                        <h3>Network Configuration</h3>
                        <p>Learn Linux networking, firewall setup, and network troubleshooting.</p>
                        <a href="#" class="resource-link">View Resources →</a>
                    </div>
                </div>
                
                <div class="resource-item">
                    <div class="resource-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <div class="resource-content">
                        <h3>Security Hardening</h3>
                        <p>Best practices for securing Linux systems and implementing security measures.</p>
                        <a href="#" class="resource-link">View Security Guides →</a>
                    </div>
                </div>
                
                <div class="resource-item">
                    <div class="resource-icon">
                        <i class="fas fa-code"></i>
                    </div>
                    <div class="resource-content">
                        <h3>Development Environment</h3>
                        <p>Set up perfect Linux development environments for various programming languages.</p>
                        <a href="#" class="resource-link">View Setup Guides →</a>
                    </div>
                </div>
                
                <div class="resource-item">
                    <div class="resource-icon">
                        <i class="fas fa-cogs"></i>
                    </div>
                    <div class="resource-content">
                        <h3>System Optimization</h3>
                        <p>Performance tuning, monitoring, and optimization techniques for Linux systems.</p>
                        <a href="#" class="resource-link">View Optimization Tips →</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Thread Button -->
    <a href="#" class="create-thread-btn linux-btn">
        <i class="fas fa-plus"></i>
    </a>
</main>

<?php get_footer(); ?>
