<?php

	class LoginController {
		/**
		 * Metodo contructor que carga el modelo curso y login
		 * @returns 
		 * 21/05/2024
		 */
		public function __construct(){
			require_once "models/LoginModel.php";
			require_once "models/CursosModel.php";
		}
		
		/**
		 * Metodo que valida es estado de la pagina de login
		 * @returns 
		 * 21/05/2024
		 */
		public function index(){
			$data["titulo"] = "Cursos";
			$this->loginOut($estado=0);
		}

		/**
		 * Metodo que mata la session y cambia estado de la pagina de login
		 * @returns 
		 * 21/05/2024
		 */
		public function loginOut($estado=0){
			$data["titulo"] = "Cursos";
			unset($_SESSION["user"]);
			$data["titulo"] = "Cursos";
			$data["estado"] = $estado;
			require_once "views/cursos/login.php";	
		}
		
		/**
		 * Metodo que valida si existe usuario y crea variables de session
		 * @returns 
		 * 21/05/2024
		 */
		public function loginUsuario(){
			
			$login = new Login_model();
			$email = $_POST['email'];
			$clave = $_POST['pwd'];
			if(!empty($email) || !empty($clave)){
				$data = $login->validaUsuario($email, $clave);
				if(empty($data)){
					$this->loginOut(1);
				}else{
					$cursos = new Cursos_model();
					$data["titulo"] = "Cursos";
					$_SESSION["user"]=$data['email'];
					$_SESSION["id"]=$data['id_usuario'];

					$data["usuario"] = $_SESSION["user"];
					$data["cursos"] = $cursos->get_cursos();
					$data["id"] = $_SESSION["id"];
					require_once "views/cursos/cursos.php";
				}
			}else{
				$this->loginOut(1);
			}	
			
		}
	}
?>