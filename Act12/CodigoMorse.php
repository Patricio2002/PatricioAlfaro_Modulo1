<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traducción codigo Morse</title>
</head>
<body>
    <?php
        $e=0;
        $f=0;
        $texto=strlen($_POST["Textito"]);
        //verificacion de que se haya ingresado texto
        if($texto>0){
            //Traduccion de Español a Morse
            if($_POST["Morse"]=="Esp"){
                //Se guarda texto ingresado en una cadena
                $Español=strtoupper($_POST["Textito"]);
                $Traduccion=[ "A"=>".-",
                            "B" => "-...",
                            "C" => "-.-.",
                            "D" => "-..",
                            "E" => ".",
                            "F" => "..-.",
                            "G" => "--.",
                            "H" => "....",
                            "I" => "..",
                            "J" => ".---",
                            "K" => "-.-",
                            "L" => ".-..",
                            "M" => "--",
                            "N" => "-.",
                            "O" => "---",
                            "P" => ".--.",
                            "Q" => "--.-",
                            "R" => ".-.",
                            "S" => "...",
                            "T" => "-",
                            "U" => "..-",
                            "V" => "...-",
                            "W" => ".--",
                            "X" => "-..-",
                            "Y" => "-.--",
                            "Z" => "--..",
                            "1" => ".----",
                            "2" => "..---",
                            "3" => "...--",
                            "4" => "....-",
                            "5" => ".....",
                            "6" => "-....",
                            "7" => "--...",
                            "8" => "---..",
                            "9" => "----.",
                            "0" => "-----",
                            " " => "&nbsp",
                            "." => ".-.-.-",
                            "," => "-.-.--",
                            "!" => "--..--",
                            "?" => "..--..",
                            "\"" => ".-..-.",
                ];
                //se separa cada caracter de la cadena dentro de arreglo
                    $Español2=str_split($Español);
                //se revisa que no se haya ingresado caracter no deseado
                for ($i=0; $i < count($Español2); $i++) { 
                    if($Español2[$i]=="-")
                    $e=$e+1;
                }
                //resultado si no se ingresó caracter no deseado
                if($e==0){ 
                    echo "<h2>Su texto a traducir es:</h2>"; 
                    echo "<br>";
                    echo $Español;
                    echo "<br> <br>";
                    echo "<h2>Su traducción es:</h2>";
                    echo "<br>";
                    //Traducción de Español a morse
                     for ($i=0; $i < count($Español2); $i++) { 
                        echo " ".$Traduccion[$Español2[$i]];
                    }
                }
                //resultado si se ingresó caracter no deseado
                else
                    echo "<h1>Usted ingresó un caracter no deseado. Por favor corrija su texto</h1>";
                            
            }
            //Traduccion a Morse
            //Separar cada palabra en Morse con un /
            elseif($_POST["Morse"]=="Mor"){
                //Se guarda texto ingresado en una cadena
                $Clave=strtoupper($_POST["Textito"]);
                $Traduccion2=[".-"=>"A",
                            "-..."=>"B" ,
                            "-.-."=>"C",
                            "-.."=>"D" ,
                            "."=>"E",
                            "..-."=>"F" ,
                            "--."=>"G",
                            "...."=>"H",
                            ".."=>"I",
                            ".---"=>"K",
                            "-.-"=>"K",
                            ".-.."=>"L",
                            "--"=>"M",
                            "-."=>"N",
                            "---"=>"O",
                            ".--."=>"P",
                            "--.-"=>"Q",
                            ".-."=>"R",
                            "..."=>"S",
                            "-"=>"T",
                            "..-"=>"U",
                            "...-"=>"V",
                            ".--"=>"W",
                            "-..-"=>"X",
                            "-.--"=>"Y",
                            "--.."=>"Z",
                            ".----"=>"1",
                            "..---"=>"2",
                            "...--"=>"3", 
                            "....-"=>"4",
                            "....."=>"5",
                            "-...."=>"6",
                            "--..."=>"7",
                            "---.."=>"8",
                            "----."=>"9",                   
                            "-----"=>"0",
                            "/" => "/",
                            "&nbsp" => "&nbsp", 
                            ".-.-." =>".",
                            "--..--"=> "!",
                            "..--.."=>"?",
                            "-.-.--"=>",",
                            ".-..-." => "\"", 
                ];
                //pasa cadena a arreglo eliminando espacios
                $Clave2=explode(" ",$Clave);
                //separacion de todos las caracteres para revisar después si se ingreso uno indebido
                $verificacion=str_split($Clave);
                //verficacion de caracteres
                for ($i=0; $i < count($verificacion); $i++) { 
                    if((ord($verificacion[$i])>=65&&ord($verificacion[$i])<=90)||(ord($verificacion[$i])>=48&&ord($verificacion[$i])<=57))
                        $f=$f+1;
                }
                //Resultado si se ingresaron solo caracteres deseados
                if($f==0){
                    echo "<h2>Su texto a traducir es:</h2>"; 
                    echo "<br>";
                    echo $Clave;
                    echo "<br> <br>";
                    echo "<h2>Su traducción es:</h2>";
                    echo "<br>";
                    //Traducción de Morse a Español
                    for ($i=0; $i < count($Clave2); $i++) { 
                        echo " ".$Traduccion2[$Clave2[$i]];
                    }   
                }
                //Resultado si se no ingresaron solo caracteres deseados
                else  
                    echo "<h1>Usted ingresó un caracter no deseado. Por favor corrija su texto</h1>";           
            }
        }
        //Resultado si no se ingresó nada
        else
        echo "<h1>Por favor ingrese texto</h1>";  
    ?>
    <br><br>
    <form action="CodigoMorse.html" target="">
        <input type="submit" value="Regresar">
    </form>
</body>
</html>