<?php
	
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title><?php echo $data["titulo"]; ?></title>
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	</head>
	
	<body>
		<div class="container">
			
			<h2><?php echo $data["titulo"]; ?></h2>
			
			<form id="nuevo" name="nuevo" method="POST" action="index.php?c=cursos&a=actualizar" autocomplete="off">
				
				<input type="hidden" id="id" name="id" value="<?php echo $data["id"]; ?>" />
				
				<div class="form-group">
					<label for="placa">Titulo</label>
					<input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo $data["cursos"]["titulo"]?>" />
				</div>
				
				<div class="form-group">
					<label for="marca">Descripciòn</label>
					<input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo $data["cursos"]["descripcion"]?>" />
				</div>
				
				<div class="form-group">
					<label for="modelo">Estado</label>
					<input type="text" class="form-control" id="estado" name="estado" value="<?php echo $data["cursos"]["estado"]?>" />
				</div>
				
		
				<button id="guardar" name="guardar" type="submit" class="btn btn-primary">Actualizar</button>
				
			</form>
		</body>
		<script src="assets/js/jquery-3.6.4.min.js" ></script>
		<script src="assets/js/bootstrap.min.js" ></script>
	</html>		