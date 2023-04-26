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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
</script>
</body>
</html>
