<?php

use models\UsuarioModel as UsuarioModel;

session_start();
require_once("../models/UsuarioModel.php");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if (isset($_SESSION['user'])) {
    $model = new UsuarioModel();
    $usuario = $model->getAllUsuarios();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="shortcut icon" href="../img/fotologin.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <title>Buscar Receta</title>
</head>

<body>
    <?php if (isset($_SESSION['user'])) { ?>
        <div class="container">
            <div class="row">
                <nav class="blue darken-3">
                    <div class="nav-wrapper">
                        <a href="clientes.php" class="brand-logo">Vendedor: <?= $_SESSION['user']['nombre'] ?></a>
                        <ul id="nav-mobile" class="right hide-on-med-and-down">
                            <li><a href="clientes.php">Crear Cliente</a></li>
                            <li class="active"><a href="buscarCliente.php">Buscar Receta</a></li>
                            <li><a href="ingreso.php">Ingreso</a></li>
                            <li><a href="salir.php">Salir</a></li>
                        </ul>
                    </div>
                </nav>
                <div class="col l2 m4 s12"></div>
                <div class="col l8 m4 s12">
                    <div class="card">
                        <div class="card-content">
                            <h6 class="blue-text">Buscar Receta</h6>
                            <br><br>
                            <form action="#" method="POST">
                                <input class="col l3" type="text" name="rutbus" placeholder="Rut">
                                <button class="btn blue redondo col l2">BUSCAR</button>
                                <div class="input-field col l2"></div>
                                <input class="col l3 validate datepicker" type="text" name="fechabus" placeholder="Fecha">
                                <button class="btn blue redondo col l2">BUSCAR</button>
                            </form>
                            <form action="#" method="POST">
                                <table class="blue-text accent-2">
                                    <tr>
                                        <th>Tipo Lente</th>
                                        <th>Fecha Entrega</th>
                                        <th>Actions</th>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php } else { header("Location: ../index.php")?>
        <!--<div class="container">
            <div class="card">
                <h3 class="red-text">Error de Acceso</h3>
                <p class="blue-text">
                    Usted no tiene permisos para estar aqui
                    <br><br>
                    <button class="btn">
                        <a class="white-text" href="../index.php">Inicia Sesión</a>
                    </button>
                </p>
            </div>

        </div>-->

    <?php } ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.datepicker');
            var instances = M.Datepicker.init(elems, {
                'autoClose': true,
                'format': 'yyyy/mm/dd',
                i18n: {
                    months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
                    monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Set", "Oct", "Nov", "Dic"],
                    weekdays: ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"],
                    weekdaysShort: ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
                    weekdaysAbbrev: ["D", "L", "M", "M", "J", "V", "S"],
                    cancel: 'Cancelar',
                    clear: 'Limpiar',
                    done: 'Aceptar'
                }
            });
        });
    </script>
</body>

</html>