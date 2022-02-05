
<?php include_once "encabezado.php" ?>
	<div class="col-xs-12">
		<h1>Consulta Cantidades </h1>
		<form method="post" action="listarxdia.php">
			

			
	
			<label for="FechaIng">Fecha Ingreso:</label>
			
			<input  class="form-control" name="FechaIng" required type="date" id="FechaIng" placeholder="FechaIng">

			
			
			<br><br><input class="btn btn-info" type="submit" value="Consultar">
			<a class="btn btn-warning" href="./listar.php">Cancelar</a>
		</form>
	</div>
<?php include_once "pie.php" ?>
