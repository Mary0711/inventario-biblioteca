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
    <div class="sidebar">
        <div class="top">
            <div class="logo">
                <!-- <i class="bx bxl-codepen"></i> -->
                <span>Universidad de Puerto Rico </span>
            </div>
            <i class="bx bx-menu" id="btn"></i>
        </div>
        <div class="user">
            <img src="../images/userdefault.png" alt="user image" class="user-img">
            <div>
                <p class="bold">Nombre Apellido</p>
                <p>Admin / Viewer</p>

            </div>
        </div>
        <ul>
            <!-- CAMBIAR CADA ICON -->
            <li>
                <a href="#">
                    <i class="bx bxs-dashboard"></i>
                    <span class="nav-item">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="bx bx-search-alt"></i>
                    <span class="nav-item">Search</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="bx bxs-report"></i>
                    <span class="nav-item">Reports</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="bx bxs-user"></i>
                    <span class="nav-item">Users</span>
                </a>

            </li>
            <li>
                <a href="#">
                    <i class="bx bx-log-out"></i>
                    <span class="nav-item">Log Out </span>
                </a>
                <!--  <span class="tooltip">Log Out</span> -->
            </li>
        </ul>
    </div>


    <main class="main-content">
        <div class="container">
            <div class="title">
                <h3>Dashboard</h3>
            </div>
            <div class="user-info">

                <div>
                    <p>Nombre Apellido Apellido</p>

                </div>
                <img src="../images/userdefault.png" />

            </div>

        </div>
        <div class="summary container">
            <h5>Resumen</h5>
            <div class="cards">
                <div class="card">
                    <!--     <a href="#"> </a> -->
                    <div class="card-header">
                        <i class='bx bxs-category-alt'> </i>
                        <h6>Categoria</h6>
                    </div>
                    <p>1,234</p>

                </div>
                <div class=" card">
                    <div class="card-header">
                        <i class='bx bxs-category-alt'> </i>
                        <h6>Categoria</h6>
                    </div>
                    <p>1,234</p>
                </div>
                <div class="card">
                    <div class="card-header">
                        <i class='bx bxs-category-alt'> </i>
                        <h6>Categoria</h6>
                    </div>
                    <p>1,234</p>
                </div>
                <div class="card">
                    <div class="card-header">
                        <i class='bx bxs-category-alt'> </i>
                        <h6>Categoria</h6>
                    </div>
                    <p>1,234</p>
                </div>
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
</script>

</html>

<!-- tutorial 1
        <div class="cards">
            <div class="card1">
                <span class="bx bxs-bar-chart-alt-2"></span>
                <div class="middle">
                    <div class="left">
                        <h3>titulo</h3>
                        <h1>numeros</h1>
                    </div>

                </div>
            </div>
            <div class="card2">
                <span class="bx bxs-bar-chart-alt-2"></span>
                <div class="middle">
                    <div class="left">
                        <h3>titulo</h3>
                        <h1>numeros</h1>
                    </div>

                </div>
            </div>
            <div class="card3">
                <span class="bx bxs-bar-chart-alt-2"></span>
                <div class="middle">
                    <div class="left">
                        <h3>titulo</h3>
                        <h1>numeros</h1>
                    </div>

                </div>
            </div>
        </div> <!-- cards
        <div class="recents"></div>
        <h2>Recientes</h2>
        <table>
            <thead>
                <tr>
                    <th> Columna1</th>
                    <th> Columna2</th>
                    <th> Columna3</th>
                    <th> Columna4</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td> info </td>
                    <td>info </td>
                    <td>info</td>
                    <td>info</td>
                </tr>
                <tr>
                    <td> info </td>
                    <td>info </td>
                    <td>info</td>
                    <td>info</td>
                </tr>
                <tr>
                    <td> info </td>
                    <td>info </td>
                    <td>info</td>
                    <td>info</td>
                </tr>
                <tr>
                    <td> info </td>
                    <td>info </td>
                    <td>info</td>
                    <td>info</td>
                </tr>
                <tr>
                    <td> info </td>
                    <td>info </td>
                    <td>info</td>
                    <td>info</td>
                </tr>
                <tr>
                    <td> info </td>
                    <td>info </td>
                    <td>info</td>
                    <td>info</td>
                </tr>
            </tbody>
        </table>
        <a href="#">Show all</a>

        </div> -->