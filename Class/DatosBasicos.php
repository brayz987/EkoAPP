<?php

class DatosBasicos{

    private $nombre;
    private $identificacion ;
    private $direccion ;
    private $correo ;
    private $contacto ;
    private $password;


    function __construct( $nombre, $identificacion , $direccion , $correo, $contacto, $password)
    {
        $this->nombre = $nombre;
        $this->identificacion = $identificacion;
        $this->direccion = $direccion;
        $this->correo = $correo;
        $this->contacto = $contacto;
        $this->password = $password;
    }

    public function getData(){
        echo("Nombre: {$this->nombre} </br>
        Identificacion: {$this->identificacion}</br>
        Direccion: {$this->direccion}</br>
        Correo: {$this->correo}</br>
        Contacto: {$this->contacto}");
    }



}
?>


