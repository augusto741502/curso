<?php
	session_start();
	class CursosController {
		
		public function __construct(){
			require_once "models/CursosModel.php";
		}
		
		public function index(){
			
			$cursos = new Cursos_model();
			$data["titulo"] = "Cursos";
			$data["cursos"] = $cursos->get_cursos();
			$data["usuario"] = $_SESSION["user"];
			$data["id"] = $_SESSION["id_usuario"];
			require_once "views/cursos/cursos.php";	
		}
		
		public function nuevo(){
			$data["usuario"] = $_SESSION["user"];
			$data["titulo"] = "Cursos";
			require_once "views/cursos/cursos_nuevo.php";
		}
		
		public function guarda(){
			

			$titulo = $_POST['titulo'];
			$descripcion = $_POST['descripcion'];
			$estado= $_POST['estado'];
			$idUsuario= $_SESSION["id"];
			
			$cursos = new Cursos_model();
			$cursos->insertar($titulo, $descripcion, $estado, $idUsuario);
			$data["titulo"] = "Cursos";
			$this->index();
		}
		
		public function modificar($id){
			
			$cursos = new Cursos_model();
			
			$data["id"] = $id;
			$data["cursos"] = $cursos->get_curso($id);
			$data["titulo"] = "Cursos";
			require_once "views/cursos/cursos_modifica.php";
		}


		public function detalle($id){
			
			$cursos = new Cursos_model();
			
			$data["id"] = $id;
			$respuesta = $cursos->get_curso($id);
			//$data["titulo"] = "Cursos";

			$arr = array('data' => $respuesta, 'success' => true);
			echo json_encode($arr);
			//require_once "views/cursos/cursos_modifica.php";
		}
		
		public function actualizar(){

			$id = $_POST['id'];
			$titulo = $_POST['titulo'];
			$descripcion = $_POST['descripcion'];
			$estado= $_POST['estado'];
			

			$cursos = new Cursos_model();
			$cursos->modificar($id, $titulo, $descripcion, $estado);

		}
		
		public function eliminar(){
			$id = $_POST['id'];

			$cursos = new Cursos_model();
			$cursos->eliminar($id);

		}	
	}
?>