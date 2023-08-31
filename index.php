<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <title>Borrow Fitness Equipment</title>

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
                        <a href="index.php" class="logo">fitness <em> equipment</em></a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="index.php" class="active">Home</a></li>

                            <?php if(isset($_SESSION['Username'])) ?>
                            <li><a href="offers.php">Equipment List</a></li>
                            <?php if(isset($_SESSION['Username'])){
                                echo "<li><a href='fleet.php'>POST </a></li>";
                            }?>
                            <li><a href="login.php">Login</a></li>
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

    <!-- ***** Main Banner Area Start ***** -->
    <div class="main-banner" id="top">
        <video autoplay muted loop id="bg-video">
            <source src="assets/images/video.mp4" type="video/mp4" />
        </video>

        <div class="video-overlay header-text">
            <div class="caption">
                <h6>
                    make the body healthy</h6>
                <h2><em>
                    borrow</em>fitness equipment</h2>

            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

   <!-- ***** Offers Starts ***** -->
    <section class="section" id="trainers">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>equipment fitness <em>popular</em></h2>
                        <img src="assets/images/line-dec.png" alt="">
                        <p>Many people want to start exercising because they want to be healthy. And this exercise equipment that most people tend to use.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="trainer-item">
                        <div class="image-thumb">
                            <img src="assets/images/offer-1-720x480.jpg" alt="">
                        </div>
                        <div class="down-content">
                            <h4>DUMBBELL</h4>
                            <p>Individuals can use dumbbells for a range of exercises, including resistance and cardio routines. Dumbbells are some of the most versatile weights because people can use them to work their core, upper body, and lower body.</p>
                            <ul class="social-icons">
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="trainer-item">
                        <div class="image-thumb">
                            <img src="assets/images/offer-2-720x480.jpg" alt="">
                        </div>
                        <div class="down-content">
                            <h4>BARBELL</h4>
                            <p>A barbell is a piece of exercise equipment used in weight training, bodybuilding, weightlifting, powerlifting and strongman, consisting of a long bar, usually with weights attached at each end. <br><br></p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="trainer-item">
                        <div class="image-thumb">
                            <img src="assets/images/offer-3-720x480.jpg" alt="">
                        </div>
                        <div class="down-content">

                            <h4>BENCH</h4>
                            <p>increasing upper body strength, improving muscular endurance, and even preparing your upper body to do movements like pushups. <br><br><br></p>

                        </div>
                    </div>
                </div>
            </div>

            <br>


        </div>
    </section>

    <!-- ***** Blog Start ***** -->
    <section class="section" id="our-classes">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>
                            Things you should <em>know</em></h2>
                        <img src="assets/images/line-dec.png" alt="">
                        <p>Basic things that exercisers should know to keep their bodies healthy and not get into accidents.</p>
                    </div>
                </div>
            </div>
            <div class="row" id="tabs">
              <div class="col-lg-4">
                <ul>
                  <li><a href='#tabs-1'>
                    Why make your body strong?</a></li>
                  <li><a href='#tabs-2'>Do we need equipments?</a></li>
                  <li><a href='#tabs-3'>Precautions during exercise.</a></li>
                </ul>
              </div>
              <div class="col-lg-8">
                <section class='tabs-content'>
                  <article id='tabs-1'>
                    <img src="assets/images/blog-image-1-940x460.jpg" alt="">
                    <h4>Why make your body strong?</h4>
                    <p>Exercise delivers oxygen and nutrients to your tissues and helps your cardiovascular system work more efficiently. And when your heart and lung health improve, you have more energy to tackle daily chores.</p>
                  </article>
                  <article id='tabs-2'>
                    <img src="assets/images/blog-image-2-940x460.jpg" alt="">
                    <h4>Do we need equipments?</h4>

                    <p>
                        When it comes to exercises, everyone has different preferences. Some prefer easy walking or jogging, which requires no gear or equipment, other than good running shoes. Others like to use hand-held weights, and still, others prefer full gym equipment for their daily workout routines.

                        The type of equipment and gear chose will vary depending on an individual's fitness and health goals. Here are some benefits of using proper workout tools to enhance health and body.</p>

                  </article>
                  <article id='tabs-3'>
                    <img src="assets/images/blog-image-3-940x460.jpg" alt="">
                    <h4>Precautions during exercise.</h4>
                    <p>When people begin a new exercise program, they often push their bodies too far and put themselves at risk for injury. The common notion that exercise must be really hard or painful to be beneficial is simply wrong. Moderation is the key to safe exercise. Safe exercise programs start slowly and gradually build up in intensity, frequency, and duration.</p>

                  </article>
                </section>
              </div>
            </div>
        </div>
    </section>
    <!-- ***** Blog End ***** -->



    <!-- ***** Testimonials Item Start ***** -->

    <!-- ***** Testimonials Item End ***** -->

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
