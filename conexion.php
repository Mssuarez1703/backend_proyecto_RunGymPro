<?php
$servidor = "localhost";
$usuario = "root";
$clave = "";
$bd = "basedatosproyecto";

$conexion = mysqli_connect($servidor,$usuario,$clave) or die('No Se Encontro El Servidor');
mysqli_select_db($conexion,$bd) or die('No Encontro La Base De datos ');
mysqli_set_charset($conexion,"utf8");
//echo "se conecto correctamente";
?>