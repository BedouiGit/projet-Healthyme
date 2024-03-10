<?php
include '../Controller/exerciceC.php';
include '../Controller/programmeC.php';


$exerciceC = new exerciceC();
$list = $exerciceC->listExercice();

 $programmeC = new programmeC();
$listp = $programmeC->listProgram(); 
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
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center ">
    <div class="container d-flex justify-content-between align-items-center">

      <div id="logo">
        <!--<a href="index.html"><img src="assets/img/logo.png" alt=""></a>
         Uncomment below if you prefer to use a text logo -->
        <h1><a href="index.html">HealthifyMe</a></h1>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="index.html">return home</a></li>
          <!-- <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">nutrition</a></li>
          <li><a class="nav-link scrollto " href="#portfolio">Fitness</a></li>
          <li><a class="nav-link scrollto" href="#team">Skin Care</a></li>
          <li><a class="nav-link scrollto" href="#contact">Forum</a></li> -->
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Fitness Details</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li><a href="portfolio.html">Fitness</a></li>
            <li>More Details</li>
          </ol>
        </div>

      </div>
    </section><!-- Breadcrumbs Section -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">

      <center>
        <h1>Exercice List</h1>
        
    </center>
    <table border="1" align="center" width="70%">
        <tr>
            <th>Id Exercice</th>
            <th>nom Exercice</th>
            <th>Categorie</th>
            
        </tr>
        <?php
        foreach ($list as $exercice) {
        ?>
            <tr>
                <td><?= $exercice['ide']; ?></td>
                <td><?= $exercice['nomEx']; ?></td>
                <td><?= $exercice['categorie']; ?></td>
                
            </tr>
        <?php
        }
        ?>
    </table>

  <body>

    <center>
        
        <h2>
            <a href="addProgram.php">Choose your Program</a>
        </h2>
    </center>
    <table border="1" align="center" width="70%">
        <tr>
            <th>ID program</th>
            <th>Objectif</th>
            <th>ID Exercice</th>
      
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <?php
        foreach ($listp as $programme) {
        ?>
            <tr>
                <td><?= $programme['idp']; ?></td>
                <td><?= $programme['objectif']; ?></td>
                <td><?= $programme['idExercice']; ?></td>
                
                <td align="center">
                    <form method="POST" action="updateProgram.php">
                        <input type="submit" name="update" value="Update">
                        <input type="hidden" value=<?PHP echo $programme['idp']; ?> name="idp">
                    </form>
                </td>
                <td>
                    <a href="deleteProgram.php?idp=<?php echo $programme['idp']; ?>">Delete</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body> 
    

    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer  id="footer">
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
