<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">    <title>Journal</title>
  </head>
  <body>
    <?php
    echo "test!";

    set_include_path ( "./classes" );
    spl_autoload_register ();

    $test = new Form()  ;
    $test->hello();
    echo $test->param;



     ?>
  </body>
</html>
