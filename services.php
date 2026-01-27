<?php
session_start();
// No database connection needed for static text, but good to have if you expand later
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Services - Horizon Books</title>
    
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="res-styles.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> 
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <script src="script.js" defer></script>

    <style>
        hr {
            border: none;
            height: 1px;
            background-color: #3c3633;
            width: 100%;
            max-width: 1200px;
            opacity: 0.2;
        }
        .services-header {
            text-align: center;
            padding: 50px 20px 10px 20px;
            background-color: #e0ccbe;
        }
        .services-header h1 {
            color: #3c3633;
            font-size: 3rem;
            margin-bottom: 10px;
        }
        .services-header p {
            color: #5d5550;
            font-size: 1.2rem;
        }

        .services-grid {
            display: flex;  
            flex-wrap: wrap; 
            justify-content: center;
            gap: 30px;
            padding: 60px 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .service-card {
            flex: 0 1 350px; 
            max-width: 400px; 
            background: #fff;
            padding: 40px 30px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 1px solid #f0f0f0;
        }

        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(60, 54, 51, 0.1);
            border-color: #e0ccbe;
        }

        .icon-box {
            width: 80px;
            height: 80px;
            background: #e0ccbe;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
            font-size: 35px;
            color: #3c3633;
        }

        .service-card h3 {
            font-size: 1.5rem;
            color: #3c3633;
            margin-bottom: 15px;
        }

        .service-card p {
            color: #666;
            line-height: 1.6;
            font-size: 0.95rem;
        }

        .cta-section {
            background-color: #3c3633;
            color: white;
            text-align: center;
            padding: 60px 20px;
            margin-top: 40px;
        }
        
        .cta-btn {
            background-color: #e0ccbe;
            color: #3c3633;
            padding: 12px 30px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: bold;
            display: inline-block;
            margin-top: 20px;
            transition: 0.3s;
        }
        .cta-btn:hover {
            background-color: #fff;
            transform: scale(1.05);
        }


        /* Email Popup windwo styles */
        .modal {
            display: none;
            position: fixed; 
            z-index: 2000; /* bring to forward uhhh top */
            left: 0;
            top: 0;
            width: 100%; 
            height: 100%; 
            background-color: rgba(0,0,0,0.6);
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(5px);
        }

        .modal-content {
            background-color: #fff;
            padding: 40px;
            border-radius: 20px;
            text-align: center;
            width: 90%;
            max-width: 400px;
            position: relative;
            box-shadow: 0 15px 30px rgba(0,0,0,0.3);
            border: 1px solid #e0ccbe;
            animation: popup 0.3s ease-out;
        }

        /*animi*/
        @keyframes popup {
            from {transform: scale(0.8); opacity: 0;}
            to {transform: scale(1); opacity: 1;}
        }

        .close-btn {
            position: absolute;
            top: 15px;
            right: 20px;
            color: #aaa;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        .close-btn:hover {
            color: #d9534f;
        }

        .email-btn {
            background-color: #3c3633;
            color: white;
            padding: 15px 30px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: bold;
            display: inline-block;
            margin-top: 25px;
            transition: 0.3s;
            box-shadow: 0 5px 15px rgba(60, 54, 51, 0.3);
        }

        .email-btn:hover {
            background-color: #555;
            transform: translateY(-2px);
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


    <div class="services-header">
        <div style="padding-top: 40px;">
            <h1>Our Services</h1>
            <p>More than just a ordinary bookstore. We offer a large range of services for book lovers.</p>
        </div>
    </div>

    <hr>

    <div class="services-grid">
        
        <div class="service-card">
            <div class="icon-box"><i class="uil uil-truck"></i></div>
            <h3>Island-wide Delivery</h3>
            <p>Order your favorite books from the comfort of your home. We provide fast and reliable delivery across the entire island within 3-5 working days.
                Delevary charges may apply based on location.
            </p>
        </div>

        <div class="service-card">
            <div class="icon-box"><i class="uil uil-gift"></i></div>
            <h3>Gift Wrapping</h3>
            <p>Sending a gift? Let us make it special. We offer premium gift wrapping services with personalized handwritten notes for your loved ones.</p>
        </div>

        <div class="service-card">
            <div class="icon-box"><i class="uil uil-book-open"></i></div>
            <h3>Special Orders</h3>
            <p>Can't find the book you're looking for? We can order specific international titles for you from our global network of publishers.</p>
        </div>

        <div class="service-card">
            <div class="icon-box"><i class="uil uil-users-alt"></i></div>
            <h3>Book Events</h3>
            <p>Join our community! We host monthly book readings, author meet-and-greets, and study groups for students at our main branch.</p>
        </div>

    </div>

    <div class="cta-section">
        <h2>Have a special request?</h2>
        <p>Contact our support team and we will be happy to assist you.</p>
        <a href="#" class="cta-btn">Contact Us</a>
    </div>

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


        <div id="contactModal" class="modal">
            <div class="modal-content">
                <span class="close-btn">&times;</span>
                <div class="icon-box" style="margin-bottom: 20px;">
                    <i class="uil uil-envelope-alt"></i>
                </div>
                <h2>Get in Touch</h2>
                <p>Have a question or special request ? Send us an email directly and we'll get back to you within 24 hours.</p>
                
                <a href="mailto:info@horizonbooks.com?subject=Inquiry from Website" class="email-btn">
                    <i class="uil uil-message"></i> Open Email App
                </a>
            </div>
        </div>

        <script>
            var modal = document.getElementById("contactModal");
            var btn = document.querySelector(".cta-btn");
            var span = document.getElementsByClassName("close-btn")[0];

            if (btn) {
                btn.onclick = function(e) { /* to open the popup */
                    e.preventDefault();
                    modal.style.display = "flex";
                }
            }
            span.onclick = function() { /* close btn */
                modal.style.display = "none";
            }

            window.onclick = function(event) { /* outside click */
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        </script>

</body>
</html>