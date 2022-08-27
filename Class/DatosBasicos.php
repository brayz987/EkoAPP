<?php

require_once 'DataBase.php';


class DatosBasicos
{

    private $nombre;
    private $identificacion;
    private $direccion;
    private $correo;
    private $contacto;
    private $password;
    private $tipoUsuario;
    private $id;
    const TABLE = 'usuario';
    const TARGETDIR = "../upload_files/";

    // Set de basica data to the user
    public function setData($nombre, $identificacion, $direccion, $correo, $contacto, $tipoUsuario)
    {
        $this->nombre = $nombre;
        $this->identificacion = $identificacion;
        $this->direccion = $direccion;
        $this->correo = $correo;
        $this->contacto = $contacto;
        $this->tipoUsuario = $tipoUsuario;
    }


    // Set password to the user 
    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function crearCuenta()
    {
        $db = new Database(); {
            $consulta = $db->prepare('INSERT INTO ' . self::TABLE . '(`identificacion_usuario`, `nombre`, `direccion`, `correo`, `contacto`, `password`, `id_tipoUsuario`) VALUES (:identificacion, :nombre, :direccion, :correo, :contacto, :password, :tipoUsuario)');
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
        $this->id = $db->lastInsertId();
        $db = null;
    }

    // Verify in the DB if the user Exist
    public static function login($correo, $password)
    {
        $db = new Database(); {
            $consulta = $db->prepare('SELECT id, nombre, tipousuario.description as role FROM ' . self::TABLE . ' INNER JOIN tipousuario ON usuario.id_tipoUsuario = tipousuario.id_tipoUsuario WHERE correo = :correo AND password = :password');
            $consulta->execute(array(
                ':correo' => $correo,
                ':password' => $password,

            ));
        }
        $consultaUsuario = $consulta->fetch();
        $db = null;
        return $consultaUsuario;
    }

    public static function comparePassword($id, $password)
    {
        $db = new Database(); {
            $consulta = $db->prepare('SELECT COUNT(*) FROM ' . self::TABLE . ' WHERE id = :id AND password = :password');
            $consulta->execute(array(
                ':id' => $id,
                ':password' => $password,

            ));
        }
        $consultaUsuario = $consulta->fetch();
        $db = null;
        return $consultaUsuario[0];
    }

    public static function changePassword($id, $password)
    {
        $db = new Database(); {
            $consulta = $db->prepare('UPDATE ' . self::TABLE . ' SET  password = :password  WHERE id = :id ');
            $consulta->execute(array(
                ':id' => $id,
                ':password' => $password,

            ));
        }
        $db = null;
        return true;
    }

    public function getNombre()
    {
        return $this->nombre;
    }
    public function getId()
    {
        return $this->id;
    }

    public static function getCorreo($id)
    {
        $db = new Database(); {
            $consulta = $db->prepare('SELECT correo,nombre FROM ' . self::TABLE . ' WHERE id = :id');
            $consulta->execute(array(
                ':id' => $id
            ));
        }
        $consultaUsuario = $consulta->fetch();
        $db = null;
        return $consultaUsuario;
    }


    public static function getProfile($id)
    {
        $db = new Database(); {
            $consulta = $db->prepare('SELECT nombre, direccion, correo, contacto, photo FROM ' . self::TABLE . ' WHERE id = :id');
            $consulta->execute(array(
                ':id' => $id
            ));
        }
        $consultaUsuario = $consulta->fetch();
        $db = null;
        return $consultaUsuario;
    }

    public function setUpdateData($nombre, $direccion, $correo, $contacto, $id)
    {
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->correo = $correo;
        $this->contacto = $contacto;
        $this->id = $id;
    }

    public function update()
    {
        $db = new Database(); {
            $consulta = $db->prepare('UPDATE ' . self::TABLE . ' SET nombre = :nombre , direccion = :direccion , correo = :correo , contacto = :contacto  WHERE id = :id');
            $consulta->execute(array(
                ':nombre' => $this->nombre,
                ':direccion' => $this->direccion,
                ':correo' => $this->correo,
                ':contacto' => $this->contacto,
                ':id' => $this->id
            ));
        }
        $db = null;
        return true;
    }


    public function uploadPhoto($photo)
    {
        // Change de name of file

        $temp = explode(".", $photo["name"]);
        $newfilename =  round(microtime(true)) . $temp[0] . '.' . end($temp);

        // Set de path where save the file

        $target_file = self::TARGETDIR . $newfilename;


        // Consult and delete de actual photo

        $actualPhoto = self::getPhoto($this->id);

        if ($actualPhoto['photo'] != "" or $actualPhoto['photo'] != null) {

            $target_del = explode("/", $actualPhoto['photo']);
            $target_del = "../upload_files/" . end($target_del);

            if (file_exists($target_del)) {
                unlink($target_del);
            }
        }


        // Upload File
        move_uploaded_file($photo["tmp_name"], $target_file);

        // Complete de path for submit in DB
        $target_file = "/upload_files/" . $newfilename;


        // Update Databease with the photo Path

        self::savePhotoPath($target_file, $this->id);

    }


    public static function getPhoto($id)
    {
        $db = new Database(); {
            $consulta = $db->prepare('SELECT photo FROM ' . self::TABLE . ' WHERE id = :id');
            $consulta->execute(array(
                ':id' => $id
            ));
        }
        $photo = $consulta->fetch();
        $db = null;
        return $photo;
    }

    static function savePhotoPath($path, $id)
    {
        $db = new Database(); {
            $consulta = $db->prepare('UPDATE ' . self::TABLE . ' SET photo = :photo WHERE id = :id');
            $consulta->execute(array(
                ':id' => $id,
                ':photo' => $path
            ));
        }
        $db = null;
        return true;
    }

}
