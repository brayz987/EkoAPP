<?php

include_once 'DataBase.php';

class Servicio
{
    private $fechaServicio;
    private $fechaCierre;
    private $pesoTotal;
    private $direccion;
    private $localidad;
    private $tipoResiduo;
    private $estado;
    private $id;
    const TABLE = 'servicio';


    function setData($fechaServicio, $direccion, $localidad, $tipoResiduo, $pesoTotal, $estado) {
        $this->fechaServicio = $fechaServicio;
        $this->direccion = $direccion;
        $this->localidad = $localidad;
        $this->tipoResiduo = $tipoResiduo;
        $this->pesoTotal = $pesoTotal;
        $this->estado = $estado;
    }

    public function crearServicio() {
        $db = new Database(); {
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

    public static function getAllInfo(){
        $db = new Database(); {
            $stm = 'SELECT servicio.id_servicio, servicio.fecha_servicio, tiposresiduoservicio.nombre, servicio.direccion, localidad.nombre, servicio.estado FROM servicio JOIN tiposresiduoservicio ON servicio.id_tiporesiduo = tiposresiduoservicio.id_tiporesiduo JOIN localidad ON servicio.localidad_id = localidad.localidad_id; ';
            $consulta = $db->query($stm);

            $result = $consulta->fetchAll(PDO::FETCH_FUNC, fn ($id, $fecha, $tiporesiduo, $direccion, $localidad, $estado) => ["id" => $id, "fecha" => $fecha, "tiporesiduo" => $tiporesiduo, "direccion" => $direccion, "localidad" => $localidad, "estado" => $estado]);

            $db = null;
        }
        return $result;
    }
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }


    public function getInfo(){
        /// se ejecuta una consulta de la informacion del servicio y retorna los datos
        $db = new Database(); {
            $consultaServicio = $db->prepare('SELECT * FROM servicio WHERE id_servicio = :idservicio');
            $consultaServicio->execute(array(
                ':idservicio' => $this->getId()
            ));
            $consultaServicio = $consultaServicio->fetch();
        }
        $db = null;
        return $consultaServicio;
    }
}
