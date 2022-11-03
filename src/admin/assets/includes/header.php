<?php

session_start();

require_once "config.php";

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://code.iconify.design/iconify-icon/1.0.0/iconify-icon.min.js"></script>
  <link rel="stylesheet" href="assets/css/style.css">
  <title>Procestechniek</title>
</head>
<body>
    <div class="sidenav">
        <div class="sidenav-border">
            <div class="sidenav-title">
                <div class="logo-img2">
                    <img src="assets/images/logo.png" alt="logo">
                </div>
            </div>
            <div class="sidenav-account">Welkom, <span><?php echo htmlspecialchars($_SESSION["username"]); ?></span></div>
        </div>
        <div class="sidenav-links">
            <a href="index.php"><iconify-icon icon="akar-icons:dashboard"></iconify-icon>Overzicht</a>
            <a href="parts.php"><iconify-icon icon="akar-icons:shipping-box-01"></iconify-icon>Parts</a>
            <?php 
            
            if($_SESSION["roleid"] == "2"){ 
    
            echo
            '<a href="employees.php"><iconify-icon icon="akar-icons:people-group"></iconify-icon>Docenten</a>';
            }

            ?>
        </div>
        <div class="sidenav-uitlog">
            <a href="logout.php"><iconify-icon icon="fe:logout"></iconify-icon>Uitloggen</div></a>
    </div>
