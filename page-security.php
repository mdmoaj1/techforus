<?php
/**
 * Template Name: Security Forum Page
 * 
 * @package TechForum_Theme
 */

get_header(); ?>

<main id="primary" class="site-main">
    <!-- Forum Header -->
    <section class="forum-header security-header">
        <div class="container">
            <h1><i class="fas fa-shield-alt"></i> Security Forum</h1>
            <p>Discuss cybersecurity, privacy protection, ethical hacking, security tools, and best practices for digital safety.</p>
            <a href="#" class="btn btn-security">Share Security Tip</a>
        </div>
    </section>

    <div class="container">
        <!-- Breadcrumb -->
        <ul class="breadcrumb-nav">
            <li class="breadcrumb-item"><a href="<?php echo home_url(); ?>"><i class="fas fa-home"></i> Home</a></li>
            <li class="breadcrumb-item"><a href="#">Forums</a></li>
            <li class="breadcrumb-item active">Security</li>
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
                            <img src="https://i.pravatar.cc/150?img=141" alt="User Avatar">
                        </div>
                        <div class="thread-content">
                            <a href="#" class="thread-title">[ALERT] New Android Malware Targeting Banking Apps - Protection Guide</a>
                            <div class="thread-meta">
                                <span><i class="fas fa-user"></i> SecurityExpert</span>
                                <span><i class="far fa-clock"></i> 3 hours ago</span>
                                <span><i class="fas fa-eye"></i> 2.9k views</span>
                            </div>
                            <p class="thread-preview">Critical security alert about new Android malware targeting banking applications. Detection methods, removal procedures, and prevention strategies to protect your device...</p>
                            <div class="thread-tags">
                                <span class="tag">Malware</span>
                                <span class="tag">Android</span>
                                <span class="tag">Banking</span>
                                <span class="tag">Alert</span>
                            </div>
                        </div>
                        <div class="thread-stats">
                            <div class="stats-number">67</div>
                            <div class="stats-label">Replies</div>
                        </div>
                    </li>
                    
                    <li class="thread-item">
                        <div class="thread-avatar">
                            <img src="https://i.pravatar.cc/150?img=142" alt="User Avatar">
                        </div>
                        <div class="thread-content">
                            <a href="#" class="thread-title">Complete Guide to VPN Security: Choosing the Right Provider</a>
                            <div class="thread-meta">
                                <span><i class="fas fa-user"></i> VPNAnalyst</span>
                                <span><i class="far fa-clock"></i> Yesterday</span>
                                <span><i class="fas fa-eye"></i> 5.8k views</span>
                            </div>
                            <p class="thread-preview">Comprehensive guide to VPN security features, privacy policies, and choosing trustworthy providers. Comparison of protocols, logging policies, and jurisdiction considerations...</p>
                            <div class="thread-tags">
                                <span class="tag">VPN</span>
                                <span class="tag">Privacy</span>
                                <span class="tag">Security</span>
                                <span class="tag">Guide</span>
                            </div>
                        </div>
                        <div class="thread-stats">
                            <div class="stats-number">189</div>
                            <div class="stats-label">Replies</div>
                        </div>
                    </li>
                    
                    <li class="thread-item">
                        <div class="thread-avatar">
                            <img src="https://i.pravatar.cc/150?img=143" alt="User Avatar">
                        </div>
                        <div class="thread-content">
                            <a href="#" class="thread-title">Password Manager Security: 1Password vs Bitwarden vs KeePass</a>
                            <div class="thread-meta">
                                <span><i class="fas fa-user"></i> PasswordGuru</span>
                                <span><i class="far fa-clock"></i> 2 days ago</span>
                                <span><i class="fas fa-eye"></i> 7.3k views</span>
                            </div>
                            <p class="thread-preview">Detailed security analysis of popular password managers. Encryption methods, audit results, breach history, and recommendations for different use cases...</p>
                            <div class="thread-tags">
                                <span class="tag">Password Manager</span>
                                <span class="tag">1Password</span>
                                <span class="tag">Bitwarden</span>
                                <span class="tag">KeePass</span>
                            </div>
                        </div>
                        <div class="thread-stats">
                            <div class="stats-number">234</div>
                            <div class="stats-label">Replies</div>
                        </div>
                    </li>
                    
                    <li class="thread-item">
                        <div class="thread-avatar">
                            <img src="https://i.pravatar.cc/150?img=144" alt="User Avatar">
                        </div>
                        <div class="thread-content">
                            <a href="#" class="thread-title">[TUTORIAL] Setting Up Secure Home Network: Router Hardening Guide</a>
                            <div class="thread-meta">
                                <span><i class="fas fa-user"></i> NetworkSec</span>
                                <span><i class="far fa-clock"></i> 4 days ago</span>
                                <span><i class="fas fa-eye"></i> 4.1k views</span>
                            </div>
                            <p class="thread-preview">Complete guide to securing your home network. Router firmware updates, firewall configuration, guest network setup, and monitoring for unauthorized access...</p>
                            <div class="thread-tags">
                                <span class="tag">Network Security</span>
                                <span class="tag">Router</span>
                                <span class="tag">Firewall</span>
                                <span class="tag">Home Network</span>
                            </div>
                        </div>
                        <div class="thread-stats">
                            <div class="stats-number">145</div>
                            <div class="stats-label">Replies</div>
                        </div>
                    </li>
                    
                    <li class="thread-item">
                        <div class="thread-avatar">
                            <img src="https://i.pravatar.cc/150?img=145" alt="User Avatar">
                        </div>
                        <div class="thread-content">
                            <a href="#" class="thread-title">Ethical Hacking: Bug Bounty Programs and Responsible Disclosure</a>
                            <div class="thread-meta">
                                <span><i class="fas fa-user"></i> EthicalHacker</span>
                                <span><i class="far fa-clock"></i> 1 week ago</span>
                                <span><i class="fas fa-eye"></i> 8.7k views</span>
                            </div>
                            <p class="thread-preview">Guide to ethical hacking and bug bounty hunting. Platform comparisons, vulnerability research methods, and responsible disclosure practices. Legal considerations included...</p>
                            <div class="thread-tags">
                                <span class="tag">Ethical Hacking</span>
                                <span class="tag">Bug Bounty</span>
                                <span class="tag">Penetration Testing</span>
                                <span class="tag">Disclosure</span>
                            </div>
                        </div>
                        <div class="thread-stats">
                            <div class="stats-number">298</div>
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
                        <li><a href="#"><i class="fas fa-virus"></i> Malware & Threats</a></li>
                        <li><a href="#"><i class="fas fa-user-secret"></i> Privacy Protection</a></li>
                        <li><a href="#"><i class="fas fa-network-wired"></i> Network Security</a></li>
                        <li><a href="#"><i class="fas fa-mobile-alt"></i> Mobile Security</a></li>
                        <li><a href="#"><i class="fas fa-bug"></i> Ethical Hacking</a></li>
                        <li><a href="#"><i class="fas fa-key"></i> Cryptography</a></li>
                        <li><a href="#"><i class="fas fa-tools"></i> Security Tools</a></li>
                        <li><a href="#"><i class="fas fa-exclamation-triangle"></i> Security Alerts</a></li>
                    </ul>
                </div>

                <div class="sidebar-widget">
                    <h3>Security Alerts</h3>
                    <div class="featured-threads">
                        <div class="featured-thread">
                            <div class="featured-thread-icon">
                                <i class="fas fa-exclamation-triangle" style="color: #e74c3c;"></i>
                            </div>
                            <div class="featured-thread-content">
                                <a href="#">Critical Chrome Zero-Day Vulnerability</a>
                                <div class="featured-thread-meta">
                                    <span>HIGH PRIORITY • 2 hours ago</span>
                                </div>
                            </div>
                        </div>
                        <div class="featured-thread">
                            <div class="featured-thread-icon">
                                <i class="fas fa-exclamation-triangle" style="color: #f39c12;"></i>
                            </div>
                            <div class="featured-thread-content">
                                <a href="#">WhatsApp Phishing Campaign Detected</a>
                                <div class="featured-thread-meta">
                                    <span>MEDIUM • Yesterday</span>
                                </div>
                            </div>
                        </div>
                        <div class="featured-thread">
                            <div class="featured-thread-icon">
                                <i class="fas fa-info-circle" style="color: #3498db;"></i>
                            </div>
                            <div class="featured-thread-content">
                                <a href="#">Microsoft Patch Tuesday Updates</a>
                                <div class="featured-thread-meta">
                                    <span>INFO • 3 days ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="sidebar-widget">
                    <h3>Popular Tags</h3>
                    <div class="tag-cloud">
                        <span class="tag">Malware</span>
                        <span class="tag">VPN</span>
                        <span class="tag">Password Manager</span>
                        <span class="tag">Phishing</span>
                        <span class="tag">Encryption</span>
                        <span class="tag">Firewall</span>
                        <span class="tag">Antivirus</span>
                        <span class="tag">Two-Factor Auth</span>
                        <span class="tag">Bug Bounty</span>
                        <span class="tag">Penetration Testing</span>
                        <span class="tag">Social Engineering</span>
                        <span class="tag">Zero-Day</span>
                        <span class="tag">GDPR</span>
                        <span class="tag">Privacy</span>
                        <span class="tag">Ransomware</span>
                    </div>
                </div>

                <div class="sidebar-widget">
                    <h3>Security Experts</h3>
                    <div class="online-users">
                        <div class="user-avatar">
                            <img src="https://i.pravatar.cc/150?img=151" alt="Expert Avatar">
                        </div>
                        <div class="user-avatar">
                            <img src="https://i.pravatar.cc/150?img=152" alt="Expert Avatar">
                        </div>
                        <div class="user-avatar">
                            <img src="https://i.pravatar.cc/150?img=153" alt="Expert Avatar">
                        </div>
                        <div class="user-avatar">
                            <img src="https://i.pravatar.cc/150?img=154" alt="Expert Avatar">
                        </div>
                        <div class="user-avatar">
                            <img src="https://i.pravatar.cc/150?img=155" alt="Expert Avatar">
                        </div>
                        <div class="user-avatar">
                            <img src="https://i.pravatar.cc/150?img=156" alt="Expert Avatar">
                        </div>
                    </div>
                    <p class="online-stats">
                        <strong>78</strong> experts online • <a href="#" class="view-all-link">View All</a>
                    </p>
                </div>

                <div class="sidebar-widget">
                    <h3>Latest Security News</h3>
                    <div class="featured-threads">
                        <div class="featured-thread">
                            <div class="featured-thread-icon">
                                <i class="fas fa-newspaper"></i>
                            </div>
                            <div class="featured-thread-content">
                                <a href="#">New iOS Security Features in 17.4 Update</a>
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
                                <a href="#">Google Enhances Play Protect Security</a>
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
                                <a href="#">EU Passes New Cybersecurity Legislation</a>
                                <div class="featured-thread-meta">
                                    <span>2 days ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Security Categories -->
        <div class="device-forums-section">
            <h2>Security Focus Areas</h2>
            <div class="device-forums-grid">
                <div class="device-forum-card">
                    <h3>
                        <i class="fas fa-mobile-alt" style="color: #e74c3c; margin-right: 0.5rem;"></i>
                        Mobile Security
                    </h3>
                    <ul class="device-list">
                        <li><a href="#">Android Security</a></li>
                        <li><a href="#">iOS Security</a></li>
                        <li><a href="#">Mobile Malware</a></li>
                        <li><a href="#">App Security Testing</a></li>
                        <li><a href="#" class="view-all-devices">View All Mobile Security →</a></li>
                    </ul>
                </div>
                
                <div class="device-forum-card">
                    <h3>
                        <i class="fas fa-network-wired" style="color: #3498db; margin-right: 0.5rem;"></i>
                        Network Security
                    </h3>
                    <ul class="device-list">
                        <li><a href="#">Firewall Configuration</a></li>
                        <li><a href="#">VPN Security</a></li>
                        <li><a href="#">Network Monitoring</a></li>
                        <li><a href="#">Intrusion Detection</a></li>
                        <li><a href="#" class="view-all-devices">View All Network Security →</a></li>
                    </ul>
                </div>
                
                <div class="device-forum-card">
                    <h3>
                        <i class="fas fa-user-secret" style="color: #9b59b6; margin-right: 0.5rem;"></i>
                        Privacy & Anonymity
                    </h3>
                    <ul class="device-list">
                        <li><a href="#">Tor & Dark Web</a></li>
                        <li><a href="#">Anonymous Communication</a></li>
                        <li><a href="#">Data Privacy</a></li>
                        <li><a href="#">GDPR Compliance</a></li>
                        <li><a href="#" class="view-all-devices">View All Privacy →</a></li>
                    </ul>
                </div>
                
                <div class="device-forum-card">
                    <h3>
                        <i class="fas fa-bug" style="color: #27ae60; margin-right: 0.5rem;"></i>
                        Ethical Hacking
                    </h3>
                    <ul class="device-list">
                        <li><a href="#">Penetration Testing</a></li>
                        <li><a href="#">Bug Bounty Programs</a></li>
                        <li><a href="#">Vulnerability Research</a></li>
                        <li><a href="#">Security Certifications</a></li>
                        <li><a href="#" class="view-all-devices">View All Ethical Hacking →</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Security Tools & Resources -->
        <div class="development-resources-section">
            <h2>Security Tools & Resources</h2>
            <div class="resources-grid">
                <div class="resource-item">
                    <div class="resource-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <div class="resource-content">
                        <h3>Antivirus & Anti-Malware</h3>
                        <p>Reviews and comparisons of antivirus software and malware protection tools.</p>
                        <a href="#" class="resource-link">View Antivirus Reviews →</a>
                    </div>
                </div>
                
                <div class="resource-item">
                    <div class="resource-icon">
                        <i class="fas fa-key"></i>
                    </div>
                    <div class="resource-content">
                        <h3>Password Managers</h3>
                        <p>Secure password management solutions and two-factor authentication tools.</p>
                        <a href="#" class="resource-link">View Password Tools →</a>
                    </div>
                </div>
                
                <div class="resource-item">
                    <div class="resource-icon">
                        <i class="fas fa-user-secret"></i>
                    </div>
                    <div class="resource-content">
                        <h3>VPN Services</h3>
                        <p>Comprehensive VPN reviews, privacy policies, and security feature comparisons.</p>
                        <a href="#" class="resource-link">View VPN Reviews →</a>
                    </div>
                </div>
                
                <div class="resource-item">
                    <div class="resource-icon">
                        <i class="fas fa-tools"></i>
                    </div>
                    <div class="resource-content">
                        <h3>Security Testing Tools</h3>
                        <p>Penetration testing tools, vulnerability scanners, and security assessment utilities.</p>
                        <a href="#" class="resource-link">View Security Tools →</a>
                    </div>
                </div>
                
                <div class="resource-item">
                    <div class="resource-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <div class="resource-content">
                        <h3>Security Training</h3>
                        <p>Cybersecurity courses, certifications, and training resources for all skill levels.</p>
                        <a href="#" class="resource-link">View Training Resources →</a>
                    </div>
                </div>
                
                <div class="resource-item">
                    <div class="resource-icon">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <div class="resource-content">
                        <h3>Threat Intelligence</h3>
                        <p>Latest security threats, vulnerability databases, and threat intelligence feeds.</p>
                        <a href="#" class="resource-link">View Threat Intel →</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Thread Button -->
    <a href="#" class="create-thread-btn security-btn">
        <i class="fas fa-plus"></i>
    </a>
</main>

<?php get_footer(); ?>
