<?php 

class Servicio{
    private $fechaServicio;
    private $fechaCierre;
    private $pesoTotal;
    private $direccion;
    private $ciudad;
    private $tipoResiduo;


    function __construct($direccion,$ciudad, $tipoResiduo ){
        $this->direccion = $direccion;
        $this->ciudad = $ciudad;
        $this->tipoResiduo = $tipoResiduo;
    }

}

?>