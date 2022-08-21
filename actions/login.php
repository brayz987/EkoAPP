<?php 

include '../Class/DatosBasicos.php';

$correo = $_POST['correo'] ;
$password = $_POST['password'];

$user = DatosBasicos::login($correo,$password);

if($user == false){
    header('location: /ekoapp/views/inicioSesion.php?message=userBad');
    exit();
}

if($user !== []){
    session_start();
    $_SESSION['user'] = $user['id'];
    $_SESSION['name'] = $user['nombre'];
    $_SESSION['role'] = $user['role'];
    header('location: /ekoapp');
}


?>