<?php
//header('Location: /');
require_once 'database.php';

/* Showing Errors*/
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
/* Showing Errors*/
session_start();

echo $_POST["entryID"];


/* Fetching the userId*/
$statement = $db->prepare(
"DELETE FROM entries WHERE entryID = :id"

);
$statement->execute([
  "id" => $_POST["entryID"]
]);


header('Location: /Login/welcome.php?message=loggedin');
