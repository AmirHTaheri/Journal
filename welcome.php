<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Welcome page</title>
  </head>
  <?php require_once 'partials/head.php';
  require_once 'partials/database.php';


  $retVal = ($_SESSION["loggedIn"]) ? "Logout" : "Login" ; ?>

  <body>
    <main class="main-wrapper">
      <input type="submit" class="btn btn-success"   onclick="logout()" name="Logout" value= "<?php
       echo $retVal; ?>">

      <section class="section-wrapper">
        <div class="form-group">
          <?php if ($_SESSION["loggedIn"]): ?>
            <form action='partials/addPost.php' method="POST">
              <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="article" placeholder="Article name">
              <textarea name="post" rows="8" cols="120" placeholder="Your post should not be more tha 10000 characters! Remember!"></textarea>
              <br/>
              <input type="submit" class="btn btn-primary" value="Post">

              <input type="hidden" name="username" value="<?php $_SESSION['userID']?>" />

            </form>

          <?php endif; ?>

        </div>
      </section>
      <section class="section-wrapper">

        <?php
        $statement = $db->prepare('SELECT * FROM entries ORDER BY entryID DESC');
        $statement->execute();
        $posts = $statement->fetchAll();

        $title;
        $content;
        foreach ($posts as $p) {
          if(!$p['title']){
            $title = "Had given no title";
          }
          else {
            $title = $p['title'];
          }

          if(!$p['content']){
            $content = "Some jokes";
          }
          else {
            $content = $p['content'];
          }

          echo '<div class="col-1-1">
          <h2>'.$title.'</h2>
          <p>'.$content.
          '</p>'.$p['createdAt'];
          ;
          if ($_SESSION[loggedIn]) {
            echo '
             <form action="partials/deletePost.php" method="POST">
            <input type="submit" class="btn btn-danger" name="delete" value="Delete">
            <input type="hidden" name="entryID" value="'.$p["entryID"].'">
            </form>

            <form action="partials/modifyPost.php" method="POST">
           <input type="submit" class="btn btn-warning" name="modify" value="Modify content">

           <input type="hidden" name="entryID" value="'.$p["entryID"].'">
           <input type="hidden" name="content" value="'.$p["content"].'">
           <input type="hidden" name="title" value="'.$p["title"].'">
           </form>
            </div>';

          }
        }

         ?>
      </section>
    </main>
    <?php
    require_once 'partials/footer.php';
     ?>
  </body>
</html>
