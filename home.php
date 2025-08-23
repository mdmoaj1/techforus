<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechForum - The Ultimate Community for Android, Linux, Windows & More</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #2563eb;       /* Blue */
            --primary-dark: #1d4ed8;  /* Darker Blue */
            --secondary: #10b981;     /* Green */
            --dark: #1e293b;          /* Dark Slate */
            --light: #f8fafc;         /* Light Gray */
            --gray: #64748b;          /* Medium Gray */
            --accent: #8b5cf6;        /* Purple */
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: var(--light);
            color: var(--dark);
            line-height: 1.6;
        }
        
        header {
            background-color: var(--dark);
            color: white;
            padding: 1rem 0;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            font-size: 1.8rem;
            font-weight: 700;
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
        }
        
        .logo i {
            color: var(--secondary);
            margin-right: 0.5rem;
        }
        
        .nav-links {
            display: flex;
            list-style: none;
        }
        
        .nav-links li {
            margin-left: 1.5rem;
        }
        
        .nav-links a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }
        
        .nav-links a:hover {
            color: var(--secondary);
        }
        
        .btn {
            display: inline-block;
            padding: 0.6rem 1.2rem;
            background-color: var(--primary);
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 500;
            transition: background-color 0.3s;
            text-decoration: none;
        }
        
        .btn:hover {
            background-color: var(--primary-dark);
        }
        
        .btn-secondary {
            background-color: var(--secondary);
        }
        
        .btn-secondary:hover {
            background-color: #0da271;
        }
        
        .hero {
            background: linear-gradient(rgba(30, 41, 59, 0.8), rgba(30, 41, 59, 0.9)), url('https://images.unsplash.com/photo-1550751827-4bd374c3f58b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 5rem 0;
            text-align: center;
        }
        
        .hero h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
        }
        
        .hero p {
            font-size: 1.2rem;
            max-width: 700px;
            margin: 0 auto 2rem;
        }
        
        .search-bar {
            max-width: 600px;
            margin: 2rem auto;
            display: flex;
        }
        
        .search-bar input {
            flex: 1;
            padding: 0.8rem 1rem;
            border: none;
            border-radius: 4px 0 0 4px;
            font-size: 1rem;
        }
        
        .search-bar button {
            padding: 0 1.5rem;
            background-color: var(--secondary);
            color: white;
            border: none;
            border-radius: 0 4px 4px 0;
            cursor: pointer;
        }
        
        .features {
            padding: 4rem 0;
        }
        
        .section-title {
            text-align: center;
            margin-bottom: 3rem;
        }
        
        .section-title h2 {
            font-size: 2.2rem;
            color: var(--dark);
            margin-bottom: 1rem;
        }
        
        .section-title p {
            color: var(--gray);
            max-width: 700px;
            margin: 0 auto;
        }
        
        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }
        
        .card {
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        
        .card-img {
            height: 200px;
            overflow: hidden;
        }
        
        .card-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }
        
        .card:hover .card-img img {
            transform: scale(1.05);
        }
        
        .card-content {
            padding: 1.5rem;
        }
        
        .card-content h3 {
            font-size: 1.4rem;
            margin-bottom: 0.8rem;
            color: var(--dark);
        }
        
        .card-content p {
            color: var(--gray);
            margin-bottom: 1.2rem;
        }
        
        .topics {
            padding: 4rem 0;
            background-color: #f1f5f9;
        }
        
        .topic-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
        }
        
        .topic-item {
            background-color: white;
            padding: 1.5rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s;
            display: flex;
            align-items: center;
        }
        
        .topic-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .topic-icon {
            width: 50px;
            height: 50px;
            background-color: var(--primary);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            font-size: 1.5rem;
        }
        
        .topic-item:nth-child(2n) .topic-icon {
            background-color: var(--secondary);
        }
        
        .topic-item:nth-child(3n) .topic-icon {
            background-color: var(--accent);
        }
        
        .topic-content h3 {
            font-size: 1.2rem;
            margin-bottom: 0.3rem;
        }
        
        .topic-content p {
            color: var(--gray);
            font-size: 0.9rem;
        }
        
        .stats {
            padding: 4rem 0;
            background-color: var(--dark);
            color: white;
        }
        
        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            text-align: center;
        }
        
        .stat-item h3 {
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
            color: var(--secondary);
        }
        
        .stat-item p {
            font-size: 1.1rem;
            color: #cbd5e1;
        }
        
        .cta {
            padding: 5rem 0;
            text-align: center;
            background-color: white;
        }
        
        .cta h2 {
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
            color: var(--dark);
        }
        
        .cta p {
            max-width: 700px;
            margin: 0 auto 2rem;
            color: var(--gray);
            font-size: 1.1rem;
        }
        
        .cta-buttons {
            display: flex;
            justify-content: center;
            gap: 1rem;
            flex-wrap: wrap;
        }
        
        footer {
            background-color: var(--dark);
            color: white;
            padding: 3rem 0 1.5rem;
        }
        
        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }
        
        .footer-column h3 {
            font-size: 1.2rem;
            margin-bottom: 1.2rem;
            color: var(--secondary);
        }
        
        .footer-links {
            list-style: none;
        }
        
        .footer-links li {
            margin-bottom: 0.8rem;
        }
        
        .footer-links a {
            color: #cbd5e1;
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .footer-links a:hover {
            color: white;
        }
        
        .social-links {
            display: flex;
            gap: 1rem;
        }
        
        .social-links a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background-color: #334155;
            color: white;
            border-radius: 50%;
            transition: background-color 0.3s;
        }
        
        .social-links a:hover {
            background-color: var(--primary);
        }
        
        .copyright {
            text-align: center;
            padding-top: 2rem;
            border-top: 1px solid #334155;
            color: #94a3b8;
            font-size: 0.9rem;
        }
        
        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                gap: 1rem;
            }
            
            .nav-links {
                width: 100%;
                justify-content: center;
                flex-wrap: wrap;
                gap: 0.5rem;
            }
            
            .nav-links li {
                margin: 0 0.5rem;
            }
            
            .hero h1 {
                font-size: 2.2rem;
            }
            
            .cta-buttons {
                flex-direction: column;
                align-items: center;
            }
            
            .cta-buttons .btn {
                width: 80%;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <nav class="navbar">
                <a href="#" class="logo"><i class="fas fa-code"></i> TechForum</a>
                <ul class="nav-links">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Forums</a></li>
                    <li><a href="#">Tutorials</a></li>
                    <li><a href="#">Downloads</a></li>
                    <li><a href="#">News</a></li>
                    <li><a href="#" class="btn">Sign In</a></li>
                </ul>
            </nav>
        </div>
    </header>

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

    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h3>TechForum</h3>
                    <p>The ultimate community for Android, Linux, Windows, and all things tech.</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-github"></i></a>
                        <a href="#"><i class="fab fa-discord"></i></a>
                    </div>
                </div>
                <div class="footer-column">
                    <h3>Navigation</h3>
                    <ul class="footer-links">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Forums</a></li>
                        <li><a href="#">Tutorials</a></li>
                        <li><a href="#">Downloads</a></li>
                        <li><a href="#">News</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Resources</h3>
                    <ul class="footer-links">
                        <li><a href="#">Device Database</a></li>
                        <li><a href="#">Developer Tools</a></li>
                        <li><a href="#">ROM Repository</a></li>
                        <li><a href="#">Kernel Sources</a></li>
                        <li><a href="#">Documentation</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Support</h3>
                    <ul class="footer-links">
                        <li><a href="#">Help Center</a></li>
                        <li><a href="#">Community Guidelines</a></li>
                        <li><a href="#">Report Issues</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
            <div class="copyright">
                <p>&copy; 2023 TechForum. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>
