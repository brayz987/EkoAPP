<?php

session_start();

$_SESSION['view'] = "Editar Servicio";

if (!isset($_SESSION["user"])) {
    header("location: /ekoapp/");
    exit();
}

include '../template/header.php';
include_once '../Class/DataBase.php';
include_once '../Class/Sede.php';

/// Consulta en la Base de Datos las localidades
$db = new Database(); {
    $consultaLocalidad = 'SELECT * FROM localidad';
    $consultaLocalidad = $db->query($consultaLocalidad);
}
$db = null;

$sede = Sede::getSede($_GET['id']);


?>




<div class="container pt-7 pb-5 col-sm-9">
    <div class="card">
        <div class="card-header">
            <h4 class="pt-2">Editar Sede</h4>
        </div>
        <div class="card-body">
        <form action="../actions/editSede.php" method="POST">
                    <div id="formDiv">
                        <div class="row mb-3">
                            <div class="col-1">
                                <label for="" class="form-label">Nombre</label>
                            </div>
                            <div class="col-11">
                                <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="" required value="<?php echo $sede->nombre ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-1">
                                <label for="" class="form-label">Localidad</label>
                            </div>
                            <div class="col-11">
                                <select class="form-control" name="localidad" id="localidad" required>
                                    <option>Seleccionar ...</option>
                                    <?php foreach ($consultaLocalidad as $e) { ?>
                                        <option value="<?php echo $e['localidad_id']; ?>"><?php echo $e['nombre']; ?></option>
                                    <?php  } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-1">
                                <label for="" class="form-label">Direccion</label>
                            </div>
                            <div class="col-11">
                                <input type="text" class="form-control" name="direccion" id="direccion" aria-describedby="helpId" placeholder="" required value="<?php echo $sede->direccion ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-1">
                                <label for="" class="form-label">Servicios</label>
                            </div>
                            <div class="col-11">
                                <textarea class="form-control" name="servicios" rows="3" placeholder="Todos los tipos de servicios que la sede presta" ><?php echo $sede->servicio ?></textarea>
                            </div>
                        </div>
                    </div>
                    <input type="text" name="id" hidden value="<?php echo $_GET['id'] ?>">
            </div>
            <div class="modal-footer">
                <a type="button" href="../views/sedes.php" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</a>
                <button type="submit" class="btn btn-success">Editar</button>
            </div>
            </form>
        </div>
    </div>



    <script>
        $("#localidad").val(<?php echo $sede->localidad ?>)
    </script>

<?php include '../template/footer.php' ?>