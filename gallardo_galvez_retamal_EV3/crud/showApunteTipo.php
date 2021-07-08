<?php
  include("./../dataConfig/DBConfig.php");
?>

<!DOCTYPE html> 
<html>
  <head> 
    <title>ProyectoEV3</title>
    <link rel="stylesheet" type="text/css" href="./../estilos/estilosEV3.css">
  </head>

  <body style="background-image: url('./../estilos/background.jpg')">
    <div id="conteiner">
      <div id="menu">
        <div id="tabs">
          <button onclick="window.location='./../index.php'">Home</button>
          <button onclick="window.location='showApunteTipo.php'">Tipo Apunte</button>
        </div>
      </div>

      <div id="formulario_showcontenido" style="background-color: #9b9dfb;">
        <h2>Tipos de Apunte</h2>
        <table style="background-color: #9b9dfb;">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nombre</th>
              <th>Fecha creacion</th>
              <th>Fecha actualizacion</th>
            </tr>
          </thead>
          
          <tbody>
            <?php
              $query = "SELECT * FROM apunte_tipo";
              $result = mysqli_query($conn,$query);
              while($row = mysqli_fetch_array($result)) { ?>
                <tr>
                  <td><?php echo $row['id']?></td>
                  <td><?php echo $row['nombre']?></td>
                  <td><?php echo $row['fecha_creacion']?></td>
                  <td><?php echo $row['fecha_actualizacion']?></td> 
                </tr>
            <?php } ?>     
      </div>
    </div>
  </body> 
</html>