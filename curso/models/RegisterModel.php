<?php
	
	class Register_model {
		
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
		 * Metodo que valida si el mail existe he inserta datos del usuario
		 * @returns 
		 * 21/05/2024
		 */
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