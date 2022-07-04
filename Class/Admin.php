<?php 
include 'DatosBasicos.php';

class Admin extends DatosBasicos {


    function __construct($nombre, $identificacion , $direccion , $correo, $contacto, $tipoUsuario = "3")
    {
        parent::setData($nombre, $identificacion , $direccion , $correo, $contacto, $tipoUsuario);
    }

    public function setPassword( $password ){
        parent::setPassword($password);
    }

    // public function

}
?>