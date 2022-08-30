<?php 

include_once 'DataBase.php';

class Residuo{
    private $id_listado_inventario;
    private $peso;
    private $cantidad;
    private $idServicio;
    const TABLE = 'residuo';
    
    public function setData($id_listado_inventario,$peso,$cantidad,$idServicio){
        $this->id_listado_inventario = $id_listado_inventario;
        $this->peso = $peso;
        $this->cantidad = $cantidad;
        $this->idServicio = $idServicio;
    }

    public function create(){
        $db = new Database();
        {
            $consulta = $db->prepare('INSERT INTO '.self::TABLE.' (id_listado_inventario, peso, cantidad, id_servicio) VALUES (:id_listado_inventario, :peso, :cantidad, :idServicio)');
            $consulta->execute(array(
                ':id_listado_inventario' => $this->id_listado_inventario,
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
            $consultaInventario = $db->prepare('SELECT * FROM `residuo` INNER JOIN listado_inventario ON residuo.id_listado_inventario = listado_inventario.Inventario_id WHERE id_servicio = :idservicio');
            $consultaInventario->execute(array(
                ':idservicio' => $this->idServicio
            ));
            $consultaInventario = $consultaInventario->fetchAll(PDO::FETCH_OBJ);
        }
        $db = null;
        return $consultaInventario;
    }

    public static function deleteInv($id_residuo){
        $db = new Database(); {
            $consultaInventario = $db->prepare('DELETE FROM '.self::TABLE.' WHERE id_residuo  = :id_residuo');
            $consultaInventario->execute(array(
                ':id_residuo' => $id_residuo
            ));
        }
        $db = null;
        return true;
    }

}

?>

