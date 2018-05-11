<?php
require_once 'database.php';

/* Showing Errors*/
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$post = $_POST["post"];
$title = $_POST["article"];
$id = $_POST["entryID"];
$date = date('Y-m-d H:i:s');


$statement = $db->prepare(
  "UPDATE `entries`
  SET title = :title , content = :content
  WHERE entryID = :id"
);
$statement->execute([
  ":content" => $post,
  ":title" => $title,
  ":id" => $_POST["entryID"]
]);

header('Location: /Login/welcome.php?message=loggedin');
