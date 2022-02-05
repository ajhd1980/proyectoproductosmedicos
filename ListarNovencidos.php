<?php include_once "encabezado.php" ?>
<?php
include_once "base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT * FROM `productos` WHERE FechaVto >= NOW();");
$productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

	<div class="col-xs-12">
		<h1>Productos</h1>
		
		<br>
		<table class="table table-bordered">
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
	</div>
<?php include_once "pie.php" ?>