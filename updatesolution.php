<?php
require_once '../controller/solutionc.php';
require_once '../model/solution.php';
require_once '../config.php';

if (isset($_POST['submit'])) {
    // Récupérer les données du formulaire
    $id = $_POST['id'];
    $skintype = $_POST['skintype'];
    $product = $_POST['product'];
    $producttype = $_POST['producttype'];

    // Mettre à jour la réservation dans la base de données
    $pdo = config::getConnexion();
    try {
        $query = "UPDATE solution SET skintype = :skintype, product = :product, producttype = :producttype WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindValue(":id", $id);
        $stmt->bindValue(":skintype", $skintype);
        $stmt->bindValue(":product", $product);
        $stmt->bindValue(":producttype", $producttype);
        $stmt->execute();
        // Redirect to listProbSol.php
        header("Location: templateB.php");
        exit;
        echo "Les informations ont été modifiées avec succès";
    } catch (PDOException $e) {
        echo "Erreur: " . $e->getMessage();
    }
}

// Récupérer les données de la réservation à modifier en utilisant l'ID de la réservation
if (isset($_GET['id'])) {
    $pdo = config::getConnexion();
    try {
        $query = "SELECT * FROM solution WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindValue(":id", $_GET['id']);
        $stmt->execute();
        $solution = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Erreur: " . $e->getMessage();
    }

    $_POST = array();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Portfolio Details - Regna Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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

  <!-- =======================================================
  * Template Name: Regna
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/regna-bootstrap-onepage-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center ">
    <div class="container d-flex justify-content-between align-items-center">

      <div id="logo">
        <a href="index.html"><img src="assets/img/logo.png" alt=""></a>
        <!-- Uncomment below if you prefer to use a text logo -->
        <!--<h1><a href="index.html">Regna</a></h1>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto " href="templateB.php">Products</a></li>
          <li><a class="nav-link scrollto" href="listProblems.php">Problems</a></li>
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
          <h2>Portfolio Details</h2>
          <ol>
            <li><a href="">Admin</a></li>
            <li>List of problems</li>
          </ol>
        </div>

      </div>
    </section><!-- Breadcrumbs Section -->

    <!-- ======= update ======= -->
    <div class="col-md-9">
        <div class="contact-form text-center">
            <form action="#" method="post">
            <div class="form-group">
    <label class="control-label col-sm-2">ID:</label>
    <div class="col-sm-10">
        <input type="hidden" name="id" value="<?php echo $solution['id']; ?>" readonly>
        <span><?php echo $solution['id']; ?></span>
    </div>
</div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="skintype">Skin Type:</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="skintype" name="skintype" placeholder="Skin Type" required>
                            <option value="normal" <?php if ($solution['skintype'] == 'normal') {echo 'selected';} ?>>Peau normale</option>
                            <option value="oily" <?php if ($solution['skintype'] == 'oily') {echo 'selected';} ?>>Peau grasse</option>
                            <option value="dry" <?php if ($solution['skintype'] == 'dry') {echo 'selected';} ?>>Peau sèche</option>
                            <option value="combination" <?php if ($solution['skintype'] == 'combination'){ echo 'selected'; } ?>>Peau mixte</option>
</select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="product">Product:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="product" id="product" value="<?php echo $solution ['product']; ?>" placeholder="product  " required>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="producttype">Product Type:</label>
          <div class="col-sm-10">
          <select class="form-control" id="producttype" name="producttype" placeholder="Product Type" required>
  <option value="Cleanser" <?php if ($solution['producttype'] == 'Cleanser') { echo 'selected'; } ?>>Cleanser</option>
  <option value="Exfoliator" <?php if ($solution['producttype'] == 'Exfoliator') { echo 'selected'; } ?>>Exfoliator</option>
  <option value="Treatment" <?php if ($solution['producttype'] == 'Treatment') { echo 'selected'; } ?>>Treatment</option>
  <option value="Serum" <?php if ($solution['producttype'] == 'Serum') { echo 'selected'; } ?>>Serum</option>
  <option value="Face Oil" <?php if ($solution['producttype'] == 'Face Oil') { echo 'selected'; } ?>>Face Oil</option>
  <option value="Sunscreen" <?php if ($solution['producttype'] == 'Sunscreen') { echo 'selected'; } ?>>Sunscreen</option>
  <option value="Moisturizer" <?php if ($solution['producttype'] == 'Moisturizer') { echo 'selected'; } ?>>Moisturizer</option>
  <option value="Chemical Peel" <?php if ($solution['producttype'] == 'Chemical Peel') { echo 'selected'; } ?>>Chemical Peel</option>
  <option value="Toner" <?php if ($solution['producttype'] == 'Toner') { echo 'selected'; } ?>>Toner</option>
</select>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default" name="submit">Modify</button>
          </div>
        </div>
      </form>
    </div>
  </div> <!-- End update -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">

      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>Regna</strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!--
        All the links in the footer should remain intact.
        You can delete the links only if you purchased the pro version.
        Licensing information: https://bootstrapmade.com/license/
        Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Regna
      -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


</body>

</html>