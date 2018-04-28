<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">    <title>Journal</title>
  </head>
  <body>
    <h1>something</h1>
    <?php
    ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
    $host = 'localhost';
    $db   = 'journal';
    $user = 'root';
    $pass = 'root';
    $charset = 'utf8';
    $port = 8889;

    $dsn = "mysql:host=$host:$port;dbname=$db;charset=$charset";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    $pdo = new PDO($dsn, $user, $pass, $opt);

    $stmt = $pdo->prepare('SELECT * FROM users');
    $stmt->execute();
    $data = $stmt->fetch();
    var_dump($data["username"]);

    $my_username = "bananpojke";
    $my_password = "hgghsdhasd";

    $stmt = $pdo->prepare('SELECT * FROM users WHERE username = ? AND password=?');
    $stmt->execute([$my_username, $my_password]);
    $user = $stmt->fetch();
    echo "<br/> username = ".$user["username"]."      password =  ".$user["password"];

// or
/*
    $stmt = $pdo->prepare('SELECT * FROM users WHERE email = :email AND status=:status');
    $stmt->execute(['email' => $email, 'status' => $status]);
    $user = $stmt->fetch();
*/
    /* Start: Writing into the database*/
/*
    $my_username = "bananpojke";
    $my_password = "hgghsdhasd";

    // ALWAYS PREPARE
    $statement = $pdo->prepare(
    "INSERT INTO users
      (username, password)
      VALUES (:username, :password)"
    );

    // ALWAYS EXECUTE, execute takes an array as argument
    $statement->execute([
      ":username" => $my_username,
      ":password" => $my_password
    ]);*/
    /* END: Writing into the database*/




     ?>
  </body>
</html>
