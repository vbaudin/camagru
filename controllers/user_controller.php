<?php

require_once __DIR__."/../models/user.php";

/*
  TO-DO
  Register Method
  New Password Method
*/

class UserController {

  public static function register(PDO $dbh, array $params) {
    if (array_key_exists("register", $params)) {
      unset($params["register"]);
    }
    //Turn this to FALSE then Handle the confirmation mail !!
    $params["confirmed"] = true;

    if (User::exists($dbh, $params)) {
      $_SESSION["message"] = "username or email already exists. please try again.";
    } else {
      User::create($dbh, $params);
      /*Need to handle the confirmation Mail there*/
      $_SESSION["message"] = "Your account is now created, check your emails to confirm your resgister";
    }
  }

  public static function confirm_account(PDO $dbh, array $params) {
    if (array_key_exists("username", $params)) {
      $user = User::find($dbh, "username", $params["username"]);
      if (!is_null($user)) {
        $user->set_confirmed(true);
        $user->save($dbh);
        $_SESSION["message"] = "your account is confirmed, you can now login";
      } else {
        $_SESSION["message"] = "username not found. please contact the support";
      }
    } else {
      print "probleme array_key dans user_controller";
    }
  }

}

?>
