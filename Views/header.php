<?php
session_start();
ini_set('display_errors', 1);
require_once(__DIR__."/../Controllers/user_controller.php")
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="assets/css/style.css" />
        <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Shadows+Into+Light|Titillium+Web" rel="stylesheet">
        <!-- <script src="assets/js/register.js"></script> -->
        <title>Camagru</title>
    </head>
    
    <body>
        <div class="page_wrapper">
            <header>
                <div class="topbar">
                    <div class="topbar-logo">
                        <h1>Camagru</h1>
                    </div>
                    <div class="topbar-right">
                        <a href="index.php">Home</a>
                        <a href="gallery.php">Gallery</a>
                        <a href="register.php">Sign-in</a>
                    </div>
                </div>
                <div class="topbar-quote">
                    LIKE MY PICS C0CKSUCKER
                </div>
            </header>