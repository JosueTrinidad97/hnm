<?php

class AppControlador
{
	public function iniciarApliacion()
	{
		$url = AppControlador::cargarRutaAdmin();
		$app = new AppControlador();
		include_once 'vista/app.php';
	}

	public function cargarComponente($componente,$rutas = "")
	{
		$url = AppControlador::cargarRutaAdmin();
		$app = new AppControlador();
		include_once 'vista/componentes/' . $componente . '.componente.php';
	}
	public function cargarPagina($pagina, $rutas = "")
	{
		$url = AppControlador::cargarRutaAdmin();
		$app = new AppControlador();
		include_once 'vista/paginas/' . $pagina . '.php';
	}


	public function cargarRutaAdmin()
	{
		//return 'http://192.168.0.9/HNM avance5/';
		return 'http://localhost/HNM avance5/';
		//return 'http://192.168.1.78/cursoChato/';
		//return 'http://192.168.0.9/HNM avance5/';
		
	}

	public function mensajeInfo($titulo, $texto, $icono, $pagina)
	{

		echo '


				<script>


					swal({
						  title: "' . $titulo . '",
						  text: "' . $texto . '",
						  icon: "' . $icono . '",
						  buttons: [false, "Esta bien"],
						  dangerMode: true,
						})
						.then((willDelete) => {
						  if (willDelete) {
						    window.location.href = "' . $pagina . '"
						  } else {
						    window.location.href = "' . $pagina . '"
						    
						  }
						});

				</script>


		 	';
	}
}
