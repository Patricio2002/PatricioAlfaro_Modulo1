<?php
    if(isset($_FILES['subido'])){
        $arch=$_FILES['subido']['tmp_name'];
        $name=$_FILES['subido']['name'];
        $autor=(isset($_POST['autor']))?$_POST['autor'] : "Sin autor";
        $año=(isset($_POST['año']))?$_POST['año']:"Sin año";

        $pintura=$_POST['pintura']. "&". $autor. "&". $año;
        rename($arch, 'statics/'. $pintura . ".". pathinfo($name, PATHINFO_EXTENSION));
        echo "<h1>FELICIDADES!! HA SUBIDO UNA OBRA A LA GALERÍA</h1>";
        echo '<form action=GaleriaArte.php>
                <input type="submit" value="Revisar Galería">
            </form>';
    }
    else{
        $ruta_carpeta = "./statics";
        $carpeta = opendir($ruta_carpeta);
        $archivos = array();
        $hayArchivos= true;
        while($hayArchivos){
            $archivo = readdir($carpeta);
            if($archivo !== false ){
                if($archivo != "." && $archivo!= ".."){
                    $ext=pathinfo($archivo, PATHINFO_EXTENSION);
                    if($ext=="jpg"||$ext=="png"||$ext=="jpeg"){
                        array_push($archivos, $archivo);
                    }
                }
            }
            else{
                $hayArchivos=false;
            }
        }
        if($archivos!=NULL){
            echo "<table border=1>";
                echo "<tr>";
                foreach($archivos as $key => $value){
                    echo "<td>";
                        echo "<img src='./statics/". $value."'width=300 height=300>";
                        echo "<br>";
                        $nombres=explode("&", $value);
                        echo "<br>";
                        echo "Nombre de la pintura: ".$nombres[0];
                        echo "<br>";
                        echo "Nombre del autor: ".$nombres[1];
                        echo "<br>";
                        $añito=explode(".", $nombres[2]);
                        echo "Año: ".$añito[0];
                        echo "<br>";
                    echo "</td>";
                }
                echo "</tr>";
        }
        else{
            echo "<h1>No ha ingresado obras a la galería</h1>";  
        }   
        closedir($carpeta); 
        echo "<form action=GaleriaArte.html>";
            echo "<br>";
            echo "<input type=submit value=Ingresar mas obras>";
        echo "</form>";

    }
?>