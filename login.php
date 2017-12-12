<?php
include('header.php');
if(isset($_POST["register"])){
  $dbh = User::open();
  $params = array("username" => $_POST["username"],
  "mail" => $_POST["mail"],
  "password" => $_POST["password"]);
  UserController::register($dbh, $params);
  User::close($dbh);
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Login</title>
</head>
<body>
  <div class="container">
    <div class="content">
      <p>
        Page Login
        Nouveau Compte <br>
        <form class="" action="login.php" method="post">
          <p>
            <label for="mail">mail :</label><input name="mail" type="text" id="mail" required><br>
            <label for="username">username :</label><input name="username" type="text" id="username" required><br>
            <label for="password">password :</label><input name="password" type="text" id="password" required><br>
          </p>
          <p><input name="register" id="register" type="submit" value="register"></p>
        </form>
      </p>
    </div>
  </div>
</body>
<?php include('footer.php') ?>
</html>
