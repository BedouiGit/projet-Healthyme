<?php
require_once '../controller/skincarec.php';
require_once '../model/problems.php';
$problems = null;
$problemsc = new problemsc();
if (isset($_POST['submit'])) {
    if (
        isset($_POST['skintype'])
        && isset($_POST['problem'])
    ) {

        if (
            !empty($_POST['skintype']) &&
            !empty($_POST['problem'])  
        ) 
        {
          $problems = new problems(
            null,
            $_POST['skintype'],
            $_POST['problem'],
            false
        );

           $problemsc->addproblem($problems);
            // Redirect user to list.php with problem parameters
            $problem = $_POST['problem'];
            header("Location: showproblem.php?problem=$problem");
            exit();
        } else {
            $error = "Missing information";
        }
    }
    $_POST = array();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>HealthifyMe</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/hh.png" rel="icon">
  <link href="assets/img/h.png" rel="h">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="CSS1/template.css" rel="stylesheet" />


</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex justify-content-between align-items-center">

      <div id="logo">
        <!--<a href="index.html"><img src="assets/img/logo.png" alt=""></a>-->
        <!-- Uncomment below if you prefer to use a text logo -->
        <h1><a href="index.html">HealthifyMe</a></h1>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#services">nutrition</a></li>
          <li><a class="nav-link scrollto " href="#portfolio">Fitness</a></li>
          <li><a class="nav-link scrollto" href="addproblem.php">Skin Care</a></li>
          <li><a class="nav-link scrollto" href="#contact">Forum</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container" data-aos="zoom-in" data-aos-delay="100">
      <h1>Bienvenue</h1>
      <h2>“Pour un beauté inspirée de la vie naturelle”</h2>
      <a href="#about" class="btn-get-started">Ajouter un Probleme</a>
	  <a href="searsh.php" class="btn-get-started">Voir votre Solution</a>
    </div>
  </section><!-- End Hero Section -->

  <main id="main">
	<div class="my-container">
		<h1></h1>
		<p> </p>
		</div>
    <!-- ======= About Section ======= -->
    <section id="about">
	<!--footer-->
<section class="contaner-fluid footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="contact-info">
                    <img src="https://image.ibb.co/kUASdV/contact-image.png" alt="image"/>
                    <h2>Tell us more</h2>
                    <h4>We would love to know more about your skin!</h4>
                </div>
            </div>
            <div class="col-md-9">
                <div class="contact-form text-center">
                    <form action="#" method="post">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="skintype">Skin Type:</label>
                            <div class="col-sm-10">          
                                <select class="form-control" id="skintype" name="skintype">
                                    <option value="normal">Peau normale</option>
                                    <option value="oily">Peau grasse</option>
                                    <option value="dry">Peau sèche</option>
                                    <option value="combination">Peau mixte</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="problem">Problème de Peau:</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="5" id="problem" name="problem"></textarea>
                            </div>
                        </div>
                        <div class="form-group">        
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default" name="submit">submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>    
    </div>     
</section>
</section>
<!--end footer-->

  <!-- End About Section -->
  <div class="my-container">
	<h1></h1>
	<p> </p>
	</div>
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">

      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>HealthifyMe</strong>. All Rights Reserved
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>

