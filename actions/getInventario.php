<?php 

require_once '../Class/Residuo.php';

session_start();
$objResiduo = new Residuo();
$objResiduo->setIdServicio($_SESSION['idServicio']);
$result = $objResiduo->getInfo();

echo json_encode([
    'data' => $result
]);


?>