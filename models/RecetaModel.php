<?php

namespace models;

require_once("Conexion.php");


class RecetaModel
{
    public function insertarReceta($data)
    {

    }

    public function recetasXRut($rut)
    {

    }
    public function recetaXFecha($fecha)
    {

    }

    public function getMaterialCristal()
    {
        $stm = Conexion::conector()->prepare("SELECT * FROM material_cristal");
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function getTipoCristal()
    {
        $stm = Conexion::conector()->prepare("SELECT * FROM tipo_cristal");
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function getArmazon()
    {
        $stm = Conexion::conector()->prepare("SELECT * FROM armazon");
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }
}
