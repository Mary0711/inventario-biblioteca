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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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

        <div class="filter container">
            <h7> Llene los siguientes campos para una busqueda especifica:</h7>

            <form>
                <label>Seleccionar Categoria</label>
                <input type="text" name="" id="">
                <label>Seleccionar Rango de Fecha</label>
                <input type="text" name="" id="">
                <label>Seleccionar Estado</label>
                <input type="text" name="" id="">
            </form>
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
                        <th scope="col">Registrado por</th>
                        <th scope="col">Subido el</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Monitor DELL</td>
                        <td>Electronico</td>
                        <td>Admin Admin</td>
                        <td>3 de marzo de 2024</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Monitor DELL</td>
                        <td>Electronico</td>
                        <td>Admin Admin</td>
                        <td>3 de marzo de 2024</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Monitor DELL</td>
                        <td>Electronico</td>
                        <td>Admin Admin</td>
                        <td>3 de marzo de 2024</td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td>Monitor DELL</td>
                        <td>Electronico</td>
                        <td>Admin Admin</td>
                        <td>3 de marzo de 2024</td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td>Monitor DELL</td>
                        <td>Electronico</td>
                        <td>Admin Admin</td>
                        <td>3 de marzo de 2024</td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td>Monitor DELL</td>
                        <td>Electronico</td>
                        <td>Admin Admin</td>
                        <td>3 de marzo de 2024</td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td>Monitor DELL</td>
                        <td>Electronico</td>
                        <td>Admin Admin</td>
                        <td>3 de marzo de 2024</td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td>Monitor DELL</td>
                        <td>Electronico</td>
                        <td>Admin Admin</td>
                        <td>3 de marzo de 2024</td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td>Monitor DELL</td>
                        <td>Electronico</td>
                        <td>Admin Admin</td>
                        <td>3 de marzo de 2024</td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td>Monitor DELL</td>
                        <td>Electronico</td>
                        <td>Admin Admin</td>
                        <td>3 de marzo de 2024</td>
                    </tr>

                </tbody>
                <tfoot></tfoot>
            </table>
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