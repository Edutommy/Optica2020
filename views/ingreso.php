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
    <link rel="shortcut icon" href="img/fotologin.ico" type="image/x-icon">
    <title>Ingresar Receta</title>
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
                            <li><a href="buscarCliente.php">Buscar Receta</a></li>
                            <li class="active"><a href="ingreso.php">Ingreso</a></li>
                            <li><a href="salir.php">Salir</a></li>
                        </ul>
                    </div>
                </nav>
                <br>
                <div class="col l1 m4 s12"></div>
                <div class="col l10 m4 s12 white redondo">
                    <h6 class="blue-text center">Ingresar una Receta</h6>
                    <br><br>
                    <form action="#" method="POST">
                        <input type="text" class="col l3" placeholder="Rut" name="ruting">
                        <button class="btn blue redondo col l2">BUSCAR</button>
                        <div class="col l7"></div>
                    </form>
                    <br><br><br>
                    <hr>
                    <form action="#" method="POST">
                        <div class="col l6 m6 s6 blue-text">
                            <p>Tipo Lente:</p>
                            <label>
                                <input type="checkbox" name="xx" value="1" />
                                <span>Lejos</span>
                            </label>
                            <label>
                                <input type="checkbox" name="xy" value="2" />
                                <span>Cerca</span>
                            </label>
                            <Select name="tipo" id="tipo">
                                <option value="#">Tipo Cristal</option>
                                <option value="MONO">Monofocal</option>
                                <option value="BI">Bifocal</option>
                                <option value="MULTI">Multifocal</option>
                            </Select>
                            <Select name="material" id="material">
                                <option value="#">Material de Cristal</option>
                                <option value="ORG">Orgánico</option>
                                <option value="POLI">Policarbonato</option>
                                <option value="MIN">Mineral</option>
                                <option value="ALTO">Alto Indice</option>
                            </Select>
                            <Select name="armazon" id="armazon">
                                <option value="#">Tipo Armazón</option>
                                <option value="INTER">Intermedio</option>
                                <option value="GAMA">Gama Alta</option>
                                <option value="ECO">Económico</option>
                            </Select>
                        </div>
                        <div class="col l3 center blue-text">
                            <p>Ojo Izquierdo</p>
                            <input type="text" placeholder="Esfera" name="esfeizq">
                            <input type="text" placeholder="Cilindro" name="cilizq">
                            <input type="text" placeholder="Eje" name="ejeizq">
                        </div>
                        <div class="col l3 center blue-text">
                            <p>Ojo Derecho</p>
                            <input type="text" placeholder="Esfera" name="esfeder">
                            <input type="text" placeholder="Cilindro" name="cilder">
                            <input type="text" placeholder="Eje" name="ejeder">
                        </div>
                        <br><br><br><br><br><br><br><br><br><br><br>
                        <hr>
                        <div class="col l6">
                            <div class="input-field">
                                <input id="prisma" type="text" name="prisma">
                                <label for="prisma">Prisma</label>
                            </div>
                        </div>
                        <div class="col l6">
                            <div class="input-field">
                                <input id="pupilar" type="text" name="pupilar">
                                <label for="pupilar">Distancia Pupilar</label>
                            </div>
                        </div>
                        <div class="col l6">
                            <div class="input-field">
                                <i class="material-icons md-blue prefix">date_range</i>
                                <input id="fechaentrega" type="text" class="validate datepicker" name="fechaentrega">
                                <label for="fechaentrega">Fecha de entrega</label>
                            </div>
                        </div>
                        <div class="col l6">
                            <div class="input-field">
                                <i class="material-icons md-blue prefix">date_range</i>
                                <input id="fecharetiro" type="text" class="validate datepicker" name="fecharetiro">
                                <label for="fecharetiro">Fecha de retiro</label>
                            </div>
                        </div>

                        <div class="col l4">
                            <div class="input-field">
                                <input id="rutmed" type="text" name="rutmed">
                                <label for="rutmed">Rut del Medico</label>
                            </div>
                        </div>
                        <div class="col l8">
                            <div class="input-field">
                                <input id="nombremed" type="text" name="nombremed">
                                <label for="nombremed">Nombre del Medico</label>
                            </div>
                        </div>
                        <div class="col l12">
                            <div class="input-field">
                                <input id="obs" type="text" name="obs">
                                <label for="obs">Observaciones</label>
                            </div>
                        </div>
                        <div class="col l4"></div>
                        <div class="col l4">
                            <div class="input-field">
                                <input id="precio" type="number" name="precio">
                                <label for="precio">Valor Lente</label>
                            </div>
                        </div>
                        <div class="col l4">
                            <div class="input-field">
                                <button class="btn ancho-100 redondo blue">Crear Receta</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php } else { header("Location: ../index.php")?>
    <?php } ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems);
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