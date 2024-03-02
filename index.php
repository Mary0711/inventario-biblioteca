<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


</head>

<body>
    <div class="container">
        <div class="glass">
            <div>
                <h5>Bienvenido a la Pagina de Inventario </h5>
                <h5> Biblioteca UPRA</h5>
            </div>
            <hr>

            <div class="card-body">
                <?php
                if (isset($_GET['register'])) {
                    print '
                <h6 class="card-title">Rellene los campos para registrarse</h6>
                <form action="code/ingres.php?register" method="post">
                    <label>Nombre</label><br>
                    <input type="text" name="username" class="card-text" placeholder="Nombre Apellidos"><br>

                    <label>Email</label><br>
                    <input type="email" class="card-text" name="email" placeholder="ejemplo@upr.edu"></input><br>

                    <label>Contraseña</label><br>
                    <input type="password" class="card-text" name="pwd" placeholder="Contraseña"></input><br>

                    <button class="btn" type="submit" name="submit">Registrarse</button>
                    <button class="btn" type="button"><a href="?login">Ingresar</a></button>
                </form>
                ';
                } else {
                    print '
                <h6 class="card-title">Ingrese las credenciales para entrar</h6>
                <form action="code/ingres.php?login" method="post">
                    <label>Email</label><br>
                    <input type="email" class="card-text" name="email" placeholder="ejemplo@upr.edu"></input><br>

                    <label>Contraseña</label><br>
                    <input type="password" class="card-text" name="pwd" placeholder="Contraseña"></input><br>

                    <button class="btn" type="submit" name="submit">Ingresar</button>
                    <button class="btn" type="button"><a href="?register">Registrarse</a></button>
                </form>
                ';
                }
                ?>
            </div>

        </div>



    </div>

</body>

</html>