<?php
//header('Location: /');
require_once 'database.php';
require_once 'head.php';

/* Showing Errors*/
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
/* Showing Errors*/
//session_start();


echo '
    <section class="section-wrapper">
    <div class="form-group">
    <form action="updatePost.php" method="POST">
    <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="article" placeholder="Article name" value="'.$_POST["title"].'">

    <textarea name="post" rows="8" cols="120" placeholder="Your post ..."> '.$_POST["content"].'</textarea>

    <input type="hidden" name="entryID" value="'.$_POST["entryID"].'">


    <input type="submit" class="btn btn-primary" value="Post">
    </form>
    </div>
    </section>';

    ?>
    </body>

    <?php require_once 'footer.php'; ?>
