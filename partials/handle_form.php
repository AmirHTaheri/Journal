<?php
// define variables and set to empty values
$usernameErr = $passErr  = "";
$username = $passwd = "";


$usernameErr = 'User name required!';
$passErr = 'Pass word needed!';
$Location = "Location: ../index.php?error=".$usernameErr."&&passError=".$passErr;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if(empty($_POST["username"])){
    header($Location);
  }
  else {
    $username = test_input($_POST["username"]);
    if (!preg_match("/^[a-z\d_]{2,20}$/i",$username)) {
     $usernameErr = "Only letters and numbers are allowed"; 
   }
  }
  if(empty($_POST["passwd"])){
    header($Location);
  }
  else {
    $passwd = test_input($_POST["passwd"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}



echo $username;
echo "<br>";
echo $passwd;
