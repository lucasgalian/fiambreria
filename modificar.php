<?php include "header.php"; ?>
<?php
include 'conexion.php';

if ((isset($_POST['modificar']))){

extract($_POST);

$sql= "Update producto set codigo='$codigo', 
nombre='$nombre', 
cantidad='$cantidad', 
precio='$precio'
where id_producto='$id'";
$result=mysqli_query($conexion, $sql);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <title>Modificar</title>
</head>
<body>
    <header>
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class= "navbar-brand" href="index.php"></a>

            </div>

        </nav>
    </header>
    <main>
        <section id="id_producto" class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-xl-8">
                    <p class="text-center">Modifica el</p>
                    <h2 class="text-center">Producto</h2>
                    <p class="text-center"></p>
                        <?php
                        $id= $_REQUEST["id"];
                        //echo $id;
                        $sql="select * from producto  where id_producto='$id'";
                        $result=mysqli_query($conexion, $sql);
                        $row=mysqli_fetch_array($result);
                        ?>
                        <form action= "modificar.php" method="POST" enctype="multipart/form-data" name ="contact-form">
                            <div class="row gx-2">

                            <div class="form-floating col-md mb-3">
                                <input name="codigo"  type="number" class="form-control" value="<?php echo $row["codigo"] ?>" aria-label="codigo" required>
                                <input name="id"  type="hidden" class="form-control" value="<?php echo $row["id_producto"] ?>" aria-label="codigo" >
                                <label for="codigo">Codigo</label>
                            <div class="form-floating col-md mb-3">
                                <input name="nombre" id="nombre" type="text" class="form-control" value="<?php echo $row["nombre"] ?>" required>
                                <label for="nombre">Nombre</label>
    
                            </div>
                            <div class="form-floating col-md mb-3">
                                <input name="cantidad" id="cantidad" type="text" class="form-control" value="<?php echo $row["cantidad"] ?>" aria-label="cantidad" required>
                                <label for="cantidad">Cantidad</label>
                            </div>
                            <div class="form-floating col-md mb-3">
                                <input name="precio" id="precio" type="text" class="form-control" value="<?php echo $row["precio"] ?>" aria-label="precio" required>
                                <label for="precio">Precio</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                 <div class="d-grid">
                                    <button type="submit" name="modificar" class="btn btn-success btn-lg btn-form">Modificar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                      <a href="index.php">Volver</a>
                </div>
            </div>
        </section>
    </main>
    <footer>
        
    </footer>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
        crossorigin="anonymous"></script>
    
</body>

</html>


