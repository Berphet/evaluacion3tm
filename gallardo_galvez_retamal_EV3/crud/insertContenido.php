<?php

    include("./../dataConfig/DBConfig.php");

    if(isset($_POST['escribir'])){

        $nombre = mysqli_real_escape_string($conn,$_POST['nombre']);
        $descripcion = mysqli_real_escape_string($conn,$_POST['descripcion']);

        if ($nombre != "" && $descripcion != ""){

            $sql_query = "insert into contenido (nombre, descripcion, fecha_creacion, fecha_actualizacion) values";
            $sql_query .= "('".$nombre."','".$descripcion."',now(),now());";
            $result = mysqli_query($conn,$sql_query);

            if($result > 0){
                header('Location: ./../index.php');
            }else{
                echo "algo salio mal";
            }

        }

    }
?>

<!doctype html>
<html>
    <head>
        <title>gallardoEV2</title>
        <link rel="stylesheet" type="text/css" href="./../estilos/estilosEV3.css">
    </head>
    <body>
        <div id="conteiner">
            <div id="formulario_contenido" style="background-color: #9b9dfb;">
                <form method="post" action="">
                    <div>
                        <h1>Insertar Contenido</h1>
                        <li>Nombre</li>
                        <div>
                            <input type="text" class="textbox" id="nombre" name="nombre" placeholder="Creador" style="margin-top: 10px; margin-bottom: 10px;"/>
                        </div>
                        <li>Descripcion Contenido</li>
                        <div>
                            <input type="text" class="textbox" id="descripcion" name="descripcion" placeholder="como dice dracula: bla, bla bla" style="width: 1000px; height: 30px; margin-top: 10px; margin-bottom: 10px;"/>
                        </div>
                        <div>
                            <input type="submit" value="Crear Contenido" name="escribir" id="escribir" />
                        </div>
                    </div>
                </form>
                <button style="margin-top: 1%" onclick="window.location='./../index.php'">Volver</button>
            </div>
            
        </div>
        
    </body>
</html>
