<?php 

include_once 'DataBase.php';

class Residuo{
    private $nombre;
    private $peso;
    private $cantidad;
    private $idServicio;
    const TABLE = 'residuo';
    
    public function setData($nombre,$peso,$cantidad,$idServicio){
        $this->nombre = $nombre;
        $this->peso = $peso;
        $this->cantidad = $cantidad;
        $this->idServicio = $idServicio;
    }

    public function create(){
        $db = new Database();
        {
            $consulta = $db->prepare('INSERT INTO '.self::TABLE.' (nombre, peso, cantidad, id_servicio) VALUES (:nombre, :peso, :cantidad, :idServicio)');
            $consulta->execute(array(
                ':nombre' => $this->nombre,
                ':peso' => $this->peso,
                ':cantidad' => $this->cantidad,
                ':idServicio' => $this->idServicio,
            ));
        }
        $db = null;
    }


    public function setIdServicio($id){
        $this->idServicio = $id;
    }

    public function getInfo(){
        $db = new Database(); {
            $consultaInventario = $db->prepare('SELECT * FROM '.self::TABLE.' WHERE id_servicio = :idservicio');
            $consultaInventario->execute(array(
                ':idservicio' => $this->idServicio
            ));
            $consultaInventario = $consultaInventario->fetchAll();
        }
        $db = null;
        return $consultaInventario;
    }



}

?>

