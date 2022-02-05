<?php
date_default_timezone_set('America/Bogota');
#Salir si alguno de los datos no está presente
if(!isset($_POST["Idreferencia"]) || !isset($_POST["Nombre"]) || !isset($_POST["Laboratorio"]) || !isset($_POST["FechaVto"]) || !isset($_POST["existencia"])) exit();

#Si todo va bien, se ejecuta esta parte del código...

include_once "base_de_datos.php";
$Idreferencia = $_POST["Idreferencia"];
$Nombre = $_POST["Nombre"];
$Laboratorio = $_POST["Laboratorio"];
$FechaVto = $_POST["FechaVto"];
$existencia = $_POST["existencia"];
$FechaIngreso =  DATE ("Y-m-d");

$codigo = $_POST["Idreferencia"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT * FROM productos WHERE Idreferencia = ? and FechaIngreso = CURDATE();");
$sentencia->execute([$Idreferencia]);
$producto = $sentencia->fetch(PDO::FETCH_OBJ);

# Si no existe, salimos y lo indicamos
if (!$producto) 	{	
    $sentencia = $base_de_datos->prepare("INSERT INTO productos(Idreferencia, Nombre, Laboratorio, FechaVto, existencia, FechaIngreso) VALUES (?, ?, ?, ?, ?,?);");
	$resultado = $sentencia->execute([$Idreferencia, $Nombre, $Laboratorio, $FechaVto, $existencia, $FechaIngreso]);

	if($resultado === TRUE){
	header("Location: ./listar.php");
	exit;
						}
	else echo "Algo salió mal. Por favor verifica que la tabla exista";
}
# Si hay existencia...
if ($producto->existencia >= 1) {
    echo "EL Producto ya Existe";
}


?>
<?php include_once "pie.php" ?>