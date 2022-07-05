<?php

include '../template/header.php';
include_once '../Class/DataBase.php';

/// Consulta en la Base de Datos las localidades
$db = new Database(); {
    $consultaLocalidad = 'SELECT * FROM localidad';
    $consultaLocalidad = $db->query($consultaLocalidad);


    /// se ejecuta una consulta de la informacion del servicio y se guarda en la variable consultaServicio

    $consultaServicio = $db->prepare('SELECT * FROM servicio WHERE id_servicio = :idservicio');
    $consultaServicio->execute(array(
        ':idservicio' => $_GET['id']
    ));
    $consultaServicio = $consultaServicio->fetch();
}

$db = null;



?>


<header class="container-fluid color-btn fixed-top">
    <div class="row size-orange">
        <div class="col-11 text-light d-flex">
            <a class="nav-link link-light pt-3" href="perfilDatatable.php"><i class="fa-solid fa-house fa-lg"></i></a>
            <p class="pt-2 px-4 fs-4">Editar Servicio</p>
        </div>
    </div>
</header>


<div class="container pt-7 col-sm-9">
    <div class="card">
        <div class="card-header">
            <h4 class="pt-2">Informacion General</h4>
        </div>
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
                            <input type="date" class="form-control" name="fechainicio">
                        </div>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-9">
                        <label class="form-label mt-1">Tipo de Desechos en General: </label>
                        <select class="form-select" name="tipoResiduoGeneral">
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
                            <input type="number" class="form-control" name="peso">
                            <p class="m-0 ps-2 pt-1">Kilos</p>
                        </div>
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-9">
                        <label class="form-label mt-1">Direccion: </label>
                        <input type="text" class="form-control" name="direccion">
                    </div>
                    <div class="col-3">
                        <label class="form-label mt-1">Localidad </label>
                        <select class="form-select" name="localidad">

                            <?php foreach ($consultaLocalidad as $e) { ?>
                                <option value="<?php echo $e['localidad_id']; ?>"><?php echo $e['nombre']; ?></option>
                            <?php  } ?>

                        </select>

                    </div>
                    <div class="col-9">
                    </div>
                    <div class="col-3 d-grid">
                        <?php  if($_GET['view'] == 'edit'){ ?>
                        <a type="submit" class="btn btn-warning" type="button">Editar</a><?php } ?>
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
                <?php  if($_GET['view'] == 'edit'){ ?>
                <a type="submit" class="btn btn-success" type="button"><i class="fa-solid fa-plus pt-2"></i></a><?php } ?>
                </div>
            </div>

        </div>
        <div class="card-body">
            <table class="table" id="tableInventory">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Peso</th>
                        <th>Cantidad</th>
                        <?php  if($_GET['view'] == 'edit'){ ?>
                        <th>Eliminar</th><?php } ?> 
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>


<script src="../scripts/datatableInventory.js"></script>
<?php include '../template/footer.php' ?>