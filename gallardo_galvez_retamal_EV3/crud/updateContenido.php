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

    if (isset($_POST['update'])) {
        $id = $_GET['id'];
        $nombre = $_POST['titulo'];
        $descripcion = $_POST['descripcion'];

        $sql_query = "UPDATE contenido SET nombre = '$nombre', descripcion ='$descripcion', fecha_actualizacion = now() WHERE id = $id";
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
        <title>gallardoEV2</title>
        <link rel="stylesheet" type="text/css" href="./../estilos/estilosEV3.css">
    </head>
    <body>
        <div id="conteiner">
            <div id="formulario_contenido" style="background-color: #9b9dfb;">
                <form action="updateContenido.php?id=<?php echo $_GET['id'];?>" method="post">
                <h1>Insertar Contenido</h1>
                <div class="form-group">
                
                    <li>Nombre</li>
                    <input type="text" name="titulo" value="<?php echo $nombre;?>" class="form-control" placeholder="Nombre Creador">
                </div><br>

                <div class="form-group">
                    <li>Descripción</li>
                    <textarea name="descripcion" rows="2" class="form-control" placeholder="Actualizar descripcion"><?php echo $descripcion;?></textarea>
                </div><br>
                            
                <button class="btn btn-success" name="update">Actulizar Contenido</button>
                </form>
                <button style="margin-top: 1%" onclick="window.location='./../index.php'">Volver</button>
            </div>
            
        </div>
        
    </body>
</html>
