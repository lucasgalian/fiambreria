<?php include "header.php";?>
<?php
/*
if (empty($_SESSION['id_cliente'])) {
    header("Location: index.php");
}*/
?>
<?php include "conexion.php"; ?>

<body>
    <!-- fin detalle vvav-->
    <div class="container p-4">

        <div class="row">
            <div class="col-md-8">
                <?php if (isset($_SESSION['message'])) { ?>
                    <div class="alert alert-<?= $_SESSION['message_type']; ?>  alert-dismissible fade show" role="alert">
                        <?= $_SESSION['message'] ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php session_unset();
                } ?>
                <div action="card card-body">
                    <form action="#">
                        <i class="bi bi-search"></i>
                        <input type="text" name="nombre" class="form-control">
                    </form>

                </div>
            </div>
            <h3>Lista de Productos<a href="pedido.php"><i class="bi bi-cart3"></i></a></h3>
            
            <table class="table-info table-bordered border-primary">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Producto</th>
                        <th>Descripcion</th>
                        <th>Accion</th>
                    </tr>
                    <tbody>
                    <tr style="width:600px;">
                          <?php
                                $sql = "select * from producto";
                                $result = mysqli_query($conexion, $sql);
                                while ($mostrar = mysqli_fetch_array($result)) {
                                ?>
                       
                            <td style="width: 100px;"><?php echo $mostrar['codigo'] ?></td>
                            <td style="width: 100px;">
                                <?php 
                                $id = $mostrar['id_producto'];
                                $imagen= "static/img/" . $id . "/principal.jpg";
                                if(!file_exists($imagen)){
                                    $imagen="static/noimg.jpg";
                                }
                                
                                ?>
                                <img src="<?php echo $imagen; ?>" alt="..." class="img-thumbnail">
                            </td>
                            <td style="width:300px;">
                                Descripcion: <b><?php echo $mostrar['nombre'] ?></b> | <br>Precio del Producto: <b>$<?php echo $mostrar['precio'] ?></b>
                                               | 
                            </td>
                            <td style="width:300px;">
                                <form action="" method="post">
                                <input type="hidden" name="id_producto" value="<?php echo $mostrar['id_producto']; ?>" >
                                    <input type="hidden" name="nombre" value="<?php echo $mostrar['nombre'];?>" >
                                    <input type="number" name="cantidad" value="1" style="width: 50px;"><br>
                                    <input type="hidden" name="precio" value="<?php echo $mostrar['precio']; ?>">
                                    <input type="submit" value="Agregar" name="btnAgregar">
                                </form>
                            </td>

                        </tr>
                       <?php } ?>

                    </tbody>
                   
            </table>
        </div>
        <?php 
        if (isset($_REQUEST['btnAgregar'])){//declaro las variables al agregar c/u
           // $id_producto = $_REQUEST['id_producto'];
            $nombre=$_REQUEST["nombre"];
            $cantidad=$_REQUEST["cantidad"];
            $precio=$_REQUEST["precio"];
            echo "id: $id_producto, producto:$nombre, cantidad: $cantidad";
            //if (isset($indice)){
               // $_SESSION["pedido"][$nombre]["id_producto"]= $id_producto;
                $_SESSION["pedido"][$nombre]["cantidad"]= $cantidad; //Agreglos Sociativo Carrito -->>nombre
                $_SESSION["pedido"][$nombre]["precio"]= $precio;
                echo "<script>alert('Producto $nombre agregado con exito al carrito de compra');</script>";
            /*}else{
                $_SESSION['pedido'][$nombre]['cantidad']= $cantidad; //Agreglos Susceptivo Carrito -->>nombre
                $_SESSION['pedido'][$nombre]['precio']= $precio;
                echo "<script>alert('Producto $nombre agregado con exito al carrito de compra');</script>";
            }*/
        }
    
        
        ?>
        

</body>

</html>