<?php
	/**
	 * 
	 */

	// Importar la conexion
	require_once 'conexion.modelo.php';

	class UsuarioModelo
	{
		
		
		public static function mdlIgresarPanel($correo,$clave){
			try {

				$sql = "SELECT 1 AS conectar FROM usuario
			 	WHERE correo = ? AND contrasenia = ?";

			 	// Abrir la conexion

			 	$con = ConexionModelo::conectarBd('EventosPrueba');

			 	// Asignar el query a la función prepare (Preparar consulta)

			 	$pps = $con -> prepare($sql);

			 	//Mandar los parametros

			 	$pps -> bindValue(1,$correo);
			 	$pps -> bindValue(2,$clave);



			 	// Ejecuta la consulta

			 	$pps -> execute();

			 	return $pps -> fetch(PDO::FETCH_ASSOC);

			 	



				
			} catch (PDOException $e) {

				echo $e -> getMessage();

				
			}finally{

				// Cerrar la conexion
				$pps = null;

			}
		}

		public static function mdlAgregarToken($token,$correo){

			try {

				$sql = "UPDATE usuario SET token = ? WHERE correo = ?";

				$con = ConexionModelo::conectarBd('EventosPrueba');

				$pps = $con -> prepare($sql);

				$pps -> bindValue(1,$token);
				$pps -> bindValue(2,$correo);

				$pps -> execute();

				return $pps -> rowCount() > 0;

				
			} catch (Exception $e) {
				echo $e->getMessage();
				return false;
			}finally{
				$pps = null;
			}
			


		}

		public static function mdlObtenerUsuarios(){
			try {
				$sql = "SELECT idUsuario,Nombre,correo FROM usuario";

				$con = ConexionModelo::conectarBd('EventosPrueba');

				$pps = $con ->prepare($sql);

				$pps -> execute();

				return $pps -> fetchAll(PDO::FETCH_ASSOC);

				
			} catch (PDOException $e) {
				echo $e->getMessage();
				return null;
			}finally{
				$pps = null;
			}
		}


		public static function mdlCambiarClave($clave,$correo){
			try {
				$sql = "UPDATE usuario  set contrasenia = ? where  correo = ?";

				$con = ConexionModelo::conectarBd('EventosPrueba');

				$pps = $con ->prepare($sql);

				$pps -> bindValue(1,$clave);
				$pps -> bindValue(2,$correo);
					
				$pps -> execute();

				return $pps -> rowCount()>0;

				
			} catch (PDOException $e) {
				echo $e->getMessage();
				return false;
			}finally{
				$pps = null;
			}
		}
		public static function mdlAgreagarUsuario($usuario)
	{

		try {
			// QUERY DE INSERT

			$sql = "INSERT INTO usuario(idUsuario,nombre,correo,contrasenia) values(?,?,?,?)";

			$con = ConexionModelo::conectarBd('EventosPrueba');

			// Preparar la consulta

			$pps = $con->prepare($sql);

			// Asignar los valores 

			$pps->bindValue(1, $usuario['idUsuario']);
			$pps->bindValue(2, $usuario['nombre']);
			$pps->bindValue(3, $usuario['correo']);
			$pps->bindValue(4, $usuario['contrasenia']);
			

			// Ejecutar la consulta 

			$pps->execute();

			return $pps->rowCount() > 0;
		} catch (PDOException $e) {
			echo $e->getMessage();
			return false;
		} finally {
			//Cerar conexion

			$pps = null;
			$con = null;
		}
	}
	}



