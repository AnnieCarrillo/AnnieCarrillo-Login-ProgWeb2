<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $no_cuenta = $_POST['no_cuenta'];
    $nuevo_telefono = $_POST['nuevo_telefono'];
    $nuevo_correo = $_POST['nuevo_correo'];

    $servidor = 'localhost';
    $usuario = 'annie';
    $clave = 'root';
    $BD = 'id20739455_progweb2';

    $connection = mysqli_connect($servidor, $usuario, $clave, $BD);

    if (!empty($nuevo_telefono) && !empty($nuevo_correo)) {
        $consulta = "UPDATE alumnos SET telefono = '$nuevo_telefono', correo = '$nuevo_correo' WHERE no_cuenta = '$no_cuenta'";
    } elseif (!empty($nuevo_telefono)) {
        $consulta = "UPDATE alumnos SET telefono = '$nuevo_telefono' WHERE no_cuenta = '$no_cuenta'";
    } elseif (!empty($nuevo_correo)) {
        $consulta = "UPDATE alumnos SET correo = '$nuevo_correo' WHERE no_cuenta = '$no_cuenta'";
    } else {
        echo "No se especificaron campos para modificar.";
        exit;
    }

    $resultado = mysqli_query($connection, $consulta);

    if ($resultado) {
        echo "Registro modificado correctamente. <br>";
        echo '<a href="template.php">Volver a la página principal</a>';
    } else {
        echo "Error al modificar el registro.";
    }

    mysqli_close($connection);
}
?>