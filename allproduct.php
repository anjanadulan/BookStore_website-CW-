<?php
session_start();
include 'db.php';

function getImagePath($dbImage) {
    if (empty($dbImage)) { return "uploads/default.png"; }
    if (strpos($dbImage, 'uploads/') === 0) { return $dbImage; }
    return "uploads/" . $dbImage;
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>All Products - NIBM Bookshop</title>
        
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="res-styles.css">
        <link rel="stylesheet" href="book-carousel.css">
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> 
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
        <script src="script.js" defer></script>

        <style>
            /* --- Pagng --- */
            .page {
                display: flex;
                justify-content: center;
                align-items: center;
                gap: 10px;
                margin-top: 50px;
                margin-bottom: 50px;
            }

            .page a {
                display: inline-flex;
                justify-content: center;
                align-items: center;
                width: 40px;
                height: 40px;
                background-color: #f4f4f4;
                color: #3c3633;
                text-decoration: none;
                border-radius: 8px;
                font-weight: bold;
                transition: all 0.3s ease;
                border: 1px solid #e0ccbe;
            }

            .page a:hover {
                background-color: #96887e;
                color: white;
                transform: translateY(-2px);
            }

            /* The Active Page Button */
            .page a.active {
                background-color: #d9534f;
                color: white;
                border-color: #d9534f;
                box-shadow: 0 4px 10px rgba(217, 83, 79, 0.3);
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

        <div style="background: #e0ccbe; text-align: center; padding-top: 90px;">
            <h1 style="color: #3c3633; margin: 0; font-size: 3rem;">All Products</h1>
            <p style="color: #5d5550;">Discover all the amazing books we have to offer.</p>
            <hr style="margin-bottom: 0px;">
        </div>

        <div class="main-container">
            
            <div class="book-grid">
    <?php
    // --- page LOGIC START ---
    
    // 1. Define how many books per page
    $results_per_page = 8; 

    // 2. Find out the number of items in the database
    $sql_count = "SELECT COUNT(*) AS total FROM books";
    $result_count = $conn->query($sql_count);
    $row_count = $result_count->fetch_assoc();
    $total_records = $row_count['total'];

    // 3. Determine number of total pages available
    $total_pages = ceil($total_records / $results_per_page);

    // 4. Determine which page number visitor is currently on
    if (!isset($_GET['page'])) {
        $page = 1;
    } else {
        $page = $_GET['page'];
    }

    // 5. Determine the starting limit number for the SQL LIMIT
    $this_page_first_result = ($page - 1) * $results_per_page;

    // 6. Retrieve selected results from database
    $sql = "SELECT * FROM books ORDER BY id DESC LIMIT " . $this_page_first_result . ',' .  $results_per_page;
    $result = $conn->query($sql);

    // --- page LOGIC END ---

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $imagePath = getImagePath($row["image"]);
            
            // Your existing Card HTML
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
    } else {
        echo "<p style='text-align:center; width:100%;'>No products found.</p>";
    }
    ?>
</div>

<div class="page">
    <?php
    // Previous Button
    if($page > 1){
        echo '<a href="allproduct.php?page=' . ($page-1) . '"><i class="uil uil-angle-left"></i></a>';
    }

    // Page Numbers
    for ($i = 1; $i <= $total_pages; $i++) {
        if ($i == $page) {
            echo '<a class="active" href="allproduct.php?page=' . $i . '">' . $i . '</a>';
        } else {
            echo '<a href="allproduct.php?page=' . $i . '">' . $i . '</a>';
        }
    }

    // Next Button
    if($page < $total_pages){
        echo '<a href="allproduct.php?page=' . ($page+1) . '"><i class="uil uil-angle-right"></i></a>';
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

</html>