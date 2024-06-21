<?php
	session_start();
	class CursosController {

		/**
		 * Metodo contructor que carga el modelo curso
		 * @returns 
		 * 21/05/2024
		 */
		public function __construct(){
			require_once "models/CursosModel.php";
		}
		
		/**
		 * Metodo que muestra la vista
		 * @returns 
		 * 21/05/2024
		 */
		public function index(){
			
			$cursos = new Cursos_model();
			$data["titulo"] = "Cursos";
			$data["cursos"] = $cursos->get_cursos();
			$data["usuario"] = $_SESSION["user"];
			$data["id"] = $_SESSION["id_usuario"];
			require_once "views/cursos/cursos.php";	
		}
		/**
		 * Metodo que guarda formulario del curso
		 * @returns 
		 * 21/05/2024
		 */
		public function guarda(){
			$titulo = $_POST['titulo'];
			$descripcion = $_POST['descripcion'];
			$estado= $_POST['estado'];
			$idUsuario= $_SESSION["id"];
			
			$cursos = new Cursos_model();
			$cursos->insertar($titulo, $descripcion, $estado, $idUsuario);
			$data["titulo"] = "Cursos";
		}
		
		/**
		 * Metodo que muestra el detalle del curso
		 * @returns 
		 * 21/05/2024
		 */
		public function detalle($id){
			
			$cursos = new Cursos_model();
			$data["id"] = $id;
			$respuesta = $cursos->get_curso($id);
			$arr = array('data' => $respuesta, 'success' => true);
			echo json_encode($arr);
		}
		/**
		 * Metodo que actualiza el curso
		 * @returns 
		 * 21/05/2024
		 */
		public function actualizar(){

			$id = $_POST['id'];
			$titulo = $_POST['titulo'];
			$descripcion = $_POST['descripcion'];
			$estado= $_POST['estado'];
			$cursos = new Cursos_model();
			$cursos->modificar($id, $titulo, $descripcion, $estado);

		}
		/**
		 * Metodo que elimina el curso
		 * @returns 
		 * 21/05/2024
		 */
		public function eliminar(){
			$id = $_POST['id'];
			$cursos = new Cursos_model();
			$cursos->eliminar($id);

		}	
	}
?>