<?php 
	require_once "../modelos/Personal.php";
			$personal=new Personal(); //objeto de la lcase personal

			$id_ personal=isset($_POST["idPersonal"])? limpiarCadena($_POST["idpersonal"]):"";//validacion exixtencia de variable por metodo post, condicional de una linea
			$nombre_personal=isset($_POST["Rut"])? limpiarCadena($_POST["Rut"]):"";
			$nombre_personal=isset($_POST["Nombre"])? limpiarCadena($_POST["Nombre"]):"";
			$apellido_personal=isset($_POST["Apellido"])? limpiarCadena($_POST["Apellido"]):"";
			$email_personal=isset($_POST["Email"])? limpiarCadena($_POST["Email"]):"";
			$telefono_personal=isset($_POST["Telefono"])? limpiarCadena($_POST["Telefono"]):"";
			$imagen=isset($_POST["imagen"])? limpiarCadena($_POST["imagen"]):"";
			$comentario_personal=isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"";
			
			switch ($_GET["op"]){
			
				
				break;

				case 'desactivar':
				break;

				case 'activar':
				break;

				case 'mostrar':
					$rspta=$personas->mostrar($id_personal);
					//Codificar el resultado utilizando json
					echo json_encode($rspta);
				break;

				case 'listar':
					$rspta=$personal->listar();
					$data= array();

					while($reg=$rspta->fetch_object()){
						$data[]=array(
				
							"0"=>$reg->id_personal,
							"1"=>$reg->rut_personal,
							"2"=>$reg->nombre_personal,
							"3"=>$reg->apellido_personal,
							"4"=>$reg->correo_personal,
							"5"=>$reg->telefono_personal,
							"6"=>$reg->foto_personal,
							"7"=>$reg->comentarios_personal,
							"8"=>$reg->condicion_personal

						);

					}
					$results = array(
						"sEcho"=>1, //Información para el datatables
						"iTotalRecords"=>count($data), //enviamos el total registros al datatable
						"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
						"aaData"=>$data
					);
					echo json_encode($results);
					 
					
					
				
				break;

				
			}
			
?>
