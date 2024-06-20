<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title><?php echo $data["titulo"]; ?></title>
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	</head>
	
	<body>
		<div class="container">
			<h2><?php echo $data["titulo"]; ?><?php echo $data["usuario"]; ?></h2>
			
			<form id="nuevo" name="nuevo" method="POST" action="index.php?c=cursos&a=guarda" autocomplete="off">
				<div class="form-group">
					<label for="placa">Titulo</label>
					<input type="text" class="form-control" id="titulo" name="titulo" />
				</div>
				
				<div class="form-group">
					<label for="marca">Descripcion</label>
					<input type="text" class="form-control" id="descripcion" name="descripcion" />
				</div>
				
				<div class="form-group">
					<label for="modelo">Estado</label>
					<input type="text" class="form-control" id="estado" name="estado" />
				</div>
				
				<button id="guardar" name="guardar" type="submit" class="btn btn-primary">Guardar</button>
				
			</form>
		</div>
	</body>
	<script src="assets/js/jquery-3.6.4.min.js" ></script>
	<script src="assets/js/bootstrap.min.js" ></script>
</html>