<?php


$nombre = $_POST['nombre'];
$identificacion = $_POST['identificacion'];
$direccion = $_POST['direccion'];
$correo = $_POST['correo'];
$contacto = $_POST['contacto'];
$tipoUsuario = $_POST['tipoUsuario'];
$password = $_POST['password'];


if ($tipoUsuario == "Colaborador") {
    include '../Class/Colaborador.php';
    $objUsuario = new Colaborador($nombre, $identificacion, $direccion, $correo, $contacto);
    $objUsuario->setPassword($password);
    $objUsuario->crearCuenta();
}
if ($tipoUsuario == "Cliente") {
    include '../Class/Cliente.php';
    $objUsuario = new Cliente($nombre, $identificacion, $direccion, $correo, $contacto);
    $objUsuario->setPassword($password);
    $objUsuario->crearCuenta();
}
if ($tipoUsuario == "Admin") {
    include '../Class/Admin.php';
    $objUsuario = new Admin($nombre, $identificacion, $direccion, $correo, $contacto);
    $objUsuario->setPassword($password);
    $objUsuario->crearCuenta();
}

$objUsuario->uploadPhoto($_FILES['photo']);


header('Location: ../views/login.php?alert=userCreated');



?>
