<?php

session_start();

$_SESSION['view'] = "Editar Servicio";

if (!isset($_SESSION["user"])) {
    header("location: /ekoapp/");
    exit();
}

include '../template/header.php';
include_once '../Class/DataBase.php';
include_once '../Class/Servicio.php';

/// Consulta en la Base de Datos las localidades
$db = new Database(); {
    $consultaLocalidad = 'SELECT * FROM localidad';
    $consultaLocalidad = $db->query($consultaLocalidad);
}
$db = null;

//Consulta la base de datos el invetario
$db = new Database(); {
    $consultaInventario = 'SELECT * FROM listado_inventario';
    $consultaInventario = $db->query($consultaInventario);
}
$db = null;

$_SESSION['idServicio'] = $_GET['id'];

$servicio = new Servicio();
$servicio->setId($_GET['id']);
$consultaServicio = $servicio->getInfo();
extract($consultaServicio); // Se crea una variable por cada dato del array

?>

<!-- Formulario oculto para adicionar nuevo item en el inventario -->

<div class="modal fade" id="addInventory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../actions/agregarInventario.php?idServicio=<?php echo $_GET['id'] ?>" method="POST">
                    <div class="row">
                        <div class="col d-flex">
                            <label class="col-form-label">Lista Materiales:</label>
                            <select class="form-select" name="listado_inventario">
                                <?php foreach ($consultaInventario as $e) { ?>
                                    <option value="<?php echo $e['Inventario_id']; ?>"><?php echo $e['nombre']; ?></option>
                                <?php  } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="message-text" class="col-form-label">Peso: </label>
                            <div class=" mb-3 d-flex ">
                                <input type="number" class="form-control" name="peso">
                                <p class="m-0 ps-2 pt-1">Kilos</p>
                            </div>
                        </div>
                        <div class="col">
                            <label for="message-text" class="col-form-label">Cantidad: </label>
                            <div class="mb-3  d-flex">

                                <input type="number" class="form-control" name="cantidad">
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Agregar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>




<div class="container pt-7 pb-5 col-sm-9">
    <div class="card">
        <div class="card-header">
            <h4 class="pt-2">Informacion General</h4>
        </div>
        <div class="card-body">
            <form action="../actions/editarServicio.php" method="POST">
                <div class="row g-3">

                    <?php if (isset($_GET['alert']) && $_GET['alert'] == "editsuccess") { ?>
                        <div class="col-12">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                                <strong>Editado Exitosamente</strong>
                            </div>
                        </div>
                    <?php } ?>


                    <?php if (isset($_GET['alert']) && $_GET['alert'] == "close") { ?>
                        <div class="col-12">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                                <strong>Cerrado Exitosamente</strong>
                            </div>
                        </div>
                    <?php } ?>


                    <div class="col-4">
                        <label class="form-label mt-1">Estado: </label>
                        <div class="d-flex  p-0 m-0">
                            <input type="text" class="form-control" name="estado" id="estado" disabled>
                        </div>
                    </div>
                    <div class="col-4">
                        <label class="form-label mt-1">Fecha de Visita Programada: </label>
                        <div class="d-flex  p-0 m-0">
                            <input type="date" class="form-control" name="fechainicio" id="fechainicio">
                        </div>
                    </div>
                    <div class="col-4">
                        <label class="form-label mt-1">Fecha de Cierre: </label>
                        <div class="d-flex  p-0 m-0">
                            <input type="date" class="form-control" name="fechacierre" id="fechacierre" disabled>
                        </div>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-12">
                        <label class="form-label mt-1">Tipo de Servcio: </label>
                        <select class="form-select" aria-label="Default select example" disabled>
                            <option selected>Recolecta de Residuos</option>
                        </select>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-9">
                        <label class="form-label mt-1">Tipo de Desechos en General: </label>
                        <select class="form-select" name="tipoResiduoGeneral" id="tipoResiduoGeneral">
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
                            <input type="number" class="form-control" name="peso" id="peso">
                            <p class="m-0 ps-2 pt-1">Kilos</p>
                        </div>
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-9">
                        <label class="form-label mt-1">Direccion: </label>
                        <input type="text" class="form-control" name="direccion" id="direccion">
                    </div>
                    <div class="col-3">
                        <label class="form-label mt-1">Localidad </label>
                        <select class="form-select" name="localidad" id="localidad">

                            <?php foreach ($consultaLocalidad as $e) { ?>
                                <option value="<?php echo $e['localidad_id']; ?>"><?php echo $e['nombre']; ?></option>
                            <?php  } ?>

                        </select>

                    </div>
                    <div class="col-9">
                        <input type="text" name="idServicio" hidden value='<?php echo ($_SESSION['idServicio']) ?>'>
                        <input type="text" name="idUser" hidden value='<?php echo ($_SESSION['user']) ?>'>
                    </div>
                    <div class="col-3 d-grid">
                        <?php if ($_GET['view'] == 'edit') { ?>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a type="button" href="../actions/cerrarServicio.php?id=<?php echo $_GET['id'] ?>" class="btn btn-warning color-btn" type="button">Cerrar Servicio</a>
                                <button type="submit" class="btn btn-warning color-btn" type="button">Editar</button>
                            </div>

                        <?php } ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-11">
                    <h4 class="pt-2">Inventario</h4>
                </div>
                <div class="col-1 d-grid ">
                    <?php if ($_GET['view'] == 'edit') { ?>
                        <a type="submit" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addInventory" type="button"><i class="fa-solid fa-plus pt-2"></i></a><?php } ?>

                </div>
            </div>

        </div>
        <div class="card-body">
            <table class="table" id="tableInventory">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Peso</th>
                        <th>Cantidad</th>
                        <?php if ($_GET['view'] == 'edit') { ?>
                            <th>Eliminar</th><?php } ?>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>


<?php if ($_GET['view'] == "edit") { ?>
    <script src="../scripts/datatableInventoryEdit.js"></script>
<?php } ?>
<?php if ($_GET['view'] == "see") { ?>
    <script src="../scripts/datatableInventorySee.js"></script>
<?php } ?>

<script>
    // Se ubican los datos del servicio a editar
    $("#estado").val('<?php echo $estado ?>');
    $("#fechainicio").val('<?php echo $fecha_servicio ?>');
    $("#fechacierre").val('<?php echo $fecha_cierre ?>');
    $("#tipoResiduoGeneral").val('<?php echo $id_tiporesiduo ?>');
    $("#peso").val('<?php echo $pesoTotal ?>');
    $("#direccion").val('<?php echo $direccion ?>');
    $("#localidad").val('<?php echo $localidad_id ?>');
</script>
<?php include '../template/footer.php' ?>