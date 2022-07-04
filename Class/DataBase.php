<?php 

class Database extends PDO {
    private $typeBase = 'mysql';
    private $host = 'localhost';
    private $nombreBase = 'ekoapp';
    private $usuario = 'root';
    private $contraseña = '';
    
    
    public function __construct(){
        try {
            parent::__construct("{$this->typeBase}:dbname={$this->nombreBase};host={$this->host};charset=utf8", $this->usuario, $this->contraseña );
        } catch (PDOException $e) {
            echo 'Ha surgido un error y no se puede conectar a la base de datos. Detalle: '.$e->getMessage();
            exit;
        }
    }
}
?>