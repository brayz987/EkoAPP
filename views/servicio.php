<?php include '../template/header.php' ?>


<header class="container-fluid color-btn fixed-top">
    <div class="row size-orange">
        <div class="col-11 text-light d-flex">
            <a class="nav-link link-light pt-3" href="perfilUsuario.php"><i class="fa-solid fa-house fa-lg"></i></a>
            <p class="pt-2 px-4 fs-4">Nuevo Servicio</p>
        </div>
    </div>
</header>


<div class="container pt-7 col-sm-6">
    <div class="card">
        <div class="card-body">
            <form action="" method="POST">
                <div class="row g-3">
                    <div class="col-9">
                        <label class="form-label mt-1">Direccion: </label>
                        <input type="text" class="form-control" name="" id="" placeholder="">
                    </div>
                    <div class="col-3">
                        <label class="form-label mt-1">Ciudad: </label>
                        <input type="text" class="form-control" name="" id="" placeholder="">
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-9">
                        <label class="form-label mt-1">Tipo de Residuo: </label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Seleccionar</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="col-3">
                        <label class="form-label mt-1">Peso: </label>
                        <div class="d-flex  p-0 m-0">
                            <input type="number" class="form-control" name="" id="" placeholder="">
                            <p class="m-0 ps-2 pt-1">Kilos</p>
                        </div>
                    </div>
                    <div class="col-9">
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