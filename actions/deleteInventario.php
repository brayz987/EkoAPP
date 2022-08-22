<?php 

require_once '../Class/Residuo.php';

session_start();
Residuo::deleteInv($_GET['id']);

header('location: ../views/editarServicio.php?id='.$_SESSION['idServicio'].'&view=edit')

?>