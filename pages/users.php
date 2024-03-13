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
    <link rel="stylesheet" href="../css/users.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>


</head>


<body>
    <?php include 'sidebar.php'; ?>



    <main class="main-content">
        <div class="container">
            <div class="title">
                <h3>Usuarios</h3>
            </div>

            <!-- <div class="user-info">
                <div>
                    <p>Nombre Apellido Apellido</p>
                </div>
                <img src="../images/userdefault.png" />
            </div>
        -->

        </div>

        <div class="container">
            <div class="category">
                <div class="icon">
                    <h6>Añadir Usuario</h6>
                </div>
                <button><i class='bx bx-plus-circle'></i></button>
            </div>
        </div>

        <div class="recents container">
            <h5>Lista de Usuarios</h5>
            <table class="table">
                <!--table-hove-->
                <thead>
                    <tr>
                        <th scope="col"># de Usuario
                            <button>
                                <a <?php echo (isset($_GET['sort']) and $_GET['sort'] == "user_id") ? "class='active'" : "";
                                    echo (isset($_GET['order']) and $_GET['order'] == "ASC") ? "href='users.php?users&sort=user_id&order=DESC'" : "href='users.php?users&sort=user_id&order=ASC'" ?>>
                                    <i <?php echo (isset($_GET['order']) and isset($_GET['sort']) and $_GET['order'] == "DESC" and $_GET['sort'] == "user_id") ? "class='bx bxs-down-arrow'" : "class='bx bxs-up-arrow'" ?>></i>
                                </a>
                            </button>
                        </th>
                        <th scope="col">Nombre
                            <button>
                                <a <?php echo (isset($_GET['sort']) and $_GET['sort'] == "username") ? "class='active'" : "";
                                    echo (isset($_GET['order']) and $_GET['order'] == "ASC") ? "href='users.php?users&sort=username&order=DESC'" : "href='users.php?users&sort=username&order=ASC'" ?> href="users.php?users&sort=username&order=ASC">
                                    <i <?php echo (isset($_GET['order']) and isset($_GET['sort']) and $_GET['order'] == "DESC" and $_GET['sort'] == "username") ? "class='bx bxs-down-arrow'" : "class='bx bxs-up-arrow'" ?>></i>
                                </a>
                            </button>
                        </th>
                        <th scope="col">Email
                            <button>
                                <a <?php echo (isset($_GET['sort']) and $_GET['sort'] == "email") ? "class='active'" : "";
                                    echo (isset($_GET['order']) and $_GET['order'] == "ASC") ? "href='users.php?users&sort=email&order=DESC'" : "href='users.php?users&sort=email&order=ASC'" ?> href="users.php?users&sort=email&order=ASC">
                                    <i <?php echo (isset($_GET['order']) and isset($_GET['sort']) and $_GET['order'] == "DESC" and $_GET['sort'] == "email") ? "class='bx bxs-down-arrow'" : "class='bx bxs-up-arrow'" ?>></i>
                                </a>
                            </button>
                        </th>
                        <th scope="col">Status<button>
                                <a <?php echo (isset($_GET['sort']) and $_GET['sort'] == "status") ? "class='active'" : "";
                                    echo (isset($_GET['order']) and $_GET['order'] == "ASC") ? "href='users.php?users&sort=status&order=DESC'" : "href='users.php?users&sort=status&order=ASC'" ?> href="users.php?users&sort=status&order=ASC">
                                    <i <?php echo (isset($_GET['order']) and isset($_GET['sort']) and $_GET['order'] == "DESC" and $_GET['sort'] == "status") ? "class='bx bxs-down-arrow'" : "class='bx bxs-up-arrow'" ?>></i>
                                </a>
                            </button>
                        </th>
                        <th scope="col">Rol<button>
                                <a <?php echo (isset($_GET['sort']) and $_GET['sort'] == "role") ? "class='active'" : "";
                                    echo (isset($_GET['order']) and $_GET['order'] == "ASC") ? "href='users.php?users&sort=role&order=DESC'" : "href='users.php?users&sort=role&order=ASC'" ?> href="users.php?users&sort=role&order=ASC">
                                    <i <?php echo (isset($_GET['order']) and isset($_GET['sort']) and $_GET['order'] == "DESC" and $_GET['sort'] == "role") ? "class='bx bxs-down-arrow'" : "class='bx bxs-up-arrow'" ?>></i>
                                </a>
                            </button>
                        </th>
                        <th scope="col">Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $users = false;
                    if (isset($_GET['sort']) and isset($_GET['order'])) {
                        $users = $_SESSION['user']->get_allUsers($_GET['sort'], $_GET['order']);
                    }

                    if ($users === false) {
                        $users = $_SESSION['user']->get_allUsers();
                    }

                    if ($users !== false) {
                        foreach ($users as $user) {
                            print "
                            <tr>
                                <th>" . $user['user_id'] . "</th>
                                <th>" . $user['username'] . "</th>
                                <th>" . $user['email'] . "</th>
                                <th>" . $user['status'] . "</th>
                                <th>" . $user['role'] . "</th>
                                <th>
                                    <form action='edit.php?users' method='post'>
                                        <input type='hidden' value=" . $user['user_id'] . " name='id'>
                                        <input type='hidden' value='user' name='action'>
                                        <button><i class='bx bxs-edit'></i></button>
                                    </form>
                                </th>
                            </tr>
                            ";
                        }
                    } else {
                        print "<tr colspan='5'>No Users</tr>";
                    }
                    ?>
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