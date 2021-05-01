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
//variables definidas para que existan
   $a=0;
   $b=0;
   $c=0;
   $d=0;
   $e=[" "," "," ", " "];
   $f=[" "," "," ", " "];
   $u=0;
   //arreglo donde se guardan valor de respuestas
   $arreglo=[$_POST["Taco1"],$_POST["Taco2"],$_POST["Taco3"],$_POST["Taco4"],$_POST["Taco5"],$_POST["Taco6"],
   $_POST["Taco7"],$_POST["Taco8"],$_POST["Taco9"],$_POST["Taco10"],];
      //extracción de valores transformandolos a números
      for ($z=0; $z<count($arreglo); $z++){
         if($arreglo[$z]=="A"){
            $a=$a+1;
         }
         elseif($arreglo[$z]=="B"){
            $b=$b+1;
         }
         elseif($arreglo[$z]=="C"){
            $c=$c+1;
         }
         else{
            $d=$d+1;
         }
      }
      //agrupación de valores numéricos (variables) en arreglo
      $arreglo2=[$a, $b, $c, $d];
      //ordenar arreglo de mayor a menor manteniendo indices
      arsort($arreglo2);
      //extracción de indice y de valor ordenandolos de mayor a menor
      foreach($arreglo2 as $key => $value){
         //arreglo indices
         $e[$u]=$key;
         //arreglo valores
         $f[$u]=$value;
         $u=$u+1;
      }
      //si no hay valor que se iguale al primero (el mayor) se cumple esto
      if($f[0]>$f[1])
      {
         //si el valor mayor es A
         if($e[0]==0)
            echo "<h1>Eres un taco al pastor</h1>";
            //si el valor mayor es B
         elseif($e[0]==1)
            echo "<h1>Eres un taco de suadero</h1>";
            //si el valor mayor es C
         elseif($e[0]==2)
            echo "<h1>Eres un taco de barbacoa</h1>";
            //si el valor mayor es D
         elseif($e[0]==3)
            echo "<h1>Eres un taco Languero</h1>";
      }
      //en caso de que sí haya un valor que sea igual que el mayor se cumple esto
      elseif($f[0]==$f[1])
      {
         //Si los valores más altos son A y B
         if($e[0]==0&&$e[1]==1&&$f[2]!=3)
            echo "<h1>Eres un taco Campechano</h1>";
            //Si los valores más altos son A y C
         elseif($e[0]==0&&$e[1]==2&&$f[2]!=3)
            echo "<h1>Eres un taco placero</h1>";
            //Si los valores más altos son A y D
         elseif($e[0]==0&&$e[1]==3&&$f[2]!=3)
            echo "<h1>Eres un taco light</h1>";
            //Si los valores más altos son B y C
         elseif($e[0]==2&&$e[1]==1&&$f[2]!=3)
            echo "<h1>Eres un taco de carnitas</h1>";
            //Si los valores más altos son B y D
         elseif($e[0]==1&&$e[1]==3&&$f[2]!=3)
            echo "<h1>Eres un taco de  mixiote</h1>";
            //Si los valores más altos son C y ;
         elseif($e[0]==2&&$e[1]==3&&$f[2]!=3)
            echo "<h1>Eres un taco Bell</h1>";
            //si hay tres valores más altos
         else
         echo "<h1>Eres un taco de Sal</h1>";
      }
?>
</body>
</html>
