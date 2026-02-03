<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit();
}

include 'db.php';


function getImagePath($dbImage) {
    if (empty($dbImage)) { return "uploads/default.png"; }
    if (strpos($dbImage, 'uploads/') === 0) { return $dbImage; }
    return "uploads/" . $dbImage;
}

// book id geting
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    
    //get existing data
    $sql = "SELECT * FROM books WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Book not found. <a href='store.php'>Go back</a>";
        exit();
    }
} else {
    header("Location: store.php");
    exit();
}

// update logic
if (isset($_POST['update'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    
    $imagePath = $row['image'];
    if (!empty($_FILES["fileToUpload"]["name"])) {
        $target_dir = "uploads/";
        if (!is_dir($target_dir)) { mkdir($target_dir, 0777, true); }
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $imagePath = $target_file;
        }
    }

    $sql = "UPDATE books SET title='$title', author='$author', price='$price', description='$description', image='$imagePath' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Details Updated Successfully!'); window.location.href='store.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}

// delete logic
if (isset($_POST['delete'])) {
    if (!empty($row['image']) && file_exists($row['image'])) {
        if (strpos($row['image'], 'default') === false) { unlink($row['image']); }
    }
    $sql = "DELETE FROM books WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Item Deleted Successfully!'); window.location.href='store.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
   <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Book - Horizon Books</title>
        
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="fullscreen.css"> 
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
        
        <style>
            /* layouts */
            input[type="file"] {
                display: block;
                width: 100%;
                margin-bottom: 20px;
            }

            label {
                display: block;
                margin-top: 15px;
                margin-bottom: 5px;
                font-size: 12px;
                font-weight: bold;
                color: #5d5550;
                text-transform: uppercase;
                letter-spacing: 1px;
            }

            .button-group {
                display: flex;
                gap: 15px;
                margin-top: 25px;
            }

            .button-group input {
                flex: 1;
                width: auto;
            }

            .btn-update {
                background-color: #3c3633;
                color: white;
                border: none;
                padding: 12px;
                border-radius: 25px;
                cursor: pointer;
            }

            .btn-update:hover { 
                background-color: #319506ff !important;
            }
            
            .btn-delete {
                background-color: #d9534f !important;
                color: white !important;
                border: none;
                padding: 12px;
                border-radius: 25px;
                cursor: pointer;
            }
            .btn-delete:hover { 
                background-color: #c9302c !important;
            }

            .current-image-box {
                text-align: center;
                margin-bottom: 20px;
                background: #f9f9f9;
                padding: 10px;
                border-radius: 8px;
            }
            .current-image-box img {
                max-width: 150px;
                border-radius: 5px;
            }
        </style>

        <script>
            let isDirty = false;

            document.addEventListener('DOMContentLoaded', function () {
                const form = document.querySelector('form');
                
                // user changes find by isDirty command
                form.addEventListener('change', () => isDirty = true);
                form.addEventListener('input', () => isDirty = true);

                // isDirty remove from submit btns
                form.addEventListener('submit', () => {
                    isDirty = false;
                });

                // refresh,cancel detcor
                window.addEventListener('beforeunload', function (e) {
                    if (isDirty) {
                        e.preventDefault();
                        e.returnValue = '';
                    }
                });
            });
        </script>
    </head>
    <body>
        <div class="form-box">
            <h2 style="text-align:center; color: #3c3633; margin-bottom: 20px;">Edit Item Details</h2>
            
            <form action="" method="post" enctype="multipart/form-data">
                
                <div class="current-image-box">
                    <p style="font-size: 12px; color: #888; margin-bottom: 5px;">CURRENT BOOK COVER</p>
                    <img src="<?php echo getImagePath($row['image']); ?>" alt="Current Image">
                </div>

                <label>Change Book Cover</label>
                <input type="file" name="fileToUpload">

                <label>Book Title</label>
                <input type="text" name="title" value="<?php echo htmlspecialchars($row['title']); ?>" required>

                <div class="row-container">
                    <div style="flex: 1;">
                        <label>Author</label>
                        <input type="text" name="author" value="<?php echo htmlspecialchars($row['author']); ?>" required>
                    </div>
                    <div style="flex: 1;">
                        <label>Price ($)</label>
                        <input type="number" step="0.01" name="price" value="<?php echo htmlspecialchars($row['price']); ?>" required>
                    </div>
                </div>

                <label>Description</label>
                <textarea name="description" rows="1" required><?php echo htmlspecialchars($row['description']); ?></textarea>

                <div class="button-group">
                    <input type="submit" name="update" value="UPDATE" class="btn-update">
                    <input type="submit" name="delete" value="DELETE" class="btn-delete" onclick="return confirm('Are you sure you want to delete this book? This cannot be undone.');">
                </div>
                
            </form>
            
            <p style="text-align:center; margin-top: 5px;">
                <a href="store.php" style="text-decoration:none; color:#3c3633; font-size: 14px;">&larr; Cancel</a>
            </p>
        </div>
    </body>
</html>