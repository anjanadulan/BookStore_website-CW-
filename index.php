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
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Horizon Books</title>
        
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

        <div style="background: #e0ccbe; text-align: center; padding-top: 90px;">
            <h1 style="color: #3c3633; margin: 0;font-size: 3rem;">Welcome to the Book Corner</h1>
            <p style="color: #5d5550;">Discover your next favorite story.</p>
            <hr style="margin-bottom: 0px;">
        </div>

        <div class="slideshow-container">
            <div class="mySlides fade">
                <img src="uploads/banner1.jpg" style="width:100%">
                <div class="text">Caption Text</div>
            </div>
            <div class="mySlides fade">
                <img src="uploads/banner2.jpg" style="width:100%">
                <div class="text">Caption Two</div>
            </div>
            <div class="mySlides fade">
                <img src="uploads/banner3.jpg" style="width:100%">
                <div class="text">Caption Three</div>
            </div>
        </div>


        <div class="main-container">
            
            <latest> <!-- Latest Arrivals Section -->
                <h2 style="text-align:center; color:#3c3633; margin-top:30px; margin-bottom: 0; padding:10px 10px; background-color: #3c3633; color: #fff; border-radius: 6px;">Latest Arrivals</h2>
                <br>
                <div class="book-grid">
                    <?php
                    $sql = "SELECT * FROM books ORDER BY id DESC LIMIT 7";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $imagePath = getImagePath($row["image"]);
                            
                            // MERGED CARD for Grid
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

                        // THE VIEW MORE CARD
                        echo "
                        <div class='book-card carousel-card view-more-card'>
                            <a href='allproduct.php'>
                                <i class='uil uil-arrow-circle-right'></i>
                                <span>Browse All Books</span>
                            </a>
                        </div>
                        ";
                    }
                    ?>
                </div>

            </latest> 
            <hr>
            <section class="carousel-section"> <!-- Sci-Fi -->
                <div class="carousel-header">
                    <h2>Top Sci-Fi Picks</h2>
                </div>
                
                <div class="carousel-container">
                    <div class="carousel-track">
                        <?php
                        $sql_scifi = "SELECT * FROM books WHERE genre = 'Sci-Fi' ORDER BY id DESC LIMIT 8";
                        $result_scifi = $conn->query($sql_scifi);

                        if ($result_scifi->num_rows > 0) {
                            while($row = $result_scifi->fetch_assoc()) {
                                $imagePath = getImagePath($row["image"]);
                                
                                
                                echo "
                                <div class='book-card carousel-card'>
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
                                                <i class='uil uil-heart' style='font-size: 20px; color: #3c3633;'></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                ";
                            }
                            
                            // THE VIEW MORE CARD
                            echo "
                            <div class='book-card carousel-card view-more-card'>
                                <a href='viewall.php?genre=Sci-Fi'>
                                    <i class='uil uil-arrow-circle-right'></i>
                                    <span>Browse All<br>Sci-Fi</span>
                                </a>
                            </div>
                            ";
                        } else {
                            echo "
                            <div class='book-card carousel-card view-more-card' style='min-height: 400px; display: flex; justify-content: center; align-items: center;'>
                                
                                <a href='' style='cursor: default; pointer-events: none; text-decoration: none; color: #3c3633; display: flex; flex-direction: column; align-items: center; justify-content: center; width: 100%; height: 100%;'>
                                    
                                    <i class='uil uil-clock-eight' style='font-size: 48px; margin-bottom: 15px; display:block;'></i>
                                    
                                    <span style='font-size: 18px; font-weight: bold; text-align: center;'>
                                        Stay tuned for<br>Sci-Fi arrivals!
                                    </span>
                                </a>
                            </div>
                            ";
                        }
                        ?>
                    </div>
                </div>
            </section>
            <hr>
            <section class="carousel-section"> <!-- Education -->
                <div class="carousel-header">
                    <h2>Top Education Picks</h2>
                </div>
                
                <div class="carousel-container">
                    <div class="carousel-track">
                        <?php
                        $sql_scifi = "SELECT * FROM books WHERE genre = 'Education' ORDER BY id DESC LIMIT 8";
                        $result_scifi = $conn->query($sql_scifi);

                        if ($result_scifi->num_rows > 0) {
                            while($row = $result_scifi->fetch_assoc()) {
                                $imagePath = getImagePath($row["image"]);
                                
                                echo "
                                <div class='book-card carousel-card'>
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
                                                <i class='uil uil-heart' style='font-size: 20px; color: #3c3633;'></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                ";
                            }
                            
                            // THE VIEW MORE CARD
                            echo "
                            <div class='book-card carousel-card view-more-card'>
                                <a href='viewall.php?genre=Education'>
                                    <i class='uil uil-arrow-circle-right'></i>
                                    <span>Browse All<br>Education</span>
                                </a>
                            </div>
                            ";
                        } else {
                            echo "
                            <div class='book-card carousel-card view-more-card' style='min-height: 400px; display: flex; justify-content: center; align-items: center;'>
                                
                                <a href='' style='cursor: default; pointer-events: none; text-decoration: none; color: #3c3633; display: flex; flex-direction: column; align-items: center; justify-content: center; width: 100%; height: 100%;'>
                                    
                                    <i class='uil uil-clock-eight' style='font-size: 48px; margin-bottom: 15px; display:block;'></i>
                                    
                                    <span style='font-size: 18px; font-weight: bold; text-align: center;'>
                                        Stay tuned for<br>Education arrivals!
                                    </span>
                                </a>
                            </div>
                            ";
                        }
                        ?>
                    </div>
                </div>
            </section>
            <hr>
            <section class="carousel-section"> <!-- Novels -->
                <div class="carousel-header">
                    <h2>Top Novel Picks</h2>
                </div>
                
                <div class="carousel-container">
                    <div class="carousel-track">
                        <?php
                        $sql_scifi = "SELECT * FROM books WHERE genre = 'Novel' ORDER BY id DESC LIMIT 8";
                        $result_scifi = $conn->query($sql_scifi);

                        if ($result_scifi->num_rows > 0) {
                            while($row = $result_scifi->fetch_assoc()) {
                                $imagePath = getImagePath($row["image"]);
                                
                                echo "
                                <div class='book-card carousel-card'>
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
                                                <i class='uil uil-heart' style='font-size: 20px; color: #3c3633;'></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                ";
                            }
                            
                            // THE VIEW MORE CARD
                            echo "
                            <div class='book-card carousel-card view-more-card'>
                                <a href='viewall.php?genre=Novel'>
                                    <i class='uil uil-arrow-circle-right'></i>
                                    <span>Browse All<br>Novel</span>
                                </a>
                            </div>
                            ";
                        } else {
                            echo "
                            <div class='book-card carousel-card view-more-card' style='min-height: 400px; display: flex; justify-content: center; align-items: center;'>
                                
                                <a href='' style='cursor: default; pointer-events: none; text-decoration: none; color: #3c3633; display: flex; flex-direction: column; align-items: center; justify-content: center; width: 100%; height: 100%;'>
                                    
                                    <i class='uil uil-clock-eight' style='font-size: 48px; margin-bottom: 15px; display:block;'></i>
                                    
                                    <span style='font-size: 18px; font-weight: bold; text-align: center;'>
                                        Stay tuned for<br>Novel arrivals!
                                    </span>
                                </a>
                            </div>
                            ";
                        }
                        ?>
                    </div>
                </div>
            </section>
            <hr>
            <section class="carousel-section"> <!-- History -->
                <div class="carousel-header">
                    <h2>Top History Picks</h2>
                </div>
                
                <div class="carousel-container">
                    <div class="carousel-track">
                        <?php
                        $sql_scifi = "SELECT * FROM books WHERE genre = 'History' ORDER BY id DESC LIMIT 8";
                        $result_scifi = $conn->query($sql_scifi);

                        if ($result_scifi->num_rows > 0) {
                            while($row = $result_scifi->fetch_assoc()) {
                                $imagePath = getImagePath($row["image"]);
                                
                                echo "
                                <div class='book-card carousel-card'>
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
                                                <i class='uil uil-heart' style='font-size: 20px; color: #3c3633;'></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                ";
                            }
                            
                            // THE VIEW MORE CARD
                            echo "
                            <div class='book-card carousel-card view-more-card'>
                                <a href='viewall.php?genre=History'>
                                    <i class='uil uil-arrow-circle-right'></i>
                                    <span>Browse All<br>History</span>
                                </a>
                            </div>
                            ";
                        } else {
                            echo "
                            <div class='book-card carousel-card view-more-card' style='min-height: 400px; display: flex; justify-content: center; align-items: center;'>
                                
                                <a href='' style='cursor: default; pointer-events: none; text-decoration: none; color: #3c3633; display: flex; flex-direction: column; align-items: center; justify-content: center; width: 100%; height: 100%;'>
                                    
                                    <i class='uil uil-clock-eight' style='font-size: 48px; margin-bottom: 15px; display:block;'></i>
                                    
                                    <span style='font-size: 18px; font-weight: bold; text-align: center;'>
                                        Stay tuned for<br>History arrivals!
                                    </span>
                                </a>
                            </div>
                            ";
                        }
                        ?>
                    </div>
                </div>
            </section>
            <hr>
            <section class="carousel-section"> <!-- Fiction -->
                <div class="carousel-header">
                    <h2>Top Fiction Picks</h2>
                </div>
                
                <div class="carousel-container">
                    <div class="carousel-track">
                        <?php
                        $sql_scifi = "SELECT * FROM books WHERE genre = 'Fiction' ORDER BY id DESC LIMIT 8";
                        $result_scifi = $conn->query($sql_scifi);

                        if ($result_scifi->num_rows > 0) {
                            while($row = $result_scifi->fetch_assoc()) {
                                $imagePath = getImagePath($row["image"]);
                                
                                echo "
                                <div class='book-card carousel-card'>
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
                                                <i class='uil uil-heart' style='font-size: 20px; color: #3c3633;'></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                ";
                            }
                            
                            // THE VIEW MORE CARD
                            echo "
                            <div class='book-card carousel-card view-more-card'>
                                <a href='viewall.php?genre=Fiction'>
                                    <i class='uil uil-arrow-circle-right'></i>
                                    <span>Browse All<br>Fiction</span>
                                </a>
                            </div>
                            ";
                        } else {
                            echo "
                            <div class='book-card carousel-card view-more-card' style='min-height: 400px; display: flex; justify-content: center; align-items: center;'>
                                
                                <a href='' style='cursor: default; pointer-events: none; text-decoration: none; color: #3c3633; display: flex; flex-direction: column; align-items: center; justify-content: center; width: 100%; height: 100%;'>
                                    
                                    <i class='uil uil-clock-eight' style='font-size: 48px; margin-bottom: 15px; display:block;'></i>
                                    
                                    <span style='font-size: 18px; font-weight: bold; text-align: center;'>
                                        Stay tuned for<br>Fiction arrivals!
                                    </span>
                                </a>
                            </div>
                            ";
                        }
                        ?>
                    </div>
                </div>
            </section>
            <hr>
            <section class="carousel-section"> <!-- Other -->
                <div class="carousel-header">
                    <h2>Top Other Picks</h2>
                </div>
                
                <div class="carousel-container">
                    <div class="carousel-track">
                        <?php
                        $sql_scifi = "SELECT * FROM books WHERE genre = 'Other' ORDER BY id DESC LIMIT 8";
                        $result_scifi = $conn->query($sql_scifi);

                        if ($result_scifi->num_rows > 0) {
                            while($row = $result_scifi->fetch_assoc()) {
                                $imagePath = getImagePath($row["image"]);
                                
                                echo "
                                <div class='book-card carousel-card'>
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
                                                <i class='uil uil-heart' style='font-size: 20px; color: #3c3633;'></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                ";
                            }
                            
                            // THE VIEW MORE CARD
                            echo "
                            <div class='book-card carousel-card view-more-card'>
                                <a href='viewall.php?genre=Other'>
                                    <i class='uil uil-arrow-circle-right'></i>
                                    <span>Browse All<br>Other</span>
                                </a>
                            </div>
                            ";
                        } else {
                            echo "
                            <div class='book-card carousel-card view-more-card' style='min-height: 400px; display: flex; justify-content: center; align-items: center;'>
                                
                                <a href='' style='cursor: default; pointer-events: none; text-decoration: none; color: #3c3633; display: flex; flex-direction: column; align-items: center; justify-content: center; width: 100%; height: 100%;'>
                                    
                                    <i class='uil uil-clock-eight' style='font-size: 48px; margin-bottom: 15px; display:block;'></i>
                                    
                                    <span style='font-size: 18px; font-weight: bold; text-align: center;'>
                                        Stay tuned for<br>Other arrivals!
                                    </span>
                                </a>
                            </div>
                            ";
                        }
                        ?>
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

        <script>

            //Slideshow Script
            let slideIndex = 0;
            showSlides();
            function showSlides() {
                let i;
                let slides = document.getElementsByClassName("mySlides");
                
                for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";  
                }
                
                slideIndex++;
                if (slideIndex > slides.length) {slideIndex = 1}    
                
                slides[slideIndex-1].style.display = "block";  
                
                setTimeout(showSlides, 3000); //Timerrrrr
            }

            
        </script>

    </body>
</html>