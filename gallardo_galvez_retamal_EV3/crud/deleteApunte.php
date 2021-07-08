<?php 

    include("./../dataConfig/DBConfig.php");

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT nombre, url, tipo FROM apunte where id = $id";
        $resultado_update = mysqli_query($conn, $query);
        if (mysqli_num_rows($resultado_update) == 1) {
            $row = mysqli_fetch_array($resultado_update);
            $nombre = $row['nombre'];
            $url = $row['url'];
            $tipo = $row['tipo'];
        }
    }

    if(isset($_POST['delete'])){

        $id = $_GET['id'];

        if ($id != ""){

            $sql_query = "delete from apunte where id = $id";
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
        <title>gallardoEV2</title>
        <link rel="stylesheet" type="text/css" href="./../estilos/estilosEV3.css">
    </head>
    <body>
    <div id="conteiner">
            <div id="formulario_contenido">
                <form method="post" action="">
                    <div>
                        <form action="updateApunte.php?id=<?php echo $_GET['id'];?>" method="post">
                        <h1>Actualizar Apunte</h1>
                        <div class="form-group">
                        
                            <li>Nombre</li>
                            <input type="text" name="nombre" value="<?php echo $nombre;?>" class="form-control" placeholder="Nombre" readonly="true">
                        </div><br>
                        <div class="form-group">
                            <li>URL</li>
                            <textarea name="url" rows="2" class="form-control" readonly="true" placeholder="Actualizar descripcion"><?php echo $url;?></textarea>
                        </div><br>
                        <div class="form-group">
                        
                        <li>Tipo</li>
                        <input type="text" name="tipo" value="<?php echo $tipo;?>" class="form-control" readonly="true" placeholder="Nombre">
                        </div><br>           
                        <button class="btn btn-success" name="delete">Eliminar Apunte</button>
                        </form>
                        <button style="margin-top: 1%" onclick="window.location='./../index.php'">Volver</button>
            </div>
            
        </div>
        
    </body>
</html>