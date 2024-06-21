<?php
	
	class Cursos_model {
		
		private $db;
		private $cursos;
		/**
		 * Metodo contructor que carga la conexion y array de cursos
		 * @returns 
		 * 21/05/2024
		 */
		public function __construct(){
			$this->db = Conectar::conexion();
			$this->cursos = array();
		}
		/**
		 * Metodo que devuelve array con los datos de los cursos
		 * @returns 
		 * 21/05/2024
		 */
		public function get_cursos()
		{
			$sql = "SELECT * FROM cursos";
			$resultado = $this->db->query($sql);
			while($row = $resultado->fetch_assoc())
			{
				$this->cursos[] = $row;
			}
			return $this->cursos;
		}
		/**
		 * Metodo que inserta datos de los cursos
		 * @returns 
		 * 21/05/2024
		 */
		public function insertar($titulo, $descripcion, $estado, $idUsuario){
			
			$resultado = $this->db->query("INSERT INTO cursos(titulo, descripcion, estado, id_usuario)VALUES('$titulo', '$descripcion', '$estado', '$idUsuario')");
			
		}
		
		public function modificar($id, $titulo, $descripcion, $estado){
			
			$resultado = $this->db->query("	UPDATE cursos
											SET titulo='$titulo', descripcion='$descripcion', estado='$estado'
											WHERE id_curso='$id'");			
		
		}
		/**
		 * Metodo que modifica datos de los cursos
		 * @returns 
		 * 21/05/2024
		 */
		public function eliminar($id){
			$resultado = $this->db->query("DELETE FROM cursos WHERE id_curso = $id");
			
		}
		/**
		 * Metodo que devuelve datos del curso
		 * @returns 
		 * 21/05/2024
		 */
		public function get_curso($id)
		{
			$sql = "SELECT * FROM cursos WHERE id_curso='$id' LIMIT 1";
			$resultado = $this->db->query($sql);
			$row = $resultado->fetch_assoc();

			return $row;
		}
	} 
