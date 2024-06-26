<?php include "header.php"; ?>
<?php
//ini_set('display_errors',1);
include 'conexion.php';
if (isset($_POST['registro'])) {
    //Almacena en las variables los datos de los input
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $fecha_nac = $_POST['fecha_nac'];
    $clave = md5($_POST['clave']);
    //Insertamos los datos en las tablas
    $sql = "INSERT INTO cliente (nombre, apellido, telefono, email, fecha_nac, clave) VALUES ('$nombre', '$apellido', '$telefono', '$email', '$fecha_nac','$clave')";
    //conexion con la BD P/ingresar los input
    $result = mysqli_query($conexion, $sql);
    if (!$result) {
        die("Fallo");
    }
    $_SESSION['message'] = 'Cliente Guardado Correctamente';
    $_SESSION['message_type'] = 'success';
    header("Location:login.php");
 
 } else{
    echo "<script> alert('Error al agregar Usuario'): location.href='login.php';</script>";
 } ?>
   


<body>
    <div class="container p-4">
        <div class="col-md-6 mx.auto">
            <div class="card card-body center">
                <h2>Registro</h2>
                <form action="" method="post" enctype="multipart/form-data" name="contact-form">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" class="form-control" aria-label="nombre" require autofocus>
                    </div>
                    <div class="form-group">
                        <label for="apellido">Apellido</label>
                        <input type="text" name="apellido" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="telefono">Telefono</label>
                        <input type="number" name="telefono" class="form-control" aria-label="telefono" placeholder="Ingrese Telefono">
                    </div>
                    <div class="form-group">
                        <label for="Email">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Ingrese Email">
                    </div>
                    <div class="form-group">
                        <label for="fecha_nac">Fecha de Nacimiento</label>
                        <input type="date" name="fecha_nac" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="Clave">Contraseña</label>
                        <input type="password" name="clave" class="form-control" placeholder="Ingrese Contraseña">
                    </div>
                    <br>
                    <div class="d-grid">
                        <button type="submit" name="registro" class="btn btn-success btn-lg btn-form">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</body>
<?php include "footer.php"; ?>