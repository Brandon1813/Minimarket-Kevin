<?php

require_once "conexion.php";

class ProcesosModelo{

    static public function mdListarVentas(){
        $stmt = Conexion::conectar()->prepare("CALL prc_ListarVentas");
        $stmt -> execute();
        return $stmt->fetchall();
        $stmt=null;
    }
}