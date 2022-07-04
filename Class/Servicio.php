<?php 

include_once 'DataBase.php';

class Servicio{
    private $fechaServicio;
    private $fechaCierre;
    private $pesoTotal;
    private $direccion;
    private $localidad;
    private $tipoResiduo;
    private $estado;
    private $id;
    const TABLE = 'servicio';


    function __construct($fechaServicio, $direccion, $localidad, $tipoResiduo ,$pesoTotal, $estado ){
        $this->fechaServicio = $fechaServicio;
        $this->direccion = $direccion;
        $this->localidad = $localidad;
        $this->tipoResiduo = $tipoResiduo;
        $this->pesoTotal = $pesoTotal;
        $this->estado = $estado;

    }

    public function crearServicio(){
        $db = new Database();
        {
            $consulta = $db->prepare('INSERT INTO ' . self::TABLE . '(`fecha_servicio`, `pesoTotal`, `direccion`, `id_tiporesiduo`,  `localidad_id`, `estado`) VALUES ( :fechaServicio,:pesoTotal, :direccion,:tipoResiduo , :localidad, :estado)');
            $consulta->execute(array(
                ':fechaServicio' => $this->fechaServicio,
                ':pesoTotal' => $this->pesoTotal,
                ':direccion' => $this->direccion,
                ':tipoResiduo' => $this->tipoResiduo,
                ':localidad' => $this->localidad,
                ':estado' => $this->estado
            ));
            
        }
        $this->id = $db->lastInsertId();
        $db = null;
    }

    public function getId(){
        return $this->id;
    }

}

?>