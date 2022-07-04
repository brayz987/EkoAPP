<?php 
include 'DatosBasicos.php';

class Colaborador extends DatosBasicos {


    function __construct($nombre, $identificacion , $direccion , $correo, $contacto, $tipoUsuario = "2"){
        parent::setData($nombre, $identificacion , $direccion , $correo, $contacto, $tipoUsuario);
    }

    public function setPassword($password)
    {
        parent::setPassword( $password);
    }
}
?>