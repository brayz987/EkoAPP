<?php 
session_start();

if(!isset($_SESSION["user"])){
    header("location: views/login.php");
}


if(isset($_SESSION["user"])){
    header("location: views/perfilDatatable.php");
}

?>