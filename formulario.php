<?php include_once "encabezado.php" ?>

<div class="col-xs-12">
	<h1>Nuevo producto</h1>
	<form method="post" action="nuevo.php">


		<label for="Idreferencia">Idreferencia:</label>
		<input class="form-control" name="Idreferencia" required type="text" id="Idreferencia" placeholder="Escribe la referencia">

		<label for="Nombre">Nombre</label>
		<textarea required id="Nombre" name="Nombre" cols="30" rows="5" class="form-control"></textarea>

		<label for="Laboratorio">Laboratorio:</label>
		<input class="form-control" name="Laboratorio" required type="text" id="Laboratorio" placeholder="Laboratorio">

		<label for="FechaVto">FechaVto:</label>
		<input class="form-control" name="FechaVto" required type="date" id="FechaVto" placeholder="FechaVto">

		<label for="existencia">Existencia:</label>
		<input class="form-control" name="existencia" required type="number" id="existencia" placeholder="Cantidad o existencia">
		<br><br><input class="btn btn-info" type="submit" value="Guardar">
	</form>
</div>
<?php include_once "pie.php" ?>