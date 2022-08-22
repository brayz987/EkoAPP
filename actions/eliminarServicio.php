<?php 

include '../Class/Servicio.php';


Servicio::eliminarServicio($_GET['id']);
session_start();
$_SESSION['deleteId'] = $_GET['id'];

header('Location: ../views/dashboard.php?alert=editsuccess');



?>