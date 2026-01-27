<?php
session_start();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];


    if ($username === "Anjana" && $password === "1223") {
        
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        
        header("Location: index.php");
        exit();
        
    } else if ($username === "Melisha" && $password === "0628") {
        
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        
        header("Location: index.php");
        exit();
        
    } else if ($username === "Pabhodini" && $password === "0916") {
        
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        
        header("Location: index.php");
        exit();
        
    } else {
        echo "<script>
            alert('Invalid Username or Password');
            window.location.href='login.php';
        </script>";
    }
} else {
    header("Location: login.php");
    exit();
}
?>