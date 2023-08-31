<?php
session_start();
include 'connectDB.php';
if(!isset($_SESSION['Username'])){
  header('location:isNOTLoggin.php');
}
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
      .l{
        float: right;
      }
      .borrow{
        padding: 20px 50px;
      }
      .d{
        margin-left: 41%;
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
                            <li><a href="confirm.php">Confirm&Delete</a></li>
                            <li><a href='Equipment.php'>Post the Equipment</a></li>
                            <li><a href="main.php" class="active">Equipment List</a></li>

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
                        <h2>Equipment<em>List</em></h2>
                        <p>Find your interested equipment.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
      <br>
      <div class='container'>

        <form  action="" method="get">
          <input type="text" name="search" placeholder="Name of equipment" > <input type="submit"  value="Search">
        </form>
      </div>
      <br><br>

    <?php
    if(isset($_GET['eq'])){
      echo "<div class='row'><div class='container'><div class='col-lg-4 col-md-4'><div class='trainer-item'>";
      echo "<h4>Number of days borrowed</h4>";
      if($_SESSION['eq']!=true){
        echo "<br><form method='get'> <fieldset> <input type='number' name='num' required min='1' max='30'> day.<br><br> <input type='submit'value='Add'></fieldset></form><br>";
      }else{
        $_SESSION['eq']=false;
      }
      echo "</div></div></div></div>";
    }
    if(isset($_GET['eq']) ){
      if(!in_array($_GET['eq'],$_SESSION['basket'])){
        $_SESSION['basket'][] = $_GET['eq'];
      }else{
        $_SESSION['key'] = array_search($_GET['eq'],$_SESSION['basket']);
      }


    }
    if(isset($_GET['num'])){
      if(!isset($_SESSION['key'])){
        $_SESSION['baskettime'][] = $_GET['num'];
      }else{
        $_SESSION['baskettime'][$_SESSION['key']] = $_GET['num'];
      }
    }
    if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
    } else {
    $pageno = 1;
    }
    $no_of_records_per_page = 3;
    $offset = ($pageno-1) * $no_of_records_per_page;

    if(isset($_SESSION['Username'])){
      if(!isset($_GET['search'])||$_GET['search']==''){
        $sql = "SELECT * FROM fitnessequipment inner join equipmenttype on fitnessequipment.typeID = equipmenttype.typeID  inner join user on fitnessequipment.Borrower = user.ID WHERE status='1' LIMIT ".$offset.",
        ".$no_of_records_per_page." ";

      }else{
        $sql = "SELECT * FROM fitnessequipment inner join equipmenttype on fitnessequipment.typeID = equipmenttype.typeID  inner join user on fitnessequipment.Borrower = user.ID WHERE  equipmentName LIKE '%".$_GET['search']."%'
        LIMIT ".$offset.", ".$no_of_records_per_page." ";


      }

      $result = mysqli_query($conn,$sql);
      $total_pages_sql = mysqli_query($conn,"SELECT * FROM fitnessequipment WHERE status='1'");
      $resultpage = mysqli_query($conn,$total_pages_sql);
      $total_rows = mysqli_num_rows($total_pages_sql);
      $total_pages = ceil($total_rows / $no_of_records_per_page);

      ?>
      <section class="section" id="trainers">
        <div class='container'>
        <div class='row'>
      <?php
      while($data = mysqli_fetch_assoc($result)){
        if($data['status']==1){
        echo "<div class='col-lg-4 col-md-4'>";
        echo "<div class='trainer-item'>";
        if($data['typeID']=='e1'){
          echo "<div class='image-thumb' ><img src='assets/images/offer-1-720x480.jpg' alt=''></div>";
        }else if($data['typeID']=='e2'){
          echo "<div class='image-thumb' ><img src='assets/images/offer-2-720x480.jpg' alt=''></div>";
        }else if($data['typeID']=='e3'){
          echo "<div class='image-thumb' ><img src='assets/images/Capture.jpg' alt=''></div>";
        }else if($data['typeID']=='e4'){
          echo "<div class='image-thumb' ><img src='assets/images/Hc55ac9f7f03c4751b9850634712b1effz.jpg' alt=''></div>";
        }else if($data['typeID']=='e5'){
          echo "<div class='image-thumb' ><img src='assets/images/1565364920-wh-exercise-equipment-10-1565364914.jpg' alt=''></div>";
        }else if($data['typeID']=='e6'){
          echo "<div class='image-thumb' ><img src='assets/images/1556287331-concept2-model-d-1556287325.png' alt=''></div>";
        }else if($data['typeID']=='e7'){
          echo "<div class='image-thumb' ><img src='assets/images/51mLXo6bl4L._AC_UL600_SR600,600_.jpg' alt=''></div>";
        }

        echo "<div class='down-content'>";
        echo "<span><span style='font-size: 20px;font-weight: 20px;'>TYPE: </span> ".$data['typeName']."</span>";
        echo "<h4>".$data['equipmentName']."</h4> ";
        echo "<br> Information: ".$data['Information']."</p>";
        echo "Number time of borrowing: ".$data['numberoftime']."";
        $sqlk = "SELECT * FROM review WHERE lenderID='".$data['Borrower']."' ";
        $resqlk = mysqli_query($conn,$sqlk);
        $numresqlk = mysqli_num_rows($resqlk);
        $d = mysqli_fetch_assoc($resqlk);
        echo "<br>Lender: ".$data['Username']."<br>";
        echo "<br>Like: ".$numresqlk."<br><br>";
        if($data['Borrower']==$_SESSION['index']){
          echo "<a data-toggle='modal' data-target='#exampleModal'>Your Post</a><br><br>";

        }else{
        echo "<a href='?eq=".$data['equipmentID']."'>+Add</a><br><br>";

      }
      echo "</div></div></div>";

      }
      }
      ?>
    </div></div>
    </section>
      <nav>
        <ul class="pagination pagination-lg justify-content-center">
          <li><a href="?pageno=1"> First </a></li>
          <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
              <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>"> / Prev / </a>
          </li>
          <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
              <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>"> / Next / </a>
          </li>
            <li><a href="?pageno=<?php echo $total_pages; ?>"> Last </a></li>

        </ul>
        <br>
      </nav>
      <?php
      echo " <div class='d' ><a href='basket.php' class='borrow'><button class='borrow'>Borrow</button></a> </div><br>";
    }else {
      $_SESSION['isNOTLoggin'] = true;
      include 'isNOTLoggin.php';
    }


     ?>

   <footer>
       <div class="container">
           <div class="row">
               <div class="col-lg-12">
                 <h3>User list</h3>
                 <ul>
                   <?php
                   $sqluser = "SELECT * FROM user";
                   $reuser = mysqli_query($conn,$sqluser);
                   $numis = 0;
                   while($datauser=mysqli_fetch_assoc($reuser)){
                     if($numis==5){
                       echo "<br>";
                       $numis = 0;
                     }
                     echo " -".$datauser['Username']."-";
                   }
                    ?>
                 </ul>
               </div>
           </div>
       </div>
   </footer>
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
