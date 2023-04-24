<?php
include '../Controller/recettec.php';
$recettec = new recettec();
$recettec->deleterecette($_GET["idr"]);
header('Location:listrecettes.php');
