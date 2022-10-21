<?php

require_once "../controllers/procesos.controller.php";
require_once "../models/procesos.modelo.php";


class AjaxProcesos{
    public function ListarVentas(){
        $respuesta = ProcesosController::ctrListarVentas();
        echo json_encode($respuesta);
    }
}

$procesos = new AjaxProcesos();
$procesos->ListarVentas();