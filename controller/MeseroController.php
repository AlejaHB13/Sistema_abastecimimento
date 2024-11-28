<?php
include_once 'Facade.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $plato = $_POST['plato'];
    $cantidad = $_POST['cantidad'];
    $mesa = $_POST['mesa'];

    $facade = new Facade();
    $facade->registrarPedido($plato, $cantidad, $mesa);

    header("Location: ../view/mesero.php");
}
?>






































