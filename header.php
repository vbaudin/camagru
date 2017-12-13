<?php
session_start();
require_once(__DIR__."/Controllers/user_controller.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <header id="header">
    <div class="container">
      <h1>
        Camagru
      </h1>
      <nav id="nav">
        <ul>
          <li>
            <a href="index.php">Home</a>
          </li>
          <li>
            <a href="login.php">Login</a>
          </li>
          <li>
            <a href="gallerie.php">Gallerie</a>
          </li>
          <li>
            <a href="contact.php">Contact</a>
          </li>
        </ul>
      </nav>
    </div>
  </header>
</body>
</html>
