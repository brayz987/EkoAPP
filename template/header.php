<?php

include_once '../Class/DatosBasicos.php';

$profile = DatosBasicos::getProfile($_SESSION['user']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/EkoAPP/css/default.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">

    <script src="../scripts/jQuery.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.1/b-2.2.3/sp-2.0.2/sl-1.4.0/datatables.min.css" />

    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.12.1/b-2.2.3/sp-2.0.2/sl-1.4.0/datatables.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/3aaaae7e62.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
    <title>EkoApp</title>
</head>

<body>


    <header class="container-fluid color-btn fixed-top">
        <div class="row size-orange">
            <div class="col-10 text-light d-flex">
                <a class="nav-link link-light pt-3" href="dashboard.php"><i class="fa-solid fa-house fa-lg"></i></a>
                <p class="pt-2 px-4 fs-4"><?php echo ($_SESSION['view']); ?></p>
            </div>
            <div class="col-2 d-flex flex-row-reverse">
                <div class="dropdown pt-2">
                    <a class="nav-link dropdown-toggle link-light px-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Bienvenido, <?php echo ($_SESSION['name']); ?></a>
                    <ul class="dropdown-menu dropdown-menu-end ">
                        <li><a class="dropdown-item" type="button" data-bs-toggle="offcanvas" data-bs-target="#profile" aria-controls="offcanvasRight">Perfil</a></li>
                        <li><a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#changePassword">Cambiar Constraseña</a></li>
                        <li><a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#logout">Cerrar Sesion</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>


    <!-- Change Password Modal -->
    <div class="modal fade" id="changePassword" data-bs-backdrop="static" tabindex="-1" aria-labelledby="logoutlabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutlabel">Cambiar contraseña</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="changePassForm">
                        <div id="formDiv">
                            <div class="row mb-3">
                                <div class="col-4">
                                    <label for="" class="form-label">Actual Constraseña</label>
                                </div>
                                <div class="col-8">
                                    <input type="password" class="form-control" name="actualPassword" id="actualPassword" aria-describedby="helpId" placeholder="">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-4">
                                    <label for="" class="form-label">Nueva Contraseña</label>
                                </div>
                                <div class="col-8">
                                    <input type="password" class="form-control" name="newPassword" id="newPassword" aria-describedby="helpId" placeholder="">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-4">
                                    <label for="" class="form-label">Confirmar Contraseña</label>
                                </div>
                                <div class="col-8">
                                    <input type="password" class="form-control" name="confPassword" id="confPassword" aria-describedby="helpId" placeholder="">
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
                    <button type="button" class="btn btn-warning" id="changePasswordButton">Cambiar</button>
                    <a id="OKchangePasswordButton" class="btn btn-primary d-none" href="../actions/logout.php" role="button">Ok</a>
                </div>
                </form>
            </div>
        </div>
    </div>



    <!-- Logout Modal -->
    <div class="modal fade" id="logout" tabindex="-1" aria-labelledby="logoutlabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutlabel">Cerrar Session</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ¿Esta seguro que desea serrar la sesion?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <a href="../actions/logout.php"><button type="button" class="btn btn-danger">Cerrar</button></a>
                </div>
            </div>
        </div>
    </div>



    <!-- Change Password Modal -->

    <div class="offcanvas offcanvas-end" tabindex="-1" id="profile" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasRightLabel">Perfil</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <form action="../actions/actualizarPerfil.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <label for="" class="form-label">Foto de Perfil</label>
                    <div class="col mb-3">
                        <img src="<?php $profile['photo'] = ($profile['photo'] != "") ?  ".." . $profile['photo']  : "../upload_files/default_profile.png";
                                    echo $profile['photo']; ?>" class="img-fluid rounded img-thumbnail img-size" alt="">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Cambiar Foto</label>
                        <input type="file" class="form-control" name="photo" id="photo" accept="image/png, image/gif, image/jpeg">
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="" placeholder="" value="<?php echo $profile['nombre'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Direccion</label>
                        <input type="text" class="form-control" name="direccion" id="" placeholder="" value="<?php echo $profile['direccion'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Correo</label>
                        <input type="text" class="form-control" name="correo" id="" placeholder="" value="<?php echo $profile['correo'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Numero de Contacto</label>
                        <input type="text" class="form-control" name="contacto" id="" placeholder="" value="<?php echo $profile['contacto'] ?>">
                    </div>
                    <div class="gap-2 d-flex flex-row-reverse ">
                        <input type="text" class="form-control" hidden name="id" id="" placeholder="" value="<?php echo $_SESSION['user'] ?>">
                        <button type="submit" name="" id="" class="btn btn-warning">Actualizar</button>
                    </div>
                </div>
        </div>
        </form>
    </div>
    </div>