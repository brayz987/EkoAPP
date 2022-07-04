<?php 
include 'DatosBasicos.php';

class Cliente extends DatosBasicos {

    function __construct($nombre, $identificacion , $direccion , $correo, $contacto, $tipoUsuario = "1" ){
        parent::setData($nombre, $identificacion , $direccion , $correo, $contacto, $tipoUsuario);
    }

    function setPassword($password)
    {
        parent::setPassword($password);
    }
}
?>