<?php 
include("./conexion/con_db.php");

//recibo todos los datos del formulario
$nombre = $_POST['nombre'];
$alias = $_POST['alias'];
$rut = $_POST['rut'];
$email = $_POST['email'];
$region = $_POST['region'];
$comuna = $_POST['comuna'];
$candidato = $_POST['candidato'];
$seleccion = $_POST['check'];

// Validar nombre y apellido no estén en blanco
if (empty($nombre)) {
    echo "El campo Nombre y Apellido es obligatorio.";
    die();
}

// Validar alias tenga al menos 6 caracteres y contenga letras y números
if (strlen($alias) < 6 || !preg_match('/[a-zA-Z]+[0-9]+/', $alias)) {
    echo "El alias debe tener al menos 6 caracteres y contener letras y números.";
    die();
}

// Validar formato del RUT
if (!preg_match('/^[0-9]{1,2}[\.]{0,1}[0-9]{3}\.[0-9]{3}-[0-9Kk]{1}$/', $rut)) {
    echo "El formato del RUT no es válido.";
    die();
}

// Validar formato del correo electrónico
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "El formato del correo electrónico no es válido.";
    die();
}

// Validar que al menos dos opciones del checkbox estén marcadas
if (count($seleccion) < 2) {
    echo "Debes seleccionar al menos dos opciones del checkbox.";
    die();
}

// Validar que no haya votos duplicados por RUT
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "votacion";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
if (mysqli_connect_error()) {
    die('connect error(' . mysqli_connect_errno() . ')' . mysqli_connect_error());
} else {
    $SELECT = "SELECT rut from voto where rut = ? limit 1";
    $INSERT = "INSERT INTO voto (nombre, alias, rut, email, region, comuna, candidato, seleccion)
        values(?,?,?,?,?,?,?,?)";

    $stmt = $conn->prepare($SELECT);
    $stmt->bind_param("s", $rut);
    $stmt->execute();
    $stmt->bind_result($rut);
    $stmt->store_result();
    $rnum = $stmt->num_rows();
    if ($rnum == 0) {
        $stmt->close();
        $stmt = $conn->prepare($INSERT);
        $stmt->bind_param("sssssssi", $nombre, $alias, $rut, $email, $region, $comuna, $candidato, $seleccion);
        $stmt->execute();
        echo "VOTO INGRESADO.";
    } else {
        echo "Este rut ya emitió su voto.";
    }
    $stmt->close();
    $conn->close();
}
?>