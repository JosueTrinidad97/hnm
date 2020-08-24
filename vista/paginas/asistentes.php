<div class="container mt-4">
	<div class="row">
		<div class="col-12">
			<button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#addAsistente">Agregar Asistente</button>

		</div>
		<div class="col-12 col-md-12">
			<form method="post" id="formSelectEvento">
				<div class="row">
					<div class="col-12 col-md-3">
						<div class="form-group">
							<label for="my-select">Selecciona el evento</label>
							<select id="myEvento" class="custom-select" name="myEvento">
								<option value="">Todos los eventos</option>
								<?php
								$eventos = EventoModelo::mdlConsultarTodosEventos();
								foreach ($eventos as $key => $value) :
								?>
									<option value="<?php echo $value['idEventos'] ?>"><?php echo $value['tema'] ?></option>
								<?php endforeach; ?>

							</select>
						</div>
					</div>
					<div class="col-12 col-md-3">
						<div class="form-group">
							<label for="myCorreo">Buscar por correo</label>
							<input id="myCorreo" class="form-control" type="text" name="">
						</div>
					</div>
				</div>
			</form>
		</div>

	</div>

	<div class="row">
		<div class="col-12 pintarEventos">





		</div>
	</div>


</div>







<div class="modal fade" id="addAsistente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Agregar Asistente</h5>
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

										<!--id tema  name idEventos-->


										<select name="idEventos" class="form-control selectInscripcionEvento" id="tema">
											<option value="">Seleccione un evento</option>
											<?php
											$eventos = EventoModelo::mdlConsultarTodosEventos();
											foreach ($eventos as $key => $value) :
											?>
												<option value="<?php echo $value['idEventos'] ?>"><?php echo $value['tema'] ?></option>
											<?php endforeach; ?>
										</select>

									</div>
									<div class="form-group">
										<label for="">Nombre:</label>
										<input type="text" name="nombre" id="nombre" class="form-control" placeholder="Escribir Nombre Completo"required>

									</div>

									<div class="form-group">
										<label for="">Correo Electronico</label>
										<input type="email" name="correo" id="correo" class="form-control" required="" placeholder="Escribe el correo aqui">
									</div>
									<div class="form-group">
										<label for="">Numero Telefonico</label>
										<input type="text" name="telefono" id="telefono" placeholder="Ingrese su numero telefonico" class="form-control">
									</div>

									<div class="form-group">
										<label for="">Grado de estudios</label>
										<select name="gradoEstudios" id="gradoEstudios" class="form-control">
											<option value="">Seleccione su grado de estudio</option>
											<option value="Dr">Dr</option>
											<option value="LIC">Lic</option>
											<option value="ING">ING</option>
										</select>
									</div>

									<div class="form-group">
										<label for="">Tipo de Asistente</label>
										<select name="idCosto" id="tipoAsistente" class="form-control selectedTipoAsistente tipoAsistente"  required>
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
				$guardar->ctrGurdarAsistente(true);
				?>
			</form>
		</div>
	</div>
</div>
<div class="modal fade" id="ActializarAsistente" tabindex="-1" role="dialog" aria-labelledby="ActializarAsistenteeModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="ActializarAsistenteeModalLabel">Actualizar Asistente</h5>
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

										<!--id tema  name idEventos-->

										<input type="hidden" name="idAsistente" id="Atc_idAsistente">


										<select name="idEventos" class="form-control selectInscripcionEvento" id="Act_tema">
											<option value="">Seleccione un evento</option>
											<?php
											$eventos = EventoModelo::mdlConsultarTodosEventos();
											foreach ($eventos as $key => $value) :
											?>
												<option value="<?php echo $value['idEventos'] ?>"><?php echo $value['tema'] ?></option>
											<?php endforeach; ?>
										</select>

									</div>
									<div class="form-group">
										<label for="">Nombre:</label>
										<input type="text" name="nombre" id="Act_nombre" class="form-control" placeholder="Escribir Nombre Completo" required>

									</div>

									<div class="form-group">
										<label for="">Correo Electronico</label>
										<input type="email" name="correo" id="Act_correo" class="form-control" required="" placeholder="Escribe el correo aqui">
									</div>
									<div class="form-group">
										<label for="">Numero Telefonico</label>
										<input type="text" name="telefono" id="Act_telefono" placeholder="Ingrese su numero telefonico" class="form-control">
									</div>

									<div class="form-group">
										<label for="">Grado de estudios</label>
										<select name="gradoEstudios" id="Act_gradoEstudios" class="form-control">
											<option value="">Seleccione su grado de estudio</option>
											<option value="Dr">Dr</option>
											<option value="LIC">Lic</option>
											<option value="ING">ING</option>
										</select>
									</div>

									<div class="form-group">
										<label for="">Tipo de Asistente</label>
										<select name="idCosto" id="Act_tipoAsistente" class="form-control selectedTipoAsistente tipoAsistente" required>
											<option value="">Seleccione el tipo de asistente</option>

										</select>
									</div>
									<div class="form-group">
										<label for="">Total a pagar:</label>
										<input type="number" name="total" id="Act_total" readonly class="form-control total" placeholder="Cantidad a pagar">

									</div>








								</div>
							</div>
						</div>

					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-success" name="btnModificarAsistente">Guardar Cambios</button>
				</div>
				<?php
				$modificar = new AsistenteControlador();
				$modificar->ctrModificarAsistente();
				?>
			</form>
		</div>
	</div>
</div>

<?php // $_SESSION['selected_event'] ='EVT-00002' ?>
<script>
	<?php if (isset($_SESSION['selected_event'])) : ?>
		$(document).ready(function() {
			pintarTablaEventos('<?php echo $_SESSION['selected_event'] ?>');
		})
	<?php else : ?>
		$(document).ready(function() {
			pintarTablaEventos('');
		})
	<?php endif; ?>
</script>

<?php 

	unset($_SESSION['selected_event']);// unset elimina una variable de sesion en especifico y el session destroy elimina todas las bariables todas las sessiones

?>