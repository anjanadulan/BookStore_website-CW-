<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>About Us - Horizon Books</title>
        
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="res-styles.css">
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> 
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
        <script src="script.js" defer></script>

        <style>
            .about-section {
                padding: 60px 20px;
                max-width: 1200px;
                margin: 0 auto;
                text-align: center;
                animation: fadeInDown 0.8s ease;
            }
            
            .about-header {
                padding: 50px 20px 50px 20px;
            }
            .about-header h1 {
                font-size: 3rem;
                color: #3c3633;
                margin-bottom: 0;
            }
            
            .about-content {
                font-size: 1.1rem;
                line-height: 1.8;
                color: #5d5550;
                margin-bottom: 50px;
                text-align: left;
            }

            .stats-container {
                display: flex;
                justify-content: space-around;
                gap: 30px;
                flex-wrap: wrap;
                padding: 50px 20px;
                background: linear-gradient(135deg, #e0ccbe 0%, #d4bfae 100%);
                border-radius: 15px;
                margin: 40px 0;
            }

            .stat-box {
                text-align: center;
                animation: fadeIn 0.8s ease;
            }

            .stat-number {
                font-size: 3rem;
                font-weight: bold;
                color: #3c3633;
                margin-bottom: 10px;
            }

            .stat-label {
                font-size: 1rem;
                color: #5d5550;
                text-transform: uppercase;
                letter-spacing: 1px;
            }

            .mission-vision {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
                gap: 30px;
                margin: 50px 0;
            }

            .mission-box, .vision-box {
                background: #fff;
                padding: 40px;
                border-radius: 15px;
                box-shadow: 0 10px 30px rgba(0,0,0,0.08);
                border: 1px solid #e0ccbe;
                transition: all 0.3s ease;
                text-align: left;
            }

            .mission-box:hover, .vision-box:hover {
                transform: translateY(-5px);
                box-shadow: 0 15px 40px rgba(0,0,0,0.12);
            }

            .mission-box h3, .vision-box h3 {
                color: #3c3633;
                font-size: 1.5rem;
                margin-bottom: 15px;
                display: flex;
                align-items: center;
                gap: 10px;
            }

            .mission-box p, .vision-box p {
                color: #5d5550;
                line-height: 1.8;
            }

            .team-grid {
                display: flex;
                justify-content: center;
                gap: 30px;
                flex-wrap: wrap;
                margin-top: 40px;
            }

            .team-card {
                background: #fff;
                padding: 30px;
                border-radius: 15px;
                box-shadow: 0 10px 20px rgba(0,0,0,0.05);
                width: 250px;
                border: 1px solid #e0ccbe;
                transition: all 0.4s ease;
                animation: fadeIn 0.8s ease;
            }

            .team-card:hover {
                transform: translateY(-10px) scale(1.02);
                box-shadow: 0 15px 30px rgba(0,0,0,0.15);
            }

            .team-icon {
                font-size: 50px;
                color: #3c3633;
                margin-bottom: 15px;
                transition: all 0.3s ease;
            }

            .team-card:hover .team-icon {
                transform: rotate(360deg);
                color: #d9534f;
            }

            .team-name {
                font-size: 1.2rem;
                font-weight: bold;
                color: #3c3633;
                margin-bottom: 5px;
            }

            .team-role {
                font-size: 0.9rem;
                color: #888;
                text-transform: uppercase;
                letter-spacing: 1px;
                margin-bottom: 10px;
            }

            .team-bio {
                font-size: 0.85rem;
                color: #666;
                line-height: 1.6;
                margin-top: 10px;
            }

            @keyframes fadeIn {
                from { opacity: 0; }
                to { opacity: 1; }
            }

            @keyframes fadeInDown {
                from {
                    opacity: 0;
                    transform: translateY(-30px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }


            .values-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                gap: 25px;
                margin: 40px 0;
            }

            .value-card {
                background: #fff;
                padding: 25px;
                border-radius: 12px;
                box-shadow: 0 5px 15px rgba(0,0,0,0.05);
                border-left: 4px solid #d9534f;
                transition: all 0.3s ease;
                text-align: left;
            }

            .value-card:hover {
                transform: translateX(5px);
                box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            }

            .value-card h4 {
                color: #3c3633;
                margin-bottom: 10px;
                font-size: 1.1rem;
            }

            .value-card p {
                color: #666;
                font-size: 0.9rem;
                line-height: 1.6;
            }

            h2.section-title {
                color: #3c3633;
                font-size: 2rem;
                margin: 60px 0 30px 0;
                position: relative;
                display: inline-block;
            }

            h2.section-title::after {
                content: '';
                position: absolute;
                bottom: -10px;
                left: 50%;
                transform: translateX(-50%);
                width: 60px;
                height: 3px;
                background: #d9534f;
                border-radius: 2px;
            }
        </style>
    </head>
    <body>

        <nav class="nav">
            <i class="uil uil-bars navOpenBtn"></i>
            <a href="index.php" class="logo">Horizon Books</a>
            <ul class="nav-links">
                <i class="uil uil-times navCloseBtn"></i>
                <li><a href="index.php">Home</a></li>
                <li><a href="services.php">Services</a></li>
                <li><a href="allproduct.php">Products</a></li> 
                <li><a href="about.php">About Us</a></li>
                <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                    <li><a href="store.php">Store</a></li>
                    <li><a href="logout.php" class="logout">Logout</a></li>
                <?php else: ?>
                    <li><a href="login.php">Admin Login</a></li>
                <?php endif; ?>
            </ul>
            <i class="uil uil-search search-icon" id="searchIcon"></i>
            <form class="search-box" action="search.php" method="GET">
                <i class="uil uil-search search-icon"></i>
                <input type="text" name="q" placeholder="Search here..." required />
            </form>
        </nav>

        <div class="main-container">
            <section class="about-section">
                <div class="about-header" style="border:2px dashed #ffffff; border-radius: 15px; height: 100%;">
                    <h1>About Horizon Bookshop</h1>
                </div>
                <hr style="width: 50%; padding-bottom: 20px;">
                <div class="about-content">
                    <p>
                       Welcome to Horizon Bookshop, your premier destination for discovering exceptional books from around the world. 
                       Located in the heart of NIBM, we are proud to be the first bookshop in the area dedicated to bringing international 
                       titles to our local community. Our mission is simple: connect passionate readers with the stories they'll treasure forever.
                    </p>
                    <br>
                    <p>
                        Our carefully curated collection spans every genre imaginable - from pulse-pounding science fiction and gripping thrillers 
                        to educational resources and timeless literary fiction. Whether you're searching for the latest bestseller, a hidden gem, 
                        or a classic tale, our platform makes discovery effortless and enjoyable.
                    </p>
                    <br>
                    <p>
                        Built with cutting-edge web technologies including HTML5, CSS3, PHP, and JavaScript, Horizon Bookshop delivers a 
                        seamless browsing experience across all devices. This project represents our commitment to combining technical 
                        excellence with genuine passion for literature.
                    </p>
                </div>

                <div class="stats-container">
                    <div class="stat-box">
                        <div class="stat-number">1000+</div>
                        <div class="stat-label">Books Available</div>
                    </div>
                    <div class="stat-box">
                        <div class="stat-number">500+</div>
                        <div class="stat-label">Happy Readers</div>
                    </div>
                    <div class="stat-box">
                        <div class="stat-number">7</div>
                        <div class="stat-label">Genre Categories</div>
                    </div>
                    <div class="stat-box">
                        <div class="stat-number">24/7</div>
                        <div class="stat-label">Online Access</div>
                    </div>
                </div>

                <hr>

                <h2 class="section-title">Our Purpose</h2>
                <div class="mission-vision">
                    <div class="mission-box">
                        <h3><i class="uil uil-bullseye"></i> Our Mission</h3>
                        <p>
                            To democratize access to world-class literature by providing an intuitive, accessible platform 
                            where every reader - from students to professionals - can discover, explore, and acquire books 
                            that inspire, educate, and entertain. We strive to foster a love of reading in our community 
                            while supporting local literacy initiatives.
                        </p>
                    </div>
                    <div class="vision-box">
                        <h3><i class="uil uil-telescope"></i> Our Vision</h3>
                        <p>
                            To become the leading digital bookshop in Sri Lanka, recognized for our exceptional selection 
                            of international titles, outstanding customer service, and unwavering commitment to promoting 
                            reading culture. We envision a future where every household has access to quality literature 
                            at their fingertips.
                        </p>
                    </div>
                </div>

                <h2 class="section-title">What We Stand For</h2>
                <div class="values-grid">
                    <div class="value-card">
                        <h4><i class="uil uil-book-reader"></i> Quality First</h4>
                        <p>We curate only the finest books, ensuring every title meets our high standards for content and presentation.</p>
                    </div>
                    <div class="value-card">
                        <h4><i class="uil uil-users-alt"></i> Customer Focus</h4>
                        <p>Your satisfaction drives everything we do. We listen, adapt, and continuously improve based on your feedback.</p>
                    </div>
                    <div class="value-card">
                        <h4><i class="uil uil-bolt"></i> Innovation</h4>
                        <p>Leveraging modern technology to create seamless, intuitive experiences that make book discovery a joy.</p>
                    </div>
                    <div class="value-card">
                        <h4><i class="uil uil-heart"></i> Community</h4>
                        <p>Building connections between readers, authors, and ideas through events, discussions, and shared passion.</p>
                    </div>
                </div>

                <hr>

                <h2 class="section-title">Meet Our Team</h2>
                <p style="color: #5d5550; margin-bottom: 30px;">
                    The passionate individuals behind Horizon Bookshop, dedicated to bringing you the best reading experience.
                </p>
                
                <div class="team-grid">
                    <div class="team-card">
                        <i class="uil uil-laptop-cloud team-icon"></i>
                        <i class="uil uil-database team-icon"></i>
                        <div class="team-name">Anjana Wijerathna</div>
                        <div class="team-role">Lead Developer & Database Architect</div>
                        <div class="team-bio">
                            Full-stack developer specializing in PHP and database architecture. Passionate about creating 
                            elegant solutions to complex problems.
                        </div>
                    </div>

                    <div class="team-card">
                        <i class="uil uil-palette team-icon"></i>
                        <div class="team-name">Melisha Devaraj</div>
                        <div class="team-role">UI/UX Designer</div>
                        <div class="team-bio">
                            Creative designer focused on user-centered design principles. Believes beautiful interfaces 
                            should be intuitive and accessible.
                        </div>
                    </div>

                    <div class="team-card">
                        <i class="uil uil-book-alt team-icon"></i>
                        <div class="team-name">Pabodhini Perera</div>
                        <div class="team-role">Content Curator</div>
                        <div class="team-bio">
                            Avid reader with expertise across all genres. Carefully selects each title to ensure quality 
                            and diversity in our collection.
                        </div>
                    </div>
                </div>

                <div style="margin-top: 60px; padding: 40px; background: #f9f9f9; border-radius: 15px; height: 300px;">
                    <div style="text-align: center; padding: 45px; border:2px dashed #dcd0c5; border-radius: 15px; height: 100%;">
                    <h2 style="color: #3c3633; margin-bottom: 15px;">Academic Project</h3>
                    <p style="color: #5d5550; line-height: 1.8;">
                        This project was developed as part of the <strong>Application Development</strong> module. 
                        We utilized pure HTML, CSS, PHP, and JavaScript to build a fast, responsive, 
                        and user-friendly experience without relying on external frameworks.
                    </p>
                    </div>
                </div>
            </section>
            <hr>
        </div>

        <hr>
        <footer class="footer">
            <div class="footer-container">
                
                <div class="footer-col">
                    <h3>Horizon Books</h3>
                    <p>is the first bookshop in NIBM to focus on International titles. <em>It doesn't get more local than this!</em></p>
                </div>

                <div class="footer-col">
                    <h3>Top Nav</h3>
                    <ul>
                        <li><a href="allproduct.php">Books</a></li>
                        <li><a href="viewall.php?genre=Sci-Fi">Science Fiction</a></li>
                        <li><a href="viewall.php?genre=Education">Educational</a></li>
                        <li><a href="about.php">About Us</a></li>
                        <li><a href="about.php">Contact US</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h3>‎ </h3>
                    <ul>
                        <li>‎</li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h3>FOLLOW US</h3>
                    <div class="social-links">
                        <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.x.com/"><i class="fab fa-twitter"></i></a>
                        <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                        <a href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a>
                        <a href="https://www.gmail.com/"><i class="far fa-envelope"></i></a>
                    </div>
                </div>
            </div>

            <hr>

            <div class="footer-bottom">
                <div class="copyright">
                    <p>Copyright © 2025 HorizonBooks<br>All rights reserved.</p>
                </div>
                
                <div class="payment-methods">
                    <i class="fab fa-cc-amex" style="color: #007bc1;"></i>
                    <i class="fab fa-apple-pay" style="color: black;"></i>
                    <i class="fab fa-google-pay" style="color: #4285F4;"></i>
                    <i class="fab fa-cc-mastercard" style="color: #eb001b;"></i>
                    <i class="fab fa-cc-paypal" style="color: #003087;"></i>
                    <i class="fab fa-cc-visa" style="color: #1a1f71;"></i>
                </div>
            </div>
        </footer>
    </body>
</html>