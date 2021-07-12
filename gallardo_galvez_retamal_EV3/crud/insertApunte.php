<?php

include("./../dataConfig/DBConfig.php");

if(isset($_POST['newapunte'])){

    //declarar variables
    $id = $_GET['id'];
    $nombre = mysqli_real_escape_string($conn,$_POST['nombre']);
    $url = mysqli_real_escape_string($conn,$_POST['url']);
    $tipo = mysqli_real_escape_string($conn,$_POST['apuntetipo']);

    //comprobar que las variables recibidas no esten vacias
    if ($id != "" && $nombre != "" && $url != "" && $tipo != ""){

        $sql_query = "insert into apunte (contenido_id, nombre, url, tipo, fecha_creacion, fecha_actualizacion) values";
        $sql_query .= "($id,'".$nombre."', '".$url."', $tipo, now(), now());";
        $result = mysqli_query($conn,$sql_query);

        if($result > 0){
            header('Location: ./../index.php');
        }else{
            echo "rellene todos los campos";
        }

    }

}
?>

<!doctype html>
<html>
    <head>
        <title>gallardoEV3</title>
        <link rel="stylesheet" type="text/css" href="./../estilos/estilosEV3.css">
    </head>
    <body>
        <div id="conteiner">
            <div id="formulario_contenido">
                <form method="post" action="">
                    <div>
                        <h1>Insertar Apunte</h1>
                        <li>Nombre Apunte</li>
                        <div>
                            <input type="text" class="textbox" id="nombre" name="nombre" placeholder="como dice dracula: bla, bla bla"/>
                        </div>
                        <li>URL</li>
                        <div>
                            <input type="url" class="textbox" id="url" name="url" placeholder="youtube.com/profepongame un 7" style="margin-top: 10px; margin-bottom: 10px;"/>
                        </div>
                        <li>Apunte Tipo</li>
                        <div>
                            <select id="apuntetipo" name="apuntetipo">
                              <option value="1">WEB</option>
                              <option value="2">IMAGEN</option>
                              <option value="3">VIDEO</option>
                              <option value="4">PDF</option>
                            </select>
                        </div> 
                        <div>
                            <input type="submit" value="Crear Apunte" name="newapunte" id="newapunte" />
                        </div>
                    </div>
                </form>
                <button style="margin-top: 1%" onclick="window.location='./../index.php'">Volver</button>
            </div>
            
        </div>
        
    </body>
</html>