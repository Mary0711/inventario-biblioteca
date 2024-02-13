<!DOCTYPE html>
<html>
<!-- hacer php include header.php para ahorrar codigo -->

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


</head>

<body>
    <div class="card">
        <img src="images/biblio1.jpg" class="card-img-right">

        <div class="card-header">
            Bienvenido a la Pagina de Inventario, Biblioteca UPRA
        </div>

        <div class="card-body">
            <h5 class="card-title">Ingrese las credenciales para entrar</h5>
            <form action="login.php" method="post">
                <label>Email:</label>
                <input type="email" class="card-text" name="email" placeholder="...@upr.edu"></input><br>
                <label>Contraseña:</label><input type="password" class="card-text" name="pwd"
                    placeholder="Contraseña"></input><br>
                <button class="btn btn-primary" type="submit" name="submit">Entrar</button>
            </form>
        </div>
    </div>

</body>
<!-- hacer php include footer.php para ahorrar codigo -->

</html>