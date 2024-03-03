<div class="sidebar">
    <div class="top">
        <i class="bx bx-menu" id="btn" onclick="changeIcon(this)"></i>
    </div>
    <div class="user">
        <img src="../images/userdefault.png" alt="user image" class="user-img">
        <div>
            <?php /*
                print "
                <p class='bold'>" . $_SESSION['user']->get_username() . "</p>
                <p>Role: " . $_SESSION['user']->get_role() . "</p>
                ";*/
                ?>
        </div>
    </div>
    <ul>
        <li>
            <a href="inventario.php">
                <i class="bx bxs-dashboard"></i>
                <span class="nav-item">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="search.php">
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
              /*  if ($_SESSION['user']->get_role() == "user") {*/
                    print '
                    <a href="#">
                        <i class="bx bxs-user"></i>
                        <span class="nav-item">Account</span>
                    </a>
                    ';
             /*   } else {*/
                    print '
                    <a href="#">
                        <i class="bx bxs-user"></i>
                        <span class="nav-item">Users</span>
                    </a>
                    ';
               /* }*/
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