<?php 

include '../Class/Servicio.php';


$direccion = $_POST['direccion'];
$ciudad = $_POST['ciudad'];
$tipoResiduo = $_POST['tipoResiduo'];


$objServicio = new Servicio($direccion, $ciudad, $tipoResiduo);
var_dump($objServicio);

?>