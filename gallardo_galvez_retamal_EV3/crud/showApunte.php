<?php
  include("./../dataConfig/DBConfig.php");
?>

<!DOCTYPE html> 
<html>
  <head> 
    <title>HTML</title>
    <link rel="stylesheet" type="text/css" href="./../estilos/estilosEV3.css">
  </head> 
  <body style="background-image: url('./../estilos/background.jpg')">
    <div id="conteiner">

        <div id="menu">
            <div id="tabs">
              <button onclick="window.location = './../index.php'">Home</button>
              <button onclick="window.location='showApunteTipo.php'">Tipo Apunte</button>
            </div>
        </div>

      <div id="formulario_showcontenido">
        <h2>Apuntes</h2>
        <table style="background-color: #9b9dfb;">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>URL</th>
              <th>Preview</th>
              <th>Tipo</th>
              <th>Acciones</th>
            </tr>
          </thead>
          
          <tbody>
            <?php
              $id= $_GET['id'];
              $query = "SELECT id, contenido_id, nombre, url, tipo, fecha_creacion, fecha_actualizacion FROM apunte where contenido_id = $id";
              $result = mysqli_query($conn,$query);
              while($row = mysqli_fetch_array($result)) { ?>
                <tr>
                  <td><?php echo $row['nombre']?></td>
                  <td>
                  <a href="<?php echo $row['url']?>" target="_blank">
                      <b>Acceder al URL del video</b><br>
                  </a>
                  </td>
                  <td>
                      <iframe src="<?php echo $row['url']?>"frameborder="0" width="400" height="250" allow="autoplay;encrypted-media" &embedded="true"></iframe>
                  </td>
                  <?php if ($row['tipo']==1): ?>
                    <td><?php echo 'WEB'?></td>
                  <?php endif ?>
                  <?php if ($row['tipo']==2): ?>
                    <td><?php echo 'Imagen'?></td>
                  <?php endif ?>
                  <?php if ($row['tipo']==3): ?>
                    <td><?php echo 'Video'?></td>
                  <?php endif ?>
                  <?php if ($row['tipo']==4): ?>
                    <td><?php echo 'PDF'?></td>
                  <?php endif ?>
                  <td>
                  <a href="updateApunte.php?id=<?php echo $row['id']?>">
                      <b>Actualizar</b><br>
                  </a>
                  <a href="deleteApunte.php?id=<?php echo $row['id']?>">
                      <b>Eliminar</b><br>
                  </a> 
                  </td>
                </tr>
                
            <?php } ?>
                 
          <div>
            <button style="margin-top: 1%" onclick="window.location='./../index.php'">Volver</button>
          </div>   
          
      </div>
    </div>
  </body> 

</html>