<?php 

include '../Class/Residuo.php';

extract($_POST); // Create the variables  $listado_inventario, $peso, $cantidad

$idServicio = $_GET['idServicio'];

$objResiduo =  new Residuo();
$objResiduo->setData($listado_inventario, $peso, $cantidad, $idServicio);
$objResiduo->create();

header('Location: ' . $_SERVER["HTTP_REFERER"] );

?>