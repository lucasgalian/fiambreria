<?php include "header.php"; ?>
<?php
//ini_set('display_errors',1);
include 'conexion.php';


if (isset($_POST['login'])) {
    if (!empty($_POST['email']) and !empty($_POST['clave'])) {
        $email = $_POST['email'];
        $clave = md5($_POST['clave']);
        //Valida los datos ingresado con los datos en BD
        $sql = "select * from cliente where email ='$email' and clave='$clave' and activo=1";
        $result = mysqli_query($conexion, $sql);
        $row = mysqli_fetch_array($result);

        if ($row) {
            //Confirmacion de inicio de sesion
            session_name('back');
               session_start();
            //Ingresa por el formulario post
                $_SESSION['id_cliente'] = $row['id_cliente'];
                $_SESSION['nombre'] = $row['nombre'];
                $_SESSION['email'] = $row['email'];
               
                /*if (isset($_SESSION['roles'])) {
                  switch ($_SESSION['roles']) {
                    case 1:
                        header('location: admin.php');
                        break;
                    case 2:
                        header('location: base.php');
                        break;
                    default;
                }
            }*/
            $_SESSION['is_logged'] = 1;
            $_SESSION['message'] = 'Cliente Ingresado';
            $_SESSION['message_type'] = 'success';
            header('location: base.php');
            exit();}
        } else {
            session_start();
            $_SESSION['message'] = 'Cliente Ingresado Incorrecto';
            $_SESSION['message_type'] = 'success';
            header('location: login.php');
            echo "<script> alert('Error al Ingresar Usuario o Password'): location.href='login.php';</script>";
        }
    }
 else {
    echo "<script> alert('Error al Ingresar Usuario o Password'): location.href='login.php';</script>";
}

?>

<?php if (isset($_SESSION['message'])) { ?>
    <div class="alert alert-<?= $_SESSION['message_type']; ?>  alert-dismissible fade show" role="alert">
        <?= $_SESSION['message'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php session_unset();
} ?>

<body>
    <section id="id_cliente" class="container">
        <div class="row justify-content-center">
            <div class="col-8 col-md-6 offset-md3">
                <h2 class="text-center">Inicio Sesion</h2>
                <form action="" method="post" enctype="multipart/form-data" name="contact-form">
                    <div class="row gx-2">
                        <div class="form-floating col-md mb-3">
                            <input name="email" type="email" class="form-control" placeholder="E-mail" aria-label="email" required>
                            <label for="nombre">Email</label>
                        </div>
                        <div class="row gx-2">
                            <div class="form-floating col-md mb-3">
                                <input name="clave" id="clave" type="password" class="form-control" placeholder="Contraseña" aria-label="Contraseña" required>
                                <label for="clave">Contraseña</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <div class="d-grid">
                                    <button type="submit" name="login" class="btn btn-success btn-lg btn-form">Ingresar</button>
                                </div>
                            </div>
                        </div>
                </form>
                <p class="mt-3">¿No tienes una cuenta? <a href="registroUser.php">Registrate aqui</a></p>
                <a href="index.php">Volver</a>
            </div>
        </div>
    </section>

</body>
<?php include "footer.php"; ?>

</html>