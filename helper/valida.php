<?php

function contraseñaValid($nombre, $contraseña){ 
    $usu = leeUsuario($nombre);
    if ($contraseña == $usu[$nombre][1]){
        return true;
    } else {
        return false;
    }
}