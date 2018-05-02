<?php require_once 'partials/head.php';

if (isset($_GET["message"])) {
    echo $_GET["message"];
}

if (!isset($_SESSION["loggedIn"])): ?>
<form action="partials/register.php" method="POST">
  <input type="text" name="username">
  <input type="text" name="password">
  <input type="submit" value="Register">
</form>

<form action="partials/signin.php" method="POST">
  <input type="text" name="username">
  <input type="text" name="password">
  <input type="submit" value="Login">
</form>
<?php endif; ?>

<?php require 'partials/footer.php';?>
