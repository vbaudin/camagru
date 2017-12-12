<?php

require_once __DIR__."/../Models/user.php";

/*
  TO-DO
  Register Method
  New Password Method
*/

class UserController {

  public static function register(PDO $dbh, array $params, array $messages) {
    if (array_key_exists("register", $params)) {
      unset($params["user_register"]);
    }
    //TODO => Turn this to FALSE then Handle the confirmation mail !!
    $params["confirmed"] = true;

    if (User::exists($dbh, $params)) {
      $messages['exists'] = "username or email already exists. please try again.";
    } else {
      User::create($dbh, $params);
      /*Need to handle the confirmation Mail there*/
      $messages['success_create_user'] = "Your account is now created, check your emails to confirm your resgister";
    }
    return ($messages);
  }

  public static function confirm_account(PDO $dbh, array $params) {
    if (array_key_exists("username", $params)) {
      $user = User::find($dbh, "username", $params["username"]);
      if (!is_null($user)) {
        $user->set_confirmed(true);
        $user->save($dbh);
        $messages['success_confirm_user'] = "your account is confirmed, you can now login";
      } else {
        $messages['error_username'] = "username not found. please contact the support";
      }
    } else {
      print "probleme array_key dans user_controller";
    }
  }

  public static function check_user_infos(PDO $dbh, array $params) {
    $messages = array();
    if (!empty($params))
    {
      if (array_key_exists("user_login", $params)){
        if (!empty($_POST['user_login']) && !empty($_POST['user_password'])){

        } else {
          $messages['login_error'] = "Your login or password is incorrect";
        }
      }
      else {
        if (empty($params['user_username']) || !preg_match('/^[a-zA-Z0-9_]+$/', $params['user_username'])){
          $messages['username'] = "Invalid username ('a-zA-Z0-9_' allowed)";
        }
        if (empty($params['user_email']) || !filter_var($params['user_email'], FILTER_VALIDATE_EMAIL)){
          $messages['email'] = "Invalid email (FILTER_VALIDATE_EMAIL)";
        }
        if (empty($params['user_password']) || $params['user_password'] != $params['user_password_confirm']){
          $messages['password'] = "Incorrect password";
        }
        if (empty($messages)){
          //ADD USER TO DB
          $params = array("username" => $params["user_username"],
          "mail" => $params["user_email"],
          "password" => $params["user_password"]);
          $messages = UserController::register($dbh, $params, $messages);
        }
      }
    }
    else {
      $messages['empty'] = "Informations are missing";
    }
    return $messages;
  }

  public static function login_check(PDO $dbh, array $params) {
    if (User::exists($dbh, $params)) {
      $hashed_password = User::hash_pwd($params["password"]);
      $tmp = User::find($dbh, "username", $params["username"]);
      if ($hashed_password === $tmp["password"]) {
        return "The Id and the Password are corrects."
      }
    }
    return "error";
  }
}
