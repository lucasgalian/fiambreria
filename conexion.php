<?php
$servidor = "localhost";
$usuario = "root";
$contraseña ="";
$basededatos= "fiambreria";



$conexion = mysqli_connect($servidor, $usuario, $contraseña) or die ("No se conecto al servidor");
$db = mysqli_select_db($conexion, $basededatos) or die ("No se de conecto a la base");

?>                                  