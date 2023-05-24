<?php
session_start();

if (!isset($_SESSION['no_cuenta'])) {
    header("location: template.php");
    exit();
} else {
    $no_cuenta = $_SESSION['no_cuenta'];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuenta</title>
</head>
<body>
    <div class="container center-align">
        <h1>Hola, tu número de cuenta es: <?php echo $no_cuenta; ?></h1>

        <table class="centered">
            <thead>
                <tr>
                    <th>Nombre de Usuario</th>
                    <th>Carrera</th>
                    <th>Número de Cuenta</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Correo</th>
                    <th>Contraseña</th>
                    <th>Fecha de Registro</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <?php
            $servidor = 'localhost';
            $usuario = 'annie';
            $clave = 'root';
            $BD = 'id20739455_progweb2';

            $conection = mysqli_connect($servidor, $usuario, $clave, $BD);

            $sql = "SELECT nombre_usuario, carrera, no_cuenta, direccion, telefono, correo, contraseña, fecha_registro FROM alumnos WHERE no_cuenta = '$no_cuenta'";
            $result = mysqli_query($conection, $sql);

            while ($mostrar = mysqli_fetch_array($result)) {

            ?>
                <tr>
                    <td><?php echo $mostrar["nombre_usuario"] ?></td>
                    <td><?php echo $mostrar["carrera"] ?></td>
                    <td><?php echo $mostrar["no_cuenta"] ?></td>
                    <td><?php echo $mostrar["direccion"] ?></td>
                    <td><?php echo $mostrar["telefono"] ?></td>
                    <td><?php echo $mostrar["correo"] ?></td>
                    <td><?php echo $mostrar["contraseña"] ?></td>
                    <td><?php echo $mostrar["fecha_registro"] ?></td>
                    <td>
                        <form action="eliminar.php" method="post">
                            <input type="hidden" name="no_cuenta" value="<?php echo $mostrar["no_cuenta"] ?>">
                            <button type="submit">Eliminar</button>
                        </form>
                        <form action="modificar.php" method="post">
                            <input type="hidden" name="no_cuenta" value="<?php echo $mostrar["no_cuenta"] ?>">
                            <input type="text" name="nuevo_telefono" placeholder="Nuevo teléfono">
                            <input type="text" name="nuevo_correo" placeholder="Nuevo correo">
                            <button type="submit">Modificar</button>
                        </form>
                    </td>
                </tr>
            <?php
            }

            mysqli_free_result($result);
            mysqli_close($conection);
            ?>
        </table>
    </div>
</body>
</html>

