
        <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Index</title>
            </head>
            <body>
            <?php
                session_start();
                if(isset($_SESSION["msj"])){
                    header("location: ./index.php");
                }
                else{
                    echo "<form action=index.php method=POST>";
                        echo "<fieldset style=width:400px>";
                            echo "<legend>Inicio de sesión</legend>";
                            echo "Nombre:<input type=text name=nombre required>";
                            echo "<br><br>";
                            echo "Apellidos:<input type=text name=Apellido required>";
                            echo "<br><br>";
                            echo "Grupo:<input type=number name=grupo required>";
                            echo "<br><br>";
                            echo "<label>Fecha de nacimiento";
                                echo "<input type=date name=Nacer required>";
                                echo "<br><br>";
                            echo "</label>";
                            echo "<label>Correo electrónico:";
                                echo "<input type=email name=correo required>";
                                echo "<br><br>";
                            echo "</label>";
                            echo "<label>Contraseña";
                                echo "<input type=password name=contraseña required>";
                                echo "<br><br>";
                            echo "</label>";
                            echo "<input type=submit name=inicio value=Iniciar sesion required>";  
                        echo "</fieldset>";
                    echo "</form>";
                    };
                ?>
            </body>
            </html>
    
