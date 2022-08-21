<?php 

include '../Class/DatosBasicos.php';

session_start();
session_destroy();

header('location: /ekoapp');
exit();

?>