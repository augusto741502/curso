<?php
	
	class Register_model {
		
		private $db;
		private $login;
		
		public function __construct(){
			$this->db = Conectar::conexion();
			$this->usuarios = array();
		}

		public function insertar($nombre, $email, $clave){

			$emailRegistrado = $this->get_usuario($email);
			if($emailRegistrado != NULL){
				$resultado = 0;
			}else{
				$pass = password_hash($clave, PASSWORD_DEFAULT);
				$resultado = $this->db->query("INSERT INTO usuarios (nombre, contrasenia, email) VALUES ('$nombre', '$pass', '$email')");
			}
			return $resultado;
		}

		public function get_usuario($email)
		{
			$sql = "SELECT * FROM usuarios WHERE email='$email'";
			$resultado = $this->db->query($sql);
			$row = $resultado->fetch_assoc();

			return $row;
		}

    }