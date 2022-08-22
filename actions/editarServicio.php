<?php 

include '../Class/Servicio.php';

extract($_POST); // Create the variables  $fechainicio, $tipoResiduoGeneral, $peso, $direccion, $localidad , $idServicio, $idUser



$objServicio =  new Servicio();
$objServicio->setEditdata($fechainicio, $tipoResiduoGeneral , $peso, $direccion , $localidad, $idServicio, $idUser );
$objServicio->saveEdit();


header('Location: ../views/editarServicio.php?id='.$idServicio.'&view=edit&alert=editsuccess');



?>