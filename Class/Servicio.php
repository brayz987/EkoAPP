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
    private $userId;
    const TABLE = 'servicio';


    public function setData($fechaServicio, $direccion, $localidad, $tipoResiduo, $pesoTotal, $estado, $userId) {
        $this->fechaServicio = $fechaServicio;
        $this->direccion = $direccion;
        $this->localidad = $localidad;
        $this->tipoResiduo = $tipoResiduo;
        $this->pesoTotal = $pesoTotal;
        $this->estado = $estado;
        $this->userId = $userId;
    }


    public function crearServicio() {
        $db = new Database(); {
            $consulta = $db->prepare('INSERT INTO ' . self::TABLE . '(`fecha_servicio`, `pesoTotal`, `direccion`, `id_tiporesiduo`,  `localidad_id`, `estado`, `idUser`) VALUES ( :fechaServicio,:pesoTotal, :direccion,:tipoResiduo , :localidad, :estado, :idUser)');
            $consulta->execute(array(
                ':fechaServicio' => $this->fechaServicio,
                ':pesoTotal' => $this->pesoTotal,
                ':direccion' => $this->direccion,
                ':tipoResiduo' => $this->tipoResiduo,
                ':localidad' => $this->localidad,
                ':estado' => $this->estado,
                ':idUser' => $this->userId
            ));
        }
        $this->id = $db->lastInsertId();
        $db = null;
    }

    public function setEditData($fechaServicio, $tipoResiduo, $pesoTotal, $direccion, $localidad, $idServicio, $userId) {
        $this->fechaServicio = $fechaServicio;
        $this->direccion = $direccion;
        $this->localidad = $localidad;
        $this->tipoResiduo = $tipoResiduo;
        $this->pesoTotal = $pesoTotal;
        $this->id = $idServicio;
        $this->userId = $userId;
    }


    public function saveEdit() {
        $db = new Database(); {
            $consulta = $db->prepare('UPDATE '.self::TABLE.' SET fecha_servicio = :fechaServicio, pesoTotal = :pesoTotal, direccion = :direccion , id_tiporesiduo = :tipoResiduo, localidad_id = :localidad, idUser = :idUser WHERE id_servicio = :id_servicio');
            $consulta->execute(array(
                ':fechaServicio' => $this->fechaServicio,
                ':pesoTotal' => $this->pesoTotal,
                ':direccion' => $this->direccion,
                ':tipoResiduo' => $this->tipoResiduo,
                ':localidad' => $this->localidad,
                ':idUser' => $this->userId,
                ':id_servicio' => $this->id
            ));
        }
        $db = null;
        return true;
    }


    
    public static function eliminarServicio($id) {
        $db = new Database(); {
            $consulta = $db->prepare('UPDATE '.self::TABLE.' SET estado = :estado WHERE id_servicio = :id_servicio');
            $consulta->execute(array(
                ':estado' => "eliminado",
                ':id_servicio' => $id
            ));
        }
        $db = null;
        return true;
    }

  
    public static function cerrarServicio($id) {
        date_default_timezone_set("America/Bogota");
        $db = new Database(); {
            $consulta = $db->prepare('UPDATE '.self::TABLE.' SET estado = :estado, fecha_cierre= :fecha_cierre WHERE id_servicio = :id_servicio');
            $consulta->execute(array(
                ':estado' => "Cerrado",
                ':id_servicio' => $id,
                ':fecha_cierre' => date("Y-m-d")
            ));
        }
        $db = null;
        return true;
    }



    public static function getAllInfo(){
        $db = new Database(); {
            $stm = 'SELECT servicio.id_servicio, servicio.fecha_servicio, tiposresiduoservicio.nombre, servicio.direccion, localidad.nombre, servicio.estado FROM servicio JOIN tiposresiduoservicio ON servicio.id_tiporesiduo = tiposresiduoservicio.id_tiporesiduo JOIN localidad ON servicio.localidad_id = localidad.localidad_id WHERE estado != "eliminado" ';
            $consulta = $db->query($stm);

            $result = $consulta->fetchAll(PDO::FETCH_FUNC, fn ($id, $fecha, $tiporesiduo, $direccion, $localidad, $estado) => ["id" => $id, "fecha" => $fecha, "tiporesiduo" => $tiporesiduo, "direccion" => $direccion, "localidad" => $localidad, "estado" => $estado]);

            $db = null;
        }
        return $result;
    }


    
    public static function getServiceCustomer(){
        $db = new Database(); {
            $consulta = $db->prepare('SELECT servicio.id_servicio, servicio.fecha_servicio, tiposresiduoservicio.nombre, servicio.direccion, localidad.nombre, servicio.estado FROM servicio JOIN tiposresiduoservicio ON servicio.id_tiporesiduo = tiposresiduoservicio.id_tiporesiduo JOIN localidad ON servicio.localidad_id = localidad.localidad_id WHERE estado != "eliminado" AND idUser = :idUser ');
            $consulta->execute(array(
                ':idUser' => $_SESSION['user']
            ));
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
