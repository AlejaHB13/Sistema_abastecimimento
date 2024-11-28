<?php
include_once 'DB.php';

class Usuario {
    public function validarLogin($usuario, $clave) {
        $conexion = DB::conectar();
        $sql = "SELECT * FROM usuarios WHERE usuario='$usuario' AND clave='$clave'";
        $resultado = $conexion->query($sql);
        return $resultado->fetch_assoc();
    }
}
