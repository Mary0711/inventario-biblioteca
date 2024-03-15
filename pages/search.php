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
                <h3>Busqueda</h3>
            </div>

            <form>
                <div class="search">
                    <input class="search-input" type="search" placeholder="Buscar">
                    <i class="search-icon bx bx-search-alt"></i>

                </div>
            </form>
        </div>

        <div class="container">
            <div class="filter">
                <h7> Llene los siguientes campos para una busqueda especifica:</h7>

                <form>
                    <div class="form">
                        <div class="detalles">

                            <label> Numero de Serie:</label>
                            <input type="text" name="" id=""><br>
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
                        <label> Categorias:</label>
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
                        <button> Buscar </button>
                        <button> Limpiar </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="recents container">
            <h5></h5>
            <table class="table">
                <!--table-hove-->
                <thead>
                    <tr>
                        <th scope="col"># de Serie</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Area</th>
                        <th scope="col">Piso</th>
                        <th scope="col">Dueno</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Subido el</th>
                        <th scope="col">Ver / Editar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $objects = $_SESSION['user']->get_allObjects();

                    if ($objects !== false) {

                        foreach ($objects as $object) {
                            print "
                            <tr>
                                <th>" . $object['serial_num'] . "</th>
                                <th>" . $object['name'] . "</th>
                                <th>" . $object['type'] . "</th>
                                <th>" . $object['area'] . "</th>
                                <th>" . $object['floor'] . "</th>
                                <th>" . $_SESSION['user']->get_user($object['owner'])['username'] . "</th>
                                <th>" . $object['status'] . "</th>
                                <th>" . $object['date'] . "</th>
                                <th>
                                    <form action='editObject.php?search' method='post' target='_blank'>
                                        <input type='hidden' value=" . $object['serial_num'] . " name='serial_num'>
                                        <input type='hidden' value='user' name='action'>
                                        <button><i class='bx bxs-edit'></i></button>
                                    </form>
                                </th>
                            </tr>
                            ";
                        }
                    } else {
                        print " <tr> No objects </tr>";
                    }



                    ?>




                </tbody>

            </table>
            <div class="report">
                <button>Obtener Reporte</button>
            </div>
            <div class="pagination">

                <a href="#">&laquo;</a>
                <a href="#">1</a>
                <a href="#" class="active">2</a>
                <a href="#">3</a>
                <a href="#">4</a>
                <a href="#">5</a>
                <a href="#">6</a>
                <a href="#">&raquo;</a>

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