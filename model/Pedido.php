<?php
include_once 'DB.php';

class Pedido {
    public function registrar($plato, $cantidad, $mesa) {
        $conexion = DB::conectar();
        $sql = "INSERT INTO pedidos (plato, cantidad, mesa) VALUES ('$plato', $cantidad, $mesa)";
        return $conexion->query($sql);
    }

    public function obtenerTodos() {
        $conexion = DB::conectar();
        $sql = "SELECT * FROM pedidos";
        $resultado = $conexion->query($sql);
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    public function eliminar($pedidoId) {
        $conexion = DB::conectar();
        $sql = "DELETE FROM pedidos WHERE id = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("i", $pedidoId);
        return $stmt->execute();
    }
}
