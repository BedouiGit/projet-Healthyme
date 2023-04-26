<?php

require_once '../controller/solutionc.php';

$solutionc = new solutionc();

$list = $solutionc->listsolution();

?>

<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/ac87c673ce.js" crossorigin="anonymous"></script>
    <title>Document</title>
  </head>
  <body>
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


<div class="my-container">
<h1></h1>
<p> </p>
</div>
  </body>
  </html>