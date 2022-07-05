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
    public function verifyUser($correo,$password){
        // Verificar Usuario en la Base de Datos, return true
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


