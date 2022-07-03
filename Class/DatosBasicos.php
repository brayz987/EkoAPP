<?php

class DatosBasicos{

    private $nombre;
    private $identificacion ;
    private $direccion ;
    private $correo ;
    private $contacto ;
    private $password;


    // function __construct( )
    // {

    // }

    public function setData ($nombre, $identificacion , $direccion , $correo, $contacto){
        $this->nombre = $nombre;
        $this->identificacion = $identificacion;
        $this->direccion = $direccion;
        $this->correo = $correo;
        $this->contacto = $contacto;
    }

    public function setPassword($password){
        $this->password = $password;
    }

    public function verifyUser($correo,$password){
        // Verificar Usuario en la Base de Datos, return true
        return true;
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


