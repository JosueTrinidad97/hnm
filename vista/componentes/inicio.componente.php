	<style>
		.card-title {
			padding: 25px;
			border: 2px dashed #0069D9;
			width: 100%;
			text-align: center;
		}

		.bg-img {
			background-color: rgba(0, 0, 0, 0.8);
			background: no-repeat;
			background-image: url('https://www.conmishijos.com/uploads/juegos/juegossiempre1.jpg');

			background-size: 100%;

			height: 400px;

			filter: brightness(0.6);

		}

		.text-white {
			color: #fff;
			font-style: bold;
			font-size: 18px;
		}

		.text-title {
			color: #fff;
			font-size: 20px;
		}

		.text-mor {
			font-size: 28px;
			border-radius: 10px;
			border: 3px solid #fff;
			margin-top: 100px;
		}

		.img_portada {
			border: 4px solid #C82F9F;
			border-radius: 100%;
			padding: 15px;
			background-color: #fff;
			margin-top: -90px;

		}


		@media  (max-width:767px){
			.text-mor{
				margin-top: 50px;
			}
			.img_portada{
				margin-top: -370px;
				width: 150px;
				height: 150px;
			}
			.contenido-eventos{
				position: absolute;
				top: 300px;
			}
		}


	</style>


	<div class="bg-img">


		<div class="collapse navbar-collapse" id="navbarSupportedContent">



		</div>

		<div class="row">
			<div class="col-md-4 col-12"></div>
			<div class="col-md-4 col-12">
				<h3 class="text-center text-white text-mor">Hospital del Niño Morelense. <br> Sector salud</h3>
			</div>
			<div class="col-md-4 col-12"></div>
		</div>
	</div>



	<div class="container ">
		<div class="row">
			<div class="col-md-4 col-12"></div>
			<div class="col-md-4 col-12 text-center">
				<img src="vista\img\plantilla\hnm_colores.png" class="img_portada" width="200px">
			</div>
			<div class="col-md-4 col-12"></div>
		</div>
		<div class="row mt-5 contenido-eventos">

			<?php

			$listaEventos = EventoModelo::mdlConsultarTodosEventosPublico();

			//var_dump($listaEventos);


			foreach ($listaEventos as $key => $value) :

			?>

				<div class="col-12 col-md-4">
					<div class="card">
						<div class="card-body ">
							<h5 class="card-title"><?php echo $value['tema'] ?></h5>
							<h6 class="text-center">Ponente(s)</h6>
							<?php $ponente = PonenteModelo::mldConsultarPonenteEvento($value['idEventos']);


							foreach ($ponente as $key => $pon) :
							?>



								<p class="card-text text-center"> <strong> <?php echo $pon['nombre']; ?> </strong></p>
							<?php endforeach; ?>
							<div class="row">
								<div class="col-6">
									<h6 class="text-center">Capacidad  <br> <strong class="card-lugares"><?php echo $value['capacidad'] ?></strong></h6>
								</div>
								<div class="col-6">
									<h6 class="text-center">Lugar <br> <strong class="card-lugar"><?php echo $value['ubicacion'] ?>l</strong></h6>
								</div>

							</div>
							<h6 class="card-ponentes text-center">Horario <br> <strong>
								<?php 
								
										$fechaC = $value['fecha'];
										$fechaC = explode(' ',$fechaC);
										$hora = explode(':',$fechaC[1]);

										echo $fechaC[0].' ',$hora[0].':'.$hora[1];
										
								?>
							</strong></h6>
							<div class="row">
								<div class="col-md-12 col-12 btn-group">
									<?php
									
									$contadorAsistente = AsistenteModelo::mdlObtenerConteoListaAsistenciaEventos($value['idEventos']);
									$cupo = $value['capacidad'];
						
									if ($contadorAsistente['total_asistencia_evento'] >= $cupo ):
									
									?>

									<button class="btn btn-default" disabled="disabled"><strong> Cupo lleno :( Cominucate al </strong> </button>

									<?php  else: ?>
									<button class="btn btn-primary btnInscripcionEvento " data-toggle="modal" data-target="#mdlInscripcion"  nombreEvento="<?php echo $value['tema'] ?>" idEvento="<?php echo $value['idEventos'] ?>">Inscribirme</button>
									<?php endif; ?>
									<a href="<?php echo $url."info/".$value['idEventos'] ?>" class="btn btn-warning">Info</a>
									<?php
									$contador = AsistenteModelo::mdlObtenerConteoListaAsistenciaEventos($value['idEventos']); ?>
									
								</div>
								<div class="col-12">
									<p class="text-dark text-center"> <strong> Participantes(<?php echo $contador['total_asistencia_evento'] ?>) </strong></p>
								</div>
								
								
							</div>
						</div>
					</div>

				</div>

			<?php endforeach; ?>




		</div>
		<!--Aqui crea-->
	</div>




	<!-- aqui va el modal de inscripción--->

	<div class="modal fade" id="mdlInscripcion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Agregar Asistentes</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="" method="post">
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12 col-12">
								<div class="card">
									<div class="card-body">
										<div class="form-group">

											<label for="">Evento</label>

											<input type="text" readonly class="form-control" id="tema">
											<input type="hidden" id="idEventos" name="idEventos">

										</div>
										<div class="form-group">
											<label for="">Nombre:</label>
											<input type="text" name="nombre" id="nombre" required="" class="form-control" placeholder="Escribir Nombre Completo">

										</div>

										<div class="form-group">
											<label for="">Correo Electronico</label>
											<input type="email" name="correo" id="correo" required="" class="form-control" required="" placeholder="Escribe el correo aqui">
										</div>
										<div class="form-group">
											<label for="">Numero Telefonico</label>
											<input type="text" name="telefono" id="telefono" required="" placeholder="Ingrese su numero telefonico" class="form-control">
										</div>

										<div class="form-group">
											<label for="">Grado de estudios</label>
											<select name="gradoEstudios" id="gradoEstudios" class="form-control" >
												<option value="">Seleccione su grado de estudio</option>
												<option value="Dr">Dr</option>
												<option value="LIC">Lic</option>
												<option value="ING">ING</option>
											</select>
										</div>

										<div class="form-group">
											<label for="">Tipo de Asistente</label>
											<select name="idCosto" id="tipoAsistente" class="form-control selectedTipoAsistente" required="">
												<!--<option value="">Seleccione el tipo de asistente</option>-->

											</select>
										</div>
										<div class="form-group">
											<label for="">Total a pagar:</label>
											<input type="number" name="total" id="total" readonly class="form-control total" placeholder="Cantidad a pagar">

										</div>








									</div>
								</div>
							</div>

						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
						<button type="submit" class="btn btn-success" name="btnGuardarAsistente">Guardar Cambios</button>
					</div>
					<?php 
						$guardar = new AsistenteControlador();
						$guardar -> ctrGurdarAsistente();
					?>
				</form>
			</div>
		</div>
	</div>