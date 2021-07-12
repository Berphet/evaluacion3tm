<?php
/* credenciales de la base de datos */
$servername = "localhost:3307";
$username = "marshall";
$password = "probando1234";
$database = "marshall";
 
/* intento de conexion */
$conn = mysqli_connect($servername, $username, $password, $database);
 
/* corroborar coneccion */
if($conn->connect_error){
    die("no funca " . $conn->connect_error);
}
?>