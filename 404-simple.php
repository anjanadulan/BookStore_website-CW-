<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Page Not Found - Horizon Books</title>
        
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="res-styles.css">
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> 
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
        <script src="script.js" defer></script>

        <style>
            body {
                animation: fadeIn 0.5s ease;
            }

            @keyframes fadeIn {
                from { opacity: 0; }
                to { opacity: 1; }
            }

            @keyframes fadeInUp {
                from {
                    opacity: 0;
                    transform: translateY(30px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            @keyframes pulse {
                0%, 100% {
                    transform: scale(1);
                }
                50% {
                    transform: scale(1.05);
                }
            }

            .error-container {
                text-align: center;
                padding: 100px 20px 60px 20px;
                min-height: 45vh;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }

            .error-code {
                font-size: 140px;
                font-weight: 800;
                color: #d9534f;
                line-height: 1;
                margin-bottom: 20px;
                animation: pulse 2s ease-in-out infinite;
            }

            .error-message {
                font-size: 32px;
                color: #3c3633;
                margin-bottom: 15px;
                font-weight: 600;
            }

            .error-desc {
                color: #5d5550;
                margin-bottom: 60px;
                max-width: 600px;
                line-height: 1.6;
                font-size: 16px;
            }

            /* Navigation cards */
            .quick-nav-section {
                max-width: 1000px;
                margin: 0 auto 80px auto;
                padding: 0 20px;
            }

            .quick-nav-title {
                text-align: center;
                color: #3c3633;
                font-size: 1.8rem;
                margin-bottom: 40px;
            }

            .nav-cards-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
                gap: 30px;
                max-width: 900px;
                margin: 0 auto;
            }

            .nav-card {
                background: #fff;
                padding: 40px;
                border-radius: 15px;
                border: 1px solid #e0ccbe;
                box-shadow: 0 5px 15px rgba(0,0,0,0.08);
                transition: all 0.3s ease;
                text-decoration: none;
                display: flex;
                flex-direction: column;
                align-items: center;
                text-align: center;
            }

            .nav-card:nth-child(1) { animation: fadeInUp 0.5s ease 0.2s both; }
            .nav-card:nth-child(2) { animation: fadeInUp 0.5s ease 0.3s both; }
            .nav-card:nth-child(3) { animation: fadeInUp 0.5s ease 0.4s both; }
            .nav-card:nth-child(4) { animation: fadeInUp 0.5s ease 0.5s both; }

            .nav-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 10px 25px rgba(0,0,0,0.15);
                border-color: #d9534f;
            }

            .nav-card-icon {
                font-size: 50px;
                color: #3c3633;
                margin-bottom: 20px;
                transition: all 0.3s ease;
            }

            .nav-card:hover .nav-card-icon {
                color: #d9534f;
                transform: scale(1.1);
            }

            .nav-card-title {
                font-size: 1.4rem;
                font-weight: bold;
                color: #3c3633;
                margin-bottom: 10px;
            }

            .nav-card-desc {
                font-size: 1rem;
                color: #5d5550;
            }

            @media (max-width: 768px) {
                .error-code {
                    font-size: 100px;
                }

                .error-message {
                    font-size: 26px;
                }

                .error-desc {
                    font-size: 14px;
                }

                .nav-cards-grid {
                    grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
                    gap: 20px;
                }

                .nav-card {
                    padding: 30px;
                }

                .nav-card-icon {
                    font-size: 45px;
                }

                .nav-card-title {
                    font-size: 1.2rem;
                }
            }

            @media (max-width: 480px) {
                .error-code {
                    font-size: 80px;
                }

                .error-message {
                    font-size: 22px;
                }

                .nav-cards-grid {
                    grid-template-columns: 1fr;
                }

                .nav-card {
                    padding: 25px;
                }
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
                <div class="error-message">Page Not Found</div>
                <p class="error-desc">
                    The page you're looking for doesn't exist or has been moved. 
                    Please use the links below to navigate.
                </p>
            </div>

            <div class="quick-nav-section">
                <h2 class="quick-nav-title">Navigate to</h2>
                <div class="nav-cards-grid">
                    <a href="index.php" class="nav-card">
                        <i class="uil uil-home nav-card-icon"></i>
                        <div class="nav-card-title">Return Home</div>
                        <div class="nav-card-desc">Back to our main page</div>
                    </a>

                    <a href="allproduct.php" class="nav-card">
                        <i class="uil uil-books nav-card-icon"></i>
                        <div class="nav-card-title">Browse Books</div>
                        <div class="nav-card-desc">Explore our full collection</div>
                    </a>

                    <a href="services.php" class="nav-card">
                        <i class="uil uil-package nav-card-icon"></i>
                        <div class="nav-card-title">Our Services</div>
                        <div class="nav-card-desc">See what we offer</div>
                    </a>

                    <a href="about.php" class="nav-card">
                        <i class="uil uil-users-alt nav-card-icon"></i>
                        <div class="nav-card-title">About Us</div>
                        <div class="nav-card-desc">Learn our story</div>
                    </a>
                </div>
            </div>
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
