<?php
include "conexion.php";

/*if (isset($_POST['id_producto'])){
    $id = $_POST['id_producto'];
    $query = "DELETE FROM producto WHERE id = '$id'";
    $resultado= mysqli_query($conexion,$query);
    if(!$resultado){
        die("Query Failed");
    }

    $_SESSION['message'] = 'Cliente Eliminado';
    $_SESSION['message_type'] = 'danger';
    header("Location: index.php");
}*/
$id=$_REQUEST["id"];
 $sql="delete from producto where id_producto ='$id'";
 //$sql = "update cliente set activo='0' where id_cliente='$id'";
 $result=mysqli_query($conexion, $sql);
 if (!$result){
    die("Fallo");
 }
 $_SESSION['message'] = 'Producto Eliminado';
 $_SESSION['message_type'] = 'danger';  
 header("Location:producto.php");
?>*/