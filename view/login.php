<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../assets/css/styleslogin.css">
</head>

<body>
    <div class="contenedor-form">
        <!-- Título agregado -->
        <h1 class="titulo-login">Konrad Gourmet</h1>
        <form action="../controller/LoginController.php" method="POST">
            <div class="fila">
                <label for="usuario">Usuario</label>
                <input type="text" id="usuario" name="usuario">
            </div>
            <div class="fila">
                <label for="clave">Clave</label>
                <input type="password" id="clave" name="clave">
            </div>
            <input type="submit" value="Ingresar" class="btn">
        </form>
    </div>
</body>

</html>

