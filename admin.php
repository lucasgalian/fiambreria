<?php
include 'conexion.php';
session_start();
if (!isset($_SESSION['roles'])){
    header('Location: login.php');
}else{
    if($_SESSION['roles'] !=1){
        header('Location: login.php');
    }

}


?>