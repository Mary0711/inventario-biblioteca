<?php
//session_start(); //??? 


?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


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
                <h6 class="card-title">Ingrese las credenciales para entrar</h6>
                <form action="login.php" method="post">
                    <label>Email</label><br>
                    <input type="email" class="card-text" name="email" placeholder="...@upr.edu"></input><br>
                    <label>Contraseña</label><br>
                    <input type="password" class="card-text" name="pwd" placeholder="Contraseña"></input><br>
                    <button class="btn" type="submit" name="submit">Entrar</button>
                </form>

                <?php 
                if(isset($_GET["error"])){
                    if($_GET["error"] == "emptyinput" ){
                        echo "<p> Ingrese todas sus credenciales? </p>";
                    } else if($_GET["error"] ==  "wronglogin" ){
                        echo "<p> Informacion incorrecta. </p>";
                    } 
                }
                ?>
            </div>

        </div>



    </div>

</body>

</html>