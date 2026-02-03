<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit();
}

include 'db.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Store - Horizon Books</title>
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="res-styles.css">
        <link rel="stylesheet" href="book-carousel.css">
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> 
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

        <div class="main-container">
            <h1 style="text-align:center; color:#3c3633; margin:0; font-size: 3rem;  padding-top: 60px;">Current Inventory</h1>
            <hr>
            <div class="book-grid">
                <?php
                echo "
                        <div class='book-card carousel-card view-more-card' style='background: #f5f5f5;'>
                            <a href='additem.php'>
                                <i class='uil uil-plus'></i>
                                <span>Add New Book</span>
                            </a>
                        </div>
                        ";

                
                $sql = "SELECT * FROM books ORDER BY id DESC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        
                        // image
                        $dbImage = $row["image"];
                        $imagePath = "uploads/default.png"; // no image set default

                        if (!empty($dbImage)) {
                            // check path correctness
                            if (strpos($dbImage, 'uploads/') === 0) {
                                $imagePath = $dbImage;
                            } else {
                                // add manual if nott
                                $imagePath = "uploads/" . $dbImage;
                            }
                        }

                        echo "
                        <div class='book-card'>
                            <div class='image-box'>
                                <img src='".$imagePath."' alt='Book Cover'>
                            </div>
                            <div class='details'>
                                <span class='genre'>".$row["genre"]."</span>
                                <h3>".$row["title"]."</h3>
                                <p class='author'>By ".$row["author"]."</p>
                                
                                <div class='card-bottom'>
                                    <span class='price'>$".$row["price"]."</span>
                                    <a href='update.php?id=".$row["id"]."' class='btn-edit'>
                                        <i class='uil uil-pen'></i> Edit
                                    </a>
                                </div>
                            </div>
                        </div>
                        ";
                    }
                } else {
                    echo "<p style='text-align:center; width:100%; grid-column:1/-1;'>
                            No books found. <a href='addItem.php' style='color:#3c3633; font-weight:bold;'>Add your first book</a>.
                          </p>";
                }
                              
                ?>
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