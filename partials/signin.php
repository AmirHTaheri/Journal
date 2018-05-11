<?php
require_once 'session_start.php';
require_once 'database.php';

/* Showing Errors*/
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
/* Showing Errors*/


$statement = $db->prepare(
  "SELECT * FROM users
  WHERE username = :username"
);
$statement->execute([
  "username" => $_POST["username"]
]);
// Fetch, not fetchAll
$user = $statement->fetch();

if (password_verify($_POST["password"], $user["password"])) {
    header('Location: /welcome.php?message=loggedin');
    $_SESSION["loggedIn"] = true;
    $_SESSION["username"] = $user["username"];
    $_SESSION["userID"] = $user["userID"];
    $_SESSION["log_button"] = "Logout";
} else {
    header('Location: /index.php?message=login failed');
}
