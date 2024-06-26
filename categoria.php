<?php include "header.php"; ?>
<?php
//ini_set('display_errors',1);
include 'conexion.php';
//Si pulso el boton..
if (isset($_POST['cate'])) {
    extract($_POST);
    //Insertamos los datos en las tablas
    $sql = "INSERT INTO categoria (categoria)values('$categoria')";
    //conexion con la BD P/ingresar los input
    $result = mysqli_query($conexion, $sql);
    if ($result) {
        echo "Categoria Agregada";
        header("Location:producto.php");
    } else {
        echo "<div class='alert alert-danger'>Categoria no agregada</div>";
    }
} 


?>

<body>
    <section class="container p-4">
        <div class="row">
            <div class="col-md-4 mx.auto">
                <div class="card card-body">
                    <h2>Nuevo Registro</h2>
                    <form action="" method="post" enctype="multipart/form-data" name="contact-form">
                        <div class="form-group">
                            <label for="categoria">Categoria</label>
                            <input type="text" name="categoria" id="categoria" class="form-control" aria-label="categoria">
                            <small style="color: red;display:none" id="lbl_create">*Este campo es requerido</small>
                        </div>
                        <br>
                        <div class="d-grid">
                            <button type="submit" name="cate" id="btn_create" btn btn-success btn-lg btn-form">Categoria</button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
        <script>
            $('#btn_create').click(function() {
                var categoria = $('#categoria').val();
                if (categoria == " ") {
                    $('#categoria').focus();
                    $('#lbl_create').css('display', 'block');
                } else {
                    var url = "categoria.php";
                    $_GET(url, {
                        categoria: categoria
                    }, function(datos) {
                        $('respuesta').html(datos);
                    });
                }
            });
        </script>

    </section>


</body>
<?php include "footer.php"; ?>