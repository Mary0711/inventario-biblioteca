<?php
include "../code/user.php";
session_start();

/*
if (!isset($_SESSION['user'])) {
    header("Location: ../");
}*/
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/inventario.css">
    <link rel="stylesheet" href="../css/search.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>


</head>


<body>
    <?php include 'sidebar.php'; ?>

    <main class="main-content">
        <div class="container">
            <div class="title">
                <?php
                if (isset($_POST['serial_num'])) {
                    $object = $_SESSION['user']->get_object($_POST['serial_num']);
                }
                print '<h5>' . $object['name'] . '</h5>'
                ?>
                <h3>Editar Informacion</h3>
            </div>
        </div>

        <div class="container">
            <div class="filter">
                <?php
                print '
                <form action="editObject.php" method="post">
                    <div class="form">
                        <div class="detalles">

                            <label> Nombre:</label>
                            <input type="hidden" name="name" value=' . $object['name'] . '><br>
                            <label> Descripcion:</label>
                            <input type="hidden" name="description" value=' . $object['description'] . '><br>
                            <div class="detalles2">
                                <div class="radbtn">
                                    <label> Estado:</label>

                                    <input type="radio" id="activo" name="status" value="activo" checked>
                                    <label for="activo">activo</label>
                                    <input type="radio" id="decomisado" name="status" value="decomisado">
                                    <label for="decomisado">decomisado</label><br>
                                </div>
                                <div class="radbtn">
                                    <label> Area:</label>

                                    <input type="radio" id="admin" name="area" value="admin" checked>
                                    <label for="admin">administrativa</label>
                                    <input type="radio" id="est" name="area" value="est">
                                    <label for="est">estudiantil</label><br>

                                </div>
                                <div class="radbtn">
                                    <label> Piso:</label>

                                    <input type="radio" id="1" name="piso" value="1" checked>
                                    <label for="1">1</label>
                                    <input type="radio" id="2" name="piso" value="2">
                                    <label for="2">2</label><br>
                                </div>
                            </div>

                        </div>
                        <label> Categoria:</label>
                        <div class="categorias">

                            <div class="check1">
                                <input type="checkbox" id="cat1" name="cat1" value="laptop">
                                <label for="cat1"> laptop</label><br>
                                <input type="checkbox" id="cat1" name="cat1" value="laptop">
                                <label for="cat1"> Monitor</label><br>
                                <input type="checkbox" id="cat1" name="cat1" value="laptop">
                                <label for="cat1"> escritorio</label><br>
                                <input type="checkbox" id="cat1" name="cat1" value="laptop">
                                <label for="cat1"> mesa</label><br>
                                <input type="checkbox" id="cat1" name="cat1" value="laptop">
                                <label for="cat1"> silla</label><br>

                            </div>

                            <div class="check2">
                                <input type="checkbox" id="cat1" name="cat1" value="laptop">
                                <label for="cat1"> televisores</label><br>
                                <input type="checkbox" id="cat1" name="cat1" value="laptop">
                                <label for="cat1"> teclados</label><br>
                                <input type="checkbox" id="cat1" name="cat1" value="laptop">
                                <label for="cat1"> muebles</label><br>
                                <input type="checkbox" id="cat1" name="cat1" value="laptop">
                                <label for="cat1"> escritorio</label><br>
                                <input type="checkbox" id="cat1" name="cat1" value="laptop">
                                <label for="cat1"> silla</label><br>
                            </div>

                        </div>
                    </div>

                    <div class="buttons">
                        <button> Guardar </button>
                        <button> Cancelar </button>
                    </div>
                </form>'

                ?>

            </div>

        </div>







    </main>

</body>
<script>
    let btn = document.querySelector('#btn');
    let sidebar = document.querySelector('.sidebar');
    btn.onclick = function() {
        sidebar.classList.toggle('active');
    };

    let changeIcon = (icon) => icon.classList.toggle('bx-x');
</script>

</html>