<?php  


require_once '../Class/Sede.php';

extract($_POST); // crear las variables $nombre, $localidad, $direccion, $servicios

session_start();

$user = $_SESSION['user'];

$sede = new Sede($nombre, $direccion, $servicios, $localidad, $user);
$sede->crear();

header('Location: ../views/sedes.php?alert=sedeAdd');

?>