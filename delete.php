<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $no_cuenta = $_POST['no_cuenta'];

    $servidor = 'localhost';
    $usuario = 'annie';
    $clave = 'root';
    $BD = 'id20739455_progweb2';

    $connection = mysqli_connect($servidor, $usuario, $clave, $BD);

    $consulta = "DELETE FROM alumnos WHERE no_cuenta = '$no_cuenta'";
    $resultado = mysqli_query($connection, $consulta);

    if ($resultado) {
        echo "Registro eliminado correctamente.";
        echo '<a href="index.php">Volver a la página principal</a>';
    } else {
        echo "Error al eliminar el registro.";
    }

    mysqli_close($connection);
}
?>
