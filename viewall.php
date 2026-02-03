<?php
session_start();
include 'db.php';

function getImagePath($dbImage) {
    if (empty($dbImage)) { return "uploads/default.png"; }
    if (strpos($dbImage, 'uploads/') === 0) { return $dbImage; }
    return "uploads/" . $dbImage;
}

// get genre from URL the genere brek is ? marker 
if (isset($_GET['genre'])) {
    $genre = urldecode($_GET['genre']);
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo htmlspecialchars($genre); ?> Books - Horizon Books</title>
        
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="res-styles.css">
        <link rel="stylesheet" href="book-carousel.css">
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> 
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
        <script src="script.js" defer></script>
        <style>
            /* Internal CSS for no books */
            .no-results {
                grid-column: 1 / -1;
                text-align: center;
                padding: 50px 20px;
                background: #fff;
                border-radius: 10px;
                box-shadow: 0 5px 15px rgba(0,0,0,0.05);
                margin-top: 20px;
            }
            .no-results i {
                font-size: 3rem;
                color: #d9534f;
                margin-bottom: 15px;
                display: block;
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

        <div style="background: #e0ccbe; text-align: center; padding-top: 100px;">
            <h1 style="color: #3c3633; margin: 0;">
                <?php echo htmlspecialchars($genre); ?>
            </h1>
            <p style="color: #5d5550; font-size: 1.2rem;">Browse our collection of <?php echo htmlspecialchars($genre); ?> books</p>
            <hr>
        </div>

        <div class="main-container">
            <div class="book-grid">
                <?php
                //prepared statement, bindd url paraeter
                $stmt = $conn->prepare("SELECT * FROM books WHERE genre = ? ORDER BY id DESC");
                $stmt->bind_param("s", $genre);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $imagePath = getImagePath($row["image"]);
                        
                        echo "
                        <div class='book-card'>
                            <a href='det.php?id=".$row["id"]."'>
                                <div class='image-box'>
                                    <img src='".$imagePath."' alt='Book Cover'>
                                </div>
                            </a>
                            
                            <div class='details'>
                                <span class='genre'>".$row["genre"]."</span>
                                
                                <a href='det.php?id=".$row["id"]."' style='color:inherit; text-decoration:none;'>
                                    <h3>".$row["title"]."</h3>
                                </a>
                                
                                <p class='author'>By ".$row["author"]."</p>
                                
                                <div class='card-bottom'>
                                    <span class='price'>$".$row["price"]."</span>
                                    <button style='border:none; background:none; cursor:pointer;'>
                                        <i class='uil uil-shopping-bag' style='font-size: 20px; color: #3c3633;'></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        ";
                    }
                }else{
                    // no books found
                    echo "
                    <div class='no-results'>
                        <i class='uil uil-search'></i>
                        <h3>No Books Added Yet !</h3>
                        <br>
                        <p>Stay tuned for \"<strong>" . htmlspecialchars($genre) . "</strong>\" arrivals!</p>
                        <p style='margin-top:10px;'><a href='allproduct.php' style='color:#3c3633; font-weight:bold;'>Browse all products</a></p>
                    </div>";
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