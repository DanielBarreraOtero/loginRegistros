<?php
require_once "login/modelo/accesoDatos.php";
require_once "login/helper/valida.php";

$nombre = $_POST['nombre'];
$pass = $_POST['pass'];

$path = $_GET['ruta'];
$nom = $_GET['nombre'];

echo "$path    $nom";

// Comprueba si venimos de crear un usuario
if(isset($_GET['ruta']) && isset($_GET['nombre'])){
    // lee token
    $useradmin = leeSesion($nom,$path);

    // lee rol del usuario nuevo
    $rol = $_POST['rol'];

    guardaUsuario($nombre,$pass,$rol);
    // reutilizamos las variables para poder iniciar sesion con el 
    // usuario admin que traiamos
    $nombre = $_GET['nombre'];
    $pass = $useradmin[$nombre][2];
}


$usu = leeUsuario($nombre);

// valida contraseñas
if(contraseñaValid($nombre, $pass)){
    $ruta = creaSesion($nombre);

    if ($usu[$nombre][2] == 'alumno') {
    $_POST['nombre'] = $nombre;
        header("Location: ../vista/bienvenida.php?nombre=$nombre&ruta=$ruta");
    }
    if ($usu[$nombre][2] == 'admin') {
        header("Location: ../vista/listado.php?nombre=$nombre&ruta=$ruta");
    }
    
} else {
    echo "<h4>Usuario o contraseña erróneos</h4>";
}


