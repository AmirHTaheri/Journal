<?php
header('Location: /');

require_once 'database.php';

/* Showing Errors*/
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
/* Showing Errors*/


$hashed = password_hash($_POST["password"], PASSWORD_DEFAULT);

$statement = $db->prepare(
  "INSERT INTO users
  (username, password)
  VALUES (:username, :password)"
);
$statement->execute([
  ":username" => $_POST["username"],
  ":password" => $hashed
]);
