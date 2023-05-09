<?php
require_once '../controller/skincarec.php';

if (isset($_POST['submit'])) {
    // Récupérer les données du formulaire
    $ID = $_POST['ID'];
    $skintype = $_POST['skintype'];
    $problem = $_POST['problem'];

    // Mettre à jour la réservation dans la base de données
    try {
        $pdo = config::getConnexion();
        $query = "UPDATE problems SET skintype = :skintype, problem = :problem WHERE ID = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindValue(":id", $ID);
        $stmt->bindValue(":skintype", $skintype);
        $stmt->bindValue(":problem", $problem);
        $stmt->execute();      
    } catch (PDOException $e) {
        echo "Erreur: " . $e->getMessage();
    }
     // Redirect to showproblem.php
     header("Location: showproblem.php?problem=" . $problem);
     exit;      
}

// Récupérer les données de la réservation à modifier en utilisant l'ID de la réservation
if (isset($_GET['id'])) {
    try {
        $pdo = config::getConnexion();
        $query = "SELECT * FROM problems WHERE ID = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindValue(":id", $_GET['id']);
        $stmt->execute();
        $problems = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Erreur: " . $e->getMessage();
    }
   
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
  <script src="https://kit.fontawesome.com/ac87c673ce.js" crossorigin="anonymous"></script>

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="CSS1/template2.css" rel="stylesheet" />


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
      <a href="addproblem.php" class="btn-get-started">Ajouter un Probleme</a>
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
		  <!--update-->
      <section class="contaner-fluid footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="contact-info">
                        <h2>Mettre à jour vos informations</h2>
                        
                    </div>
                </div>
<div class="col-md-9">
  <div class="contact-form text-center">
  <form action="#" method="post">
          <div class="form-group">
              <label class="control-label col-sm-2" for="ID">ID:</label>
              <div class="col-sm-10">
                  <input type="hidden" name="ID" value="<?php echo $problems['ID']; ?>" readonly>
                  <span><?php echo $problems['ID']; ?></span>
              </div>
          </div>
          <div class="form-group">
              <label class="control-label col-sm-2" for="skintype">Skin Type:</label>
              <div class="col-sm-10">
                  <select class="form-control" id="skintype" name="skintype" required>
                      <option value="">-- Select skin type --</option>
                      <option value="normal" <?php if ($problems['skintype'] == 'normal') {echo 'selected';} ?>>Peau normale</option>
                      <option value="oily" <?php if ($problems['skintype'] == 'oily') {echo 'selected';} ?>>Peau grasse</option>
                      <option value="dry" <?php if ($problems['skintype'] == 'dry') {echo 'selected';} ?>>Peau sèche</option>
                      <option value="combination" <?php if ($problems['skintype'] == 'combination') {echo 'selected';} ?>>Peau mixte</option>
                  </select>
              </div>
          </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="problem">Problem:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="problem" id="problem" value="<?php echo $problems ['problem']; ?>" placeholder="problem" required>
        </div>
      </div>
  </div>
  <div class="form-group">        
    <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default" name="submit">Modify</button>
      </div>
    </div>
</form>
</div>
</div>
</div>    
</div>     
</section>
<!--end update-->
</section>
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

