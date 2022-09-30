<?php
require_once "login/modelo/accesoDatos.php";
require_once "login/vista/metodosVista.php";
$nombre = $_GET['nombre'];
$ruta = $_GET['ruta'];
$user = leeSesion($nombre, $ruta);
if ($user[$nombre][0] != $nombre){
    header("Location: denied.html");
} else {
    $ruta = creaSesion($nombre);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Usuario</title>
</head>

<body>
    <h3>Nuevo Usuario</h3>
<?php
    echo "<form action='../controlador/procesa.php?nombre=$nombre&ruta=
                                                    $ruta' method='post'>";
?>
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre"> <br><br>
        <label for="pass">Contraseña</label>
        <input type="password" name="pass" id="pass"> <br><br>
        <label for="alumno">Alumno</label>
        <input type="radio" name="rol" value="alumno" id="alumno" checked>
        <label for="admin">Admin</label>
        <input type="radio" name="rol" value="admin" id="admin"> <br><br>
        <input type="submit" value="Aceptar">

    </form>
</body>

</html>