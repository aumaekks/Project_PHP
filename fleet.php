<?php
session_start();
if(!isset($_SESSION['Username'])){
  header('location:isNOTLoggin.php');
}
 ?>
<!DOCTYPE html>
<html lang="en">

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

    </head>

    <body>

    <!-- ***** Preloader Start ***** -->
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


    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">fitness<em> equipment</em></a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="man.html">Home</a></li>


                            <li><a href="fleet.html" class="active">POST </a></li>
                            <li><a href="offers.html">Offers</a></li>

                            <li><a href="contact.html">Login</a></li>
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
    <!-- ***** Header Area End ***** -->

    <!-- ***** Call to Action Start ***** -->
    <section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2>Post some  <em>equipment </em></h2><br>
                        <p>Exercise equipment that you would like others to borrow.</p>
                        <form action="add.php"  method="post" >
                            <p>Name of equipment : <input type="text" class="noe" name="eqname" required><br><br>
                            Type :
                             <SELECT name="eqtype" class="sel" >
                              <option value="e1" class="sel1">Weightlifting equipment</option>
                              <option value="e2"class="sel1">Barbells and plates</option>
                              <option value="e3"class="sel1">Resistance bands</option>
                              <option value="e4"class="sel1">Squat rack</option>
                              <option value="e5"class="sel1">Cardio equipment</option>
                              <option value="e6"class="sel1">Rowing machines</option>
                              <option value="e7"class="sel1">Dueling ropes</option>
                            </select><br>
                            Information<br><br>
                            <textarea name="eqinfo" placeholder="Message..." class="tarea" rows="4" cols="80"></textarea><br><br><br><br><br>
                            <input type="submit" class="butt" value="Post"> <input type="reset" class="butt1" value="Cancel"></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Call to Action End ***** -->

    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                  <p>
                      Made By Sarawut,Wittawat,Aekkarat

                  </p>
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

  </body>
</html>
