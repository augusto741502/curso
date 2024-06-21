<?php
	
	class Login_model {
		
		private $db;
		private $login;
		/**
		 * Metodo contructor que carga la conexion
		 * @returns 
		 * 21/05/2024
		 */
		public function __construct(){
			$this->db = Conectar::conexion();
		}

		/**
		 * Metodo que valida si la clave corresponde al usuario
		 * @returns 
		 * 21/05/2024
		 */
		public function validaUsuario($email, $clave){
			$hash = $this->get_usuario($email);
			if($hash != NULL){
				$pass = $hash['contrasenia'];

				if(password_verify($clave, $hash['contrasenia'])){
					$sql = "SELECT * FROM usuarios WHERE email='$email' AND contrasenia='$pass'";
					$resultado = $this->db->query($sql);
					return $resultado->fetch_assoc();
				}
			}
			
		}
		/**
		 * Metodo que devuelve datos del usuario
		 * @returns 
		 * 21/05/2024
		 */
		public function get_usuario($email)
		{
			$sql = "SELECT * FROM usuarios WHERE email='$email'";
			$resultado = $this->db->query($sql);
			$row = $resultado->fetch_assoc();

			return $row;
		}
	} 
?>