<?php

require_once 'DataBase.php';


class DatosBasicos{

    private $nombre;
    private $identificacion ;
    private $direccion ;
    private $correo ;
    private $contacto ;
    private $password;
    private $tipoUsuario;
    private $id;
    const TABLE = 'usuario';


    // function __construct( )
    // {

    // }

    // Set de basica data to the user
    public function setData ($nombre, $identificacion , $direccion , $correo, $contacto, $tipoUsuario){
        $this->nombre = $nombre;
        $this->identificacion = $identificacion;
        $this->direccion = $direccion;
        $this->correo = $correo;
        $this->contacto = $contacto;
        $this->tipoUsuario = $tipoUsuario;
    }


    // Set password to the user 
    public function setPassword($password){
        $this->password = $password;
    }

    public function crearCuenta(){
        $db = new Database();
        {
            $consulta = $db->prepare('INSERT INTO ' . self::TABLE . ' VALUES (:identificacion, :nombre, :direccion, :correo, :contacto, :password, :tipoUsuario)');
            $consulta->execute(array(
                ':identificacion' => $this->identificacion,
                ':nombre' => $this->nombre,
                ':direccion' => $this->direccion,
                ':correo' => $this->correo,
                ':contacto' => $this->contacto,
                ':tipoUsuario' => $this->tipoUsuario,
                ':password' => $this->password

            ));
        }
        $db = null;
    }

    // Verify in the DB if the user Exist
    public static function login($correo,$password){
        $db = new Database();
        {
            $consulta = $db->prepare('SELECT id, nombre, tipousuario.description as role FROM '.self::TABLE.' INNER JOIN tipousuario ON usuario.id_tipoUsuario = tipousuario.id_tipoUsuario WHERE correo = :correo AND password = :password');
            $consulta->execute(array(
                ':correo' => $correo,
                ':password' => $password,

            ));
        }
        $consultaUsuario = $consulta->fetch();
        $db = null;
        return $consultaUsuario;
    }

    public static function comparePassword($id, $password){
        $db = new Database();
        {
            $consulta = $db->prepare('SELECT COUNT(*) FROM '. self::TABLE .' WHERE id = :id AND password = :password');
            $consulta->execute(array(
                ':id' => $id,
                ':password' => $password,

            ));
        }
        $consultaUsuario = $consulta->fetch();
        $db = null;
        return $consultaUsuario[0];
    }

    public static function changePassword($id, $password){
        $db = new Database();
        {
            $consulta = $db->prepare('UPDATE '. self::TABLE .' SET  password = :password  WHERE id = :id ' );
            $consulta->execute(array(
                ':id' => $id,
                ':password' => $password,

            ));
        }
        $db = null;
        return true;
    }

    public function getNombre(){
        return $this->nombre;
    }
    public function getId(){
        return $this->id;
    }
}
?>


