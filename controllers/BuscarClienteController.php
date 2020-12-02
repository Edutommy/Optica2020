<?php

namespace controllers;

use models\ClienteModel as ClienteModel;

session_start();
require_once("../models/ClienteModel.php");

class BuscarCliente
{
    public $rut;

    public function __construct()
    {
        $this->rut = $_POST['rut'];
    }

    public function buscarCliente()
    {
        $modelo = new ClienteModel;
        $arr = $modelo->buscarClientes($this->rut);

        if(count($arr) == 1){
            echo json_encode($arr[0]);
        } else {
            json_encode(["msg"=>'null']);
        }

    }

}

$obj = new BuscarCliente();
$obj->buscarCliente();
