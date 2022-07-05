<?php 

require_once '../Class/Servicio.php';

$objServicio = new Servicio();
$result = $objServicio->getAllInfo();

echo json_encode([
    'data' => $result
]);


?>