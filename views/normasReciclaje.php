<?php

session_start();
$_SESSION['view'] = "Normas de Reciclaje";


if (!isset($_SESSION["user"])) {
    header("location: /ekoapp/");
    exit();
}
include '../template/header.php';
?>


<div class="container pt-7 col-sm-6 pb-7">
    <div class="row">
        <div class="card">
            <div class="card-body ">
                <img src="../upload_files/Norma.png" class="img-fluid rounded-top normas-size" alt="" id="img-normas">
                <p class="form-label fst-italic text-black-50 text-center pt-2" >Haz click sobre la imagen para visualizar los decretos de la alcaldia de bogota sobre el reciclaje</p>
            </div>
        </div>
    </div>
</div>

<script src="../scripts/normas.js" ></script>

<?php include '../template/footerOrange.php' ?>