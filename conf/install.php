<?php
require_once ("models/model.php");

$pdo = Model::open();

$pdo->query("CREATE TABLE IF NOT EXISTS users (
  id            INTEGER         PRIMARY KEY AUTOINCREMENT,
  username      VARCHAR(255)    NOT NULL,
  password      VARCHAR(255)    NOT NULL,
  mail          VARCHAR(255)    NOT NULL,
  confirmed     BOOLEAN         ,
  admin         BOOLEAN         ,
  token         VARCHAR(255)
);");

Model::close($pdo);

?>
