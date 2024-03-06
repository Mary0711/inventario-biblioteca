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
            <a href="inventario.php?dash" <?php if (isset($_GET['dash'])) print "class='active'" ?>>
                <i class="bx bxs-dashboard"></i>
                <span class="nav-item">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="search.php?search" <?php if (isset($_GET['search'])) print "class='active'" ?>>
                <i class="bx bx-search-alt"></i>
                <span class="nav-item">Busqueda</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="bx bxs-report" <?php if (isset($_GET['report'])) print "class='active'" ?>></i>
                <span class="nav-item">Reportes</span>
            </a>
        </li>
        <li>
            <?php
            if ($_SESSION['user']->get_role() == "user") {
                print '
                    <a href="#"';
                if (isset($_GET['account'])) print "class='active'";
                print '>
                        <i class="bx bxs-user"></i>
                        <span class="nav-item">Cuenta</span>
                    </a>
                    ';
            } else {
                print '
                    <a href="users.php?users"';
                if (isset($_GET['users'])) print "class='active'";
                print '>
                        <i class="bx bxs-user"></i>
                        <span class="nav-item">Usuarios</span>
                    </a>
                    ';
            }
            ?>
        </li>
        <li>
            <a href="../code/ingres.php?logout">
                <i class="bx bx-log-out"></i>
                <span class="nav-item">Cerrar Sesion </span>
            </a>
        </li>
    </ul>
</div>