<?php include '../template/headerLogin.php'; ?>


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-5">
            <div class="card">
                <div class="card-header">
                    <p class="text-center fs-4 fw-bold m-0">Registrate como:</p>
                </div>
            <div class="card-body">
                <div class="row ">
                    <div class="col d-grid px-1">
                        <a name="" id="" class="btn btn-warning color-btn" href="inicioSesion.php" role="button">Iniciar Sesion</a>
                    </div>
                    <div class="col d-grid px-1">
                        <a name="" id="" class="btn btn-warning color-btn" href="registrar.php" role="button">Registrar</a>
                    </div>
                </div>

            </div>
            </div>
            <?php if(isset($_GET['alert']) && $_GET['alert'] == "userCreated") { ?>
                    <div class="col-12 mt-3">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    
                        <strong>Se ha creado su usuario correctamente por favor inicie sesion</strong>
                    </div>
                    
                </div>
                <?php } ?>
        </div>
    </div>
</div>


<?php include '../template/footer.php'?>