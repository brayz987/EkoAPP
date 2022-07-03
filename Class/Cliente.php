<?php 
include 'DatosBasicos.php';

class Cliente extends DatosBasicos {

    private $tipoUsuario;

    function __construct($nombre, $identificacion , $direccion , $correo, $contacto, $tipoUsuario = "0" ){
        parent::setData($nombre, $identificacion , $direccion , $correo, $contacto);
        $this->tipoUsuario = $tipoUsuario;
    }

    function setPassword($password)
    {
        parent::setPassword($password);
    }
}
?>