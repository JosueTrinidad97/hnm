<div class="container mt-4">



  <div class="row">
    <div class="col-12"> <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#addPonente">Agregar Ponentes</button></div>
    <div class="col-12 col-md-12">
      <form method="post" id="formSelectPonente">
        <div class="row">
          <div class="col-12 col-md-3">
            <div class="form-group">
              <label for="my-select">Selecciona el evento</label>
              <select id="myPonente" class="custom-select" name="myPonente">
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
    <div class="col-12 pintarPonentes">





    </div>
  </div>

  <div class="">
                  <button class="btn btn-primary btnEviarCorreosPonentes">Enviar correo <i class="nav-icon fas fa-mail-bulk"></i></button>
  </div>


  <div class="modal fade" id="addPonente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agregar Ponente</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="#" method="POST">
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12 col-12">
                <div class="card">
                  <div class="card-body">
                    <div class="form-group">

                      <label for="">Seleccionar evento</label>

                      <?php

                      $eventos = EventoModelo::mdlConsultarTodosEventos();
                      //var_dump($eventos);


                      ?>

                      <select name="idEventos" id="" class="form-control">
                        <option value="">seleccionar evento</option>

                        <?php foreach ($eventos as $key => $value) : ?>
                          <option value="<?php echo $value['idEventos'] ?>"><?php echo $value['tema'] ?></option>
                        <?php endforeach; ?>
                      </select>

                    </div>
                    <div class="form-group">
                      <label for="">Nombre:</label>
                      <input type="text" name="nombre" id="" class="form-control" placeholder="Escribir Nombre Completo">

                    </div>

                    <div class="form-group">
                      <label for="">Correo Electronico</label>
                      <input type="email" name="correo" id="" class="form-control" required="" placeholder="Escribe el correo aqui">
                    </div>
                    <div class="form-group">
                      <label for="">Numero Telefonico</label>
                      <input type="text" name="telefono" id="" placeholder="Ingrese su numero telefonico" class="form-control">
                    </div>

                    <div class="form-group">
                      <label for="">Grado de estudios</label>
                      <select name="gradoEstudios" id="" class="form-control">
                        <option value="Doctor">Seleccione su grado de estudio</option>
                        <option value="DR">Dr</option>
                        <option value="LIC">Lic</option>
                        <option value="ING">ING</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="">Tema</label>
                      <input type="text" name="tema" placeholder="Tema del curso" class="form-control">
                    </div>

                    <div class="form-group">

                      <label for="">Descripción:</label>
                      <textarea type="text" name="descripcion" id="descripcion" rows="3" cols="50" class="form-control" placeholder="Escribe el descripción del Tema"></textarea>

                    </div>
                    <div class="form-group">

                      <label for="">Hora Inicio:</label>
                      <input type="time" name="horaInicio" id="fecha" class="form-control">

                    </div>
                    <div class="form-group">

                      <label for="">Hora Fin:</label>
                      <input type="time" name="horaFin" id="fecha" class="form-control">

                    </div>

                  </div>
                </div>
              </div>

            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-success" name="btnGuardarPonente">Registrar</button>
          </div>
          <?php
          $guardarPonente = new PonenteControlador();
          $guardarPonente->GuardarPonente();
          ?>
        </form>
      </div>
    </div>





  </div>

  <!-- Editar Ponente Actualizar -->
  <div class="modal fade" id="ACT_Ponente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agregar Ponente</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="#" method="POST">
          <input type="hidden" name="idPonente" id="Act_IdPonente">
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12 col-12">
                <div class="card">
                  <div class="card-body">
                    <div class="form-group">

                      <label for="">Seleccionar evento</label>

                      <?php

                      $eventos = EventoModelo::mdlConsultarTodosEventos();
                      //var_dump($eventos);


                      ?>

                      <select name="idEventos" id="Act_Evento" class="form-control">
                        <option value="">seleccionar evento</option>

                        <?php foreach ($eventos as $key => $value) : ?>
                          <option value="<?php echo $value['idEventos'] ?>"><?php echo $value['tema'] ?></option>
                        <?php endforeach; ?>
                      </select>

                    </div>
                    <div class="form-group">
                      <label for="">Nombre:</label>
                      <input type="text" name="nombre" id="Act_nombre" class="form-control" placeholder="Escribir Nombre Completo">

                    </div>

                    <div class="form-group">
                      <label for="">Correo Electronico</label>
                      <input type="email" name="correo" id="Act_Correo" class="form-control" required="" placeholder="Escribe el correo aqui">
                    </div>
                    <div class="form-group">
                      <label for="">Numero Telefonico</label>
                      <input type="text" name="telefono" id="Act_Telefono" placeholder="Ingrese su numero telefonico" class="form-control">
                    </div>

                    <div class="form-group">
                      <label for="">Grado de estudios</label>
                      <select name="gradoEstudios" id="Act_GradoEstudios" class="form-control">
                        <option value="Doctor">Seleccione su grado de estudio</option>
                        <option value="DR">Dr</option>
                        <option value="LIC">Lic</option>
                        <option value="ING">ING</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="">Tema</label>
                      <input type="text" name="tema" id="Act_tema" placeholder="Tema del curso" class="form-control">
                    </div>

                    <div class="form-group">

                      <label for="">Descripción:</label>
                      <textarea type="text" name="descripcion" id="Act_descripcion" rows="3" cols="50" class="form-control" placeholder="Escribe el descripción del Tema"></textarea>

                    </div>
                    <div class="form-group">

                      <label for="">Hora Inicio:</label>
                      <input type="time" name="horaInicio" id="Act_HoraInicio" class="form-control">

                    </div>
                    <div class="form-group">

                      <label for="">Hora Fin:</label>
                      <input type="time" name="horaFin" id="Act_HoraFin" class="form-control">

                    </div>

                  </div>
                </div>
              </div>

            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-success" name="btnActualizarPonente">Actualizar</button>
          </div>
          <?php
          $actualizarPonente = new PonenteControlador();
          $actualizarPonente->ctrActualizarPonente();
          ?>

        </form>
      </div>
    </div>







  </div>