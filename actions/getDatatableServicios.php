<?php 

require_once '../Class/DataBase.php';



$db = new Database(); {
    $stm = 'SELECT servicio.id_servicio, servicio.fecha_servicio, tiposresiduoservicio.nombre, servicio.direccion, localidad.nombre, servicio.estado FROM servicio JOIN tiposresiduoservicio ON servicio.id_tiporesiduo = tiposresiduoservicio.id_tiporesiduo JOIN localidad ON servicio.localidad_id = localidad.localidad_id; ';
    $consulta = $db->query($stm);

    $result = $consulta->fetchAll(PDO::FETCH_FUNC, fn($id, $fecha, $tiporesiduo, $direccion, $localidad, $estado) => ["id" => $id, "fecha" => $fecha, "tiporesiduo" => $tiporesiduo, "direccion" => $direccion, "localidad" => $localidad, "estado" => $estado]);

    echo json_encode([
        'data' => $result
    ]);
$db = null;
}

?>