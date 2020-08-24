<?php 
	session_start();
	// Requerir todos los controladores

	require_once 'controlador/app.controlador.php';
	require_once 'controlador/administrador.controlador.php';
	require_once 'controlador/evento.controlador.php';
	require_once 'controlador/ponente.controlador.php';
	require_once 'controlador/costo.controlador.php';
	require_once 'controlador/asistente.controlador.php';
	require_once 'controlador/documento.controlador.php';





	// Requir modelos

	require_once 'modelo/usuario.modelo.php';
	require_once 'modelo/evento.modelo.php';
	require_once  'modelo/evento.modelo.php';
	require_once 'modelo/ponente.modelo.php';
	require_once 'modelo/costo.modelo.php';
	require_once 'modelo/asistente.modelo.php';
	require_once 'modelo/documento.modelo.php';



	require_once 'lib/phpMailer/Exception.php';
	require_once 'lib/phpMailer/PHPMailer.php';
	require_once 'lib/phpMailer/SMTP.php';



	//Iniciar aplicación

	$inicarAplicacion = new AppControlador();
	
	$inicarAplicacion -> iniciarApliacion();