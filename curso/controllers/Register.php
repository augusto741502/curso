<?php
	
	class RegisterController {
		
		public function __construct(){
			require_once "models/RegisterModel.php";
		}
		
        public function guarda(){
			
			$nombre = $_POST['nombre'];
			$email = $_POST['email'];
			$clave = $_POST['clave'];

			$registro = new Register_model();
			$respuesta = $registro->insertar($nombre, $email, $clave);

			$arr = array('data' => $respuesta, 'success' => true);
			echo json_encode($arr);

		}
    }