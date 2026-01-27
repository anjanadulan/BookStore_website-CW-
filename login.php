<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
   <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Login - Horizon Books</title>
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="res-styles.css">
        <link rel="stylesheet" href="fullscreen.css">

        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
        <script src="script.js" defer></script>

        <style>
            
        </style>

    </head>
    <body>
        <div class="login-box">
            <h2 style="text-align:center; color: #3c3633; margin-bottom: 30px;">Admin Login</h2>
            <form action="authenticate.php" method="post">
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                
                <input type="submit" name="login" value="LOGIN">
            </form>
            <p style="text-align:center; margin-top: 20px;">
                <a href="index.php" style="text-decoration:none; color:#3c3633; font-size: 14px;">&larr; Back to Home</a>
            </p>
        </div>
    </body>
</html>