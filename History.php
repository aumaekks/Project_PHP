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
    <meta charset="utf-8">
    <style media="screen">
      table,th,td{
        border: 2px solid black;
      }
      .table{
        margin: auto;

      }
      .head{
        text-align: center;
      }
      .button{
        margin-left: 45%;

      }
      .hhhhhh{

        text-align: center;
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


                            <li><a href='History.php'class="active">Borrowing</a></li>
                            <li><a href="confirm.php">Confirm&Delete</a></li>
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
                        <h2>BORROw<em> ING</em></h2>
                        <p>List of all borrowing and return history.</p>
                        <a href="main.php" style="font-size:20px;">back</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    $sql = "SELECT * FROM borrowing inner join user on borrowing.userborrowID=user.ID WHERE userborrowID ='".$_SESSION['index']."' OR lenderID='".$_SESSION['index']."'";
    $re = mysqli_query($conn,$sql);
    $numrow = mysqli_num_rows($re);
     ?>
    <h2 class="head">History</h2>
    <table class="table">
      <tr>
        <th>Equipment</th><th>Borrower</th><th>Lender</th><th>Borrow date</th><th>return date</th>
      </tr>
      <?php

      if($numrow==0){
        echo "<tr>";
        echo "<td colspan='5' >Don't have item.</td>";
        echo "</tr>";
      }else {
        while($data = mysqli_fetch_assoc($re)){
          echo "<tr>";
          $eq = $data['equipmentID'];
          $sqll = "SELECT * FROM fitnessequipment WHERE equipmentID='".$eq."'";
          $reeq = mysqli_query($conn,$sqll);
          $numeq = mysqli_num_rows($reeq);
          $k = "SELECT * FROM borrowing inner join user on borrowing.lenderID = user.ID WHERE equipmentID='".$data['equipmentID']."'";
          $rek = mysqli_query($conn,$k);
          $datak = mysqli_fetch_assoc($rek);
          if($numeq==0){
          echo "<td><span style='color:red'>This equipment has been removed</span></td> <td>".$data['Username']."</td> <td>".$datak['Username']."</td>  <td>".$data['borroweddate']."</td> <td>".$data['datereturn']."</td>";
        }else{
            $sql4 = "SELECT * FROM fitnessequipment  inner join user on fitnessequipment.Borrower=user.ID WHERE equipmentID='".$data['equipmentID']."'";
            $ree = mysqli_query($conn,$sql4);
            $da = mysqli_fetch_assoc($ree);
            if($data['userborrowID']==$_SESSION['index']){
              echo "<td><a href='?p=".$data['lenderID']."'>";
            }else {
              echo "<td><a>";
            }
            echo "".$da['equipmentName']."</a></td> <td>".$data['Username']."</td> <td>".$da['Username']."</td>  <td>".$data['borroweddate']."</td> <td>".$data['datereturn']."</td>";

        }
          echo "</tr>";
        }
      }
       ?>

    </table><br>
    <?php
    if(isset($_GET['p'])){
      $sq = "SELECT * FROM user WHERE ID='".$_GET['p']."'";
      $resq = mysqli_query($conn,$sq);
      $daeq = mysqli_fetch_assoc($resq);
      $sqlcheck = "SELECT * FROM review WHERE reviewerID ='".$_SESSION['index']."' AND lenderID='".$_GET['p']."'";
      $resultcheck = mysqli_query($conn,$sqlcheck);
      $num = mysqli_num_rows($resultcheck);
      if($num==0){
        echo "<br><div class='hhhhhh'>";
        echo "Do you like borrowing ".$daeq['Username']."' equipment <br>";
        echo "<a href='?mvote=".$daeq['ID']."'>Yes</a><span> / </span> <a href='?'>No</a>";
      }else{
        echo "<p class='hhhhhh'>You have already been vote to this user.</p>";
        echo "</div>";
      }
    }
    if(isset($_GET['mvote'])){
      $updatevote = "INSERT INTO `review`(`lenderID`, `reviewerID`) VALUES ('".$_GET['mvote']."','".$_SESSION['index']."')";
      $resultupdate = mysqli_query($conn,$updatevote);
    }

     ?>
     <br><br>

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
