<?php


class BDMySql{
    private $conexion;
    private static $bd;

    private function __construct(){
        $conn = "mysql:host=127.0.0.1; dbname=proyecto";
        $usuario = "root";
        $passw = "";
        $this->conexion = new PDO($conn, $usuario, $passw);
        $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    private function __clone() { }

    public static function getConexion(){

        if (!isset(self::$bd)) {
            self::$bd = new BDMySql();
        }

        return self::$bd->conexion;
    }
}