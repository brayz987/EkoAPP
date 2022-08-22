<?php 

include '../Class/Servicio.php';


Servicio::cerrarServicio($_GET['id']);

header('Location: ../views/editarServicio.php?id='.$_GET['id'].'&view=edit&alert=close');



?>