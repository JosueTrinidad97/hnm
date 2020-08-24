<?php



	if(isset($_GET['ruta'])){


		$rutas = array();
		$rutas = explode("/",$_GET['ruta']);



		if(

			$rutas[0]=='cpanel-login' ||
			$rutas[0]=='recupera' || 
			$rutas[0]=='info' 

			){
			$app -> cargarPagina($rutas[0],$rutas);
		}else{
			
							
			$app -> cargarPagina('404');	
							
					
		}

	}else{
		$app -> cargarComponente('inicio');
	}


 ?>