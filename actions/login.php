<?php 

include '../Class/DatosBasicos.php';

$correo = $_POST['correo'] ;
$password = $_POST['password'];

$user = new DatosBasicos();

echo ($user->verifyUser($correo,$password));


?>