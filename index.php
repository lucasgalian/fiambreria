<?php include "header.php"; ?>
<?php
//ini_set('display_errors',1);
include 'conexion.php';?>
<body>
    <main><!--CARTEL DE INFORMACION-->
        <?php if (isset($_SESSION['message'])) { ?>
            <div class="alert alert-<?= $_SESSION['message_type']; ?>  alert-dismissible fade show" role="alert">
                <?= $_SESSION['message'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php session_unset();
        } ?>
    </main>
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
                            </td><!--
                            <td style="width:300px;">
                                <form action="" method="post">
                                <input type="hidden" name="id_producto" value="<?php echo $mostrar['id_producto']; ?>" >
                                    <input type="hidden" name="nombre" value="<?php echo $mostrar['nombre'];?>" >
                                    <input type="number" name="cantidad" value="1" style="width: 50px;"><br>
                                    <input type="hidden" name="precio" value="<?php echo $mostrar['precio']; ?>">
                                    <input type="submit" value="Agregar" name="btnAgregar">
                                </form>
                            </td>-->

                        </tr>
                       <?php } ?>

                    </tbody>
                   
            </table>
        </div>
</body>
<?php include "footer.php"; ?>