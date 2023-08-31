<?php
session_start();
if(!isset($_SESSION['Username'])){
  header('location:isNOTLoggin.php');
}
include 'connectDB.php';
if(!isset($_SESSION['Username'])){
  header('location:isNOTLoggin.php');
}
 ?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


<title>Post Some Equipment</title>



<style>
  .card {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    max-width: 300px;
    margin: auto;
    text-align: center;
    font-family: arial;
  }

  .title {
    color: grey;
    font-size: 18px;
  }

  button {
    border: none;
    outline: 0;
    display: inline-block;
    padding: 8px;
    color: white;
    background-color: #000;
    text-align: center;
    cursor: pointer;
    width: 100%;
    font-size: 18px;
  }

  a {
    text-decoration: none;
    font-size: 22px;
    color: black;
  }

  button:hover, a:hover {
    opacity: 0.7;
  }
  body {
  background-image: url("assets/images/banner-image-1-1920x500.jpg");
  background-color: rgba(35,45,57,0.8);
  }

  .main1{
    border:1;
    background-color:white;
    margin-top:50px;
    border-radius:7px;
  }
  .p sign{
    background-color:white;
  }
</style>
</head>
<body>







<div class="card">
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




  <div class="main1">
    <br>
  <h2 style="text-align:center">User Profile</h2>

<i class="fa fa-address-book-o" style="font-size:125px"></i>

  <?php
    $sql = "SELECT * FROM user WHERE Username = '".$_SESSION['Username']."'";
    $result = mysqli_query($conn,$sql);
    $data = mysqli_fetch_assoc($result);
    $name = $data['Username'] ;
    $email = $data['Email'];
    $phone = $data['Phone'];



    echo "<br><br>"."Username: ".$name."<a href='?m=1'> Edit</a><br><br>";
    echo "Email: ".$email."<a href='?m=2'> Edit</a><br><br>";
    echo "Phone: ".$phone."<a href='?m=3'> Edit</a><br><br>";
    echo "<a href='?m=4'>Change Password</a><br>";
    ?>

    <?php
    if($_GET['m']==1){
    echo "<form action='Edit.php' method='post'>";
    echo "<input type='text' name='name' value='".$name."'>";
    echo "<input type='submit' value='Change'>";
    echo "</form>";
  }else if($_GET['m']==2){
    echo "<form action='Edit.php' method='post'>";
    echo "<input type='text' name='email' value='".$email."'>";
    echo "<input type='submit' value='Change'>";
    echo "</form>";
  }else if($_GET['m']==3){
    echo "<form action='Edit.php' method='post'>";
    echo "<input type='text' name='phone' value='".$phone."'>";
    echo "<input type='submit' value='Change'>";
    echo "</form>";
  }else if($_GET['m']==4){
    echo "<form action='Edit.php' method='post'>";
    echo "<input type='password' name='password'>";
    echo "<input type='submit' value='Change'>";
    echo "</form>";
  }
     ?>
     <br>
     <a href="logout.php"> <button >LOGOUT</button> </a>


    <p> <a  href="main.php"> <button >HOME</button> </a><br></p>



  </div>




</div>









 <!-- jQuery -->
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
