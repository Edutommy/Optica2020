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
                        <a href="buscarReceta.php" class="brand-logo"><?= $_SESSION['user']['rol'] ?>: <?= $_SESSION['user']['nombre'] ?></a>
                        <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                        <ul id="nav-mobile" class="right hide-on-med-and-down">
                            <li><a href="clientes.php">Crear Cliente</a></li>
                            <li class="active"><a href="buscarReceta.php">Buscar Receta</a></li>
                            <li><a href="ingreso.php">Ingreso</a></li>
                            <li><a href="salir.php"><i class="material-icons white-text small ">exit_to_app</i></a></li>
                        </ul>
                    </div>
                </nav>
                <!-- NAV MOVIL -->
                <ul id="slide-out" class="sidenav blue accent-2">
                    <li>
                        <div class="user-view">
                            <div class="background">
                                <img src="https://www.designyourway.net/blog/wp-content/uploads/2016/07/Dark-wallpaper-desktop-background-30-700x438.jpg">
                            </div>
                            <a href="buscarReceta.php"><img class="circle" src="../img/perfilnav.jpg"></a>
                            <a href="buscarReceta.php" class="brand-logo white-text"><?= $_SESSION['user']['nombre'] ?></a>
                        </div>
                    </li>
                    <li><a class="white-text" href="clientes.php">Crear Cliente<i class="material-icons white-text small ">add_circle</i></a></li>
                    <li class="active"><a class="white-text" href="buscarReceta.php">Buscar Receta<i class="material-icons white-text small ">search</i></a></li>
                    <li><a class="white-text" href="ingreso.php">Ingreso de Receta<i class="material-icons white-text small ">create</i></a></li>
                    <li><a class="white-text" href="salir.php">Salir<i class="material-icons white-text small ">exit_to_app</i></a></li>
                </ul>

                <!-- FIN DE NAV -->

                <div class="col l12 m4 s12">
                    <div class="card" id="app">
                        <div class="card-content">
                            <h4>Buscar Receta</h4>
                            <div class="col l5">
                                <form @submit.prevent="buscarRut">
                                    <input type="text" v-model="rut" placeholder="Rut Cliente">
                                    <button class="btn-small redondo blue">Buscar</button>
                                </form>
                            </div>
                            <div class="col l2"></div>
                            <div class="col l5">
                                <form @submit.prevent="buscarFecha">
                                    <input type="date" v-model="fecha" placeholder="2020-05-14">
                                    <button class="btn-small redondo blue">Buscar</button>
                                </form>
                            </div>
                            <table>
                                <tr>
                                    <th>Tipo de Lente</th>
                                    <th>Cliente</th>
                                    <th>Fecha</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                <tr v-for="r in recetas">
                                    <td>{{r.tipo_lente}}</td>
                                    <td>{{r.nombre_cliente}}</td>
                                    <td>{{r.fecha_entrega}}</td>
                                    <td>
                                        <button @click="abrirModal(r)" class="btn-small blue redondo">Detalle</button>
                                    </td>
                                    <td>
                                        <img height="50" src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/PDF_file_icon.svg/833px-PDF_file_icon.svg.png" alt="">
                                    </td>
                                </tr>
                            </table>
                            <!-- MODAL -->
                            <div id="modal1" class="modal">
                                <div class="modal-content">
                                    <h5>Detalle de la Receta N°: {{receta.id}}</h5>
                                    <hr><br>
                                    <div class="row">
                                        <div class="col l6">
                                            Observaciones: {{receta.observacion}}
                                        </div>
                                        <div class="col l6">
                                            Precio: ${{receta.precio}}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col l6">
                                            Vendedor: {{receta.nombre_vendedor}}
                                        </div>
                                        <div class="col l6">
                                            Cliente: {{receta.nombre_cliente}}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col l12">
                                            RUT: {{receta.rut_cliente}}
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="#!" class="modal-close waves-effect waves-green btn-flat">CERRAR</a>
                                </div>
                            </div>
                            <!-- FIN MODAL -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php } else {
        header("Location: ../index.php") ?>
    <?php } ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <script src="../js/buscar_receta.js"></script>
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

            var elems = document.querySelectorAll('.sidenav');
            var instances = M.Sidenav.init(elems);

            //MODAL
            var elems = document.querySelectorAll('.modal');
            var instances = M.Modal.init(elems);
        });
    </script>
</body>

</html>