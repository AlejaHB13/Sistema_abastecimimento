<?php
include_once 'DB.php';

class Cotizacion {
    public function registrar($proveedor, $valor, $informacion, $estado) {
        $conexion = DB::conectar();
        $sql = "INSERT INTO cotizaciones (proveedor, valor, informacion, estado) 
                VALUES ('$proveedor', $valor, '$informacion', '$estado')";
        return $conexion->query($sql);
    }

    public function obtenerTodas() {
        $conexion = DB::conectar();
        $sql = "SELECT * FROM cotizaciones";
        $resultado = $conexion->query($sql);
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }
    
    public function eliminar($cotizacionId) {
        $conexion = DB::conectar();
        $sql = "DELETE FROM cotizaciones WHERE id = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("i", $cotizacionId);
        return $stmt->execute();
    }

    public function actualizar($id, $proveedor, $valor, $informacion, $estado) {
        $conexion = DB::conectar();
        $sql = "UPDATE cotizaciones 
                SET proveedor = '$proveedor', valor = $valor, informacion = '$informacion', estado = '$estado' 
                WHERE id = $id";
        return $conexion->query($sql);
    }
    
}
