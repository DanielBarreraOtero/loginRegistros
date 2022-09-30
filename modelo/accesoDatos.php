<?php

function leeUsuarios($ruta="../files/users.csv"): array
{
    $s = file_get_contents($ruta);
    $temp = explode("\n", $s);

    foreach ($temp as $value) {
        $usuarios[explode(";", $value)[0]] = explode(";", $value);
    }

    return $usuarios;
}

function guardaUsuario(string $nombre, string $pass, string $rol,$ruta="../files/users.csv"): void
{
    $s = file_get_contents($ruta);
    $u = "\n" . $nombre . ";" . $pass . ";" . $rol;

    $s = $s . $u;
    file_put_contents($ruta, $s);
}


function existeUsuario(string $usuario,$ruta="../files/users.csv")
{
    $usuarios = leeUsuarios($ruta);
    return isset($usuarios[$usuario]);
}

function leeUsuario($usuario,$ruta="../files/users.csv"):array
{
    $user = [];
    if (existeUsuario($usuario,$ruta)) {
        $user["$usuario"] = leeUsuarios($ruta)[$usuario];
        return $user;
    } else{
        return $user;
    }
}

function creaSesion($nombre,$ruta="../files/users.csv"){
    $id = rand();
    $path = "../files/$id.csv";
    $usu = leeUsuario($nombre,$ruta);
    $text = $usu[$nombre][0].';'.$usu[$nombre][1].';'.$usu[$nombre][2];
    file_put_contents($path,$text);
    return $path;
}

function leeSesion($nombre, $ruta){
    $user = leeUsuario($nombre,$ruta);
    unlink($ruta);
    return $user;
}