
<?php
require_once '../controller/solutionc.php';
require_once '../model/solution.php';
require_once '../config.php';

$solution = null;
$solutionc = new solutionc();
if (isset($_POST['submit'])) {
    if (
        isset($_POST['skintype'])
        && isset($_POST['product'])
        && isset($_POST['producttype'])
    ) {

        if (
            !empty($_POST['skintype']) &&
            !empty($_POST['product']) &&
            !empty($_POST['producttype'])
        ) {
            $solution = new solution(
                null,
                $_POST['skintype'],
                $_POST['product'],
                $_POST['producttype'] 
            );


            $solutionc->addsolution($solution);
        } else
            $error = "Missing information";
    }
    $_POST = array();
}
?>


<?php

require_once '../controller/solutionc.php';

$solutionc = new solutionc();

$list = $solutionc->listsolution();

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Admin</title>
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
        <!--<a href="index.html"><img src="assets/img/healthy.png" alt=""></a>-->
        <!-- Uncomment below if you prefer to use a text logo -->
        <h1><a href="index.html">Healthyfy Me</a></h1>
      </div>
      <nav id="navbar" class="navbar">
        <ul>
        <li><a class="nav-link scrollto " href="tempback.php">Home</a></li>
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
          <h2></h2>
          <ol>
            <li><a href=""></a>Admin</li>
            <li>ADD Products</li>
          </ol>
        </div>

      </div>
    </section><!-- Breadcrumbs Section -->
    <!--  list problems    -->
    <div class="my-container">
<h1></h1>
<p> </p>
</div>
     <!--  ENDlist problems    -->
    <!-- ======= ADD ======= -->
    <section class="container-fluid footer">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <div class="contact-info">
          <img src="https://image.ibb.co/kUASdV/contact-image.png" alt="image" />
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
              <label class="control-label col-sm-2" for="product">Product:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="product" placeholder="Enter Product" name="product">
              </div>
            </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="producttype">Product Type:</label>
              <div class="col-sm-10">
                <select class="form-control" id="producttype" name="producttype">
                  <option value="Cleanser">Cleanser</option>
                  <option value="Exfoliator">Exfoliator</option>
                  <option value="Treatment">Treatment</option>
                  <option value="Serum">Serum</option>
                  <option value="Face Oil">Face Oil</option>
                  <option value="Sunscreen">Sunscreen</option>
                  <option value="Moisturizer">Moisturizer</option>
                  <option value="Chemical Peel">Chemical Peel</option>
                  <option value="Toner">Toner</option>
                  <option value="Face Mask">Face Mask</option>
                  <option value="Eye Cream">Eye Cream</option>
                </select>
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

<!--js-->
<script>// Validation using addEventListener method
const form = document.querySelector('form');
const inputs = document.querySelectorAll('input, select');

form.addEventListener('submit', function (e) {
  e.preventDefault();

  let flag = true;

  inputs.forEach(input => {
    if (!input.value) {
      input.parentElement.classList.add('has-error');
      flag = false;
    } else {
      input.parentElement.classList.remove('has-error');
    }
  });

  if (flag) {
    alert('Form submitted successfully!');
    form.reset();
  } else {
    alert('Please fill all the required fields.');
  }
});

// Validation using onKeyup event
const productInput = document.querySelector('#product');
const productLabel = document.querySelector('label[for="product"]');

productInput.addEventListener('keyup', function () {
  if (productInput.value.length < 3) {
    productLabel.classList.add('text-danger');
    productInput.classList.add('is-invalid');
  } else {
    productLabel.classList.remove('text-danger');
    productInput.classList.remove('is-invalid');
    productInput.classList.add('is-valid');
  }
});
</script><!-- End ADD -->
<div class="my-container">
<h1></h1>
<p> </p>
</div>
<!-- List solution -->
<div class="form mt-5">
      <form action="#" method="post" role="form" class="php-email-form">

          <div class="contact">

              <table border="1" align="center" style="border-collapse: separate; border-spacing: 10px;">

                  <tr>


                      <th>ID </th>
                      <th>Skin Type </th>
                      <th>Product</th>
                      <th>Product Type</th>
                      <th>Modify</th>
                      <th>Delete</th>

                  </tr>

                 <?php
                  foreach ($list as $solutionc) {



                  ?>

                      <tr>

                          <td><?php echo $solutionc['id']; ?></td>
                          <td><?php echo $solutionc['skintype']; ?></td>
                          <td><?php echo $solutionc['product']; ?></td>
                          <td><?php echo $solutionc['producttype']; ?></td>
                          <?php
                          $show_update = true;
                          ?>

                          <td class="modify"> <?php if ($show_update) : ?>
                                  <a href="updatesolution.php?id=<?php echo $solutionc['id']; ?>"><i class="fa-solid fa-pen-to-square"></i> </a>
                              <?php endif; ?>
                          </td>




                          <?php
                          $show_delete = true;
                          ?>
                          <td class="delete"> <?php if ($show_delete) : ?>
                                  <a href="deletesolution.php?id=<?php echo $solutionc['id']; ?>"><i class="fa-solid fa-trash-can "></i></i></a>
                              <?php endif; ?>
                          </td>




                      </tr>

                  <?php } ?>
                          </table>


<div class="my-container">
<h1></h1>
<p> </p>
</div>
<!-- END List solution -->
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