<?php 
include 'DatosBasicos.php';

class Admin extends DatosBasicos {

    private $tipoUsuario;

    function __construct( $nombre, $identificacion , $direccion , $correo, $contacto, $password, $tipoUsuario = "2"){
        parent::__construct($nombre, $identificacion , $direccion , $correo, $contacto, $password);
        $this->tipoUsuario = $tipoUsuario;
    }

}
?>