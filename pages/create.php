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
    <link rel="stylesheet" href="../css/edit.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>


</head>


<body>
    <?php include 'sidebar.php'; ?>

    <main class="main-content">

        <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_POST['action']) and $_POST['action'] == 'user') {

                print '
                <div class="container">
                    <div class="title">
                        <h3>Crear Usuario</h3>
                    </div>
                </div>
                ';

                print '
                <div class="recents container">
                    <form action="create.php" method="post">

                        <div class="category">
                            <div class="icon">
                                <h6>Username</h6>
                                <input type="text" name="username">
                            </div>
                        </div>

                        <div class="category">
                            <div class="icon">
                                <h6>Email</h6>
                                <input type="email" name="email">
                            </div>
                        </div>

                        <div class="category">
                            <div class="icon">
                                <h6>Status</h6>
                                <label>Active</label>
                                <input type="radio" checked name="status" value="1"><br>

                                <label>Inactive</label>
                                <input type="radio" name="status" value="0"><br>
                            </div>
                        </div>

                        <div class="category">
                            <div class="icon">
                                <h6>Role</h6>
                            <select name="role">
                                <option name="role" value="admin" selected>Admin</option>
                                <option name="role" value="user">User</option>
                            </select>
                            </div>
                        </div>

                        <div class="break"></div>
                        <div class="buttons">
                            <button type="submit">Save</button>
                            <button type="button"><a href="users.php?users">Cancel</a></button>
                        </div>
                        <input type="hidden" name="create" value="user">
                    </form>
                </div>
                            ';
            } else if (isset($_POST['create'])) {
                if ($_POST['create'] == "user") {
                    $user = array(
                        "username" => $_POST['username'],
                        "email" => $_POST['email'],
                        "status" => $_POST['status'],
                        "role" => $_POST['role'],
                        "password" => "user"
                    );
                    $_SESSION['user']->create_user($user);

                    header("Location: users.php?users");
                }
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