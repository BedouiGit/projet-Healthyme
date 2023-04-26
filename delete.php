<?php
	include '../controller/problemsc.php';
	$problems=new problemsc();

$problems->Deleteproblem($_GET["id"]);
header("Location:listProblems.php");
?>