<?php
session_start();
$_SESSION['activity']="login";
 ?>
<!-- <!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="" action="check.php" method="post">
      <h2>Fitness Equipment</h2>
      Username <input type="text" name="username" required> <?php if($_GET['m']==2){echo "<span style='color:red;'>Username is not in this commuity</span>";} ?><br>
      Password <input type="password" name="password" required><?php if($_GET['m']==1){echo "<span style='color:red;'>You enter the wrong password</span>";} ?><br>
      <a href="register.php">Don't have account?</a><br>
      <input type="submit"  value="Login"> <input type="reset" value="Cancel" >
    </form>
  </body>
</html> -->

<!DOCTYPE html>
<html>
  <title>Simple Sign up from</title>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <style>
      html, body {
      display: flex;
      justify-content: center;
      font-family: Roboto, Arial, sans-serif;
      font-size: 15px;
      background-color:gray ;

      }
      form {
      border: 1px  ;
      background-color:black ;
      color: white;
      }
      input[type=text], input[type=password] {
      width: 100%;
      padding: 16px 8px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      box-sizing: border-box;

      }
      .icon {
      font-size: 110px;
      display: flex;
      justify-content: center;
      color: #ed563b;
      }
      button {
      background-color: #ed563b;
      color: white;
      padding: 14px 0;
      margin: 10px 0;
      border: none;
      cursor: grab;
      width: 48%;
      border-radius: 5px;

      }
      h1 {
      text-align:center;
      fone-size:18;
      }
      button:hover {
      opacity: 0.8;
      }
      .formcontainer {
      text-align: center;
      margin: 24px 50px 12px;
      }
      .container {
      padding: 16px 0;
      text-align:left;
      color: white;
      border-radius: 5px;

      }
      span.psw {
      float: right;
      padding-top: 0;
      padding-right: 15px;




      }
      /* Change styles for span on extra small screens */
      @media screen and (max-width: 300px) {
      span.psw {
      display: block;
      float: none;





      }

    </style>
  </head>
  <body>
    <form action="check.php" method="post">
      <h1>SIGN UP</h1>
      <div class="icon">
        <i class="fas fa-user-circle"></i>
      </div>
      <div class="formcontainer">
      <div class="container">
      <label for="uname"><strong>Username</strong></label>
      <input type="text" placeholder="Enter Username" name="username" required> <?php if($_GET['m']==2){echo "<span style='color:red;'>Username is not in this commuity</span>";}else{echo"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";} ?><br>
      <br>

        <label for="psw"><strong>Password</strong></label>
        <input type="password" placeholder="Enter Password" name="password" required><?php if($_GET['m']==1){echo "<span style='color:red;'>You enter the wrong password</span>";} ?><br>


      </div>
      <button type="submit"><strong>SIGN UP</strong></button>
      <br><br>
      <div class="container" style="background-color:#ed565b;">
        <label style="padding-left: 15px">
        <input type="checkbox"  checked="checked" name="remember"> Remember me
        </label>
        <span class="psw"><a href="register.php">Don't have account?</a></span>
      </div>
    </form>
  </body>
</html>
