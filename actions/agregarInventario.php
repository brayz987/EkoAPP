<?php 

include '../Class/Residuo.php';

extract($_POST); // Create the variables  $nombre, $peso, $cantidad

$idServicio = $_GET['idServicio'];

$objResiduo =  new Residuo();
$objResiduo->setData($nombre, $peso, $cantidad, $idServicio);
$objResiduo->create();

header('Location: ' . $_SERVER["HTTP_REFERER"] );

?>