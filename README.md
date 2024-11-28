# Sistema de Abastecimiento para Konrad Gourmet

---

## **Descripción del Proyecto**

Este proyecto tiene como objetivo desarrollar un sistema automatizado de abastecimiento para el restaurante **Konrad Gourmet**. El sistema aborda problemas relacionados con la gestión de inventarios y la optimización de recursos debido a procesos manuales ineficientes.

### **Módulos principales:**

1. **Meseros:** Registrar pedidos con detalles de plato, cantidad y mesa.  
2. **Director de Compras:** Gestión de cotizaciones, incluyendo su recepción, registro, validación y consulta según criterios establecidos.

---

## **Requisitos Previos**

Antes de comenzar, asegúrate de tener instalados los siguientes elementos:

- **XAMPP:** Para gestionar el servidor web y la base de datos. [Descargar XAMPP](https://www.apachefriends.org/index.html).
- **Navegador Web:** Para ejecutar la aplicación en `localhost`.
- **Editor de Código:** Recomendado Visual Studio Code (VS Code).
- **PHP:** Incluido en XAMPP, necesario para el backend.

---

## **Instrucciones de Instalación**

### 1. **Clonar o descargar el proyecto:**

- Clona el repositorio o descarga los archivos fuente del sistema.
- Guarda la carpeta del proyecto dentro de `C:/xampp/htdocs/`.

```bash
git clone <url_del_repositorio>
  ```
### 2. **Configurar la base de datos:**

Inicia el panel de control de XAMPP y habilita los servicios de Apache y MySQL.
    Accede a http://localhost/phpmyadmin.
    Crea una base de datos llamada konrad_gourmet.

Tablas y campos requeridos:

  cotizaciones: id, proveedor, valor, información, estado, fecha.
  pedidos: id, plato, cantidad, mesa.
  permisos: id, rol.
  usuarios: cedula, usuario, clave, rol.

### 3. ** Configurar el archivo de conexión a la base de datos:**

  En la carpeta del proyecto, busca el archivo config.php o similar.
    Edita los siguientes valores según tu configuración local:

$host = 'localhost';
$db = 'konrad_gourmet';
$user = 'root';
$password = '';

### 4. **Ejecutar la Aplicación**

  Asegúrate de que los servicios Apache y MySQL están activos en XAMPP.
  Abre un navegador y escribe la dirección:
  http://localhost/konrad_gourmet/

 Accede al sistema con un usuario y contraseña previamente definidos en la tabla usuarios.

Funcionalidades Clave
1. Meseros:

    Registrar pedidos indicando el plato, cantidad y mesa.
    Consultar los pedidos realizados.

2. Director de Compras:

    Registrar, editar o eliminar cotizaciones de proveedores.

Estructura del Proyecto
        index.php: Archivo principal del sistema.
        /config/: Configuración del sistema, incluyendo conexión a la base de datos.
        /views/: Archivos relacionados con la interfaz de usuario.
        /controllers/: Lógica del sistema para manejar las interacciones del usuario.
        /models/: Manejo de la base de datos y la lógica empresarial.
