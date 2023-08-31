<?php
session_start();
if(!isset($_SESSION['Username'])){
  header('location:isNOTLoggin.php');
}
session_destroy();
header('location:index.php');
 ?>
