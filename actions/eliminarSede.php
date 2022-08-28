<?php  


require_once '../Class/Sede.php';

Sede::borrar($_GET['id']);
header('Location: ../views/sedes.php?alert=sedeDel');

?>