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
      .white{
        color: white;
      }
      .dbas{
        border: 5px solid;
        border-color: white;
        border-radius: 7px;
        width: 50%;
        text-align: center;
        margin: auto;
        padding-top: 20px;

      }
      .butt{
        color: white;
      }
    </style>
    <meta charset="utf-8">
    <title></title>
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
                            <li><a href="confirm.php">Confirm&Delete</a></li>
                            <li><a href='Equipment.php'>Post the Equipment</a></li>
                            <li><a href="main.php" class="active">Offers</a></li>

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
                        <h2>Confirm<em> List</em></h2>
                        <p>Delete and confrim information.</p>
                        <div class="dbas">


                        <h2 class="head">Basket<br><br></h2>
                        <?php
                        if(isset($_GET['m'])){
                          $element = $_GET['m'];
                          for ($i=0; $i <sizeof($_SESSION['basket']) ; $i++) {
                            if($element==$_SESSION['basket'][$i]){
                              $_SESSION['basket'][$i]="NONE";
                              $_SESSION['baskettime'][$i]="NONE";
                            }
                          }
                        }
                        for ($i=0; $i <sizeof($_SESSION['basket']) ; $i++) {
                          if($_SESSION['basket'][$i]!="NONE"){
                            $sql = "SELECT * FROM fitnessequipment WHERE equipmentID='".$_SESSION['basket'][$i]."'";
                            $result = mysqli_query($conn,$sql);
                            $data = mysqli_fetch_assoc($result);
                            if($_SESSION['baskettime'][$i]!=''){



                            echo "<span class='white' >Name: ".$data['equipmentName']." Duration: ".$_SESSION['baskettime'][$i]." </span>";



                            echo "<a href='?m=".$_SESSION['basket'][$i]."'>Delete</a><br>";
                          }
                          }
                        }

                         ?><br><br><br>
                         <a href="borrow.php" > <button name="button"class="butt">Confirm</button> </a><br><br></div><br><br>
                         <a href="main.php" style="font-size:20px;"><h2><em> back</em></h2></a>


                </div>
            </div>
        </div>
    </section>
    <!-- <h2 class="head">Basket</h2>
    <?php
    if(isset($_GET['m'])){
      $element = $_GET['m'];
      for ($i=0; $i <sizeof($_SESSION['basket']) ; $i++) {
        if($element==$_SESSION['basket'][$i]){
          $_SESSION['basket'][$i]="NONE";
          $_SESSION['baskettime'][$i]="NONE";
        }
      }
    }
    for ($i=0; $i <sizeof($_SESSION['basket']) ; $i++) {
      if($_SESSION['basket'][$i]!="NONE"){
        $sql = "SELECT * FROM fitnessequipment WHERE equipmentID='".$_SESSION['basket'][$i]."'";
        $result = mysqli_query($conn,$sql);
        $data = mysqli_fetch_assoc($result);



        if($_SESSION['baskettime'][$i]!=''){
        echo "Name: ".$data['equipmentName']." Duration: ".$_SESSION['baskettime'][$i]." ";
        echo "<a href='?m=".$_SESSION['basket'][$i]."'>Delete</a><br>";
      }
      }
    }

     ?><br>
     <a href="borrow.php"> <button name="button">Confirm</button> </a>
     <a href="main.php">back</a> -->
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
