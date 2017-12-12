<?php

require_once "model.php";

class User extends Model {

/*
  TO-DO
  Getters pwd, email, confirmed, username
  Setter pwd
*/

  private static function hash_pwd($password) {
    return hash("sha512", "toto$password");
  }

  public function set_confirmed($value) {
    $this->confirmed = $value;
  }

  public static function create(PDO $dbh, array $params) {
    array_key_exists("password", $params);
    $params["password"] = self::hash_pwd($params["password"]);
    return parent::create($dbh, $params);
  }

  public static function exists(PDO $dbh, array $params) {
    if (array_key_exists("username", $params)) {
      if (self::find($dbh, "username", $params["username"])) {
        return true;
      }
    } elseif (array_key_exists("mail", $params)) {
      if (self::find($dbh, "mail", $params["mail"])) {
        return true;
      }
    }
    return false;
  }


}

?>
