<?php include "header.php"; ?>
<?php include "controller_roles.php";
 $id_rol=$_GET['id'];
$controller_roles=new controller_roles();
$rol=$controller_roles->datos_rol($id_rol);
?>

<div class="container">
        <div class="row">
            <div class="col-4 p-4 mx.auto center">
                <div class="form-group">
                    <div class="card card-body">
                        <h2> Rol:<?= $rol['rol']; ?></h2>

                        <form action="" method="post" enctype="multipart/form-data" name="contact-form">
                            <div class="form-group">
                                <label for="rol">Funcion</label>
                                <input type="text" name="rol" class="form-control" aria-label="rol" require>
                            </div>
                            <div class="form-group">
                                <label for="creacion">Fecha de Inicio</label>
                                <input type="date" name="creacion" class="form-control" aria-label="creacion" require>
                            </div>

                            <br>
                            <div class="d-grid">
                                <button type="submit" name="Cargo" class="btn btn-success btn-lg btn-form">Ingrese Rol</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>