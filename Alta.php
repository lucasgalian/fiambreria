 <?php
 //   include 'conexion.php';
    if ((isset($_POST['Alta']))) {

        extract($_POST);
        $fecha_nac = date("d/m/y");
        $sql = "INSERT INTO cliente(nombre, apellido, telefono, email, fecha_nac) VALUES ('$nombre', '$apellido', '$telefono', '$email', '$fecha_nac')";
        $result = mysqli_query($conexion, $sql);
        if (!$result) {
            die("Fallo");
        }
        $_SESSION['message'] = 'Cliente Guardado Correctamente';
        $_SESSION['message_type'] = 'success';
        header("Location:Alta.php");
    }
    ?>
 <?php include "header.php"; ?>
 <body>

     <main>
         <?php if (isset($_SESSION['message'])) { ?>
             <div class="alert alert-<?= $_SESSION['message_type']; ?>  alert-dismissible fade show" role="alert">
                 <?= $_SESSION['message'] ?>
                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             </div>
         <?php session_unset();
            } ?>
         <!-- Sección Ser un Orador -->

         <div class="container p-4">
             <div class="row">
                 <div class="col-md-3">
                     <div class="card card-body">
                         <p class="text-center">Conviértete en un</p>
                         <h2 class="text-center">Cliente</h2>
                         <p class="text-center"></p>
                         <form action="Alta.php" method="post" enctype="multipart/form-data" name="contact-form">
                             <div class="form-group">
                                 <div class="form-floating col-md mb-3">
                                     <input name="nombre" id="nombre" type="text" class="form-control" placeholder="Nombre" aria-label="nombre" required autofocus>
                                     <label for="nombre">Nombre</label>
                                 </div>

                                 <div class="form-floating col-md mb-3">
                                     <input name="apellido" id="apellido" type="text" class="form-control" placeholder="Apellido" aria-label="Apellido" required>
                                     <label for="apellido">Apellido</label>
                                 </div>
                                 <div class="form-floating col-md mb-3">
                                     <input name="telefono" id="telefono" type="number" class="form-control" placeholder="Telefono" aria-label="Telefono" required>
                                     <label for="nombre">Telefono</label>
                                 </div>
                                 <div class="form-floating col-md mb-3">
                                     <input name="email" id="email" type="email" class="form-control" placeholder="Ingrese su email" aria-label="email" required>
                                     <label for="email">Email</label>
                                 </div>
                             </div>
                             <div id="emailHelp" class="form-text mb-3">Desea guardar tus datos.</div>
                             <div class="d-grid">
                                 <button type="submit" name="#" class="btn btn-success btn-lg btn-form">Guardar</button>
                             </div>
                         </form>
                     </div>
                <section id="id_cliente" class="container">
                     <div class="col-md-8">
                         <table class="table table-bordered">
                             <thead>
                                 <tr>
                                     <td cellpadding="5" colspan="7"><a style="float:rigth;" href="Alta.php">Nuevo Cliente</a> </td>
                                 </tr>
                                 <tr>
                                     <th>Nombre</th>
                                     <th>Apellido</th>
                                     <th>Telefono</th>
                                     <th>Email</th>
                                     <th>Fecha de Nacimiento</th>
                                     <th>Acciones</th>
                                 </tr>
                                 <?php

                                    $sql = "select * from cliente "; 
                                    $result = mysqli_query($conexion, $sql);

                                    while ($row = mysqli_fetch_array($result)) {

                                    ?>

                                     <tr>
                                         <td><?php echo $row["nombre"] ?></td>
                                         <td><?php echo $row["apellido"] ?></td>
                                         <td><?php echo $row["telefono"] ?></td>
                                         <td><?php echo $row["email"] ?></td>
                                         <td><?php echo $row["fecha_nac"] ?></td>
                                         <td>
                                             <a href="edit.php?id=<?php echo $row["id_cliente"] ?>" class="btn btn-link">
                                                 <i class="bi bi-wrench"></i>
                                             </a>

                                             <a href="deleteCli.php?id=<?php echo $row["id_cliente"] ?>" class="btn btn-link">
                                                 </svg><i class="bi bi-trash"></i>
                                             </a>
                                         </td>
                                     </tr>
                                 <?php } ?>
                         </table>
                     </div>
                </section>

                     <div class="col-md-8">
                         <table class="table table-bordered">
                             <thead>
                                 <tr>
                                     <td cellpadding="5" colspan="7"><a style="float:rigth;" href="Alta.php">Nuevo Cliente</a> </td>
                                 </tr>
                                 <tr>
                                     <th>Nombre</th>
                                     <th>Apellido</th>
                                     <th>Telefono</th>
                                     <th>Email</th>
                                     <th>Fecha de Nacimiento</th>
                                     <th>Acciones</th>
                                 </tr>
                                 <?php

                                    $sql = "select * from cliente ";
                                    $result = mysqli_query($conexion, $sql);

                                    while ($row = mysqli_fetch_array($result)) {

                                    ?>

                                     <tr>
                                         <td><?php echo $row["nombre"] ?></td>
                                         <td><?php echo $row["apellido"] ?></td>
                                         <td><?php echo $row["telefono"] ?></td>
                                         <td><?php echo $row["email"] ?></td>
                                         <td><?php echo $row["fecha_nac"] ?></td>
                                         <td>
                                             <a href="edit.php?id=<?php echo $row["id_cliente"] ?>" class="btn btn-link">
                                                 <i class="bi bi-wrench"></i>
                                             </a>

                                             <a href="deleteCli.php?id=<?php echo $row["id_cliente"] ?>" class="btn btn-link">
                                                 </svg><i class="bi bi-trash"></i>
                                             </a>
                                         </td>
                                     </tr>
                                 <?php } ?>
                         </table>
                     </div>
                 </div>
             </div>
         </div>

     </main>
     <a href="index.php">Volver</a>
     <footer>

     </footer>
     <!-- Bootstrap JS -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

 </body>

 </html>

 </body>

 </html>