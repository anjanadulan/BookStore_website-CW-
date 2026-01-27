<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit();
}

include 'db.php';

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $price = $_POST['price'];
    $genre = $_POST['genre'];
    $description = $_POST['description'];
    
    $target_dir = "uploads/";
    if (!is_dir($target_dir)) { mkdir($target_dir, 0777, true); }
    
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;

    if (!empty($_FILES["fileToUpload"]["name"])) {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            
            $sql = "INSERT INTO books (title, author, price, genre, description, image) 
                    VALUES ('$title', '$author', '$price', '$genre', '$description', '$target_file')";
            
            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Book Added Successfully!'); window.location.href='store.php';</script>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
   <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add New Book</title>
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="fullscreen.css">
        
        <script>
            function previewFile() {
                const preview = document.getElementById('imagePreview');
                const fileInput = document.getElementById('fileToUpload');
                const file = fileInput.files[0];
                const reader = new FileReader();

                reader.addEventListener("load", function () {
                    preview.src = reader.result;
                    preview.style.display = "block";
                }, false);

                if (file) { reader.readAsDataURL(file); }
            }
        </script>
    </head>
    <body>
        <div class="form-box">
            <h2 style="text-align:center; color: #3c3633; margin-bottom: 30px;">Add New Item</h2>
            
            <form action="" method="post" enctype="multipart/form-data">
                
                <label>Book Title</label>
                <input type="text" name="title" required>

                <div class="row-container">
                    <div style="flex: 1;">
                        <label>Author</label>
                        <input type="text" name="author" required>
                    </div>
                    <div style="flex: 1;">
                        <label>Price ($)</label>
                        <input type="number" step="0.01" name="price" required>
                    </div>
                </div>

                <label>Genre</label>
                <select name="genre" required>
                    <option value="" disabled selected>Select a genre...</option>
                    <option value="Education">Education</option>
                    <option value="Sci-Fi">Sci-Fi</option>
                    <option value="Fiction">Fiction</option>
                    <option value="Novel">Novel</option>
                    <option value="History">History</option>
                    <option value="Other">Other</option>
                </select>

                <label>Description</label>
                <textarea name="description" rows="3" required></textarea>

                <label>Book Cover Image</label>
                <input type="file" name="fileToUpload" id="fileToUpload" onchange="previewFile()" required>
                
                <div style="text-align: center;">
                    <img id="imagePreview" src="#" alt="Image Preview">
                </div>
                
                <input type="submit" name="submit" value="ADD ITEM">
            </form>
            
            <p style="text-align:center; margin-top: 20px;">
                <a href="store.php" style="text-decoration:none; color:#3c3633; font-size: 14px;">&larr; Back to Dashboard</a>
            </p>
        </div>
    </body>
</html>