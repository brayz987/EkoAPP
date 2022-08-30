<?php

require_once 'DataBase.php';


class Sede
{
    private $nombre;
    private $direccion;
    private $servicios;
    private $localidad;
    private $usuario;
    private $id;
    const TABLE = 'sedes';

    function __construct($nombre, $direccion, $servicios, $localidad, $usuario)
    {
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->servicios = $servicios;
        $this->localidad = $localidad;
        $this->usuario = $usuario;
    }


    public function crear()
    {
        $db = new Database(); {
            $consulta = $db->prepare('INSERT INTO ' . self::TABLE . '(nombre, direccion, servicio, localidad, usuario) VALUES (:nombre, :direccion, :servicio, :localidad, :usuario)');
            $consulta->execute(array(
                ':nombre' => $this->nombre,
                ':direccion' => $this->direccion,
                ':servicio' => $this->servicios,
                ':localidad' => $this->localidad,
                ':usuario' => $this->usuario,

            ));
        }
        $this->id = $db->lastInsertId();
        $db = null;
    }

    public static function visualizar()
    {
        $db = new Database(); {
            $stm = 'SELECT ' . self::TABLE . '.id_sede ,' . self::TABLE . '.nombre, ' . self::TABLE . '.direccion, ' . self::TABLE . '.servicio, localidad.nombre as localidad FROM ' . self::TABLE . ' INNER JOIN localidad ON localidad = localidad_id ';
            $consulta = $db->query($stm);

            $result = $consulta->fetchAll(PDO::FETCH_OBJ);

            $db = null;
        }

        return $result;
    }


    public static function getSede($id)
    {
        $db = new Database(); {
            $consulta = $db->prepare('SELECT * FROM ' . self::TABLE . ' WHERE id_sede = :id_sede ');
            $consulta->execute(array(
                ':id_sede' => $id
            ));
            $result = $consulta->fetch(PDO::FETCH_OBJ);

            $db = null;
        }
        return $result;
    }


    public static function editar($nombre, $direccion, $servicio, $localidad, $id)
    {
        $db = new Database(); 
        {
            $consulta = $db->prepare('UPDATE  ' . self::TABLE . ' SET nombre = :nombre , direccion = :direccion , servicio = :servicio , localidad = :localidad WHERE id_sede = :id_sede ');
            $consulta->execute(array(
                ':nombre' => $nombre,
                ':direccion' => $direccion,
                ':servicio' => $servicio,
                ':localidad' => $localidad,
                ':id_sede' => $id,

            ));
        }

        $db = null;
        return true;
    }



    public static function borrar($id)
    {
        $db = new Database(); 
        {
            $consulta = $db->prepare('DELETE FROM  ' . self::TABLE . ' WHERE id_sede = :id_sede ');
            $consulta->execute(array(
                ':id_sede' => $id

            ));
        }

        $db = null;
        return true;
    }


}
