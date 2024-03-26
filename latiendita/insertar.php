<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Insertar Registro</title>
</head>
<body>
    <h2>Insertar Registro</h2>
<form action="insertar.php" method="post">
        <p>Nombre:
  <input type="text" name="nombre">
  <br>
  <br>
          Apellido: <input type="text" name="apellido">
          <br>
          <br>
          Correo: <input type="text" name="correo">
          <br>
          <br>
          Password: <input type="password" name="password">
        </p>
        <p><br>
          <!-- Otros campos aquí -->
          <input type="submit" value="Insertar">
          <a href="consultar.php">
            <input type="button" name="button" id="button" value="Consultar Registros">
          </a></p>
    </form>

    <?php
    // Verificar si se ha enviado el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Conectar a la base de datos (reemplaza los valores con los de tu conexión)
        $conexion = new mysqli("localhost", "root", "", "la tiendita");

        // Verificar la conexión
        if ($conexion->connect_error) {
            die("Error en la conexión: " . $conexion->connect_error);
        }

        // Obtener los datos del formulario
        $nombre = $_POST["nombre"];
		$apellido = $_POST["apellido"];
        $correo = $_POST["correo"];
		$password = $_POST["password"];
        // Otros campos aquí

        // Preparar la consulta SQL para insertar el registro
        $sql = "INSERT INTO `clientes la tiendita` (nombre,apellido, correo, password) VALUES ('$nombre','$apellido', '$correo', '$password')"; // Modifica la consulta según tu estructura de tabla

        // Ejecutar la consulta
        if ($conexion->query($sql) === TRUE) {
            echo "Registro insertado correctamente";
        } else {
            echo "Error al insertar el registro: " . $conexion->error;
        }

        // Cerrar la conexión
        $conexion->close();
    }
    ?>
	 <br>

    <!-- Corregido -->
</body>
</html>