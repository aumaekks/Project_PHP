<?php
session_start();
if(!isset($_SESSION['Username'])){
  header('location:isNOTLoggin.php');
}
include 'connectDB.php';
if(!isset($_SESSION['Username'])){
  header('location:isNOTLoggin.php');
}
$sql = "SELECT * FROM fitnessequipment";
$result = mysqli_query($conn,$sql);
$l = "";
while($data = mysqli_fetch_assoc($result)){
  if(strlen($data['equipmentID'])>=strlen($l)){
  $l = $data['equipmentID'];
  }
}

if($l==""){
  $l="S1";
}else{
  $rest = substr($l,1,50);
  $rest = ((int)$rest)+1;
  $l = $l[0].$rest;
}
$insertSQL = "INSERT INTO `fitnessequipment`(`equipmentID`, `equipmentName`, `typeID`, `Information`, `Borrower`, `status`, `numberoftime`) VALUES ('".$l."','".$_POST['eqname']."','".$_POST['eqtype']."','".$_POST['eqinfo']."','".$_SESSION['index']."','1','0')";
$insert = mysqli_query($conn,$insertSQL);
if($insert){
  if ( $pkt < 1 OR $user_id == 0) {
    $message = 'You have posted a message.';
    echo "<SCRIPT> //not showing me this
        alert('$message')
        window.location.replace('main.php');
    </SCRIPT>";
    mysql_close();
 }
}
 ?>
