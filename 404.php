<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Page Not Found - NIBM Bookshop</title>
        
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="res-styles.css">
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> 
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
        <script src="script.js" defer></script>

        <style>
            .error-container {
                text-align: center;
                padding: 100px 20px;
                min-height: 60vh; /* Keeps footer at bottom */
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }
            .error-code {
                font-size: 120px;
                font-weight: 800;
                color: #d9534f; /* Red color */
                line-height: 1;
                margin-bottom: 20px;
            }
            .error-message {
                font-size: 24px;
                color: #3c3633;
                margin-bottom: 10px;
                font-weight: bold;
            }
            .error-desc {
                color: #5d5550;
                margin-bottom: 40px;
                max-width: 500px;
            }
            .home-btn {
                background-color: #3c3633;
                color: white;
                padding: 15px 40px;
                border-radius: 30px;
                text-decoration: none;
                font-weight: bold;
                transition: 0.3s;
                display: inline-flex;
                align-items: center;
                gap: 10px;
            }
            .home-btn:hover {
                background-color: #555;
                transform: translateY(-3px);
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
            <div class="error-container">
                <div class="error-code">404</div>
                <div class="error-message">Oops! Page not found.</div>
                <p class="error-desc">
                    The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.
                </p>
                
                <a href="index.php" class="home-btn">
                    <i class="uil uil-home"></i> Go Back Home
                </a>
            </div>
        </div>

        <footer class="footer">
                <div class="footer-container">
                    
                    <div class="footer-col">
                        <h3>BOOKSHOP</h3>
                        <p>is the first bookshop in NIBM to focus on International titles. <em>It doesn't get more local than this!</em></p>
                    </div>

                    <div class="footer-col">
                        <h3>Top Nav</h3>
                        <ul>
                            <li><a href="allproduct.php">Books</a></li>
                            <li><a href="viewall.php?genre=Sci-Fi">Science Fiction</a></li>
                            <li><a href="viewall.php?genre=Education">Educational</a></li>
                            <li><a href="about.php">About Us</a></li>
                            <li><a href="#">Career in Publishing</a></li>
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
                        <p>Copyright © 2025 Bookshop.<br>All rights reserved.</p>
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