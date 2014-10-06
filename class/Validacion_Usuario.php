<?php
//llamado de los archivos que contienen las clases y metodos necesarios para el logueo
include_once '../controladores/Controlador_Usuario.php';
include_once '../modelos/Modelo_Usuario.php';


class Validar_Usuario{

	public function validar_Crear_Usuario($num_id, $usuario, $password, $nombres, $apellidos, 
						$direccion, $email, $tipoid, $ciudad, $pregunta, $respuesta, 
						$celular, $edad, $foto, $genero, $perfil)
	{
		$c_usuario = new Controlador_Usuario();
		$c_usuario->crear_usuario($num_id, $usuario, $password, $nombres, $apellidos, 
							$direccion, $email, $tipoid, $ciudad, $pregunta, $respuesta, 
							$celular, $edad, $foto, $genero, $perfil);

		$m_usuario = new Modelo_Usuario($c_usuario);

		$num_error = 2;
		$num_error = $m_usuario->crear_Usuario();
		/*echo '<p>docum = '.$num_id;
		echo '<p>numerror = '.$num_error;
		echo '<p>perfil = '.$perfil;*/
		if($num_error == 1){
			header("Location: ../pages/Crear_Usuario.php?gestion=1");
		}else{
			header("Location: ../pages/Crear_Usuario.php?gestion=".$num_error);
		}
	}


}