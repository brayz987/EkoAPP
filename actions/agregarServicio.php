<?php 

include '../Class/Servicio.php';

extract($_POST); // Create the variables  $fechainicio, $tipoResiduoGeneral, $peso, $direccion, $localidad 

$estado = 'Pendiente';

$objServicio =  new Servicio($fechainicio,$direccion, $localidad ,$tipoResiduoGeneral, $peso, $estado );
$objServicio->crearServicio();

echo("Se adiciono correctamente el usuario ".$objServicio->getId()." a la base de batos" );


?>