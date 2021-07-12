<?php
  include("dataConfig/DBConfig.php");
?>

<!DOCTYPE html> 
<html>
  <head> 
    <title>ProyectoEV3</title>
    <link rel="stylesheet" type="text/css" href="estilos/estilosEV3.css">
  </head>

  <body style="background-image: url('estilos/background.jpg')">
    <div id="conteiner">
      <div id="menu">
        <div id="tabs">
          <button onclick="window.location='index.php'">Home</button>
          <button onclick="window.location='crud/showApunteTipo.php'">Tipo Apunte</button>
        </div>
      </div>

      <div id="formulario_showcontenido" style="background-color: #9b9dfb;">
        <h2>Contenidos</h2>
        <table style="background-color: #9b9dfb;">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nombre</th>
              <th>Descripcion</th>
              <th>Fecha creacion</th>
              <th>Fecha actualizacion</th>
              <th>Acciones</th>
            </tr>
          </thead>
          
          <tbody>
            <?php
              $query = "SELECT * FROM contenido";
              $result = mysqli_query($conn,$query);

              while($row = mysqli_fetch_array($result)) { ?>
                <tr>
                  <td><?php echo $row['id']?></td>
                  <td><?php echo $row['nombre']?></td>
                  <td><?php echo $row['descripcion']?></td>
                  <td><?php echo $row['fecha_creacion']?></td>
                  <td><?php echo $row['fecha_actualizacion']?></td>
                  <td>
                    <a href="crud/insertApunte.php?id=<?php echo $row['id']?>">
                    <b>Crear Apunte</b><br>
                    </a>
                    <a href="crud/showApunte.php?id=<?php echo $row['id']?>">
                    <b>Ver Apuntes</b><br>
                    </a>
                    <a href="crud/updateContenido.php?id=<?php echo $row['id']?>">
                    <b>Actualizar</b><br>
                    </a>
                    <a href="crud/deleteContenido.php?id=<?php echo $row['id']?>">
                        <b>Eliminar</b><br>
                    </a> 
                  </td>
                </tr>
            <?php } ?>
          <button style="margin-top: 1%" onclick="window.location='crud/insertContenido.php'">Crear Contenido</button>      
      </div>
    </div>
  </body> 
</html>