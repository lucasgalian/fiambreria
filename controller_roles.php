
<?php 
$roles_permitidos = ['Administrativo','Cliente'];
//array_key busca un  rol dentro de session !! validamos el rol
if (!array_key_exists('roles', $_SESSION) || !in_array($_SESSION['rol'],$roles_permitidos)){
    header('Location:base.php');
}

?>