<?php

class ProcesosController{

    static public function ctrListarVentas(){
        $respuesta = ProcesosModelo::mdListarVentas();
        return $respuesta;
    }
}