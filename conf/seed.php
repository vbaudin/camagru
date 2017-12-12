<?php
require_once ("models/user.php");
require_once __DIR__."/../controllers/user_controller.php";

$pdo = User::open();

User::create($pdo, array(
                          "username" => "admin",
                          "password" => "admin",
                          "mail" => "admin@admin.admin",
                          "confirmed" => false,
                          "admin" => true));

UserController::confirm_account($pdo, array("username" => "admin"));

User::close($pdo);

?>
