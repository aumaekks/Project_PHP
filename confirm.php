<?php
session_start();
if(!isset($_SESSION['Username'])){
  header('location:isNOTLoggin.php');
}
include 'connectDB.php';
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <title>Post Some Equipment</title>

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/style.css">
    <style media="screen">
      table,th,td{
        border: 2px solid black;
      }
      .table{
        margin: auto;
        margin-left: 30%;

      }
      .head{
        margin-left: 30%;
      }
      .button{
        margin-left: 45%;

      }
    </style>
  </head>
  <body>
    <div id="js-preloader" class="js-preloader">
      <div class="preloader-inner">
        <span class="dot"></span>
        <div class="dots">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    </div>
    <!-- ***** Preloader End ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="main.php" class="logo">fitness<em> equipment</em></a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">


                            <li><a href='History.php'>Borrowing</a></li>
                            <li><a href="confirm.php"class="active">Confirm&Delete</a></li>
                            <li><a href='Equipment.php'>Post the Equipment</a></li>
                            <li><a href="main.php" >Equipment List</a></li>

                            <li><a href='Profile.php'><?php echo $_SESSION['Username']; ?></a></li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2>CONFIRM&<em> DELETE</em></h2>
                        <p>delete and confrim information.</p>
                        <a href="main.php" style="font-size:20px;">back</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    if(isset($_GET['k'])){
      $date = date("Y/m/d");
      $sql = "SELECT * FROM `borrowing` WHERE borrowID='".$_GET['k']."'";
      $re = mysqli_query($conn,$sql);
      $data = mysqli_fetch_assoc($re);
      $eq = $data['equipmentID'];
      $updateborrow = "UPDATE `borrowing` SET `datereturn`='".$date."' WHERE borrowID='".$_GET['k']."'";
      $updateequiment = "UPDATE `fitnessequipment` SET `status`='1' WHERE equipmentID='".$eq."'";
      $result1 = mysqli_query($conn,$updateborrow);
      $result2 = mysqli_query($conn,$updateequiment);
    }

    if(isset($_GET['l'])){
      $sql = "DELETE  FROM `fitnessequipment` WHERE equipmentID='".$_GET['l']."'";
      $checksql = "SELECT * FROM borrowing where equipmentID='".$_GET['l']."'";
      $recheck = mysqli_query($conn,$checksql);
      $data = mysqli_fetch_assoc($recheck);
      if($data['datereturn']=="0000-00-00"){
        echo "<script>alert('This equipment have been already borrowed you can delete it when equipment is returned')</script>";
      }else{
      $result = mysqli_query($conn,$sql);
    }
    }
     ?>
    <div class='container'>
    <h2 class="head">Confirm returning equipment</h2>
    <div class="button">
      <a href="?m=1"><button>Borrow</button></a> <a href="?m=2"><button>Post</button></a> <br>
    </div>
  </div>
  <div class="table">
    <?php

    if($_GET['m']==2 || isset($_GET['l'])){
      echo "<table>";
      echo "<tr>";
      echo "<th>Equipment</th> <th>Type Name</th> <th>Information</th> <th>Delete equipment</th>";
      echo "</tr>";
      $sql = "SELECT * FROM fitnessequipment inner join equipmenttype on fitnessequipment.typeID=equipmenttype.typeID WHERE Borrower='".$_SESSION['index']."'";
      $result = mysqli_query($conn,$sql);
      $num = mysqli_num_rows($result);
      if($num==0){
        echo "<tr><td colspan='4'>There is no posted equipment</td></tr>";
      }else{
        while($data=mysqli_fetch_assoc($result)){
          echo "<tr>";
          echo "<td>".$data['equipmentName']."</td> <td>".$data['typeName']."</td> <td>".$data['Information']."</td> <td> <a href='?l=".$data['equipmentID']."'>Delete</a></td>";
          echo "</tr>";
        }
      }
      echo "</table>";
    }else {
      echo "<table>";
      echo "<tr>";
      echo "<th>Equipment</th> <th>Borrower</th> <th>Borrow date</th> <th> Duration</th> <th>Confirm</th>";
      echo "</tr>";
      $sql = "SELECT * FROM borrowing inner join fitnessequipment on borrowing.equipmentID = fitnessequipment.equipmentID inner join user on borrowing.userborrowID = user.ID where lenderID='".$_SESSION['index']."' AND datereturn='0000-00-00'";
      $re = mysqli_query($conn,$sql);
      $num = mysqli_num_rows($re);

      if($num==0){
        echo "<tr> <td colspan='5'> There is no borrowing list</td></tr>";
      }else{
        while($data = mysqli_fetch_assoc($re)){
          echo "<tr>";
          echo "<td>".$data['equipmentName']."</td> <td>".$data['Username']."</td> <td>".$data['borroweddate']."</td><td>".$data['Duration']."</td> <td> <a href='?k=".$data['borrowID']."'>Confirm</a> </td>";
          echo "</tr>";
        }
      }
      echo "</table>";
    }
     ?>
   </div>
    <br><br><br><br><br>
     <script src="assets/js/jquery-2.1.0.min.js"></script>

     <!-- Bootstrap -->
     <script src="assets/js/popper.js"></script>
     <script src="assets/js/bootstrap.min.js"></script>

     <!-- Plugins -->
     <script src="assets/js/scrollreveal.min.js"></script>
     <script src="assets/js/waypoints.min.js"></script>
     <script src="assets/js/jquery.counterup.min.js"></script>
     <script src="assets/js/imgfix.min.js"></script>
     <script src="assets/js/mixitup.js"></script>
     <script src="assets/js/accordions.js"></script>

     <!-- Global Init -->
     <script src="assets/js/custom.js"></script>
     <script src="assets/js/jquery-2.1.0.min.js"></script>

     <!-- Bootstrap -->
     <script src="assets/js/popper.js"></script>
     <script src="assets/js/bootstrap.min.js"></script>

     <!-- Plugins -->
     <script src="assets/js/scrollreveal.min.js"></script>
     <script src="assets/js/waypoints.min.js"></script>
     <script src="assets/js/jquery.counterup.min.js"></script>
     <script src="assets/js/imgfix.min.js"></script>
     <script src="assets/js/mixitup.js"></script>
     <script src="assets/js/accordions.js"></script>

     <!-- Global Init -->
     <script src="assets/js/custom.js"></script>
  </body>
</html>
