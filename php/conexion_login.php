<?php

class Conexion{

    static public function conectar(){
        try {
            $db = new PDO("mysql:host=localhost;dbname=login_register_db","root","",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            return $db;
        }
        catch (PDOException $e) {
            echo 'Falló la conexión: ' . $e->getMessage();
        }

    }
}