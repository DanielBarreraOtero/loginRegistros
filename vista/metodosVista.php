<?php
function pintaTabla($usuarios)
{
    echo "<table align='left' id='tabla'>
        <tr>
            <th class='box'>Nombre</th>
            <th class='box'>Contraseña</th>
            <th class='box'>Rol</th>
        </tr>";
    foreach ($usuarios as $value) {
        //Si no tiene ningun campo vacio se pinta
        if ($value[0] != "" && $value[1] != "" && $value[2] != "")
            echo "<tr> 
            <td class='box'>$value[0]</td>
            <td class='box'>$value[1]</td>
            <td class='box'>$value[2]</td>
         </tr>";
    }
    echo "</table>";
}
