<?php  


require_once '../Class/Sede.php';

extract($_POST); // crear las variables $nombre, $localidad, $direccion, $servicios, $id
var_dump($_POST);
Sede::editar($nombre, $direccion, $servicios, $localidad, $id);
header('Location: ../views/sedes.php?alert=sedeEdit');

?>