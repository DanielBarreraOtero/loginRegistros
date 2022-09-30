<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/listado.css">
</head>
<body>
    
</body>
</html>

<?php
require_once "login/modelo/accesoDatos.php";
require_once "login/vista/metodosVista.php";
$nombre = $_GET['nombre'];
$ruta = $_GET['ruta'];

$user = leeSesion($nombre, $ruta);
$pass = $user[$nombre][1];
$rol = $user[$nombre][2];

$ruta = creaSesion($nombre);

echo "<h2>Bienvenido :)</h2>";
echo "Usuario: $nombre. Contraseña: $pass. Rango: $rol <br>";

$users = leeUsuarios();

echo "<h2>Listado de alumnos</h2>";

echo "<a id='boton' href='
        nuevoForm.php?ruta=$ruta&nombre=$nombre'>Nuevo alumno</a><br><br>";

pintaTabla($users);


?>