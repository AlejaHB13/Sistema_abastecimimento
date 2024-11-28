<?php
class DB {
    private static $conexion = null;

    public static function conectar() {
        if (self::$conexion == null) {
            self::$conexion = new mysqli("localhost", "root", "", "konrad_gourmet");
            if (self::$conexion->connect_error) {
                die("Error en la conexión: " . self::$conexion->connect_error);
            }
        }
        return self::$conexion;
    }
}
