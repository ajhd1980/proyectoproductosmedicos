<?php

#Salir si alguno de los datos no está presente
if(
	!isset($_POST["Idreferencia"]) || 
	!isset($_POST["Nombre"]) || 
	!isset($_POST["Laboratorio"]) || 
	!isset($_POST["FechaVto"]) || 
	!isset($_POST["existencia"]) || 
	!isset($_POST["Idreferencia"])
) exit();

#Si todo va bien, se ejecuta esta parte del código...

include_once "base_de_datos.php";


$Idreferencia = $_POST["Idreferencia"];
$Nombre = $_POST["Nombre"];
$Laboratorio = $_POST["Laboratorio"];
$FechaVto = $_POST["FechaVto"];
$existencia = $_POST["existencia"];

$sentencia = $base_de_datos->prepare("UPDATE productos SET FechaVto = ?, existencia = ? WHERE Idreferencia = ?;");

$resultado = $sentencia->execute([$FechaVto, $existencia,$Idreferencia]);

if($resultado === TRUE){
	header("Location: ./listar.php");
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del producto";
?>