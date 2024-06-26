<?php include "header.php"; ?>
<?php
//ini_set('display_errors',1);
include 'conexion.php';
if (isset($_POST['Cargo'])) {
    //Almacena en las variables los datos de los input
    extract($_POST);
    $rol = $_POST['rol'];
    //Insertamos los datos en las tablas
    $sql = "INSERT INTO roles(rol, creacion) VALUES ('$rol','$creacion')";
    //conexion con la BD P/ingresar los input
    $results = mysqli_query($conexion, $sql);
    if ($results) {
        echo "<script> alert('El Rol se agrego correctamente'): location.href='roles.php';</script>";
    } else {
        echo "<script> alert('Error al agregar producto'): location.href='producto.php';</script>";
    }
}
?>

<body>

    <div class="container">
        <div class="row">
            <div class="col-4 p-4 mx.auto center">
                <div class="form-group">
                    <div class="card card-body">
                        <h2>Nuevo Rol</h2>
                        <form action="" method="post" enctype="multipart/form-data" name="contact-form">
                            <div class="form-group">
                                <label for="rol">Funcion</label>
                                <input type="text" name="rol" class="form-control" aria-label="rol" require>
                            </div>
                            <div class="form-group">
                                <label for="creacion">Fecha de Inicio</label>
                                <input type="date" name="creacion" class="form-control" aria-label="creacion" require>
                            </div>
                            <div class="d-grid">
                                <button type="submit" name="Cargo" class="btn btn-success btn-lg btn-form">Ingrese Rol</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        
        <div class="col-8 p-4">
            <div class="card card-body">
                <table class="table table-bordered border-primary">
                    <thead class="bg-info">
                        <tr class="table-light">
                            <th scope="col">N°</th>
                            <th scope="col">Roles</th>
                            <th scope="col">Fecha de Inicio</th>
                            <th scope="col">Acciones</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $contador = 0;
                        $sql = "select * from roles ";
                        $result = mysqli_query($conexion, $sql);
                        while ($row = mysqli_fetch_array($result)) {
                            $contador = $contador + 1;
                        ?>
                            <tr>
                                <td center class="table-info"><?= $contador; ?></td>
                                <td class="table-info"><?php echo $row['rol'] ?></td>
                                <td class="table-info"><?php echo $row['creacion'] ?></td>
                                <td center class="table-info">
                                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                        <a href="show.php?id=<?php echo $row["id_roles"]; ?>" type="button" class="btn btn-success"><i class="bi bi-eye"></i></a>
                                        <button type="button" class="btn btn-warning">Middle</button>
                                        <button type="button" class="btn btn-danger"><i class="bi bi-trash3"></i></button>
                                    </div>
                                </td>
                            </tr>
                        <?php }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-8 p-4">
            <div class="card card-body">
                <table class="table table-bordered border-primary">
                    <thead class="bg-info">
                        <tr class="table-light">
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Email</th>
                            <th scope="col">Fecha de Nacimiento</th>
                            <th scope="col">Clave</th>
                            <th scope="col">Acciones</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $contador = 0;
                        $sql = "select * from cliente ";
                        $result = mysqli_query($conexion, $sql);
                        while ($row = mysqli_fetch_array($result)) {
                            
                        ?>
                            <tr>
                                <td class="table-info"><?php echo $row['nombre'] ?></td>
                                <td class="table-info"><?php echo $row['apellido'] ?></td>
                                <td class="table-info"><?php echo $row['telefono'] ?></td>
                                <td class="table-info"><?php echo $row['email'] ?></td>
                                <td class="table-info"><?php echo $row['fecha_nac'] ?></td>
                                <td class="table-info"><?php echo $row['clave'] ?></td>
                                <td center class="table-info">
                                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                        <a type="button" class="btn btn warning" href="edit.php?id=<?php echo $row["id_cliente"] ?>"><i class="bi bi-pen"></i></a>
                                        
                                        <button type="button" class="btn btn-danger"><i class="bi bi-trash3"></i></button>
                                    </div>
                                </td>
                            </tr>
                        <?php }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>

    </section>


</body>
<?php include "footer.php"; ?>