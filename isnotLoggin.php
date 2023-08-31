<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    if ( $pkt < 1 OR $user_id == 0) {
      $message = 'You are not loggin.';
      echo "<SCRIPT> //not showing me this
          alert('$message')
          window.location.replace('index.php');
      </SCRIPT>";
      mysql_close();

  }
    ?>
  </body>
</html>
