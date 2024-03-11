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

        <div class="recents container">
            <h5>Lista de Usuarios</h5>
            <table class="table">
                <!--table-hove-->
                <thead>
                    <tr>
                        <th scope="col"># de Usuario</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Email</th>
                        <th scope="col">Status</th>
                        <th scope="col">Rol</th>
                        <th scope="col">Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $users = $_SESSION['user']->get_allUsers();

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