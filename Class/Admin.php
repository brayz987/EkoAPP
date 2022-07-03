<?php 
include 'DatosBasicos.php';

class Admin extends DatosBasicos {

    private $tipoUsuario;


    function __construct($nombre, $identificacion , $direccion , $correo, $contacto, $tipoUsuario = "2")
    {
        parent::setData($nombre, $identificacion , $direccion , $correo, $contacto);
        $this->tipoUsuario = $tipoUsuario;
    }

    public function setPassword( $password ){
        parent::setPassword($password);
    }

}
?>