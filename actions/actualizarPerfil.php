<?php

include_once '../Class/DatosBasicos.php';

extract($_POST);

// var_dump($_POST);
// var_dump($_FILES);


$user = new DatosBasicos();
$user->setUpdateData($nombre, $direccion, $correo, $contacto, $id);
$user->update();


if ($_FILES['photo']['name'] != "") {
    $user->uploadPhoto($_FILES['photo']);
}


header('Location: ../views/dashboard.php?alert=updateProfileSuccess');
