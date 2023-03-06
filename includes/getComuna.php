<?php
	//metodo get para el select anidado.
	require ('../conexion/con_db.php');
	
	$region_id = $_POST['region_id'];
	
	$queryC = "SELECT comuna_id, comuna_nombre, region_id FROM comunas WHERE region_id = '$region_id'";
	$resultadoC = $conn->query($queryC);
	
	$html= "<option value='0'>Seleccione Comuna</option>";
	
	while($rowC = $resultadoC->fetch_assoc())
	{
		$html.= "<option value='".$rowC['comuna_id']."'>".$rowC['comuna_nombre']."</option>";
	}
	
	echo $html;
?>