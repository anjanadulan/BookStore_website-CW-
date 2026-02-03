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

        <style>
            body {
                animation: fadeIn 0.8s ease;
                opacity: 0;
                animation-fill-mode: forwards;
            }

            @keyframes fadeIn {
                from { 
                    opacity: 0;
                }
                to { 
                    opacity: 1;
                }
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

            @keyframes fadeInDown {
                from {
                    opacity: 0;
                    transform: translateY(-20px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .hero-section {
                animation: fadeInDown 0.8s ease 0.2s both;
                padding: 30px;
                margin: 0;
            }
            
            .hero-help {
                padding: 60px 20px 0px 20px;
            }

            .hero-header {
                background-color: #e0ccbe;
                padding: 50px 20px 50px 20px;
                text-align: center;
            }

            .hero-header h1 {
                color: #3c3633;
                font-size: 3rem;
                margin: 0;
                margin-bottom: 10px;
                animation: fadeInUp 0.6s ease;
            }

            .hero-header p {
                color: #5d5550;
                font-size: 1.2rem;
                margin: 0;
            }

            .slideshow-container {
                animation: fadeIn 1s ease 0.4s both;
            }

            .latest-section {
                animation: fadeInUp 0.8s ease 0.6s both;
            }

            .latest-header {
                background-color: #3c3633;
                color: #fff;
                padding: 20px;
                border-radius: 6px;
                margin: 30px 0 20px 0;
                text-align: center;
                animation: fadeInDown 0.6s ease 0.8s both;
            }

            .latest-header h2 {
                margin: 0;
                font-size: 2rem;
            }

            .carousel-section {
                animation: fadeInUp 0.6s ease both;
                opacity: 0;
            }

            .carousel-section:nth-of-type(1) { animation-delay: 1s; }
            .carousel-section:nth-of-type(2) { animation-delay: 1.1s; }
            .carousel-section:nth-of-type(3) { animation-delay: 1.2s; }
            .carousel-section:nth-of-type(4) { animation-delay: 1.3s; }
            .carousel-section:nth-of-type(5) { animation-delay: 1.4s; }
            .carousel-section:nth-of-type(6) { animation-delay: 1.5s; }

            .book-card {
                animation: fadeInUp 0.6s ease;
                opacity: 0;
                animation-fill-mode: forwards;
            }

            .book-grid .book-card:nth-child(1) { animation-delay: 1s; }
            .book-grid .book-card:nth-child(2) { animation-delay: 1.1s; }
            .book-grid .book-card:nth-child(3) { animation-delay: 1.15s; }
            .book-grid .book-card:nth-child(4) { animation-delay: 1.2s; }
            .book-grid .book-card:nth-child(5) { animation-delay: 1.25s; }
            .book-grid .book-card:nth-child(6) { animation-delay: 1.3s; }
            .book-grid .book-card:nth-child(7) { animation-delay: 1.35s; }
            .book-grid .book-card:nth-child(8) { animation-delay: 1.4s; }
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

        <div class="hero-section">
            <div class="hero-help">
                <div class="hero-header" style="border:2px dashed #ffffff; border-radius: 15px;">
                    <h1>Welcome to the Book Corner</h1>
                    <p>Discover your next favorite story.</p>
                </div>
            </div>
        </div>

        <div class="slideshow-container">
            <div class="mySlides fade">
                <img src="uploads/banner1.jpg" style="width:100%">
            </div>
            <div class="mySlides fade">
                <img src="uploads/banner2.jpg" style="width:100%">
            </div>
            <div class="mySlides fade">
                <img src="uploads/banner3.jpg" style="width:100%">
            </div>
        </div>


        <div class="main-container">
            
            <section class="latest-section">
                <div class="latest-header">
                    <h2>Latest Arrivals</h2>
                </div>
                <div class="book-grid">
                    <?php
                    $sql = "SELECT * FROM books ORDER BY id DESC LIMIT 7";
                    $result = $conn->query($sql);

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

                        // view more
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

            </section> 
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