
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Batalla Naval</title>
</head>
<body>
    <h1>Batalla Naval</h1>
    <form action="Juego.php" method="POST">
        <h2>Vidas: 
        <?php
            $a=0;
            $UwU=0;
            $comparacion=0;
            //comprueba que exista el valor de las vidas al iniciar
            $acierto="";
            $vidas= (isset($_POST["vida"]))? $_POST["vida"] : 7;
            //comprueba que sea posible la victoria
            echo "<br>";
            $victoria=(isset($_POST["victoria"]))? $_POST["victoria"]: NULL;
            $posibleVictoria=1;
            //revisa que el juego corra mientras no se haya ganado y tengas vidas
            if($vidas>0&&$victoria!=1){
                $letras=["A", "B", "C", "D", "E", "F", "G", "H", "I", "J"];
                //asigna tamaño al tablero
                $ModoDeJuego=10;
                //guarda la imagen predeterminada del awa
                $tabla="<img src='./mar.jpg' width='60px' heigth='60px'></td>";
                //almacena en el arreglo la imagen del awa
                $matriz=[];
                for ($i=0; $i < $ModoDeJuego*$ModoDeJuego+1; $i++) { 
                    $matriz[$i]=$tabla;
                }
    
        ?>
        </h2>
        <?php
            $barquito1=array(" ", " ", " "," ", " ", " ", " ");
            //comprueba que no haya empezado por primera vez el juego
            $c= (isset($_POST["vida"]))? 1 : 0;
            //comprueba que exista primer en Y
            $v=(isset($_POST["Número"]))?$_POST["Número"]:11;
            //comprueba que exista primer en X
            $u=(isset($_POST["Nombre"]))?$_POST["Nombre"]:"A";
            //comprueba que existan acierto
            if(isset($_POST["acierto"])){
                $acierto=$_POST["acierto"];
                $atinaste=explode(" ", $acierto);
            }  
            if (isset($_POST["comparacion"])){
                $comp=$_POST["comparacion"];
                $comparacion2=explode(" ", $comp);
            }     
            //comprueba que se guarden las matrices
            $cordenada=(isset($_POST["coordenada"]))?$_POST["coordenada"]:0;
            $coordenada=explode(" ", $cordenada);
            //almacena el valor de los tiros
            $UwU=$u.$v;
            array_push($coordenada, $UwU);
            //comprueba si existe posición de barcos
            $barquito= (isset($_POST["barco"]))? $_POST["barco"] : 0;
            //comprueba que exista el disparo atinado
            $disp=(isset($_POST["disparo"]))?$_POST["disparo"]:NULL;
            //las letras las hace mayusculas
            $u=strtoupper($u);
            $posicionX=["A"=>1,
                "B"=>2,
                "C"=>3,
                "D"=>4,
                "E"=>5,
                "F"=>6,
                "G"=>7,
                "H"=>8,
                "I"=>9,
                "J"=>10,            
            ];
            $v=$v-1;
            //se da el valor numérico de la letra
            $u=$posicionX[$u];
            $v=$v*10;
            $j=$v+$u;
            $contador=0;
            //la posicion de los barquitos los guarda en un arreglo UwU
            $barquito1=explode(" ", $barquito);
            //almacena el valor del disparo en un arreglo
            $jj=explode(" ", $j);
            //revisa si sí atinaste o no al disparo
            if($disp!==NULL){
                $cord=array_intersect($jj, $barquito1);
                if($cord!=NULL){
                   //guarda el disparo en atinaste
                   if(isset($atinaste)){
                        array_push($atinaste, $UwU);
                        array_push($comparacion2, $j);
                    }
                }
                 else{
                     //resta la vida solo una vez por fallo
                    if($contador==0){
                        $vidas=$vidas-1;
                         $contador=1;
                     }
                    //guarda la imagen del fallo
                    $matriz[$j]="<img src=./mar_fallo.jpg width=60 height=60>";
                }
            }
            //revisa si sí atinaste al tiro
            if(isset($comparacion2)){
                //ordena el barco y el registro de disparos atinados
                sort($barquito1);
                sort($comparacion2);
                //compara ambos valores dentro de las matrices
                //revisar mas a fondo
                $acierto=implode(" ", $atinaste);  
            }
            if($posibleVictoria==0){
                $victoria=1;
            }
            //vuelve a guardar los disparos atinados en una cadena
            //se imprimen las vidas      
            for($i = 1; $i <= $vidas+1; $i++){
                echo "<img src='./vidas.png' width='20px' height='20px'>";
            }
            echo "<br>";
            echo "<h3>Registro de disparos:</h3>";
            echo "<br>";
            //se imprime el registro de coordenadas
            for ($i=2; $i < count($coordenada); $i++) { 
                echo ",".$coordenada[$i];
            } 
            //vuelve a guardar registro de coordenadas en cadena
            $cordenada=implode(" ", $coordenada);
        ?>
            
                <body>
                    <?php 
 
                        //vuelve a guardar los registros de los barcos en cadena
                        $barquito=implode(" ", $barquito1);
                        
                        echo "</tr>";  
                        //random de barcos
                        $igual=1;
                        //revisa que sea la primera vez que se inicia el juego
                        if($c==0){
                            $rev1=array();
                            $rev2=array();
                            $x1=rand(1, 9);
                            $y1=rand(0, 9);
                            $x2=rand(1, 9);
                            $y2=rand(0, 9);
                            //random que decide como se posicionaran barcos
                            $b1=rand(0, 1);
                            $b2=rand(0, 1);
                            //acomodamiento de barcos
                            //horizontal barco de 4
                            
                            if($b1==0){
                                $y1=$y1*10;
                                $x1=rand(1, 6);
                                $rev1=[$x1+$y1, $x1+1+$y1, $x1+2+$y1, $x1+3+$y1];                        
                            }
                            //vertical barco de 4
                            else{
                                $y1=rand(0, 6);
                                $y1=$y1*10;
                                $rev1=[$y1+$x1, $y1+10+$x1, $y1+20+$x1, $y1+30+$x1];                    
                            }
                            //se asegura que los barcos no se encimen
                            do{ 
                                $igual=0;
                                //vertical barco de 3
                                if($b2==0){
                                    $y2=$y2*10;
                                    $x2=rand(1, 7);
                                    $rev2=[$x2+$y2, $x2+1+$y2, $x2+2+$y2];
                                }
                                //horizontal barco de 3
                                else{
                                    $y2=rand(0, 7);
                                    $y2=$y2*10;
                                    $rev2=[$y2+$x1, $y2+10+$x1, $y2+20+$x1];                        
                                }
                                $igual=0;
                                for ($i=0; $i < count($rev1); $i++) {
                                    for ($UnU=0; $UnU < count($rev2); $UnU++) { 
                                        if($rev1[$i]==$rev2[$UnU]){
                                            $igual=1;
                                        }
                                    }
                                }                    
                            }while($igual==1);
                            $barquito1=array_merge($rev1, $rev2);
                            sort($barquito1);
                            $barquito=implode(" ", $barquito1);
                        }
                    ?> 
                </body>
                <?php
                    
                    //almacena las imagenes de darle al barco en el arreglo en las posiciones indicadas
                    if(isset($comparacion2)){
                        for ($OwO=0; $OwO < count($comparacion2); $OwO++) { 
                            $matriz[$comparacion2[$OwO]]="<img src=./bien.jpg width=60 height=60>";
                        }
                    }
                    if(isset($comparacion2)){
                        $comparacion=implode(" ", $comparacion2);
                        $revision=strlen($comparacion);
                        $revision2=strlen($barquito);
                        if(isset($atinaste[6])){
                            $victoria=1;
                        }
                        echo "<br>";
                    }
                    echo "<table border=1>";
                    echo "<tr>";
                    echo "<td></td>";
                    //imprime las letras que van a salir
                    for($a = 0; $a < $ModoDeJuego; $a++){
                        echo "<td>$letras[$a]</td>";
                    }
                    echo "</tr>";
                    $g=1;  
                    $h=1;
                        //coloca las imagenes
                    for($t = 1; $t < $ModoDeJuego*$ModoDeJuego+1; $t++){
                        //imprime la tabla
                        if($g%10!=0){ 
                            //se asegura de que solo imprima las letras una vez cada 10 ciclos
                            if($g==1){ 
                                echo "<td>$h</td>";
                            }
                            //imprime la imagen
                            echo "<td>";
                            echo $matriz[$t]; 
                            echo "</td>";
                            $g++;
                            //si pasa un ciclo aumenta en un el valor del arreglo donde estan las letras
                            if($g==10){
                                $h++;
                            }
                        }
                        else{
                            $g=1;
                            echo "<td>$matriz[$t]</td>"; 
                            echo "</tr>";  
                        }                        
                    }
                    echo "<br>";
                    echo "</table>";
                    //almacena posición de barcos
                    echo "<input type=\"hidden\" name=\"barco\" value=\"$barquito\">";
                    //almacena posición de vidas
                    echo "<input type=hidden name=vida value= \"$vidas\">";
                    //almacena registro de coordenadas
                    echo "<input type=hidden name=coordenada value= \"$cordenada\">";
                    //almacena registro de aciertos
                    if(isset($acierto)){
                        echo "<input type=hidden name=acierto value= \"$acierto\">";
                    }
                    //almacena el valor para la victoria
                    echo "<input type=hidden name=victoria value= \"$victoria\">";
                    echo "<input type=hidden name=comparacion value= \"$comparacion\">";
                    //ingresar letra
                    echo "<label>Posición X(Letra)";     
                        echo "<input type=text name=Nombre requred>";         
                    echo "</label>";
                    //Ingresar numero
                    echo "<label>Posición Y(Número)";
                        echo "<input type=number name=Número min=1 max=10 requred>";
                    echo "</label>";
                    echo "<br>";
                    //revisa que se haya enviado algo al menos una vez
                    echo "<input type=submit name=disparo value=Disparar!>";
                }
                else{
                    if($vidas==0){
                        echo  "<h2>Has perdido</h2>";
                    }
                    else{
                        echo '<h1>MUCHAS FELICIDADES!!! HAS GANADO</h1>
                        <h2>Juego Hecho por: Patricio Alfaro Domínguez UwU</h2>';

                    }
            }
        ?>
         
    </form>
</body>
</html>