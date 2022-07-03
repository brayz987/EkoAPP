<?php include '../template/header.php' ?>


<div class="container-sm pt-5 col-sm-5">
    <div class="card text-start">
        <div class="card-header">
            <p class="text-start fs-4 fw-bold m-0 text-center">Iniciar Sesion:</p>
        </div>
        <div class="card-body">
            <div class="container text-center">
                <form method="POST" action="../actions/login.php">
                    <div class="mb-3 row  ">
                        <label for="inputName" class="col-xs-4 col-form-label">Correo</label>
                        <div class="col-xs-8">
                            <input type="text" class="form-control" name="correo" id="correo" placeholder="correo" required>
                        </div>
                        <label for="inputName" class="col-xs-4 col-form-label">Constraseña</label>
                        <div class="col-xs-8">
                            <input type="tel" class="form-control" name="password" id="password" placeholder="password" required">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col d-grid">
                            <a href="../" class="btn btn-warning color-btn">Cancelar</a>
                        </div>
                        <div class="col d-grid">
                            <button type="submit" class="btn btn-warning color-btn">Iniciar Sesion</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php include '../template/footer.php' ?>