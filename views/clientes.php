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
    <link rel="stylesheet" href="../css/style.css">
    <title>Gestión Clientes</title>
</head>

<body>
    <?php if (isset($_SESSION['user'])) { ?>
        <div class="container">
            <div class="row">
                <nav class="blue darken-3">
                    <div class="nav-wrapper">
                        <a href="clientes.php" class="brand-logo">Vendedor: <?= $_SESSION['user']['nombre'] ?></a>
                        <ul id="nav-mobile" class="right hide-on-med-and-down">
                            <li class="active"><a href="clientes.php">Crear Cliente</a></li>
                            <li><a href="#">Buscar Receta</a></li>
                            <li><a href="#">Ingreso</a></li>
                            <li><a href="salir.php">Salir</a></li>
                        </ul>
                    </div>
                </nav>
                <div class="col l2 m4 s12"></div>
                <div class="col l8 m4 s12">
                    <div class="card">
                        <div class="card-action">
                            <h6 class="blue-text">Nuevo Cliente</h6>
                            <form action="../controllers/ClienteController.php" method="POST">
                                <p class="green-text">
                                    <?php
                                    if (isset($_SESSION['respuestaCli'])) {
                                        echo $_SESSION['respuestaCli'];
                                        unset($_SESSION['respuestaCli']);
                                    } else 
                                    ?>
                                </p>
                                <p class="red-text">
                                    <?php 
                                    if(isset($_SESSION['errorCli'])){
                                        echo $_SESSION['errorCli'];
                                        unset($_SESSION['errorCli']);
                                    }
                                    ?>
                                </p>
                                <div class="input-field col l4">
                                    <i class="material-icons md-blue prefix">account_box</i>
                                    <input id="clirut" type="text" name="clirut">
                                    <label for="clirut">Rut</label>
                                </div>
                                <div class="input-field col l8">
                                    <i class="material-icons md-blue prefix">perm_identity</i>
                                    <input id="cliname" type="text" name="cliname">
                                    <label for="cliname">Nombre</label>
                                </div>
                                <div class="input-field col l12">
                                    <i class="material-icons md-blue prefix">business</i>
                                    <input id="clidir" type="text" name="clidir">
                                    <label for="clidir">Dirección</label>
                                </div>
                                <div class="input-field col l6">
                                    <i class="material-icons md-blue prefix">call</i>
                                    <input id="clifono" type="text" name="clifono">
                                    <label for="clifono">Teléfono o Celular</label>
                                </div>
                                <div class="input-field col l6">
                                    <i class="material-icons md-blue prefix">date_range</i>
                                    <input id="icon_prefix" type="text" class="validate datepicker" name="clifecha">
                                    <label for="icon_prefix">Fecha de creación</label>
                                </div>
                                <div class="input-field col l12">
                                    <i class="material-icons md-blue prefix">alternate_email</i>
                                    <input id="cliemail" type="email" name="cliemail">
                                    <label for="cliemail">Correo Eléctronico</label>
                                </div>
                                <button class="btn blue ancho-100 redondo">Crear Nuevo Cliente</button>
                            </form>
                            <p class="red-text">
                                <?php
                                if (isset($_SESSION['respuesta'])) {
                                    echo $_SESSION['respuesta'];
                                    unset($_SESSION['respuesta']);
                                }
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php } else { ?>

        <h3 class="red-text">Error de Acceso</h3>
        <p class="white-text">
            Usted no tiene permisos para estar aqui
            <br><br>
            <a href="../index.php">Home</a>
        </p>

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