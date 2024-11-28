<?php
include_once 'Facade.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos de la cotización desde el formulario de edición
    $id = $_POST['id'];
    $proveedor = $_POST['proveedor'];
    $valor = $_POST['valor'];
    $informacion = $_POST['informacion'];
    
    // Valor estándar para comparación de validación
    $valor_estandar_ministerio = 2000000;

    // Determinar el estado de la cotización según el valor ingresado
    if ($valor > $valor_estandar_ministerio * 1.25) {
        $estado = "RECHAZADA";
    } elseif ($valor < $valor_estandar_ministerio * 0.5) {
        $estado = "SOSPECHOSA";
    } else {
        $estado = "OPCIONADA";
    }

    // Crear una instancia de Facade para actualizar la cotización
    $facade = new Facade();
    $facade->actualizarCotizacion($id, $proveedor, $valor, $informacion, $estado);

    // Redirigir a la página de director después de la edición
    header("Location: ../view/director.php");
}
?>
