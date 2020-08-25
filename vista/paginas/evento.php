<style>
	.card-title {
		padding: 25px;
		border: 2px dashed #0069D9;
		width: 100%;
		text-align: center;
	}
</style>


<div class="container mt-4">



	<!-- Button trigger modal -->
	<button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#addEvento">
		Agregar evento

	</button>
	<br />
	<div class="container">
		<div class="row mt-5">

			<?php

			if (isset($rutas[1])) {
				$eliminaEvento = EventoControlador::ctrEliminarEvento($rutas[1], $rutas[2], $url);
			}


			$listaEventos = EventoModelo::mdlConsultarTodosEventos();

			//var_dump($listaEventos);


			foreach ($listaEventos as $key => $value) :

			?>

				<div class="col-12 col-md-4">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title"><?php echo $value['tema'] ?></h5>
							<h6 class="text-center">Ponente(s)</h6>
							<?php $ponente = PonenteModelo::mldConsultarPonenteEvento($value['idEventos']);


							foreach ($ponente as $key => $pon) :
							?>



								<p class="card-text text-center"> <strong> <?php echo $pon['nombre']; ?> </strong></p>
							<?php endforeach; ?>
							<div class="row">
								<div class="col-6">
									<h6 class="text-center">Lugares disponibles <br> <strong class="card-lugares"><?php echo $value['capacidad'] ?></strong></h6>
								</div>
								<div class="col-6">
									<h6 class="text-center">Lugar <br> <strong class="card-lugar"><?php echo $value['ubicacion'] ?>l</strong></h6>
								</div>

							</div>
							<h6 class="card-ponentes text-center">Fecha <br> <strong>
									<?php

									$fechaC = $value['fecha'];
									$fechaC = explode(' ', $fechaC);
									$hora = explode(':', $fechaC[1]);

									echo $fechaC[0] . ' ', $hora[0] . ':' . $hora[1];

									?>
								</strong></h6>
							<div class="row">
								<div class="col-12 ">
									<form action="" method="post">
										<div class="btn-group">
											<button type="button" class="btn btn-info btnEditarEvento " data-toggle="modal" data-target="#updateEvento" idEvento="<?php echo $value['idEventos'] ?>"><i class="nav-icon far fa-edit"></i> Editar</button>

											<button type="submit" class="btn btn-success" name="btnSeleccionaEvento"><i class="nav-icon fas fa-users"></i> Participantes</button>
											<input type="hidden" name="idEventos" value="<?php echo  $value['idEventos']  ?>">

											<button type="button" class="btn btn-danger btnEliminarEvento" idEvento="<?php echo $value['idEventos'] ?>" urlApp="<?php echo $url ?>"> <i class="nav-icon fas fa-trash-alt"></i> eliminar</button>
										</div>
										<?php
										$select = new EventoControlador();
										$select->seleccionEvento();
										?>
									</form>
								</div>


							</div>
						</div>
					</div>

				</div>

			<?php endforeach; ?>




		</div>

	</div>"

	<!-- Modal AGREGAR EVENTO -->
	<div class="modal fade " id="addEvento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Registrar Nuevo Evento</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="#" method="POST" enctype="multipart/form-data">
					<!-- Para que cargue archivos mulimedia en el formulario -->
					<div class="modal-body">
						<div class="row">
							<div class="col-md-6 col-12">
								<div class="card">
									<div class="card-body">
										<div class="form-group">

											<label for="">Tema:</label>
											<input type="text" name="tema" id="tema" class="form-control" placeholder="Escribe el nombre del Tema">

										</div>
										<div class="form-group">

											<label for="">Descripción:</label>
											<textarea type="text" name="descripcion" id="descripcion" rows="3" cols="50" class="form-control" placeholder="Escribe el descripción del Tema"></textarea>

										</div>
										<div class="form-group">

											<label for="">Fecha:</label>
											<input type="date" name="fecha" id="fecha" class="form-control">

										</div>
										<div class="form-group">

											<label for="">Hora:</label>
											<input type="time" name="hora" id="hora" class="form-control">

										</div>
										<div class="form-group">

											<label for="">Capacidad:</label>
											<input type="number" name="capacidad" id="capacidad" class="form-control">

										</div>
										<div id="personasR_1">
											<label>Usuario:</label>
											<input type="text" class="w3-input w3-border form-control" name="tipoPersonaR[]" id="usuarioR1" /><label> Costo:</label>
											<input type="text" class="w3-input w3-border form-control" name="costoR[]" id="costoR1" /><br>
											<input class="bt_plusR" id="r1" type="button" value="+">
											<br><br>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6 col-12">
								<div class="card">
									<div class="card-body">
										<div class="form-group">

											<label for="">Ubicación:</label>
											<input type="text" name="ubicacion" id="ubicacion" class="form-control" placeholder="Escribe la ubicación">

										</div>
										<div class="form-group">

											<label>Seleccionar Imagen(s):</label><br>
											<input class=" form-control" type="file" id="img-evento" name="img-evento" required><br>
											<label id="error"></label><br>
										</div>

									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
						<button type="submit" class="btn btn-success" name="btnAgregarEvento">Registrar</button>
					</div>
					<?php

					$agregarEvento = new EventoControlador();
					$agregarEvento->ctrAgregarEvento();



					?>
				</form>

			</div>
		</div>
	</div>





	<!-- Modal EDITAR EVENTO -->
	<div class="modal fade " id="updateEvento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Actualizar Evento</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="#" method="POST">
					<div class="modal-body">
						<div class="row">
							<div class="col-md-6 col-12">
								<div class="card">
									<div class="card-body">
										<div class="form-group">

											<label for="">Tema:</label>
											<input type="text" name="tema" id="updatetema" class="form-control" placeholder="Escribe el nombre del Tema">

										</div>
										<div class="form-group">

											<label for="">Descripción:</label>
											<textarea type="text" name="descripcion" id="updatedescripcion" rows="3" cols="50" class="form-control" placeholder="Escribe el descripción del Tema"></textarea>

										</div>
										<div class="form-group">

											<label for="">Fecha:</label>
											<input type="date" name="fecha" id="updatefecha" class="form-control">

										</div>
										<div class="form-group">

											<label for="">Hora:</label>
											<input type="time" name="hora" id="updatehora" class="form-control">

										</div>
										<div class="form-group">

											<label for="">Capacidad:</label>
											<input type="number" name="capacidad" id="updatecapacidad" class="form-control">

										</div>
										<div class="contenedor_costo">
											<div id="UpdatepersonasR_1">
												<label>Usuario:</label>
												<input type="text" class="w3-input w3-border form-control" name="tipoPersonaR[]" id="updateusuarioR1" /><label> Costo:</label>
												<input type="text" class="w3-input w3-border form-control" name="costoR[]" id="updatecostoR1" /><br>
												<input class="Ubt_plusR" id="rc" type="button" value="+">
												<br><br>
											</div>

										</div>

									</div>
								</div>
							</div>
							<div class="col-md-6 col-12">
								<div class="card">
									<div class="card-body">
										<div class="form-group">

											<label for="">Ubicación:</label>
											<input type="text" name="ubicacion" id="updateubicacion" class="form-control" placeholder="Escribe la ubicación">

										</div>
										<div class="form-group">

											<label>Seleccionar Imagen(s):</label><br>
											<div class="card ">

											 <center>	<img src="" width="200" height="200"  class="previsualizar-img" alt="">  </center>

											</div>
											<input class="w3-input w3-border form-control" type="file" id="updateImagen" name="updateImagen"  ><br>
											<label id="error"></label><br>
										</div>

									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
						<button type="submit" class="btn btn-success" name="">Registrar</button>
					</div>
					<?php

					//$agregarEvento = new EventoControlador();
					//$agregarEvento->ctrAgregarEvento();



					?>
				</form>
			</div>
		</div>
	</div>








</div>