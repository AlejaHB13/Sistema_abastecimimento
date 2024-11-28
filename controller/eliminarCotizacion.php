<?php
include_once '../controller/Facade.php';

if (isset($_GET['id'])) {
    $cotizacionId = $_GET['id'];

    $facade = new Facade();
    $facade->eliminarCotizacion($cotizacionId);
    
    header("Location: ../view/director.php");
}
?>