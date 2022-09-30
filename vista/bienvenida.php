<?php 
require_once "login/modelo/accesoDatos.php";
$nombre = $_GET['nombre'];
$ruta = $_GET['ruta'];
echo "$ruta $nombre";
$user = leeSesion($nombre,$ruta);
$pass = $user[$nombre][1];
$rol = $user[$nombre][2];


echo "<h2>Bienvenido :)</h2>";
echo "Usuario: $nombre. Contraseña: $pass. Rango: $rol";
