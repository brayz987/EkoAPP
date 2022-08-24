<?php 

include '../Class/Servicio.php';

extract($_POST); // Create the variables  $fechainicio, $tipoResiduoGeneral, $peso, $direccion, $localidad 

$estado = 'Pendiente';

$objServicio =  new Servicio();
$objServicio->setData($fechainicio,$direccion, $localidad ,$tipoResiduoGeneral, $peso, $estado, $userId );
$objServicio->crearServicio();



// Envio de Mail


header('Location: ../views/dashboard.php');



?>