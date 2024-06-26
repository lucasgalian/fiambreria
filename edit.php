<?php
include "conexion.php";
// SI Existe este id(variable) 
if ((isset($_POST['Modificar']))) {
    extract($_POST);

    $sql = "Update cliente set  nombre='$nombre', 
                                  apellido='$apellido', 
                                  telefono='$telefono',
                                  email='$email', 
                                  fecha_nac='$fecha_nac'
                                  clave=password_hash('$clave')
                                  where id_cliente='$id'";
    $result = mysqli_query($conexion, $sql);
}
?>
<?php
$id = $_REQUEST["id"];
//echo $id;
$sql = "select * from cliente  where id_cliente='$id'";
$result = mysqli_query($conexion, $sql);
$row = mysqli_fetch_array($result);
?>
<?php include "header.php"; ?>

<body>
    <section id_cliente="id" class="container-fluid">
        <div class="col-lg-7 col-xl-8 mx.auto">         
                <div class="card card-body center">
                    <form action="edit.php" method="post" enctype="multipart/form-data" name="contact-form">
                        <div class="form-group">
                            <label for="telefono">Nombre</label>
                            <input type="text" name="nombre" class="form-control" value="<?php echo $row["nombre"] ?>" class="form-control" require autofocus>
                        </div>
                        <div class="form-group">
                            <label for="telefono">Apellido</label>
                            <input type="text" id="apellido" name="apellido" value="<?php echo $row["apellido"] ?>" class="form-control" required>
                            <input type="hidder" id="id_cliente" name="id" value="<?php echo $row["id_cliente"] ?>" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="telefono">Telefono</label>
                            <input type="number" name="telefono" value="<?php echo $row["telefono"] ?>" class="form-control" placeholder="Ingrese Telefono">

                        </div>
                        <div class="form-group">
                            <label for="Email">Email</label>
                            <input type="email" name="email" value="<?php echo $row["email"] ?>" class="form-control" placeholder="update email">
                        </div>
                        <div class="form-group">
                            <label for="fecha_nac">Fecha de Nacimiento</label>
                            <input type="date" name="fecha_nac" value="<?php echo $row["fecha_nac"] ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="clave">Clave</label>
                            <input type="text" name="clave" value="<?php echo $row["clave"] ?>" class="form-control" require>
                        </div>
                        <br>
                        <div class="d-grid">
                            <button type="submit" name="Modificar" class="btn btn-success btn-lg btn-form">Modificar</button>
                        </div>
                    </form>
                </div>
        </div>
    </section>
</body>
<?php include "footer.php"; ?>