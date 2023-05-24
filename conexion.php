<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$nombre_usuario = $_POST['nombre_usuario'];
$contraseña = $_POST['contraseña'];


    $servidor='localhost';
    $usuario='annie';
    $clave='root';
    $BD='id20739455_progweb2';

    $conection=mysqli_connect($servidor, $usuario, $clave, $BD);

    $consulta ="SELECT * FROM alumnos WHERE nombre_usuario= '$nombre_usuario' and contraseña='$contraseña'";
    $resultado = mysqli_query($conection, $consulta);
    
    $filas = mysqli_num_rows($resultado);
    
    if ($filas > 0) {
        $fila = mysqli_fetch_assoc($resultado);
        $no_cuenta = $fila['no_cuenta'];

        $_SESSION['no_cuenta'] = $no_cuenta;
    
        header("location: template.php");
        exit();
    } else {
        echo "Error en la autentificación";
    }
     
    mysqli_free_result($resultado);
    mysqli_close($conection);

    
}

?>

