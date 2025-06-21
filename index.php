<?php 
session_start();
if(isset($_SESSION["isLogin"])){
    header("location: loggedsite.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="js/index.css">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Fajrulweb</title>
</head>
<body>
    <?php include "layout/nav-1.html"?>

    
    
</body>
</html>