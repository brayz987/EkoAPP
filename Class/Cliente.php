<?php 
include 'DatosBasicos.php';

class Cliente extends DatosBasicos {

    private $tipoUsuario;

    function __construct( $nombre, $identificacion , $direccion , $correo, $contacto,$password, $tipoUsuario = "0"){
        parent::__construct($nombre, $identificacion , $direccion , $correo, $contacto,$password);
        $this->tipoUsuario = $tipoUsuario;
    }
    
}
?>