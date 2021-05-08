<?php
    session_start();
    if(isset($_SESSION["msj"])){
            echo "<table border=1>";
                echo "<thead>";
                    echo "<th colspan=2>Información de inicio de sesión</th>";
                echo "</thead>";
                    echo "<tbody>";
                        echo "<tr>";
                            echo "<td>Nombre Completo:</td>";
                            echo "<td>$_SESSION[nombre] $_SESSION[apellido]</td>";
                        echo "</tr>";
                        echo "<tr>";
                            echo "<td>Grupo:</td>";
                            echo "<td>$_SESSION[Grupo]</td>";
                        echo "</tr>";
                        echo "<tr>";
                            echo "<td>Fecha de nacimiento:</td>";
                            echo "<td>$_SESSION[nacer]</td>";
                        echo "</tr>";
                        echo "<tr>";
                            echo "<td>correo electrónico:</td>";
                            echo "<td>$_SESSION[correo]</td>";
                        echo "</tr>";
                    echo "</tbody>";
            echo "</table>";
            echo "<form action=cerrar.php method=POST>";    
                    echo" <input type=submit name=cerrar value=cerrar>";
                echo "</form>"; 
    }
    elseif($_POST["nombre"]!=NULL){
        $_SESSION["msj"]=$_POST["inicio"];
        $_SESSION["nombre"]=$_POST["nombre"];
        $_SESSION["apellido"]=$_POST["Apellido"];
        $_SESSION["Grupo"]=$_POST["grupo"];
        $_SESSION["nacer"]=$_POST["nacer"];
        $_SESSION["correo"]=$_POST["correo"];
        $_SESSION["contraseña"]=$_POST["contraseña"];
        header("location: ./index.php");
    }
    else{
        header("location: ./form.php");
    }

?>