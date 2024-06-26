<?php include "header.php"; ?>
<?php
//ini_set('display_errors',1);
include 'conexion.php';
if (isset($_POST['pro'])) {
    //Almacena en las variables los datos de los input
    $categoria = $_POST['categoria'];
    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $cantidad = $_POST['cantidad'];
    $precio = $_POST['precio'];
    //Insertamos los datos en las tablas
    $sql = "INSERT INTO producto (categoria, codigo, nombre, cantidad, precio) VALUES ('$categoria','$codigo','$nombre','$cantidad','$precio')";
    //conexion con la BD P/ingresar los input
    $result = mysqli_query($conexion, $sql);
    if ($result) {
        echo "<script> alert('El producto[$nombre]se agrego correctamente'): location.href='producto.php';</script>";
    } else {
        echo "<script> alert('Error al agregar producto'): location.href='producto.php';</script>";
    }
}
?>


<body>
<?php  echo "Usuario es: ". $_SESSION['nombre'];?>
    
        <div class="container">
            <div class="row">
                <div class="col-4 p-4 mx.auto center">
                    <div class="form-group">
                        <div class="card card-body">
                            <h2>Articulo Nuevo</h2>
                            <form action="" method="post" enctype="multipart/form-data" name="contact-form">
                                <div class="form-group">
                                    <select name="categoria" class="input input__select">
                                        <option value="" class="form-control">Selecionar...</option>
                                        <?php $sql = "select * from categoria";
                                        $result = mysqli_query($conexion, $sql);
                                        while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                            <option value="<?php echo $row["id_categoria"] ?>"><?php echo $row['categoria'] ?></option></a>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="codigo">Codigo</label>
                                    <input type="number" name="codigo" class="form-control" aria-label="codigo" require autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" name="nombre" class="form-control" aria-label="nombre" require>
                                </div>
                                <div class="form-group">
                                    <label for="cantidad">Cantidad</label>
                                    <input type="number" name="cantidad" class="form-control" aria-label="cantidad" require>
                                </div>
                                <div class="form-group">
                                    <label for="precio">Precio</label>
                                    <input type="money_format" name="precio" class="form-control" aria-label="precio" require>
                                </div>

                                <br>
                                <div class="d-grid">
                                    <button type="submit" name="pro" class="btn btn-success btn-lg btn-form">Producto Ingresado</button>
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
                                    <th scope="col">Categoria</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "select * from producto";
                                $result = mysqli_query($conexion, $sql);
                                while ($mostrar = mysqli_fetch_array($result)) {
                                ?>
                                    <tr>
                                        <td class="table-info"><?php echo $mostrar['categoria'] ?></td>
                                        <td class="table-info"><?php echo $mostrar['nombre'] ?></td>
                                        <td class="table-info"><?php echo $mostrar['cantidad'] ?></td>
                                        <td class="table-info"><?php echo $mostrar['precio'] ?></td>
                                        <td class="table-info">
                                            <a href="modificar.php?id=<?php echo $mostrar["id_producto"] ?>" class="btn btn-small btn-link"><i class="bi bi-wrench"></i></a>
                                            <a href="deletePro.php?id=<?php echo $mostrar["id_producto"] ?>" class="btn btn-small btn-link"><i class="bi bi-trash"></i></a>
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