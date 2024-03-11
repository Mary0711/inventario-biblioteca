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

        <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_POST['action']) and $_POST['action'] == 'user') {
                $user;

                if (isset($_POST['id'])) {
                    $user = $_SESSION['user']->get_user($_POST['id']);
                } else {
                    header("Location: users.php?users");
                }

                if ($user === false) {
                    header("Location: users.php?users");
                }

                print '
                <div class="container">
                    <div class="title">
                        <h3>Editar Usuario</h3>
                    </div>
                </div>
                ';

                print '
                <div class="recents container">
                    <h5>Usuario: ' . $user['username'] . '</h5>
                    <form>
                        <label>Username</label>
                        <input type="text" value=' . $user['username'] . ' name="username"><br>

                        <label>Email</label>
                        <input type="email" value=' . $user['email'] . ' name="email"><br>

                        <label>Status</label><br>';

                if ($user['status'] == 1) {
                    print '
                    <label>Active</label>
                    <input type="radio" checked name="status" value="active"><br>

                    <label>Inactive</label>
                    <input type="radio" name="status" value="inactive"><br>
                    ';
                } else {
                    print '
                    <label>Active</label>
                    <input type="radio" name="status" value="active"><br>

                    <label>Inactive</label>
                    <input type="radio" checked name="status" value="inactive"><br>
                    ';
                }

                print '
                <label>Role</label>
                <select>
                ';

                if ($user['role'] == 'admin') {
                    print '
                    <option name="role" value="admin" selected>Admin</option>
                    <option name="role" value="user">User</option>
                    ';
                } else {
                    print '
                    <option name="role" value="admin">Admin</option>
                    <option name="role" value="user" selected>User</option>
                    ';
                }

                print '</select>
                    </form>
                </div>
                ';
            }
        }
        ?>
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