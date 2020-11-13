<?php

namespace controllers;

use models\UsuarioModel as UsuarioModel;

session_start();
require_once("../models/UsuarioModel.php");


class LoginController
{
    public $rut;
    public $clave;
    public $estado;

    public function __construct()
    {
        $this->rut = $_POST['rut'];
        $this->clave = $_POST['clave'];
        $this->estado = $_POST['estado'];
    }

    public function iniciarSesion()
    {
        
        if ($this->rut == "" || $this->clave == "") {
            $_SESSION['error'] = "Complete los datos";
            header("Location: ../index.php");
            return;
        }
        


        $model = new UsuarioModel;
        $array = $model->buscarUsuarioLogin($this->rut, $this->clave, $this->estado);

        if ($this->estado == 0) {
            $_SESSION['error'] = "Usuario Bloqueado";
            header("Location: ../index.php");
            return;
        }

        if (count($array) == 0) {
            $_SESSION['error'] = "Email o Contraseña Incorrectos";
            header("Location: ../index.php");
            return;
        }

        $_SESSION['usuario'] = $array[0];

        header("Location: ../views/clientes.php");
    }
}

$obj = new LoginController();
$obj->iniciarSesion();
