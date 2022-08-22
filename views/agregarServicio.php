<?php
session_start();

$_SESSION['view'] = "Nuevo Servicio";

if (!isset($_SESSION["user"])) {
    header("location: /ekoapp/");
    exit();
}
include '../template/header.php';
include_once '../Class/DataBase.php';
/// Consulta en la Base de Datos las localidades
$db = new Database(); {
    $consultaLocalidad = 'SELECT * FROM localidad';
    $consultaLocalidad = $db->query($consultaLocalidad);
}

$db = null;



?>



<div class="container pt-7 col-sm-6">
    <div class="card">
        <div class="card-body">
            <form action="../actions/agregarServicio.php" method="POST">
                <div class="row g-3">
                    <div class="col-9">
                        <label class="form-label mt-1">Tipo de Servcio: </label>
                        <select class="form-select" aria-label="Default select example" disabled>
                            <option selected>Recolecta de Residuos</option>
                        </select>
                    </div>
                    <div class="col-3">
                        <label class="form-label mt-1">Fecha de Visita: </label>
                        <div class="d-flex  p-0 m-0">
                            <input type="date" class="form-control" name="fechainicio" required >
                        </div>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-9">
                        <label class="form-label mt-1">Tipo de Desechos en General: </label>
                        <select class="form-select" name="tipoResiduoGeneral" required>
                            <option>Seleccionar...</option>
                            <option value="1">Residuos domésticos</option>
                            <option value="2">Residuos comerciales</option>
                            <option value="3">Residuos Industriales</option>
                            <option value="4">Biorresiduos</option>
                            <option value="5">Escombros y residuos de construccion</option>
                            <option value="6">Residuos sanitarios</option>

                        </select>
                    </div>
                    <div class="col-3">
                        <label class="form-label mt-1">Peso Aprox: </label>
                        <div class="d-flex  p-0 m-0">
                            <input type="number" class="form-control" name="peso" required>
                            <p class="m-0 ps-2 pt-1">Kilos</p>
                        </div>
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-9">
                        <label class="form-label mt-1">Direccion: </label>
                        <input type="text" class="form-control" name="direccion" required>
                    </div>
                    <div class="col-3">
                        <label class="form-label mt-1">Localidad </label>
                        <select class="form-select" name="localidad" required>
                            
                            <?php foreach ($consultaLocalidad as $e ) { ?>
                                <option value="<?php echo $e['localidad_id']; ?>"><?php echo $e['nombre']; ?></option>
                            <?php  } ?>

                        </select>

                    </div>
                    <div class="col-9">
                        <input type="text" value="<?php echo($_SESSION['user']) ?>" name="userId" hidden>
                    </div>
                    <div class="col-3 d-grid">
                            <button type="submit" class="btn btn-success" type="button">Crear</button>  
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<?php include '../template/footer.php' ?>