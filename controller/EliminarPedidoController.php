<?php
include_once '../controller/Facade.php';

if (isset($_GET['id'])) {
    $pedidoId = $_GET['id'];

    $facade = new Facade();
    $facade->eliminarPedido($pedidoId);
    
    header("Location: ../view/mesero.php");
}
?>
