<?php include '../template/header.php' ?>


<header class="container-fluid color-btn fixed-top">
    <div class="row size-orange">
        <div class="col-11 text-light d-flex">
            <a class="nav-link link-light pt-3" href="perfilDatatable.php"><i class="fa-solid fa-house fa-lg"></i></a>
            <p class="pt-2 px-4 fs-4">Servicios</p>
        </div>
    </div>
</header>


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
                <div class="col py-3 px-4">
                <table class="table" id="tableServicios" >
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
            </table>
                </div>
            </div>

        </div>
    </div>


</div>

<script src="../scripts/datatableServicios.js"></script>
<?php include '../template/footerOrange.php' ?>