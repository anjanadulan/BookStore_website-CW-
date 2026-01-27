<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>About Us - NIBM Bookshop</title>
        
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="res-styles.css">
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> 
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
        <script src="script.js" defer></script>

        <style>
            .about-section {
                padding: 60px 20px;
                max-width: 1000px;
                margin: 0 auto;
                text-align: center;
            }
            
            .about-header {
                padding: 50px 20px 10px 20px;
            }
            .about-header h1 {
                font-size: 3rem;
                color: #3c3633;
                margin-bottom: 20px;
            }
            
            .about-content {
                font-size: 1.1rem;
                line-height: 1.8;
                color: #5d5550;
                margin-bottom: 50px;
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
                transition: transform 0.3s ease;
            }

            .team-card:hover {
                transform: translateY(-10px);
            }

            .team-icon {
                font-size: 50px;
                color: #3c3633;
                margin-bottom: 15px;
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
                <div class="about-header">
                    <h1>About NIBM Bookshop</h1>
                </div>
                <hr style="width: 50%; padding-bottom: 20px;">
                <div class="about-content">
                    <p>
                        Welcome to the <strong>NIBM Bookshop</strong>, a student-led initiative designed to bring the best educational resources and literature to our campus. 
                        Our platform allows students and faculty to easily browse, search, and discover books ranging from academic textbooks to the latest sci-fi novels.
                    </p>
                    <p>
                        This project was developed as part of the <strong>Web Application Development</strong> module. We utilized pure HTML, CSS, PHP, and JavaScript to build a fast, responsive, and user-friendly experience without relying on external frameworks.
                    </p>
                </div>
                <hr>

                <h2 style="color: #3c3633; padding: 50px 20px;">Meet the Team</h2>
                
                <div class="team-grid">
                    <div class="team-card">
                        <i class="uil uil-user-circle team-icon"></i>
                        <div class="team-name">[Member Name 1]</div>
                        <div class="team-role">Developer</div>
                    </div>

                    <div class="team-card">
                        <i class="uil uil-user-circle team-icon"></i>
                        <div class="team-name">[Member Name 2]</div>
                        <div class="team-role">Designer</div>
                    </div>

                    <div class="team-card">
                        <i class="uil uil-user-circle team-icon"></i>
                        <div class="team-name">[Member Name 3]</div>
                        <div class="team-role">Database Admin</div>
                    </div>
                </div>
            </section>
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
                        <li><a href="#">Contact US</a></li>
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