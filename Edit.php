<?php
session_start();
if(!isset($_SESSION['Username'])){
  header('location:isNOTLoggin.php');
}
include 'connectDB.php';
if(!isset($_SESSION['Username'])){
  header('location:isNOTLoggin.php');
}
if(isset($_POST['name'])){
  $sql = "UPDATE `user` SET `Username`='".$_POST['name']."' WHERE ID='".$_SESSION['index']."'";
  $result = mysqli_query($conn,$sql);
}else if(isset($_POST['email'])){
  $sql = "UPDATE `user` SET `Email`='".$_POST['email']."' WHERE ID='".$_SESSION['index']."'";
  $result = mysqli_query($conn,$sql);
}else if(isset($_POST['phone'])){
  $sql = "UPDATE `user` SET `Phone`='".$_POST['phone']."' WHERE ID='".$_SESSION['index']."'";
  $result = mysqli_query($conn,$sql);
}else if(isset($_POST['password'])){
  $sql = "UPDATE `user` SET `Password`='".$_POST['password']."' WHERE ID='".$_SESSION['index']."'";
  $result = mysqli_query($conn,$sql);
}

if($result){
  if(isset($_POST['name'])){
  $_SESSION['Username']=$_POST['name'];
  }
  if ( $pkt < 1 OR $user_id == 0) {
    $message = 'Your information have been edited.';
    echo "<SCRIPT> //not showing me this
        alert('$message')
        window.location.replace('Profile.php');
    </SCRIPT>";
    mysql_close();
  }
}
 ?>
