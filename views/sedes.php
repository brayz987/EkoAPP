<?php
session_start();
$_SESSION['view'] = "Sedes";


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


$sedes = Sede::visualizar();


?>



<!-- Adicionar Sede Modal -->
<div class="modal fade" id="addSede" tabindex="-1" aria-labelledby="addSedeLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logoutlabel">Nueva Sede</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../actions/addSede.php" method="POST">
                    <div id="formDiv">
                        <div class="row mb-3">
                            <div class="col-4">
                                <label for="" class="form-label">Nombre</label>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-4">
                                <label for="" class="form-label">Localidad</label>
                            </div>
                            <div class="col-8">
                                <select class="form-control" name="localidad" id="" required>
                                    <option>Seleccionar ...</option>
                                    <?php foreach ($consultaLocalidad as $e) { ?>
                                        <option value="<?php echo $e['localidad_id']; ?>"><?php echo $e['nombre']; ?></option>
                                    <?php  } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-4">
                                <label for="" class="form-label">Direccion</label>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control" name="direccion" id="direccion" aria-describedby="helpId" placeholder="" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-4">
                                <label for="" class="form-label">Servicios</label>
                            </div>
                            <div class="col-8">
                                <textarea class="form-control" name="servicios" rows="3" placeholder="Todos los tipos de servicios que la sede presta"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row d-none" id="alertPassword">
                        <div class="col-12">
                            <div class="alert alert-danger m-0" role="alert">
                                <strong id="messagePassword"></strong>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success" id="changePasswordButton">Agregar</button>
            </div>
            </form>
        </div>
    </div>
</div>





<div class="container pt-7 col-sm-10">
    <div class="row">
        <div class="col-9"></div>
        <div class="col-3 d-flex flex-row-reverse">
            <a name="" id="" class="btn btn-success" role="button" data-bs-toggle="modal" data-bs-target="#addSede"><i class="fa-solid fa-plus"></i> Adicionar Sede</a>
        </div>
    </div>
    <!-- card-service -->

    <div class="pt-2">
        <?php if (isset($_GET['alert']) && $_GET['alert'] == "sedeAdd") { ?>
            <div class="col-12">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                    <strong>Se ha adicionado la sede correctamente</strong>
                </div>

            </div>
        <?php } ?>


        <?php if (isset($_GET['alert']) && $_GET['alert'] == "sedeEdit") { ?>
            <div class="col-12">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                    <strong>Se ha editado la sede correctamente</strong>
                </div>

            </div>
        <?php } ?>


        <?php if (isset($_GET['alert']) && $_GET['alert'] == "sedeDel") { ?>
            <div class="col-12">
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                    <strong>Se ha eliminado la sede correctamente</strong>
                </div>

            </div>
        <?php } ?>


        <div class="card">
            <div class="row">
                <div class="col py-3 px-4">
                    <table class="table" id="tableServicios">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Localidad</th>
                                <th>Direccion</th>
                                <th>Servicios</th>
                                <?php if ($_SESSION['role'] == "Colaborador") { ?>
                                    <th>Operaciones</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($sedes as $sede) { ?>
                                <tr>
                                    <td><?php echo $sede->nombre ?></td>
                                    <td><?php echo $sede->localidad ?></td>
                                    <td><?php echo $sede->direccion ?></td>
                                    <td><?php echo $sede->servicio ?></td>
                                    <?php if ($_SESSION['role'] == "Colaborador") { ?>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a type="button" href="../views/editarSede.php?id=<?php echo $sede->id_sede; ?>" class="btn btn-warning color-btn"><i class="fa-solid fa-pen-to-square"></i></a>
                                                <a type="button" href="../actions/eliminarSede.php?id=<?php echo $sede->id_sede; ?>" class="btn btn-danger"><i class="fa-solid fa-circle-xmark"></i></a>
                                            </div>
                                        </td>
                                    <?php } ?>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>


</div>

<script src="../scripts/datatable.js"></script>
<?php include '../template/footerOrange.php' ?>