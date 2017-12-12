<?php
require_once ("Models/user.php");
require_once __DIR__."/../Controllers/user_controller.php";

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
