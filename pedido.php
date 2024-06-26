<?php include "header.php"; ?>

<?php
include "conexion.php";
$total=0;
$preciototal=0;
echo "<h3>Carrito de Compras</h3>";
if (isset($_SESSION["pedido"])){    //indice=nombre del producto  arregle =cantidad y precio
    foreach($_SESSION["pedido"] as $indice =>$arreglo){
        echo "<hr>Producto: <strong>". $indice . "</strong><br>";

        $total = $arreglo['cantidad'] * $arreglo['precio'];
        $preciototal=$preciototal + $total;
        foreach($arreglo as $key =>$value){    //Divide cantidad por su valor y precio por su valor
            echo $key .": " . $value . "<br>";
        }
        echo "<a href='pedido.php?item=$indice'>Eliminar item</a>";
    }
    echo "<h3>El total de la compra actual es de $ $preciototal </h3>";
    echo '<br><a href="base.php">Regresar</a> |
          <a href="pedido.php?vaciar=true">Vaciar Compra</a>';
}else{
    echo "<script>alert('El carrito esta vacio');</script>";
    ?>
    <a href="base.php">Regresar</a> |
    <?php
}
if(isset($_REQUEST["vaciar"])){
    session_destroy();
    header("Location:pedido.php");
}
if(isset($_REQUEST["item"])){
    $nombre=$_REQUEST["item"];
    unset($_SESSION["pedido"][$nombre]);
    echo "<script>alert('Se elimino el producto:$nombre');</script>";
    header("location:pedido.php");
}
?>
<?php include "footer.php"; ?>