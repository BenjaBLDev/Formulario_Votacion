<?php

//Generamos la conexión
$conn = new mysqli("localhost","root","","votacion");
//Verificamos conexión
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

//conexión directa en una sola linea de codigo.
//$conn = mysqli_connect("localhost","root","","votacion");

?>