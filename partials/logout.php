<?php

$_SESSION["loggedIn"] = false;
$_SESSION["loggedout"] = true;
$_SESSION["username"] = "No user loggedin";

session_start();
session_destroy();


header('Location: /Login/index.php?message=logged out');

//echo "Signed out!"



 ?>
