<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $verificar=(isset($_POST["calcular"])); 
        if($verificar==NULL){ 
            function hora($horita=0){
                //separa hora y minutos ingresados en arreglo
                $h1=explode(":", $_POST["cdmx"]);
                //suma hora ingresada y diferencia
                $h1[0]=$h1[0]+$horita;
                //verifica que no se pase de 24 horas
                if($h1[0]>23){
                    $h1[0]=$h1[0]-24;
                }
                //junta suma y minutos
                $final=implode(":", $h1);
                return $final;
            }
            //verifica que los paises hayn sido seleccionados y les asigna la diferencia de hora
            $a=(isset($_POST["NY"]))?1:NULL;
            $b=(isset($_POST["SP"]))?2:NULL;
            $c=(isset($_POST["Madrid"]))?7:NULL;
            $d=(isset($_POST["Paris"]))?7:NULL;
            $e=(isset($_POST["Roma"]))?7:NULL;
            $f=(isset($_POST["Atenas"]))?8:NULL;
            $g=(isset($_POST["Beijing"]))?11:NULL;
            $h=(isset($_POST["Tokio"]))?14:NULL;
            //inicia la tablita UwU
            echo "<table border = 1>";
                //encabezado
                echo "<thead>";
                    echo "<th colspan=2>Reloj Mundial</th>";
                echo "</thead>";
                //cuerpo
                echo "<tbody>";
                    //Mexico
                    echo "<tr>";
                        echo "<td>Ciudad de México</td>";
                        echo"<td>" . $_POST["cdmx"]. "</td>";
                    echo "</tr>";
                    //Nueva York seleccionado
                    if($a!=NULL){
                        echo "<tr>";
                            echo "<td>Nueva York</td>";
                        echo"<td>" . hora($a) . "</td>";
                        echo "</tr>";
                        
                    }
                    //Sao Paulo seleccionado
                    if($b!=NULL){
                        echo "<tr>";
                            echo "<td>Sao Paulo</td>";
                            echo"<td>" . hora($b) . "</td>";
                        echo "</tr>";
                    }
                    //Madrid seleccionado
                    if($c!=NULL){
                        echo "<tr>";
                            echo "<td>Madrid</td>";
                            echo"<td>" . hora($c) . "</td>";
                        echo "</tr>";
                    }
                    //Paris seleccionado
                    if($d!=NULL){
                        echo "<tr>";
                            echo "<td>Paris</td>";
                            echo"<td>" . hora($d) . "</td>";
                        echo "</tr>";;
                    }
                    //Roma seleccionado
                    if($e!=NULL){
                        echo "<tr>";
                            echo "<td>Roma</td>";
                            echo"<td>" . hora($e) . "</td>";
                        echo "</tr>";
                    }
                    //Atenas seleccionado
                    if($f!=NULL){
                        echo "<tr>";
                            echo "<td>Atenas</td>";
                            echo"<td>" . hora($f) . "</td>";
                        echo "</tr>";
                    }
                    //Beijing seleccionado
                    if($g!=NULL){
                        echo "<tr>";
                            echo "<td>Beijing</td>";
                            echo"<td>" . hora($g) . "</td>";
                        echo "</tr>";
                    }
                    //Roma seleccionado
                    if($h!=NULL){
                        echo "<tr>";
                            echo "<td>Tokio</td>";
                            echo"<td>" . hora($h) . "</td>";
                        echo "</tr>";
                    }
                echo "</tbody>";
            echo "</table>";
        }
        else{
            //se colocan fechas actual y cumpleaños
            $cumple=$_POST["fecha"];
            $hoy=date("Y-m-d");
            //se verifica cuales se quieren checar
            $w=(isset($_POST["Dias"]))?1:NULL;
            $x=(isset($_POST["Horas"]))?1:NULL;
            $y=(isset($_POST["Minutos"]))?1:NULL;
            $z=(isset($_POST["Fin"]))?1:NULL;
            $cumpleUwU=explode("-", $cumple);
            $hoyUwU=explode("-", $hoy);
            //se revisa la diferencia de meses
            $dif1=$cumpleUwU[1]-$hoyUwU[1];
            $meses=[0, 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30,  31];
            $dif2=0;
            $dif3=0;
            $dif4=0;
            $dif5=0;
            //si es despues del mes del cumple
            if($dif1>0){
                //se suman los dias meses que han pasado
                for ($i=0; $i < $dif1; $i++) { 
                    $dif2=$meses[$hoyUwU[1]+$i-1]+$dif2;
                }
                //diferencia entre días (sin considerar los meses) 
                $dif3=$hoyUwU[2]-$cumpleUwU[2];
                //si el numero de día de hoy es menor al del cumple
                if($dif3<0) {
                   $dif2=$dif2-$dif3; 
                } 
                 //si el numero de día de hoy es mayor al del cumple
                else{
                    $dif2=$dif2+$dif3; 
                }
                //se multiplica para horas
                $dif4=$dif2*24;
                //se multiplica para minutos
                $dif5=$dif4*60;
                if($w!=NULL)
                    echo $dif2;
                if($x!=NULL)
                    echo $dif4;
                if($y!=NULL)
                    echo $dif5;
            }
            else{
                //si es en el mismo mes
                if($dif1==0){
                    $dif3=$hoyUwU[2]-$cumpleUwU[2];
                    //si no ha pasado
                    if($dif3<=0){
                        $dif3=$dif3*(-1);
                        $dif4=$dif3*24;
                        $dif5=$dif4*60;
                        if($w!=NULL)
                            echo $dif3;   
                        if($x!=NULL)
                            echo $dif4;
                        if($y!=NULL)
                            echo $dif5;   
                    }
                    //si ya pasó
                    else{
                        $dif3=365-$dif3;
                        if($w!=NULL)
                            echo $dif3;
                    }  
                }
                // si cumple en un mes anterior al de fecha actual
                else{
                    $dif1=$dif1*-1;
                    //se suman los meses que han pasado de su cumpleaños a la actualidad
                    for ($i=0; $i < $dif1; $i++) { 
                        $dif2=$meses[$cumpleUwU[1]+$i]+$dif2;
                    }
                    //diferencia de numero de dia en mes
                    $dif3=$hoyUwU[2]-$cumpleUwU[2];
                    if($dif3<0) {
                       $dif2=$dif2-$dif3; 
                    } 
                    else{
                        $dif2=$dif2+$dif3; 
                    }
                    //se ajusta el valor para que sea en el proximo año
                    $dif2=365-$dif2;
                    $dif4=$dif2*24;
                    $dif5=$dif4*60;
                    if($w!=NULL)
                        echo $dif2;
                     if($x!=NULL)
                        echo $dif4;
                    if($y!=NULL)
                        echo $dif5;
                }
            }
            //caclula si es fin de semana
            //No sirve si es con un mes que ya pasó xd
            if($z!=NULL){
                $diaSemana=date("w");
                if($dif1!=0){
                    if($dif1>0)
                        $semana=$dif2-$diaSemana-2;
                    else{
                        $semana=$dif2-$diaSemana+6;   
                    }
                }
                else
                    $semana=$dif3-$diaSemana-3;
                if($semana%7==0||$semana%7==6){
                    echo "es fin de semana";
                }
                else{
                    echo "No es fin de semana";
                }
            }
        }
    ?>
</body>
</html>