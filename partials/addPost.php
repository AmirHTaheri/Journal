<?php
//header('Location: /');
require_once 'database.php';

/* Showing Errors*/
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
/* Showing Errors*/
session_start();

echo $_SESSION["loggedIn"];

if ($_SESSION["loggedIn"]) {
  /* Fetching the userId*/
$statement = $db->prepare(
  "SELECT userID FROM users
  WHERE username = :username"
);
$statement->execute([
  "username" => $_SESSION["username"]
]);
// Fetch, not fetchAll
$userId = $statement->fetch();

/* Writing to the entries table*/

$statement = $db->prepare(
  "INSERT INTO entries
  (title, content,createdAt,userID)
  VALUES (:title, :content, :createdAt, :userID)"
);


$dt = date('Y-m-d H:i:s');
$statement->execute([
  ":title" => $_POST["article"],
  ":content" => $_POST["post"],
  ":createdAt" => $dt,
  ":userID" => $userId["userID"]
]);


header('Location: /welcome.php?message=loggedin');
}
else {

}
