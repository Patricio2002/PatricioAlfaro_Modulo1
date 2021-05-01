<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Universidad</title>
</head>

<body>
    <?php
    //tabla donde se ingresarán datos
    echo "<table border=1>";
        echo "<Thead>";
            //titulo
            echo "<th colspan=4><h2>Solicitud de ingreso a la UNAM</h2></th>";
        echo "</Thead>";
        echo "<Tbody>";
            //nombre y apellidos ingresados
            echo  "<tr>";
                echo "<td>$_POST[Paterno]</td>";
                echo "<td>$_POST[Materno]</td>";
                echo "<td colspan=2>$_POST[nombre]</td>";
            echo "</tr>";
            //nombre y apellidos (etiquetas)
            echo "<tr>";
                echo "<td><u><strong>Apellido paterno</strong></u></td>";
                echo "<td><u><strong>Apellido materno</strong></u></td>";
                echo "<td colspan=2><u><strong>Nombre(s)</strong></u></td>";
            echo "</tr>";
            //sexo y edad
            echo "<tr>";
                echo "<td><u><strong>Sexo:</strong></u></td>";
                echo "<td>$_POST[sexo]</td>";
                echo "<td><u><strong>Edad:</strong></u></td>";
                echo "<td>$_POST[edad]</td>";
            echo "</tr>";
            //correo electrónico, teléfono y celular ingresados
            echo "<tr>";
                echo "<td colspan=2>$_POST[correo]</td>";
                echo "<td>$_POST[telefono]</td>";
                echo "<td>$_POST[cel]</td>";
            echo "</tr>";
            //correo electrónico, teléfono y celular (etiquetas)
            echo "<tr>";
                echo "<td colspan=2><u><strong>Correo Electrónico</strong></u></td>";
                echo "<td><u><strong>Telefono</strong></u></td>";     
                echo "<td><u><strong>Celular</strong></u></td>";   
            echo "</tr>";
            //escuela y promedio
            echo "<tr>";
                echo "<td><u><strong>Escuela de procedencia:</strong></u></td>";
                echo "<td>$_POST[Escuela]</td>";    
                echo "<td><u><strong>Promedio:</strong></u></td>";
                echo "<td>$_POST[prom]</td>";
            echo "</tr>";
            //primera opción
            echo "<tr>";
                echo "<td colspan=2><u><strong>Primera opción</strong></u></td>";
                echo "<td colspan=2>$_POST[opUno]</td>";
            echo "</tr>";
            //segunda opción
            echo "<tr>";
                echo "<td colspan=2><u><strong>Segunda opción</strong></u></td>";
                echo "<td colspan=2>$_POST[opDos]</td>";
            echo "</tr>";
        echo "</Tbody>";
    echo "</table>";
    ?>
</body>
</html>