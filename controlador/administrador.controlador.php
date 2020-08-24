<?php
	/**
	 * 
	 */

	use PHPMailer\PHPMailer\PHPMailer;
	
	class AdministradorControlador 
	{
		
		function __construct()
		{
			# code...
		}

		public function ctringresarPanel(){
			if(isset($_POST['btnIngresar'])){
				
				$candado = UsuarioModelo::mdlIgresarPanel($_POST['adminCorreo'],$_POST['adminClave']);


				




				if($candado != false){
					// Ya estas dentro del sistema
					$_SESSION['session'] = true;

					echo '
							
							<script>
								window.location.href = "./"
							</script>
							
					';

					//header('Location:./');

 				}else{
					// Correo o contraseña incorrectos
					echo '<div class="alert alert-danger mt-3" role="alert">
          					 Correo o contraseña erroneos
         				 </div>';
				}
			}
		}

		public function ctrRecuperaClave(){
			
			if(isset($_POST['btnRecupera'])){
				
				
				// Verficar que las contraseñas coincidan
                 if($_POST['nuevaClave']==$_POST['confirmaClave']){

                 
                 $recupera = UsuarioModelo::mdlCambiarClave($_POST['nuevaClave'],$_POST['emailUsuario']);

                 if($recupera){
                 	AppControlador::mensajeInfo('Bien hecho','Haz cambiado la contraseña con éxito','success','usuario');
                 }

                 } else{
                 	
                 	AppControlador::mensajeInfo('Mal hecho','Las contraseñas no son iguales, vuelve a intentarlo','error','usuario');
                 } 


                 

				//


				

				
		}   
	}
}


