<?php
session_start();
if(!isset($_SESSION['Username'])){
  header('location:isNOTLoggin.php');
}
include 'connectDB.php';
$current = "";
$sql = "SELECT * FROM borrowing";
$result = mysqli_query($conn,$sql);
while($data = mysqli_fetch_assoc($result)){
  if(strlen($data['borrowID'])>=strlen($current)){
    $current = $data['borrowID'];
  }
}

for ($i=0; $i <sizeof($_SESSION['basket']) ; $i++) {
  if($_SESSION['baskettime'][$i]!=''){
  if($_SESSION['basket'][$i]!="NONE"){
    $sqleq = "SELECT * FROM fitnessequipment WHERE equipmentID='".$_SESSION['basket'][$i]."'";
    $resulteq = mysqli_query($conn,$sqleq);
    $dataeq = mysqli_fetch_assoc($resulteq);
    $lender = $dataeq['Borrower'];
    if($current==""){
      $current = "H1";
    }else{
      $temp = substr($current,1,50);
      $temp = ((int)$temp)+1;
      $current = $current[0].$temp;
    }
    $date = date("Y/m/d");
    $sql = "INSERT INTO `borrowing`(`borrowID`, `equipmentID`, `userborrowID`, `lenderID`, `Duration`, `borroweddate`, `datereturn`) VALUES ('".$current."','".$_SESSION['basket'][$i]."','".$_SESSION['index']."','".$lender."','".$_SESSION['baskettime'][$i]."','".$date."','')";
    $result = mysqli_query($conn,$sql);


    $number = $dataeq['numberoftime'];
    $number = ((int)$number)+1;
    $sql = "UPDATE `fitnessequipment` SET `status`='0',`numberoftime`='".$number."' WHERE equipmentID='".$_SESSION['basket'][$i]."'";
    $updaterequst = mysqli_query($conn,$sql);

  }
}
}
if($result){

  unset($_SESSION["basket"]);
  unset($_SESSION["baskettime"]);
  // header('location:main.php');
  if ( $pkt < 1 OR $user_id == 0) {
    $message = 'You have been borrowed.';
    echo "<SCRIPT> //not showing me this
        alert('$message')
        window.location.replace('main.php');
    </SCRIPT>";
    mysql_close();
 }
}



 ?>
