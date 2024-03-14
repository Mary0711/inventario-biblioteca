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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>


</head>


<body>
    <?php include 'sidebar.php'; ?>



    <main class="main-content">
        <div class="container">
            <div class="title">
                <h3>Reportes</h3>
            </div>

            <!-- <div class="user-info">
                <div>
                    <p>Nombre Apellido Apellido</p>
                </div>
                <img src="../images/userdefault.png" />
            </div>
        -->

        </div>
        <div class="summary container">
            <div class="cards">

                <div class="category">
                    <div class="icon">
                        <i class="bx bx-user" aria-hidden="true"></i><br>
                        <h6>
                            Reporte Semanal
                        </h6>
                    </div>
                    <div class="details">
                        <a href="#" onclick="showTable('ver')">Ver</a>
                    </div>

                </div>
                <div class="category" target="green">
                    <div class="icon">
                        <i class="bx bx-user" aria-hidden="true"></i><br>
                        <h6>
                            Reporte Mensual
                        </h6>
                    </div>
                    <div class="details">
                        <a href="#">Ver</a>
                    </div>

                </div>
                <div class="category" target="yellow">
                    <div class="icon">
                        <i class="bx bx-user" aria-hidden="true"></i><br>
                        <h6>
                            Reporte Anual
                        </h6>
                    </div>
                    <div class="details">
                        <a href="#">Ver</a>
                    </div>

                </div>

            </div>

        </div>
        <div class="recents container">


            <div id="tableContainer">

                <table class="table">

                </table>
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

function showTable(action) {
    var table = document.getElementById('tableContainer');
    if (action === 'ver') {
        table.style.display = 'block';
        table.innerHTML = `
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col"># de Serie</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Ubicacion</th>
                        <th scope="col">Estatus</th>
                        <th scope="col">Recibido por</th>
                        <th scope="col">A cargo de</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Monitor DELL</td>
                        <td>Electronico</td>
                        <td>Admin Admin</td>
                        <td>Electronico</td>
                        <td>Admin Admin</td>
                        <td>3 de marzo de 2024</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Monitor DELL</td>
                        <td>Electronico</td>
                        <td>Admin Admin</td>
                        <td>Electronico</td>
                        <td>Admin Admin</td>
                        <td>3 de marzo de 2024</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Monitor DELL</td>
                        <td>Electronico</td>
                        <td>Admin Admin</td>
                        <td>Electronico</td>
                        <td>Admin Admin</td>
                        <td>3 de marzo de 2024</td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td>Monitor DELL</td>
                        <td>Electronico</td>
                        <td>Admin Admin</td>
                        <td>Electronico</td>
                        <td>Admin Admin</td>
                        <td>3 de marzo de 2024</td>
                    </tr>
                </tbody>
            </table>
        `;
    }
}
</script>

</html>