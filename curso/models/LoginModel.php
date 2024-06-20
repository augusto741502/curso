<?php
	
	class Login_model {
		
		private $db;
		private $login;
		
		public function __construct(){
			$this->db = Conectar::conexion();
			$this->usuarios = array();
		}

		public function validaUsuario($email, $clave){

			$hash = $this->get_usuario($email);
			$pass = $hash['contrasenia'];

			if(password_verify($clave, $hash['contrasenia'])){
				$sql = "SELECT * FROM usuarios WHERE email='$email' AND contrasenia='$pass'";
				$resultado = $this->db->query($sql);
				return $resultado->fetch_assoc();
			}
			
		}


		public function get_usuario($email)
		{
			$sql = "SELECT * FROM usuarios WHERE email='$email'";
			$resultado = $this->db->query($sql);
			$row = $resultado->fetch_assoc();

			return $row;
		}
	} 
?>