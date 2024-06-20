<?php

	class LoginController {
		
		public function __construct(){
			require_once "models/LoginModel.php";
			require_once "models/CursosModel.php";
		}
		
		public function index(){
			$data["titulo"] = "Cursos";
			/*$cursos = new Cursos_model();
			$data["titulo"] = "Cursos";
			$data["cursos"] = $cursos->get_cursos();
			//$data["usuario"] = $_SESSION["user"];
			$data["id"] = $_SESSION["id"];
			//require_once "views/cursos/cursos.php";	*/
			//require_once "views/cursos/login.php";
			$this->loginOut($estado=0);
		
		}


		public function loginOut($estado=0){
			$data["titulo"] = "Cursos";
			unset($_SESSION["user"]);
			$data["titulo"] = "Cursos";
			$data["estado"] = $estado;
			require_once "views/cursos/login.php";	
		}
		
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