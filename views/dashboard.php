<?php

session_start();
$_SESSION['view'] = "Servicios";

if (!isset($_SESSION["user"])) {
    header("location: /ekoapp/");
    exit();
};

include '../template/header.php';

require_once '../Class/Servicio.php';

var_dump($_SESSION);
$services = array();

if ($_SESSION['role'] == "Colaborador") {
    $services = Servicio::getAllInfo();
}
if ($_SESSION['role'] == "Cliente") {
    $services = Servicio::getServiceCustomer();
}

?>


<div class="container pt-7 col-sm-10">
    <div class="row">
        <div class="col-9"></div>
        <div class="col-3 d-flex flex-row-reverse">
            <a name="" id="" class="btn btn-success" href="agregarServicio.php" role="button"><i class="fa-solid fa-plus"></i> Nuevo Servicio</a>
        </div>
    </div>
    <!-- card-service -->

    <div class="pt-2">
        <div class="card">
            <div class="row">
                <?php if(isset($_GET['alert']) && $_GET['alert'] == "editsuccess") { ?>
                    <div class="col-12">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    
                        <strong>Se ha eliminado el servicio con id <?php echo $_SESSION['deleteId'] ?>!</strong>
                    </div>
                    
                </div>
                <?php } ?>

                <?php if(isset($_GET['alert']) && $_GET['alert'] == "updateProfileSuccess") { ?>
                    <div class="col-12">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    
                        <strong>Se actualizado los datos de usuario correctamente</strong>
                    </div>
                    
                </div>
                <?php } ?>


                <div class="col py-3 px-4">
                    <table class="table display nowrap"  style="width:100%" id="tableServicios">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Fecha</th>
                                <th>Tipo Residuos</th>
                                <th>Direccion</th>
                                <th>Localidad</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($services as $key) { ?>
                                <tr>
                                    <td><?php echo $key['id'] ?></td>
                                    <td><?php echo $key['fecha'] ?></td>
                                    <td><?php echo $key['tiporesiduo'] ?></td>
                                    <td><?php echo $key['direccion'] ?></td>
                                    <td><?php echo $key['localidad'] ?></td>
                                    <td><?php echo $key['estado'] ?></td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a type="button" href="../views/editarServicio.php?id=<?php echo $key['id']; ?>&view=see" class="btn btn-primary"><i class="fa-solid fa-eye"></i></a>
                                            <a type="button" href="../views/editarServicio.php?id=<?php echo $key['id']; ?>'&view=edit" class="btn btn-warning color-btn"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a type="button" href="../actions/eliminarServicio.php?id=<?php echo $key['id']; ?>" class="btn btn-danger"><i class="fa-solid fa-circle-xmark"></i></a></div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>


</div>

<script src="../scripts/datatableServicios.js"></script>
<?php include '../template/footerOrange.php' ?>