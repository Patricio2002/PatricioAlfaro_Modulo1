
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tablero</title>
</head>
<body>
    <?php
    //valores iniciales de variables
    $y=5;
    $x=1;
    $z=1;
    //tablero
    echo "<table border=1>";
    //define largo del tablero
    for($x=0; $x<$y; $x++){
            echo "<tr>";
                //define ancho del tablero
                for ($z=0; $z<$y; $z++){
                    //Da las primeras combinaciones posibles ($x par z par o inpar) para alternancia
                    if ($x%2==0){
                        //$z par
                        if($z%2==0)
                            echo "<td height=100 width=100><img src='./negro.jpg' height=100 width=100></td>";
                        //$z inpar
                        else
                            echo "<td height=100 width=100><img src='./blanco.jpg' height=100 width=100></td>";
                    }  
                    //Da las últimas combinaciones posibles ($x inpar z par o inpar) para alternancia      
                    else{
                        //z par
                        if($z%2==0)
                            echo "<td height=100 width=100><img src='./blanco.jpg' height=100 width=100></td>";
                        //$z inpar
                        else
                            echo "<td height=100 width=100><img src='./negro.jpg' height=100 width=100></td>";
                    }
                }
            echo "</tr>";
            //salto de línea para formar diferentes hileras
            echo "<br>";
        }
        ?>
    </table>
</body>
</html>