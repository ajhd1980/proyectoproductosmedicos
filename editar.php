<?php
if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT * FROM productos WHERE id = ?;");
$sentencia->execute([$id]);
$producto = $sentencia->fetch(PDO::FETCH_OBJ);
if($producto === FALSE){
	echo "¡No existe algún producto con ese ID!";
	exit();
}

?>
<?php include_once "encabezado.php" ?>
	<div class="col-xs-12">
		<h1>Editar producto <?php echo $producto->id; ?></h1>
		<form method="post" action="guardarDatosEditados.php">
			<input type="hidden" name="id" value="<?php echo $producto->id; ?>">

			<label for="Idreferencia">Idreferencia:</label>
			<input value="<?php echo $producto->Idreferencia ?>" class="form-control" name="Idreferencia" required type="text" id="Idreferencia" placeholder="Escribe la referencia">

			<label for="Nombre">Nombre:</label>
			<textarea required id="Nombre" name="Nombre"  class="form-control"><?php echo $producto->Nombre ?></textarea>

			<label for="Laboratorio">Laboratorio:</label>
			<input value="<?php echo $producto->Laboratorio ?>" class="form-control" name="Laboratorio" required type="text" id="Laboratorio" placeholder="Laboratorio">
	
			<label for="FechaVto">FechaVto:</label>
			<input value="<?php echo $producto->FechaVto ?>" class="form-control" name="FechaVto" required type="date" id="FechaVto" placeholder="FechaVto">

			<label for="existencia">Existencia:</label>
			<input value="<?php echo $producto->existencia ?>" class="form-control" name="existencia" required type="number" id="existencia" placeholder="Cantidad o existencia">
			
			<br><br><input class="btn btn-info" type="submit" value="Guardar">
			<a class="btn btn-warning" href="./listar.php">Cancelar</a>
		</form>
	</div>
<?php include_once "pie.php" ?>
