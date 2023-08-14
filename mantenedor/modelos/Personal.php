<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Personal
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	/****************************************************************************** */
	//Implementamos un método para insertar registros
	public function insertar($rut,$nombre,$apellido,$email,$telefono,$foto,$comentarios)
	{
		$sql="INSERT INTO `personal` (`rut_personal`, `nombre_personal`, `apellido_personal`, `correo_personal`, `telefono_personal`, `foto_personal`, `comentarios_personal`, `condicion_personal`) 
		VALUES ('$rut', '$nombre', '$apellido', '$email', '$telefono', '$foto', '$comentarios', '1')";
		return ejecutarConsulta($sql);
	}

	
	/****************************************************************************** */
	//Implementamos un método para editar registros
	public function editar($idpersonal,$rut,$nombre,$apellido,$email,$telefono,$foto,$comentario)
	{
		$sql="UPDATE personal SET rut_personal='$rut',nombre_personal='$nombre',apellido_personal='$apellido',correo_personal='$email',telefono_personal='$telefono',foto_personal='$foto', comentarios_personal='$comentario'  
		WHERE id_personal='$idpersonal'";
		return ejecutarConsulta($sql);
	}

	
	/****************************************************************************** */
	//Implementamos un método para desactivar registros
	public function desactivar($idpersonal)
	{
		$sql="UPDATE personal SET condicion_personal='0' WHERE id_personal='$idpersonal'";
		return ejecutarConsulta($sql);
	}

	
	/****************************************************************************** */
	//Implementamos un método para activar registros
	public function activar($idpersonal)
	{
		$sql="UPDATE personal SET condicion_personal='1' WHERE id_personal='$idpersonal'";
		return ejecutarConsulta($sql);
	}

	
	/****************************************************************************** */
	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idpersonal)
	{
		$sql="SELECT * FROM personal WHERE id_personal='$idpersonal'";
		return ejecutarConsultaSimpleFila($sql);
	}

	
	/****************************************************************************** */
	//Método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM personal";
		return ejecutarConsulta($sql);		
	}

	
	/****************************************************************************** */
	
}

?>