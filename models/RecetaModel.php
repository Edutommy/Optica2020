<?php

namespace models;

require_once("Conexion.php");


class RecetaModel
{
    public function getAllReceta()
    {
        $stm = Conexion::conector()->prepare("SELECT * FROM receta");
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }
}
