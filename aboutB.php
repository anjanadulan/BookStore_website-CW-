<?php include 'db.php'; ?>
<html>
   <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>About Us - Horizon Books</title>
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="res-styles.css">
        
        <!-- Icon Package -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> 
        <!-- Unicons CSS -->
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
        <script src="script.js" defer></script>
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

        <main class="content">
            <h1>About Us</h1>
            <p>This project was created by [Your Names] for the Web Application Development module.</p>
            <p>We do not use any frameworks, only pure HTML, CSS, JS, and PHP.</p>
        </main>

        <hr>
        <div class="before-footer">
            <div class="product-list">
                <div class="group">
                    <div class="card">publisher 1</div>
                    <div class="card">publisher 2</div>
                    <div class="card">publisher 3</div>
                    <div class="card">publisher 4</div>
                    <div class="card">publisher 5</div>
                    <div class="card">publisher 6</div>
                </div>
                <div class="group">
                    <div class="card">publisher 1</div>
                    <div class="card">publisher 2</div>
                    <div class="card">publisher 3</div>
                    <div class="card">publisher 4</div>
                    <div class="card">publisher 5</div>
                    <div class="card">publisher 6</div>
                </div>
                <div class="group">
                    <div class="card">publisher 1</div>
                    <div class="card">publisher 2</div>
                    <div class="card">publisher 3</div>
                    <div class="card">publisher 4</div>
                    <div class="card">publisher 5</div>
                    <div class="card">publisher 6</div>
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