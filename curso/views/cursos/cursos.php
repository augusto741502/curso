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
			<h2><?php echo $data["titulo"]; ?> <?php echo $data["usuario"]; ?></h2>
			
			<a onclick="guardarCurso()" data-toggle='modal' data-target='#exampleModal' class="btn btn-primary">Agregar</a>

			<a href="index.php?c=login&a=loginOut" class="btn btn-primary">Salir</a>
			
			<br />
			<br />
			<div class="table-responsive">
				<table border="1" width="80%" class="table">
					<thead>
						<tr class="table-primary">
							<th>Titulo</th>
							<th>Descripcion</th>
							<th>Estado</th>
							<th>Detalle</th>
							<th>Editar</th>
							<th>Eliminar</th>
						</tr>
					</thead>
					
					<tbody>
						<?php foreach($data["cursos"] as $dato) {
							echo "<tr>";
							echo "<td>".$dato["titulo"]."</td>";
							echo "<td>".$dato["descripcion"]."</td>";

							$estado = "ACTIVO";
							if($dato["estado"]==0){
								$estado = "INACTIVO";
							}
							echo "<td>".$estado."</td>";
							echo "<td><a onclick='detalleCurso(".$dato["id_curso"].")' data-toggle='modal' data-target='#exampleModal' class='btn btn-success'>Detalle</a></td>";
							if($dato["id_usuario"] == $data["id"]) { 
								$tipo = 1;
								echo "<td><a onclick='modificarCurso(".$dato["id_curso"].",".$tipo.")' data-toggle='modal' data-target='#exampleModal' class='btn btn-warning'>Editar</a></td>";
							} else{
								$tipo = 0;
								echo "<td><a onclick='modificarCurso(".$dato["id_curso"].",".$tipo.")' class='btn btn-warning'>Editar</a></td>";
							}

							
							echo "<td><a onclick='eliminarCurso(".$dato["id_curso"].",".$tipo.")'  class='btn btn-danger'>Eliminar</a></td>";
							echo "</tr>";
						}
						?>
					</tbody>
					
				</table>
			</div>
		</div>


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
							<div id="detalle"></div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-primary" id="btn_modifica" onclick="actualizarCurso()">Modificar</button>
					<button type="button" class="btn btn-primary" id="btn_guarda" onclick="guardaCurso()">Guardar</button>
				</div>
		</div>

	</body>
	<script src="assets/js/jquery-3.6.4.min.js" ></script>
	<script src="assets/js/bootstrap.min.js" ></script>
	<script src="assets/js/script.js" ></script>
</html>