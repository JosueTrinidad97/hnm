<?php
	


	
	class ConexionModelo 
	{
		
		public static function conectarBd($bd){

			try {

				$confDB = "sqlsrv:server=DESKTOP-I7D8PD2;database=".$bd;
				$usuarioDB = "sa";
				$claveDB = "root";

				$con = new PDO($confDB,$usuarioDB,
					$claveDB
				);

				$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				return $con;
				
			} catch (PDOException $e) {

				echo $e->getMessage();

				return null;
				
			}

			

		} 

	}