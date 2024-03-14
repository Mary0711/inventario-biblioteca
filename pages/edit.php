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
                    <div class="category">
                        <div class="icon">
                            <i class="bx bx-user" aria-hidden="true"></i><br>
                            <h6>User</h6>
                            <h7>' . $user['username'] . '</h7>
                        </div>
                    </div>
                    <form action="edit.php" method="post">

                    <input type="hidden" value=' . $user['user_id'] . ' name="user_id">
                    <div class="category">
                        <div class="icon">
                            <h6>Username</h6>
                            <input type="text" value="' . $user['username'] . '" name="username">
                        </div>
                    </div>

                    <div class="category">
                        <div class="icon">
                            <h6>Email</h6>
                            <input type="email" value=' . $user['email'] . ' name="email">
                        </div>
                    </div>

                    <div class="category">
                        <div class="icon">
                            <h6>Status</h6>';

                if ($user['status'] == 1) {
                    print '
                    <label>Active</label>
                    <input type="radio" checked name="status" value="1"><br>

                    <label>Inactive</label>
                    <input type="radio" name="status" value="0"><br>
                    ';
                } else {
                    print '
                    <label>Active</label>
                    <input type="radio" name="status" value="1"><br>

                    <label>Inactive</label>
                    <input type="radio" checked name="status" value="0"><br>
                    ';
                }

                print '
                    </div>
                </div>

                <div class="category">
                    <div class="icon">
                        <h6>Role</h6>
                <select name="role">
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
                    </div>
                </div>

                <div class="break"></div>
                <div class="buttons">
                    <button type="submit">Save</button>
                    <button type="button"><a href="users.php?users">Cancel</a></button>
                </div>
                <input type="hidden" name="update" value="user">
                    </form>
                </div>
                ';
            } else if (isset($_POST['update'])) {
                if ($_POST['update'] == "user") {
                    $user = array(
                        "user_id" => $_POST['user_id'],
                        "username" => $_POST['username'],
                        "email" => $_POST['email'],
                        "status" => $_POST['status'],
                        "role" => $_POST['role']
                    );
                    $_SESSION['user']->update_user($user);

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