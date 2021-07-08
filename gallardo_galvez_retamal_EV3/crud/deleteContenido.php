<?php

    include("./../dataConfig/DBConfig.php");

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM contenido WHERE id = $id";
        $resultado_update = mysqli_query($conn, $query);
        if (mysqli_num_rows($resultado_update) == 1) {
            $row = mysqli_fetch_array($resultado_update);
            $nombre = $row['nombre'];
            $descripcion = $row['descripcion']; 
        }
    }

    if(isset($_POST['delete'])){

        $idcondel = $_GET['id'];

        if ($idcondel != ""){

            $sql_query = "delete from contenido where id = $idcondel";
            $result = mysqli_query($conn,$sql_query);

            if($result > 0){
                header('Location: ./../index.php');
            }else{
                echo "Intente nuevamente";
            }

        }

    }
?>

<!doctype html>
<html>
    <head>
        <title>ProyectoEV3</title>
        <link rel="stylesheet" type="text/css" href="./../estilos/estilosEV3.css">
    </head>
    <body>
        <div id="conteiner">
            <div id="formulario_contenido" style="background-color: #9b9dfb;">
                <form action="deleteContenido.php?id=<?php echo $_GET['id'];?>" method="post">
                <h1>Eliminar Contenido</h1>
                <div class="form-group">
                
                    <li>Nombre</li>
                    <input type="text" name="titulo" value="<?php echo $nombre;?>" class="form-control" placeholder="Nombre" readonly="true">
                </div><br>

                <div class="form-group">
                    <li>Descripción</li>
                    <textarea name="descripcion" rows="2" class="form-control" readonly="true" placeholder="Actualizar descripcion"><?php echo $descripcion;?></textarea>
                </div><br>
                            
                <button class="btn btn-success" name="delete">Eliminar Contenido</button>
                </form>
                <button style="margin-top: 1%" onclick="window.location='./../index.php'">Volver</button>
            </div>
            
        </div>
        
    </body>
</html>
