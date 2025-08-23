<?php
/**
 * Template Name: Development Forum Page
 * 
 * @package TechForum_Theme
 */

get_header(); ?>

<main id="primary" class="site-main">
    <!-- Forum Header -->
    <section class="forum-header development-header">
        <div class="container">
            <h1><i class="fas fa-code"></i> Development Forum</h1>
            <p>Discuss programming languages, software development, mobile app development, web technologies, and coding best practices.</p>
            <a href="#" class="btn btn-development">Share Your Project</a>
        </div>
    </section>

    <div class="container">
        <!-- Breadcrumb -->
        <ul class="breadcrumb-nav">
            <li class="breadcrumb-item"><a href="<?php echo home_url(); ?>"><i class="fas fa-home"></i> Home</a></li>
            <li class="breadcrumb-item"><a href="#">Forums</a></li>
            <li class="breadcrumb-item active">Development</li>
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
                            <img src="https://i.pravatar.cc/150?img=121" alt="User Avatar">
                        </div>
                        <div class="thread-content">
                            <a href="#" class="thread-title">React Native vs Flutter: Performance Comparison 2024</a>
                            <div class="thread-meta">
                                <span><i class="fas fa-user"></i> MobileDev</span>
                                <span><i class="far fa-clock"></i> 2 hours ago</span>
                                <span><i class="fas fa-eye"></i> 3.8k views</span>
                            </div>
                            <p class="thread-preview">Comprehensive performance analysis between React Native and Flutter for mobile app development. Benchmarks, memory usage, and real-world application comparisons...</p>
                            <div class="thread-tags">
                                <span class="tag">React Native</span>
                                <span class="tag">Flutter</span>
                                <span class="tag">Performance</span>
                                <span class="tag">Mobile Dev</span>
                            </div>
                        </div>
                        <div class="thread-stats">
                            <div class="stats-number">89</div>
                            <div class="stats-label">Replies</div>
                        </div>
                    </li>
                    
                    <li class="thread-item">
                        <div class="thread-avatar">
                            <img src="https://i.pravatar.cc/150?img=122" alt="User Avatar">
                        </div>
                        <div class="thread-content">
                            <a href="#" class="thread-title">[TUTORIAL] Building REST APIs with Node.js and Express</a>
                            <div class="thread-meta">
                                <span><i class="fas fa-user"></i> BackendGuru</span>
                                <span><i class="far fa-clock"></i> Yesterday</span>
                                <span><i class="fas fa-eye"></i> 5.2k views</span>
                            </div>
                            <p class="thread-preview">Complete tutorial for building scalable REST APIs using Node.js and Express. Covers authentication, database integration, error handling, and deployment strategies...</p>
                            <div class="thread-tags">
                                <span class="tag">Node.js</span>
                                <span class="tag">Express</span>
                                <span class="tag">REST API</span>
                                <span class="tag">Tutorial</span>
                            </div>
                        </div>
                        <div class="thread-stats">
                            <div class="stats-number">156</div>
                            <div class="stats-label">Replies</div>
                        </div>
                    </li>
                    
                    <li class="thread-item">
                        <div class="thread-avatar">
                            <img src="https://i.pravatar.cc/150?img=123" alt="User Avatar">
                        </div>
                        <div class="thread-content">
                            <a href="#" class="thread-title">Python Machine Learning: TensorFlow vs PyTorch Comparison</a>
                            <div class="thread-meta">
                                <span><i class="fas fa-user"></i> MLEngineer</span>
                                <span><i class="far fa-clock"></i> 3 days ago</span>
                                <span><i class="fas fa-eye"></i> 7.1k views</span>
                            </div>
                            <p class="thread-preview">In-depth comparison of TensorFlow and PyTorch for machine learning projects. Performance benchmarks, ease of use, community support, and use case recommendations...</p>
                            <div class="thread-tags">
                                <span class="tag">Python</span>
                                <span class="tag">TensorFlow</span>
                                <span class="tag">PyTorch</span>
                                <span class="tag">Machine Learning</span>
                            </div>
                        </div>
                        <div class="thread-stats">
                            <div class="stats-number">234</div>
                            <div class="stats-label">Replies</div>
                        </div>
                    </li>
                    
                    <li class="thread-item">
                        <div class="thread-avatar">
                            <img src="https://i.pravatar.cc/150?img=124" alt="User Avatar">
                        </div>
                        <div class="thread-content">
                            <a href="#" class="thread-title">Docker Containerization Best Practices for Development</a>
                            <div class="thread-meta">
                                <span><i class="fas fa-user"></i> DevOpsExpert</span>
                                <span><i class="far fa-clock"></i> 5 days ago</span>
                                <span><i class="fas fa-eye"></i> 4.6k views</span>
                            </div>
                            <p class="thread-preview">Best practices for using Docker in development environments. Multi-stage builds, volume management, networking, and integration with CI/CD pipelines...</p>
                            <div class="thread-tags">
                                <span class="tag">Docker</span>
                                <span class="tag">DevOps</span>
                                <span class="tag">Containerization</span>
                                <span class="tag">CI/CD</span>
                            </div>
                        </div>
                        <div class="thread-stats">
                            <div class="stats-number">178</div>
                            <div class="stats-label">Replies</div>
                        </div>
                    </li>
                    
                    <li class="thread-item">
                        <div class="thread-avatar">
                            <img src="https://i.pravatar.cc/150?img=125" alt="User Avatar">
                        </div>
                        <div class="thread-content">
                            <a href="#" class="thread-title">JavaScript ES2024 Features: What's New and How to Use Them</a>
                            <div class="thread-meta">
                                <span><i class="fas fa-user"></i> JSMaster</span>
                                <span><i class="far fa-clock"></i> 1 week ago</span>
                                <span><i class="fas fa-eye"></i> 6.8k views</span>
                            </div>
                            <p class="thread-preview">Overview of new JavaScript ES2024 features including temporal API, pattern matching, and enhanced array methods. Code examples and browser compatibility information...</p>
                            <div class="thread-tags">
                                <span class="tag">JavaScript</span>
                                <span class="tag">ES2024</span>
                                <span class="tag">Features</span>
                                <span class="tag">Frontend</span>
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
                        <li><a href="#"><i class="fab fa-js"></i> JavaScript & Frontend</a></li>
                        <li><a href="#"><i class="fab fa-python"></i> Python Development</a></li>
                        <li><a href="#"><i class="fab fa-java"></i> Java & Kotlin</a></li>
                        <li><a href="#"><i class="fas fa-mobile-alt"></i> Mobile Development</a></li>
                        <li><a href="#"><i class="fas fa-server"></i> Backend Development</a></li>
                        <li><a href="#"><i class="fas fa-database"></i> Database Design</a></li>
                        <li><a href="#"><i class="fas fa-cloud"></i> Cloud & DevOps</a></li>
                        <li><a href="#"><i class="fas fa-brain"></i> AI & Machine Learning</a></li>
                    </ul>
                </div>

                <div class="sidebar-widget">
                    <h3>Featured Projects</h3>
                    <div class="featured-threads">
                        <div class="featured-thread">
                            <div class="featured-thread-icon">
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="featured-thread-content">
                                <a href="#">Open Source React Component Library</a>
                                <div class="featured-thread-meta">
                                    <span>By ReactDev • 15.2k stars</span>
                                </div>
                            </div>
                        </div>
                        <div class="featured-thread">
                            <div class="featured-thread-icon">
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="featured-thread-content">
                                <a href="#">Python Data Analysis Toolkit</a>
                                <div class="featured-thread-meta">
                                    <span>By DataScientist • 12.8k stars</span>
                                </div>
                            </div>
                        </div>
                        <div class="featured-thread">
                            <div class="featured-thread-icon">
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="featured-thread-content">
                                <a href="#">Flutter UI Components Collection</a>
                                <div class="featured-thread-meta">
                                    <span>By FlutterDev • 9.4k stars</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="sidebar-widget">
                    <h3>Popular Tags</h3>
                    <div class="tag-cloud">
                        <span class="tag">JavaScript</span>
                        <span class="tag">Python</span>
                        <span class="tag">React</span>
                        <span class="tag">Node.js</span>
                        <span class="tag">Flutter</span>
                        <span class="tag">React Native</span>
                        <span class="tag">Docker</span>
                        <span class="tag">AWS</span>
                        <span class="tag">MongoDB</span>
                        <span class="tag">PostgreSQL</span>
                        <span class="tag">TypeScript</span>
                        <span class="tag">Vue.js</span>
                        <span class="tag">Django</span>
                        <span class="tag">FastAPI</span>
                        <span class="tag">Kubernetes</span>
                    </div>
                </div>

                <div class="sidebar-widget">
                    <h3>Active Developers</h3>
                    <div class="online-users">
                        <div class="user-avatar">
                            <img src="https://i.pravatar.cc/150?img=131" alt="Developer Avatar">
                        </div>
                        <div class="user-avatar">
                            <img src="https://i.pravatar.cc/150?img=132" alt="Developer Avatar">
                        </div>
                        <div class="user-avatar">
                            <img src="https://i.pravatar.cc/150?img=133" alt="Developer Avatar">
                        </div>
                        <div class="user-avatar">
                            <img src="https://i.pravatar.cc/150?img=134" alt="Developer Avatar">
                        </div>
                        <div class="user-avatar">
                            <img src="https://i.pravatar.cc/150?img=135" alt="Developer Avatar">
                        </div>
                        <div class="user-avatar">
                            <img src="https://i.pravatar.cc/150?img=136" alt="Developer Avatar">
                        </div>
                    </div>
                    <p class="online-stats">
                        <strong>342</strong> developers online • <a href="#" class="view-all-link">View All</a>
                    </p>
                </div>

                <div class="sidebar-widget">
                    <h3>Tech News & Updates</h3>
                    <div class="featured-threads">
                        <div class="featured-thread">
                            <div class="featured-thread-icon">
                                <i class="fas fa-newspaper"></i>
                            </div>
                            <div class="featured-thread-content">
                                <a href="#">React 19 Beta Released with New Features</a>
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
                                <a href="#">Python 3.12.2 Security Update Available</a>
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
                                <a href="#">Flutter 3.19 Adds New Performance Features</a>
                                <div class="featured-thread-meta">
                                    <span>2 days ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Development Technologies -->
        <div class="device-forums-section">
            <h2>Popular Development Technologies</h2>
            <div class="device-forums-grid">
                <div class="device-forum-card">
                    <h3>
                        <i class="fab fa-js" style="color: #f7df1e; margin-right: 0.5rem;"></i>
                        Frontend Development
                    </h3>
                    <ul class="device-list">
                        <li><a href="#">React & Next.js</a></li>
                        <li><a href="#">Vue.js & Nuxt.js</a></li>
                        <li><a href="#">Angular & TypeScript</a></li>
                        <li><a href="#">Svelte & SvelteKit</a></li>
                        <li><a href="#" class="view-all-devices">View All Frontend →</a></li>
                    </ul>
                </div>
                
                <div class="device-forum-card">
                    <h3>
                        <i class="fas fa-server" style="color: #68a063; margin-right: 0.5rem;"></i>
                        Backend Development
                    </h3>
                    <ul class="device-list">
                        <li><a href="#">Node.js & Express</a></li>
                        <li><a href="#">Python & Django/FastAPI</a></li>
                        <li><a href="#">Java & Spring Boot</a></li>
                        <li><a href="#">Go & Gin/Echo</a></li>
                        <li><a href="#" class="view-all-devices">View All Backend →</a></li>
                    </ul>
                </div>
                
                <div class="device-forum-card">
                    <h3>
                        <i class="fas fa-mobile-alt" style="color: #02569b; margin-right: 0.5rem;"></i>
                        Mobile Development
                    </h3>
                    <ul class="device-list">
                        <li><a href="#">Flutter & Dart</a></li>
                        <li><a href="#">React Native</a></li>
                        <li><a href="#">Native Android (Kotlin)</a></li>
                        <li><a href="#">Native iOS (Swift)</a></li>
                        <li><a href="#" class="view-all-devices">View All Mobile →</a></li>
                    </ul>
                </div>
                
                <div class="device-forum-card">
                    <h3>
                        <i class="fas fa-cloud" style="color: #ff9900; margin-right: 0.5rem;"></i>
                        Cloud & DevOps
                    </h3>
                    <ul class="device-list">
                        <li><a href="#">AWS & Azure</a></li>
                        <li><a href="#">Docker & Kubernetes</a></li>
                        <li><a href="#">CI/CD Pipelines</a></li>
                        <li><a href="#">Infrastructure as Code</a></li>
                        <li><a href="#" class="view-all-devices">View All Cloud →</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Development Resources -->
        <div class="development-resources-section">
            <h2>Development Learning Resources</h2>
            <div class="resources-grid">
                <div class="resource-item">
                    <div class="resource-icon">
                        <i class="fas fa-book"></i>
                    </div>
                    <div class="resource-content">
                        <h3>Programming Tutorials</h3>
                        <p>Comprehensive tutorials for all major programming languages and frameworks.</p>
                        <a href="#" class="resource-link">View Tutorials →</a>
                    </div>
                </div>
                
                <div class="resource-item">
                    <div class="resource-icon">
                        <i class="fab fa-github"></i>
                    </div>
                    <div class="resource-content">
                        <h3>Open Source Projects</h3>
                        <p>Discover and contribute to open source projects in various technologies.</p>
                        <a href="#" class="resource-link">Browse Projects →</a>
                    </div>
                </div>
                
                <div class="resource-item">
                    <div class="resource-icon">
                        <i class="fas fa-code"></i>
                    </div>
                    <div class="resource-content">
                        <h3>Code Examples & Snippets</h3>
                        <p>Ready-to-use code examples and snippets for common programming tasks.</p>
                        <a href="#" class="resource-link">View Code Examples →</a>
                    </div>
                </div>
                
                <div class="resource-item">
                    <div class="resource-icon">
                        <i class="fas fa-tools"></i>
                    </div>
                    <div class="resource-content">
                        <h3>Development Tools</h3>
                        <p>Essential tools, IDEs, and utilities for modern software development.</p>
                        <a href="#" class="resource-link">View Tools →</a>
                    </div>
                </div>
                
                <div class="resource-item">
                    <div class="resource-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <div class="resource-content">
                        <h3>Learning Paths</h3>
                        <p>Structured learning paths for different programming careers and specializations.</p>
                        <a href="#" class="resource-link">View Learning Paths →</a>
                    </div>
                </div>
                
                <div class="resource-item">
                    <div class="resource-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="resource-content">
                        <h3>Developer Community</h3>
                        <p>Connect with other developers, join coding challenges, and share knowledge.</p>
                        <a href="#" class="resource-link">Join Community →</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Thread Button -->
    <a href="#" class="create-thread-btn development-btn">
        <i class="fas fa-plus"></i>
    </a>
</main>

<?php get_footer(); ?>
