<?php
session_start();
include 'connectDB.php';
if(!isset($_SESSION['Username'])&&!isset($_SESSION['activity'])){
  header('location:isNOTLoggin.php');
}
if($_SESSION['activity']=="login"){
  $sql = "SELECT * FROM user";
  $result = mysqli_query($conn,$sql);
  $foundusername = 0;
  $found=false;
  while ($data = mysqli_fetch_assoc($result)) {
    if(($data['Username']==$_POST['username'])&&($data['Password']==$_POST['password'])){
      $found = true;
      $index = $data['ID'];
    }
    if($data['Username']==$_POST['username']){
      $foundusername = $foundusername+1;
    }
  }
  if($found){
    $_SESSION['Username'] = $_POST['username'];
    $_SESSION['index'] = $index;
    header('Location:main.php');
  }else{
    if($foundusername!=0){
      header('Location:login.php?m=1');
    }else{
      header('Location:login.php?m=2');
    }
  }
}else if($_SESSION['activity']=="register"){
  if($_POST['password']!=$_POST['password2']){
    header("location:register.php?m=1");
  }else{
    $sql = "SELECT * FROM user";
    $result = mysqli_query($conn,$sql);
    $exist = false;
    $l = "";
    while($data = mysqli_fetch_assoc($result)){
      if($data['Username']==$_POST['username']){
        $exist = true;
      }
      if(strlen($data['ID'])>=strlen($l)){
        $l = $data['ID'];
      }
    }

    if($exist){
      header('location:register.php?m=2');
    }else{
      $name = $_POST['username'];
      $pass = $_POST['password'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];
      if($l==''){
        $rest = 'A1';
      }else{
        $rest = substr($l, 1, 50);
        $rest = ((int)$rest)+1;
        $rest =  $l[0].$rest;
      }
      $insertSQL = "INSERT INTO `user`(`ID`, `Username`, `Password`, `Email`, `Phone`) VALUES ('".$rest."','".$name."','".$pass."','".$email."','".$phone."')";
      $result = mysqli_query($conn,$insertSQL);
      if($result){
        if ( $pkt < 1 OR $user_id == 0) {
          $message = 'You have been registered.';
          echo "<SCRIPT>
              alert('$message')
              window.location.replace('login.php');
          </SCRIPT>";
          mysql_close();

      }
      }
    }
  }

}

 ?>
