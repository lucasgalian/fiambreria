<?php
session_name('back');
session_start();
include 'conexion.php';
if (!isset($_SESSION['is_logged'])) {
  $_SESSION['is_logged'] = 'PHPSESSID';
  $_SESSION['is_logged'] == 0;
}
if ($_SESSION['is_logged'] == 0) {
  header('location: login.php?mensaje=Se ha desconectado del sistema');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="static/css/header.css">
  <title>Fiambreria</title>
</head>

<body>

  <header class="cabecera">
    <nav class="navbar navbar-expand-lg navbar-dark bg-info"><br>
      <div class="container">
        <a href="index.php" class="navbar-brand">Fiambreria</a>
      </div>
      <ul>
        <li>
          <a href="login.php" ;>Inicio Sesion</a>
        </li>
        <li><a href="registroUser.php" ;>Registrar</li>
      </ul>
      </div>
      </div>
    </nav>
  </header>

  <!-- Navbar content -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <h5><?php  $_SESSION['nombre'];?></h5>
      <div class="collapse navbar-collapse" id="navbarScroll">
        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="base.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="producto.php">Producto</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="roles.php">Roles<br>Usuarios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Cerrar Sesion</a>
          </li>
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
  </section>
</body>