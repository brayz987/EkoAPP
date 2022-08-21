<?php 

include '../Class/DatosBasicos.php';
session_start();
$userId = $_SESSION['user'];

$actualPassword = $_POST['actualPassword'];
$newPassword = $_POST['newPassword'];
$confPassword = $_POST['confPassword'];


if ($newPassword != $confPassword){
    $message = "Las nuevas contraseñas no coinciden";
    echo json_encode($message);
    exit();
}


$mathPasswordOld = DatosBasicos::comparePassword($userId, $actualPassword);

if($mathPasswordOld == false) {
    $message = "La actual contraseña no coincide";
    echo json_encode($message);
    exit();
}


$data = array();

$data['status'] = json_encode(DatosBasicos::changePassword($userId, $newPassword));
$data['message'] = "La contraseña se ha cambiado exitosamente";

echo json_encode($data);
?>