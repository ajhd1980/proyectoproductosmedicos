<?php include_once "encabezado.php" ?>



<?php

#Salir si alguno de los datos no está presente
if(
	 
	!isset($_POST["FechaIng"]) 

) exit();

#Si todo va bien, se ejecuta esta parte del código...

include_once "base_de_datos.php";


$FechaIng = $_POST["FechaIng"];


$sentencia = $base_de_datos->prepare("SELECT * FROM `productos` WHERE `FechaIngreso`=?;");


$resultado = $sentencia->execute([$FechaIng]);

$productos = $sentencia->fetchAll(PDO::FETCH_OBJ);

if($resultado === TRUE){
?>
	<table>
			<thead>
				<tr>
					<th>ID</th>
					<th>Idreferencia</th>
					<th>Nombre</th>
					<th>Laboratorio</th>
					<th>FechaVto</th>
					<th>Existencia</th>
					<th>FechaIngreso</th>
					
					
				</tr>
			</thead>
			<tbody>
				<?php foreach($productos as $producto){ ?>
				<tr>
					<td><?php echo $producto->id ?></td>
					<td><?php echo $producto->Idreferencia ?></td>
					<td><?php echo $producto->Nombre ?></td>
					<td><?php echo $producto->Laboratorio ?></td>
					<td><?php echo $producto->FechaVto ?></td>
					<td><?php echo $producto->existencia ?></td>
					<td><?php echo $producto->FechaIngreso ?></td>
					
					
					
				</tr>
				<?php } ?>
			</tbody>
		</table>
<?php
		
}
else echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del producto";
?>