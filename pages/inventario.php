<?php
include "../code/user.php";
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: ../");
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/inventario.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>


</head>


<body>
    <div class="sidebar">
        <div class="top">
            <i class="bx bx-menu" id="btn" onclick="changeIcon(this)"></i>
        </div>
        <div class="user">
            <img src="../images/userdefault.png" alt="user image" class="user-img">
            <div>
                <?php
                print "
                <p class='bold'>" . $_SESSION['user']->get_username() . "</p>
                <p>Role: " . $_SESSION['user']->get_role() . "</p>
                ";
                ?>
            </div>
        </div>
        <ul>
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
                <?php
                if ($_SESSION['user']->get_role() == "user") {
                    print '
                    <a href="#">
                        <i class="bx bxs-user"></i>
                        <span class="nav-item">Account</span>
                    </a>
                    ';
                } else {
                    print '
                    <a href="#">
                        <i class="bx bxs-user"></i>
                        <span class="nav-item">Users</span>
                    </a>
                    ';
                }
                ?>
            </li>
            <li>
                <a href="../code/ingres.php?logout">
                    <i class="bx bx-log-out"></i>
                    <span class="nav-item">Log Out </span>
                </a>
            </li>
        </ul>
    </div>


    <main class="main-content">
        <div class="container">
            <div class="title">
                <h3>Dashboard</h3>
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
            <h5>Resumen</h5>
            <div class="cards">

                <div class="category">
                    <div class="icon">
                        <i class="bx bx-user" aria-hidden="true"></i><br>
                        <h5>
                            Categoria
                        </h5>
                        <h6>123</h6>
                    </div>
                    <div class="details">
                        <a href="#">Mas Detalles</a>
                    </div>
                </div>
                <div class="category" target="green">
                    <div class="icon">
                        <i class="bx bx-user" aria-hidden="true"></i><br>
                        <h5>
                            Categoria
                        </h5>
                        <h6>123</h6>
                    </div>
                    <div class="details">
                        <a href="#">Mas Detalles</a>
                    </div>
                </div>
                <div class="category" target="yellow">
                    <div class="icon">
                        <i class="bx bx-user" aria-hidden="true"></i><br>
                        <h5>
                            Categoria
                        </h5>
                        <h6>123</h6>
                    </div>
                    <div class="details">
                        <a href="#">Mas Detalles</a>
                    </div>
                </div>
                <div class="category">
                    <div class="icon">
                        <i class="bx bx-user" aria-hidden="true"></i><br>
                        <h5>
                            Categoria
                        </h5>
                        <h6>123</h6>
                    </div>
                    <div class="details">
                        <a href="#">Mas Detalles</a>
                    </div>
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

    let changeIcon = (icon) => icon.classList.toggle('bx-x');
</script>

</html>