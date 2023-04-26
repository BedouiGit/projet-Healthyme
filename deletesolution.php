<?php
	include '../controller/solutionc.php';
	$solution=new solutionc();

$solution->Deletesolution($_GET["id"]);
header("Location:listsolution.php");
?>