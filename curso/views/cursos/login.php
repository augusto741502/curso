<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title><?php echo $data["titulo"]; ?></title>
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/css/style.css">
		
	</head>
	
	<body>
		<div class="container">
			<h2><?php echo $data["titulo"]; ?> </h2>
			
			<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
			Registrate
			</button>
			<br />
			<br />
			<?php if ($data["estado"]>0) {?>
				<div class="alert alert-danger" role="alert">
					Usuario o Clave incorrectas
				</div>
			<?php }?>
			<br />
			<div class="table-responsive">
			<form id="login" name="login" method="POST" action="index.php?c=login&a=loginUsuario" >
				<div class="form-group">
					<label for="email">Email:</label>
					<input type="email" class="form-control" id="email" name="email">
				</div>
				<div class="form-group">
					<label for="pwd">Clave:</label>
					<input type="password" class="form-control" id="pwd" name="pwd">
				</div>
				<button type="submit" class="btn btn-primary">Ingresar</button>
			</form>
			</div>
		</div>

		<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel"><?php echo $data["titulo"]; ?></h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<div class="container">
				<div class="table-responsive">
				<form name="registro" id="registro">
					<div class="form-group">
						<label for="nombre">Nombre:<span id="nombre_r"></span></label>
						<input type="nombre" class="form-control" name="nombre" id="nombre">
					</div>
					<div class="form-group">
						<label for="email_register">Email:<span id="email_register_r"></span></label>
						<input type="email" class="form-control" name="email_register" id="email_register">
					</div>
					<div class="form-group">
						<label for="pwd">Contraseña:<span id="pwd_register_r"></span></label>
						<input type="password" class="form-control" name="pwd_register" id="pwd_register">
					</div>
				</form>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			<button type="button" class="btn btn-primary" onclick="registroUsuario()">Guardar</button>
		</div>
		</div>
	</div>
	</div>
	</body>
	<script src="assets/js/jquery-3.6.4.min.js" ></script>
	<script src="assets/js/bootstrap.min.js" ></script>
	<script src="assets/js/script.js" ></script>
	
</html>