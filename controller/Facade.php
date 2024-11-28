<?php
include_once '../model/Usuario.php';
include_once '../model/Pedido.php';
include_once '../model/Cotizacion.php';

class Facade {
    private $usuario;
    private $pedido;
    private $cotizacion;

    public function __construct() {
        $this->usuario = new Usuario();
        $this->pedido = new Pedido();
        $this->cotizacion = new Cotizacion();
    }

    public function validarUsuario($usuario, $clave) {
        return $this->usuario->validarLogin($usuario, $clave);
    }

    public function registrarPedido($plato, $cantidad, $mesa) {
        return $this->pedido->registrar($plato, $cantidad, $mesa);
    }
    
    public function obtenerPedidos() {
        return $this->pedido->obtenerTodos();
    }

    public function eliminarPedido($pedidoId) {
        return $this->pedido->eliminar($pedidoId);
    }

    
   public function registrarCotizacion($proveedor, $valor, $informacion, $estado) {
    return $this->cotizacion->registrar($proveedor, $valor, $informacion, $estado);
}

    public function obtenerCotizaciones() {
    return $this->cotizacion->obtenerTodas();
}
    public function eliminarCotizacion($cotizacionId) {
    return $this->cotizacion->eliminar($cotizacionId);
}
    public function validarCotizacion($valorCotizacion, $valorMinisterio) {
    return $this->cotizacion->validarEstado($valorCotizacion, $valorMinisterio);
}

public function actualizarCotizacion($id, $proveedor, $valor, $informacion, $estado) {
    return $this->cotizacion->actualizar($id, $proveedor, $valor, $informacion, $estado);
}

}