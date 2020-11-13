<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>Optica</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col l4 m4 s12">

            </div>
            <div class="col l4 m4 s12">
                <div class="card">
                    <div class="card-content">
                        <i class="material-icons md-blue medium ">assignment_ind</i>
                        <h4 class="center blue-text accent-2">Acceso Admin</h4>
                    </div>
                    <div class="card-action">
                        <form action="controllers/LoginControllerAdmin.php" method="POST">
                            <p class="red-text">
                                <?php
                                session_start();
                                if (isset($_SESSION['error'])) {
                                    echo $_SESSION['error'];
                                    unset($_SESSION['error']);
                                }
                                ?>
                            </p>
                            <div class="input-field">
                                <input id="rut" type="text" name="rut">
                                <label for="rut">Rut de usuario</label>
                            </div>
                            <div class="input-field">
                                <input id="clave" type="password" name="clave">
                                <label for="clave">Clave de acceso</label>
                            </div>
                            <!--<input type="hidden" name="estado" value="1" />-->
                            <button class="btn blue ancho-100 redondo">Entrar</button>
                            <p>
                                <a href="index.php" class="blue-text">Volver</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</body>

</html>