<?php
include_once 'Facade.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $proveedor = $_POST['proveedor'];
    $valor = $_POST['valor'];
    $informacion = $_POST['informacion'];

    
    $valor_estandar_ministerio = 10000; 

  
    if ($valor > $valor_estandar_ministerio * 1.25) {
        $estado = "RECHAZADA";
    } elseif ($valor < $valor_estandar_ministerio * 0.5) {
        $estado = "SOSPECHOSA";
    } else {
        $estado = "OPCIONADA";
    }

    // Registrar la cotización a través del Facade
    $facade = new Facade();
    $facade->registrarCotizacion($proveedor, $valor, $informacion, $estado);

    // Redirigir a la página de director
    header("Location: ../view/director.php");
}
?>
