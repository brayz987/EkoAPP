<?php 
include 'DatosBasicos.php';

class Colaborador extends DatosBasicos {

    private $tipoUsuario;

    function __construct( $nombre, $identificacion , $direccion , $correo, $contacto, $password, $tipoUsuario = "1"){
        parent::__construct($nombre, $identificacion , $direccion , $correo, $contacto, $password);
        $this->tipoUsuario = $tipoUsuario;
    }
}
?>