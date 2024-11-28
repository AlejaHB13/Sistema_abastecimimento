<?php
include_once 'Facade.php';

session_start();
$usuario = $_POST['usuario'];
$clave = $_POST['clave'];

$facade = new Facade();
$datosUsuario = $facade->validarUsuario($usuario, $clave);

if ($datosUsuario) {
    $_SESSION['usuario'] = $usuario;
    if ($datosUsuario['rol'] == 1) {
        header("Location: ../view/mesero.php");
    } elseif ($datosUsuario['rol'] == 2) {
        header("Location: ../view/director.php");
    }
} else {
    echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Usuario o contraseña incorrectos.',
            confirmButtonText: 'Intentar de nuevo'
        }).then(() => {
            window.location.href = '../view/login.php';
        });
    </script>";
}
