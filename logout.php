<?php
include 'conexion.php';
session_name('back');
session_start();
unset($_SESSION['id_cliente']);
   		unset($_SESSION['email']);
   		unset($_SESSION['nombre']);
   		unset($_SESSION['is_logged']);
		
           session_destroy();
		   $_SESSION['message'] = 'Sesion Terminada';
		   $_SESSION['message_type'] = 'danger';  
           header('location: index.php?mensaje=Se ha desconectado del sistema');
?>