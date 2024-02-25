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
                <i class="bx bxl-codepen"></i>
                <span>UPR Arecibo</span>
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
                    <i class="bx bx-grid-alt"></i>
                    <span class="nav-item">Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
            </li>
            <li>
                <a href="#">
                    <i class="bx bxs-grid-alt"></i>
                    <span class="nav-item">Search</span>
                </a>
                <span class="tooltip">Search</span>
            </li>
            <li>
                <a href="#">
                    <i class="bx bx-list-check"></i>
                    <span class="nav-item">Reports</span>
                </a>
                <span class="tooltip">Reports</span>
            </li>
            <li>
                <a href="#">
                    <i class="bx bx-body"></i>
                    <span class="nav-item">Users</span>
                </a>
                <span class="tooltip">Users</span>

            </li>
            <li>
                <a href="#">
                    <i class="bx bx-log-out"></i>
                    <span class="nav-item">Log Out </span>
                </a>
                <span class="tooltip">Log Out</span>
            </li>
        </ul>
    </div>


    <div class="main-content">
        <div class="container">
            <h1>title</h1>
        </div>
    </div>

</body>

<script>
let btn = document.querySelector('#btn');
let sidebar = document.querySelector('.sidebar');
btn.onclick = function() {
    sidebar.classList.toggle('active');
};
</script>

</html>