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

    if (isset($_POST['update'])) {
        $id = $_GET['id'];
        $nombre = $_POST['nombre'];
        $url= $_POST['url'];
        $tipo = $_POST['tipo'];

        $sql_query = "UPDATE apunte SET nombre = '$nombre', url ='$url', tipo = '$tipo', fecha_actualizacion = now() WHERE id = $id";
        $result = mysqli_query($conn,$sql_query);

        if($result > 0){
            header('Location: ./../index.php');
        }else{
            echo "Error, intente nuevamente";
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
                        <form action="updateApunte.php?id=<?php echo $_GET['id'];?>" method="post">
                        <h1>Actualizar Apunte</h1>
                        <div class="form-group">
                        
                            <li>Nombre</li>
                            <input type="text" name="nombre" value="<?php echo $nombre;?>" class="form-control" placeholder="Nombre">
                        </div><br>
                        <div class="form-group">
                            <li>URL</li>
                            <textarea name="url" rows="2" class="form-control" placeholder="Actualizar descripcion"><?php echo $url;?></textarea>
                        </div><br>
                        <div class="form-group">
                        
                        <li>Tipo</li>
                        <input type="text" name="tipo" value="<?php echo $tipo;?>" class="form-control" placeholder="Nombre">
                        </div><br>           
                        <button class="btn btn-success" name="update">Actulizar Apunte</button>
                        </form>
            </div>
            <button style="margin-top: 1%" onclick="window.location='./../index.php'">Volver</button>
        </div>
        
    </body>
</html>